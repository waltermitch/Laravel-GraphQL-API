<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\County;
use App\Models\District;
use App\Models\ExpenseType;
use App\Models\GlAccount;
use App\Models\GlTypeCode;
use App\Models\InventoryCategory;
use App\Models\RegisterType;
use App\Models\State;
use App\Models\Term;
use Illuminate\Database\Seeder;

class TruncateBrockDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseType::truncate();
        Term::truncate();
        RegisterType::truncate();
        District::truncate();
        //
        County::truncate();
        City::truncate();
        State::truncate();
        //
        InventoryCategory::truncate();
        GlAccount::truncate();
        GlTypeCode::truncate();
    }
}
