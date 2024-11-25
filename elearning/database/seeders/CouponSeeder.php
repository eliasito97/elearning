<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'id' => 1,
                'code' => 'offer20',
                'discount' => 20.00,
                'valid_from' => '2023-12-09',
                'valid_until' => '2024-03-26',
                'created_at' => '2023-12-09 09:30:32',
                'updated_at' => '2023-12-09 09:30:32',
                'deleted_at' => null
            ],
            [
                'id' => 2,
                'code' => 'el50',
                'discount' => 50.00,
                'valid_from' => '2023-12-09',
                'valid_until' => '2024-12-16',
                'created_at' => '2023-12-09 09:34:18',
                'updated_at' => '2023-12-09 09:34:18',
                'deleted_at' => null
            ],
        ]);
    }
}
