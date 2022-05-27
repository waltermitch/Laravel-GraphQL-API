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
        //TO-DO PECZIS
        
        //register closeout calculations
        
        // $unit_id = $args['unit_id'];
        // $period_id = $args['period_id'];
        // $fields = $args['fields'];
        
        // $fields array has exactly those keys:
        // 'non_resetable', 'net_o_v', 'net_charge', 'tax_from_the_tape', 'net_voucher', 
        // 'overring_void_tax', 'charge_tax', 'voucher_tax', 'total_petty_cash', 'actual_cash_deposit', 'customer_count_breakfast',
        // 'net_sales_breakfast', 'customer_count_lunch', 'net_sales_lunch', 'customer_count_dinner', 'net_sales_dinner'
        
        // after calculations returned array has to have exact structure:
        return [
            'fields' => [
                'net_total' => 1,
                'last_non_resettable' => 1,
                'total_to_distribute' => 1,
                'net_cash' => 1,
                'cash_tax' => 1,
                'calculated_cash_deposit' => 1,
                'over_short' => 1,
                'customer_count_totals' => 1,
                'net_sales_total' => 1
            ],
            'statistics' => [
                'total_daily_deposit' => 1,
                'total_net_sales' => 1,
                'charge' => 1,
                'cash_total' => 1,
                'cash_tax' => 1,
                'petty_cash' => 1,
                'calced_deposit' => 1,
                'actual_deposit' => 1,
                'over_short' => 1
            ]
        ];
    }
}
