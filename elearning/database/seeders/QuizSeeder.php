<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    public function run()
    {
        DB::table('quizzes')->insert([
            ['id' => 1, 'course_id' => 1, 'title' => 'Introduction to HTML', 'created_at' => '2023-11-28 06:01:21', 'updated_at' => '2023-11-28 06:16:31', 'deleted_at' => NULL],
            ['id' => 2, 'course_id' => 2, 'title' => 'Necessity of Keywords and Tags', 'created_at' => '2023-11-28 06:01:49', 'updated_at' => '2023-11-28 06:18:33', 'deleted_at' => NULL],
            ['id' => 3, 'course_id' => 3, 'title' => 'Get Started with JSX', 'created_at' => '2023-11-28 06:02:04', 'updated_at' => '2023-11-28 06:20:26', 'deleted_at' => NULL],
        ]);
    }
}
