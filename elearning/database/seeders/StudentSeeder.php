<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('students')->insert([
            'id' => 8,
            'name' => 'Safayet',
            'middlename' => NULL,
            'lastname' => 'Ullah',
            'lastname2' => NULL,
            'contact_en' => '0183478963',
            'country' => NULL,
            'email' => 'student@gmail.com',
            'date_of_birth' => '2000-02-01',
            'gender' => NULL,
            'image' => '3291704130747.jpg',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',
            'profession' => 'Web Developer',
            'nationality' => 'Bolivia',
            'address' => NULL,
            'city' => NULL,
            'state' => NULL,
            'postcode' => NULL,
            'status' => 1,
            'password' => '$2y$12$rUxi5wAuMt/u9jG46La/h.rva.37gFo6invimj.kjxQEOiRyL7os.',
            'language' => 'en',
            'remember_token' => NULL,
            'created_at' => '2023-12-18 00:13:14',
            'updated_at' => '2024-01-01 11:40:25',
            'deleted_at' => NULL
        ]);
    }
}
