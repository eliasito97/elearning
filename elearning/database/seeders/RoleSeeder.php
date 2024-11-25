<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Super Admin', 'identity' => 'superadmin', 'created_at' => '2023-11-16 12:16:34', 'updated_at' => NULL],
            ['id' => 2, 'name' => 'Admin', 'identity' => 'admin', 'created_at' => '2023-11-16 12:16:34', 'updated_at' => NULL],
            ['id' => 3, 'name' => 'Instructor', 'identity' => 'instructor', 'created_at' => '2023-11-16 12:16:34', 'updated_at' => NULL],
            ['id' => 4, 'name' => 'Student', 'identity' => 'student', 'created_at' => '2023-11-16 12:16:34', 'updated_at' => NULL],
            ['id' => 5, 'name' => 'Visitor', 'identity' => 'visitor', 'created_at' => '2023-11-23 09:13:19', 'updated_at' => '2023-11-23 09:13:19'],
        ]);
    }
}
