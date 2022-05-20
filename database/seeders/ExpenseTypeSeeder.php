<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpenseType;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseType::insert([
            ['type' => 'Transfer Slip', 'description' => 'Transfer Slip'],
            ['type' => 'Shipping Ticket', 'description' => 'Shipping Ticket'],
            ['type' => 'Accrual', 'description' => 'Accrual'],
            ['type' => 'Other', 'description' => 'Other'],
        ]);
    }
}
