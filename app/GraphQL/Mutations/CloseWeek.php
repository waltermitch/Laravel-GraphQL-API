<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\ExpenseType;
use App\Traits\Auth\ManagesAuth;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CloseWeek
{   
    use ManagesAuth;

    public function __construct()
    {
        
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {   
        Gate::allowIf(fn ($user) => !$user->isAdministrator());

        DB::beginTransaction();

        try {
            $user = static::authenticatedUser();
            
            $selectedUnit = $user->selectedUnit();
            $activePeriod = $selectedUnit->activePeriod();
            $previousPeriod = $activePeriod?->previous();

            // reversals
            if ($previousPeriodId = $previousPeriod?->id) {
                $expenses = $user->expenses()
                    ->whereHas('expenseType', function(Builder $query) {
                        $query->where('type', '=' ,'Accrual')
                            ->orWhere('type', '=', 'ReAccrual');
                    })
                    ->orWhere('period_id', $activePeriod?->id)
                    ->get()
                    ->groupBy('period_id');

                if (Arr::exists($expenses, $previousPeriodId)) {
                    foreach ($expenses[$previousPeriodId] as $previousExpense) {
                        $currentExpense = null;

                        if (isset($expenses[$activePeriod?->id])) {
                            $currentExpense = $expenses[$activePeriod?->id]
                                ->where('reversal_of_expense_id', $previousExpense->id)->toArray();
                        }

                        if (empty($currentExpense)) {
                            $reversal = $previousExpense->replicate()->fill([
                                'expense_type_id' => ExpenseType::expenseType('Reversal')?->id,
                                'reversal_of_expense_id' => $previousExpense->id
                            ]);

                            $reversal->save();
                        }
                    }
                }
            }
            
            if (!is_null($activePeriod)) {
                $selectedUnit->periods()->updateExistingPivot($activePeriod->id, [
                    'is_closed' => true
                ]);
                
                $next = $activePeriod->next();
                
                $selectedUnit->periods()->attach($next);
                
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollback();
            
            return false;
        }
        
        return true;
    }
}