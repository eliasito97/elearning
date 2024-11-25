<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_categories')->insert([
            [
                'id' => 1,
                'category_name' => 'Graphics Design',
                'category_status' => 1,
                'category_image' => '3241701795877.jpg',
                'created_at' => '2023-11-19 00:24:08',
                'updated_at' => '2023-12-05 11:04:37',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'category_name' => 'Web Design',
                'category_status' => 1,
                'category_image' => '1601701795901.jpg',
                'created_at' => '2023-11-19 01:23:53',
                'updated_at' => '2023-12-05 11:05:01',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'category_name' => 'Web Development',
                'category_status' => 1,
                'category_image' => '4441701795922.jpg',
                'created_at' => '2023-11-19 01:24:44',
                'updated_at' => '2023-12-05 11:05:22',
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'category_name' => 'Digital Marketing',
                'category_status' => 1,
                'category_image' => '9691701795938.jpg',
                'created_at' => '2023-11-19 21:20:48',
                'updated_at' => '2023-12-05 11:05:38',
                'deleted_at' => null,
            ],
            [
                'id' => 5,
                'category_name' => 'Video Editing',
                'category_status' => 1,
                'category_image' => '3621701795955.jpg',
                'created_at' => '2023-11-26 03:36:04',
                'updated_at' => '2023-12-05 11:05:55',
                'deleted_at' => null,
            ],
            [
                'id' => 6,
                'category_name' => '2D Animation',
                'category_status' => 1,
                'category_image' => '8361701795972.jpg',
                'created_at' => '2023-12-05 10:47:40',
                'updated_at' => '2023-12-05 11:06:12',
                'deleted_at' => null,
            ],
            [
                'id' => 7,
                'category_name' => '3D Animation',
                'category_status' => 1,
                'category_image' => '3241701795877.jpg',
                'created_at' => '2023-11-19 00:24:08',
                'updated_at' => '2023-12-05 11:04:37',
                'deleted_at' => null,
            ],
            [
                'id' => 8,
                'category_name' => 'Mobile Development',
                'category_status' => 1,
                'category_image' => '1601701795901.jpg',
                'created_at' => '2023-11-19 01:23:53',
                'updated_at' => '2023-12-05 11:05:01',
                'deleted_at' => null,
            ],
            [
                'id' => 9,
                'category_name' => 'Game Development',
                'category_status' => 1,
                'category_image' => '4441701795922.jpg',
                'created_at' => '2023-11-19 01:24:44',
                'updated_at' => '2023-12-05 11:05:22',
                'deleted_at' => null,
            ],
            [
                'id' => 10,
                'category_name' => 'Database Design & Development',
                'category_status' => 1,
                'category_image' => '9691701795938.jpg',
                'created_at' => '2023-11-19 21:20:48',
                'updated_at' => '2023-12-05 11:05:38',
                'deleted_at' => null,
            ],
            [
                'id' => 11,
                'category_name' => 'Data Science',
                'category_status' => 1,
                'category_image' => '3621701795955.jpg',
                'created_at' => '2023-11-26 03:36:04',
                'updated_at' => '2023-12-05 11:05:55',
                'deleted_at' => null,
            ],
            [
                'id' => 12,
                'category_name' => 'Entrepreneurship',
                'category_status' => 1,
                'category_image' => '8361701795972.jpg',
                'created_at' => '2023-12-05 10:47:40',
                'updated_at' => '2023-12-05 11:06:12',
                'deleted_at' => null,
            ],
            [
                'id' => 13,
                'category_name' => 'Network Technology',
                'category_status' => 1,
                'category_image' => '3241701795877.jpg',
                'created_at' => '2023-11-19 00:24:08',
                'updated_at' => '2023-12-05 11:04:37',
                'deleted_at' => null,
            ],
            [
                'id' => 14,
                'category_name' => 'Hardware',
                'category_status' => 1,
                'category_image' => '1601701795901.jpg',
                'created_at' => '2023-11-19 01:23:53',
                'updated_at' => '2023-12-05 11:05:01',
                'deleted_at' => null,
            ],
            [
                'id' => 15,
                'category_name' => 'Software & Security',
                'category_status' => 1,
                'category_image' => '4441701795922.jpg',
                'created_at' => '2023-11-19 01:24:44',
                'updated_at' => '2023-12-05 11:05:22',
                'deleted_at' => null,
            ],
            [
                'id' => 16,
                'category_name' => 'Operating System & Server',
                'category_status' => 1,
                'category_image' => '9691701795938.jpg',
                'created_at' => '2023-11-19 21:20:48',
                'updated_at' => '2023-12-05 11:05:38',
                'deleted_at' => null,
            ],
        ]);
    }
}
