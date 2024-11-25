<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            [
                'id' => 1,
                'lesson_id' => 1,
                'title' => 'HTML Attributes',
                'type' => 'video',
                'content' => '5971703138819.mp4',
                'content_url' => null,
                'created_at' => '2023-12-17 21:16:21',
                'updated_at' => '2023-12-21 00:05:53',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'lesson_id' => 1,
                'title' => 'HTML Tables',
                'type' => 'video',
                'content' => '5971703138819.mp4',
                'content_url' => null,
                'created_at' => '2023-12-17 21:23:30',
                'updated_at' => '2023-12-21 00:06:07',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'lesson_id' => 2,
                'title' => 'CSS Syntax',
                'type' => 'video',
                'content' => '5971703138819.mp4',
                'content_url' => null,
                'created_at' => '2023-12-19 21:45:05',
                'updated_at' => '2023-12-21 00:06:25',
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'lesson_id' => 2,
                'title' => 'CSS Selectors',
                'type' => 'document',
                'content' => '3971703138919.jpg',
                'content_url' => null,
                'created_at' => '2023-12-19 21:46:44',
                'updated_at' => '2023-12-21 00:09:25',
                'deleted_at' => null,
            ],
        ]);
    }
}
