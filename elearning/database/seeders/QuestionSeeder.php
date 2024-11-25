<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'quiz_id' => 1,
                'content' => 'What does HTML stand for?',
                'type' => 'multiple_choice',
                'option_a' => 'Hyper Text Markup Language',
                'option_b' => 'Hyperlinks and Text Markup Language',
                'option_c' => 'Home Tool Markup Languages',
                'option_d' => 'Home Text Making Language',
                'correct_answer' => 'a',
                'created_at' => '2023-11-28 06:04:51',
                'updated_at' => '2023-11-28 23:39:14',
                'deleted_at' => NULL
            ],
            [
                'id' => 2,
                'quiz_id' => 1,
                'content' => 'Which tag is used to display bold text?',
                'type' => 'multiple_choice',
                'option_a' => '<a>',
                'option_b' => '<bold>',
                'option_c' => '<b>',
                'option_d' => '<abbr>',
                'correct_answer' => 'c',
                'created_at' => '2023-11-28 06:05:24',
                'updated_at' => '2023-11-28 23:40:30',
                'deleted_at' => NULL
            ]
        ]);
    }
}
