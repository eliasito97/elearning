<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            CheckoutSeeder::class,
            CouponSeeder::class,
            CourseCategorySeeder::class,
            TypepaymentSeeder::class,
            EventSeeder::class,
            RoleSeeder::class,
            InstructorSeeder::class,
            CourseSeeder::class,
            QuizSeeder::class,
            QuestionSeeder::class,
            OptionSeeder::class,
            PaymentSeeder::class,
            PermissionsTableSeeder::class,
            StudentSeeder::class,
            UserSeeder::class,
            LessonSeeder::class,
            MaterialSeeder::class,
            EnrollmentSeeder::class,
        ]);
    }
}
