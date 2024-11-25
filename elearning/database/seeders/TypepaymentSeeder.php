<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypepaymentSeeder extends Seeder
{
    public function run()
    {
        DB::table('typepayments')->insert([
            ['id' => 1, 'typepayment_plan' => 'full_course_subscription', 'created_at'=> now()],
            ['id' => 2, 'typepayment_plan' => 'annual_subscription', 'created_at'=> now()],
            ['id' => 3, 'typepayment_plan' => 'weekly_subscription', 'created_at'=> now()],
            ['id' => 4, 'typepayment_plan' => 'daily_subscription', 'created_at'=> now()],
        ]);
    }
}
