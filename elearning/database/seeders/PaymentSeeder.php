<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            ['id' => 1, 'student_id' => 10, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 182.16, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_657699d29ce57', 'status' => 0, 'created_at' => '2023-12-10 23:10:42', 'updated_at' => '2023-12-10 23:10:42', 'deleted_at' => NULL],
            ['id' => 2, 'student_id' => 10, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 91.08, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_65769ad5411ed', 'status' => 1, 'created_at' => '2023-12-10 23:15:01', 'updated_at' => '2023-12-10 23:15:05', 'deleted_at' => NULL],
            ['id' => 3, 'student_id' => 10, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 91.08, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_65769e8f0cf11', 'status' => 1, 'created_at' => '2023-12-10 23:30:55', 'updated_at' => '2023-12-10 23:30:59', 'deleted_at' => NULL],
            ['id' => 4, 'student_id' => 10, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 182.16, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_65769f2a84099', 'status' => 1, 'created_at' => '2023-12-10 23:33:30', 'updated_at' => '2023-12-10 23:33:34', 'deleted_at' => NULL],
            ['id' => 5, 'student_id' => 14, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 113.85, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_6576a5e82a723', 'status' => 1, 'created_at' => '2023-12-11 00:02:16', 'updated_at' => '2023-12-11 00:02:25', 'deleted_at' => NULL],
            ['id' => 6, 'student_id' => 14, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 113.85, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_6576a7c21ecb3', 'status' => 0, 'created_at' => '2023-12-11 00:10:10', 'updated_at' => '2023-12-11 00:10:10', 'deleted_at' => NULL],
            ['id' => 7, 'student_id' => 14, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 113.85, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_6576a8b00421a', 'status' => 1, 'created_at' => '2023-12-11 00:14:08', 'updated_at' => '2023-12-11 00:14:48', 'deleted_at' => NULL],
            ['id' => 8, 'student_id' => 14, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 113.85, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_6576a8f323604', 'status' => 1, 'created_at' => '2023-12-11 00:15:15', 'updated_at' => '2023-12-11 00:15:26', 'deleted_at' => NULL],
            ['id' => 9, 'student_id' => 17, 'currency' => 'BDT', 'currency_code' => 'BDT', 'amount' => 145.36, 'currency_value' => 1.00, 'method' => 'SSLCommerz', 'txnid' => 'SSLCZ_TXN_657fea661d5b3', 'status' => 0, 'created_at' => '2023-12-18 00:44:54', 'updated_at' => '2023-12-18 00:44:54', 'deleted_at' => NULL],

        ]);
    }
}
