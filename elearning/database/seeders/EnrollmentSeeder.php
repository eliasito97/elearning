<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollments')->insert([
            [
                'id' => 1,
                'student_id' => 8,
                'course_id' => 4,
                'enrollment_date' => '2023-12-31 18:00:00',
                'created_at' => '2024-01-01 11:43:52',
                'updated_at' => '2024-01-01 11:43:52',
                'deleted_at' => null,
            ],
        ]);
    }
}
