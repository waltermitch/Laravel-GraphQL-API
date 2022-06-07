<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RegisterCloseoutCalculation
{
    public function __construct()
    {
        //
    }

    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $lastClosedRegister = \App\Models\RegisterCloseout::where('period_id', $args['period_id'])
            ->where('unit_id', $args['unit_id'])
            ->where('register_id', $args['register_id'])
            ->orderBy('created_at', 'DESC')
            ->first();

        $fields = $args['fields'];

        $totalToDistribute = $fields['non_resetable'];
        $netTotal = $totalToDistribute - $fields['tax_from_the_tape'];
        $netCash = $netTotal - $fields['net_o_v'] - $fields['net_charge'] - $fields['net_voucher'];
        $cashTax = $fields['tax_from_the_tape'] - $fields['overring_void_tax'] - $fields['charge_tax'] - $fields['voucher_tax'];
        $customerCountTotal = $fields['customer_count_breakfast'] + $fields['customer_count_lunch'] + $fields['customer_count_dinner'];
        $netSalesTotal = $fields['net_sales_breakfast'] + $fields['net_sales_lunch'] + $fields['net_sales_dinner'];

        $totalDailyDeposit = \App\Models\RegisterCloseout::where('period_id', $args['period_id'])
            ->where('unit_id', $args['unit_id'])
            ->sum('actual_cash_deposit');

        $totalNetSales = $totalToDistribute - $fields['tax_from_the_tape'] - $fields['net_o_v'] - $fields['net_voucher'];
        $charge = $fields['net_charge'];
        $cashTotal = $totalNetSales - $charge;
        $pettyCash = $fields['total_petty_cash'];
        $calculatedCashDeposit = $cashTotal + $cashTax - $pettyCash;
        $actualDeposit = $fields['actual_cash_deposit'];
        $overShort = $actualDeposit - $calculatedCashDeposit;

        return [
            'fields'     => [
                'net_total'               => $netTotal,
                'last_non_resettable'     => $lastClosedRegister ? $lastClosedRegister->non_resetable : 0,
                'total_to_distribute'     => $totalToDistribute,
                'net_cash'                => $netCash,
                'cash_tax'                => $cashTax,
                'calculated_cash_deposit' => $calculatedCashDeposit,
                'over_short'              => $overShort,
                'customer_count_totals'   => $customerCountTotal,
                'net_sales_total'         => $netSalesTotal,
            ],
            'statistics' => [
                'total_daily_deposit' => $totalDailyDeposit,
                'total_net_sales'     => $totalNetSales,
                'charge'              => $charge,
                'cash_total'          => $cashTotal,
                'cash_tax'            => $cashTax,
                'petty_cash'          => $pettyCash,
                'calced_deposit'      => $calculatedCashDeposit,
                'actual_deposit'      => $actualDeposit,
                'over_short'          => $overShort,
            ],
        ];
    }
}
