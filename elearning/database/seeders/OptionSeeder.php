<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            ['id' => 1, 'question_id' => 1, 'option_text' => 'Hyper Text Markup Language', 'is_correct' => 1, 'created_at' => '2023-11-28 07:56:46', 'updated_at' => '2023-11-28 07:56:46', 'deleted_at' => NULL],
            ['id' => 2, 'question_id' => 1, 'option_text' => 'Hyperlinks and Text Markup Language', 'is_correct' => 0, 'created_at' => '2023-11-28 07:58:01', 'updated_at' => '2023-11-28 07:58:01', 'deleted_at' => NULL],
        ]);
    }
}
