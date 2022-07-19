<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\ExpenseType;
use App\Models\Expense;
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
        Gate::allowIf(fn ($user) => !$user->isAdministrator() && $user->hasSelectedUnit());

        DB::beginTransaction();

        try {
            $user = static::authenticatedUser();
            
            $selectedUnit = $user->selectedUnit();
            $activePeriod = $selectedUnit->activePeriod();
            $previousPeriod = $activePeriod?->previous();

            // get the records from fixed_expenses table where the date is current active Period and monthly is false

            // check if it's the first week
            if ( $activePeriod?->week == 1 ) {
                $fixedExpenses = DB::table('fixed_expenses')->get();
            } else {
                $fixedExpenses = DB::table('fixed_expenses')->where('monthly', false)->get();
            }
            // unit_id, monthly, gl_account_id, amount, comments, created_at, updated_at

            // get the expense_type for Fixed expense
            $fixedExpenseType = DB::table('expense_types')->where('type', 'Fixed')->first();

            // pre-populate the fixed_expenses to expenses table
            foreach($fixedExpenses as $expense) {
                $newExpense = new Expense();
                $newExpense->expense_type_id = $fixedExpenseType->id;
                $newExpense->gl_account_id = $expense->gl_account_id;
                $newExpense->expense_date = $expense->created_at; // not null
                $newExpense->amount = $expense->amount; // not null
                $newExpense->comments = $expense->comments; // not null
                // $newExpense->vendor_id = $expense->id; // not supported
                $newExpense->unit_id = $expense->unit_id;
                $newExpense->period_id = $activePeriod?->id;
                // $newExpense->user_id = $expense->id; // not supported
                // $newExpense->reversal_of_expense_id = $expense->id; // not supported
                $newExpense->save();
            }

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