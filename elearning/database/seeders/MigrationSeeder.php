<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('migrations')->insert([
            ['id' => 3, 'migration' => '2023_10_12_031415_create_roles_table', 'batch' => 1],
            ['id' => 4, 'migration' => '2023_11_19_053448_create_course_categories_table', 'batch' => 2],
            ['id' => 5, 'migration' => '2023_11_22_143059_create_permissions_table', 'batch' => 3],
            ['id' => 6, 'migration' => '2023_11_25_034933_create_students_table', 'batch' => 4],
            ['id' => 7, 'migration' => '2024_11_22_021347_create_typepayments_table', 'batch' => 4],
            ['id' => 8, 'migration' => '2023_11_26_034558_create_courses_table', 'batch' => 5],
            ['id' => 9, 'migration' => '2023_11_26_153556_create_enrollments_table', 'batch' => 6],
            ['id' => 10, 'migration' => '2023_11_26_153639_create_quizzes_table', 'batch' => 6],
            ['id' => 11, 'migration' => '2023_11_26_153659_create_questions_table', 'batch' => 6],
            ['id' => 12, 'migration' => '2023_11_26_153719_create_answers_table', 'batch' => 6],
            ['id' => 13, 'migration' => '2023_11_26_153735_create_reviews_table', 'batch' => 6],
            ['id' => 14, 'migration' => '2023_11_26_153818_create_subscriptions_table', 'batch' => 6],
            ['id' => 15, 'migration' => '2023_11_26_153902_create_discussions_table', 'batch' => 6],
            ['id' => 16, 'migration' => '2023_11_26_153916_create_messages_table', 'batch' => 6],
            ['id' => 17, 'migration' => '2023_11_26_153660_create_options_table', 'batch' => 7],
            ['id' => 18, 'migration' => '2023_12_09_135359_create_coupons_table', 'batch' => 8],
            ['id' => 19, 'migration' => '2023_12_09_170943_create_checkouts_table', 'batch' => 9],
            ['id' => 20, 'migration' => '2023_11_26_153754_create_payments_table', 'batch' => 10],
            ['id' => 21, 'migration' => '2023_11_26_153557_create_lessons_table', 'batch' => 11],
            ['id' => 22, 'migration' => '2023_11_26_153620_create_materials_table', 'batch' => 12],
            ['id' => 23, 'migration' => '2023_11_26_153844_create_progress_table', 'batch' => 12],
            ['id' => 24, 'migration' => '2023_12_20_031354_create_watchlists_table', 'batch' => 13],
            ['id' => 25, 'migration' => '2023_12_23_070253_add_tag_to_courses_table', 'batch' => 14],
            ['id' => 26, 'migration' => '2023_11_12_031401_create_instructors_table', 'batch' => 15],
            ['id' => 27, 'migration' => '2023_11_12_031402_create_users_table', 'batch' => 15],
            ['id' => 28, 'migration' => '2024_01_01_121113_add_column_to_user_table', 'batch' => 15],
            ['id' => 29, 'migration' => '2024_01_03_073449_create_events_table', 'batch' => 16],
            ['id' => 30, 'migration' => '2024_11_23_061013_create_personal_access_tokens_table', 'batch' => 17],

        ]);
    }
}
