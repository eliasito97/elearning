<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('checkouts')->insert([
            'id' => 1,
            'cart_data' => json_encode([
                'cart' => [
                    '6' => [
                        'title_en' => 'Full-Stack Web Development Bootcamp: Basics to Advanced',
                        'quantity' => 1,
                        'price' => '5000.00',
                        'old_price' => '9000.00',
                        'image' => '1401704126972.jpg',
                        'difficulty' => 'beginner',
                        'instructor' => 'Burhan Uddin Fuad'
                    ]
                ],
                'cart_details' => [
                    'cart_total' => 5000,
                    'coupon_code' => 'offer20',
                    'discount' => '20.00',
                    'discount_amount' => 1000,
                    'tax' => 600,
                    'total_amount' => 4600
                ]
            ]),
            'student_id' => 8,
            'txnid' => 'SSLCZ_TXN_6592f9adf2b79',
            'status' => 1,
            'created_at' => '2024-01-01 11:43:09',
            'updated_at' => '2024-01-01 11:43:52',
            'deleted_at' => null
        ]);
    }
}
