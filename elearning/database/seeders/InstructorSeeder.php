<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructors')->insert([
            [
                'id' => 1,
                'name' => 'Oscar',
                'middlename' => NULL,
                'lastname' => 'Terrazas',
                'lastname2' => 'Morales',
                'contact_en' => '01828543453',
                'country' => null,
                'email' => 'Oscar@gmail.com',
                'role_id' => 3,
                'bio' => 'Fuad is a highly skilled Full Stack Web Developer with over 10 years of experience. He specializes in front-end and back-end development, bringing a wealth of knowledge in modern web technologies. John is passionate about teaching and enjoys sharing his expertise with aspiring developers.',
                'title' => 'Experienced Full Stack Web Developer passionate about teaching modern web technologies.',
                'designation' => 'Senior Instructor',
                'image' => 'Instructor_Burhan Uddin Fuad_137.jpg',
                'status' => 1,
                'password' => '$2y$12$ZsGZnJfm4sKnDmH/nzDdf.3/ZthTEmY99rA9m/rPAXHx1UE6QhJCG',
                'language' => 'en',
                'access_block' => null,
                'remember_token' => null,
                'created_at' => '2023-11-25 15:35:23',
                'updated_at' => '2024-02-21 14:15:36',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Monica',
                'middlename' => 'Jorge',
                'lastname' => 'Lens',
                'lastname2' => 'Bouchabki',
                'contact_en' => '5456612',
                'country' => null,
                'email' => 'Monica@gmail.com',
                'role_id' => 3,
                'bio' => 'Thouhid is an Animation Expert and Video/Graphics Instructor known for her innovative approach to storytelling through animation. With a background in both 2D and 3D animation, Emily guides students through the world of visual storytelling, helping them unleash their creative potential.',
                'title' => '2D Animation and Short Video Ads Specialist',
                'designation' => 'Animation Expert',
                'image' => 'Instructor_Thouhidul Islam_766.jpg',
                'status' => 1,
                'password' => '$2y$12$FNBov.CIK58wPQcSSKRToOMru6xabDZvdY34wpOH4Y/PCLZ4VyOLu',
                'language' => 'en',
                'access_block' => null,
                'remember_token' => null,
                'created_at' => '2023-11-25 18:18:45',
                'updated_at' => '2024-02-21 14:17:18',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Tarek',
                'middlename' => 'Gonzalo',
                'lastname' => 'Chavarria',
                'lastname2' => 'Bouchabki',
                'contact_en' => '22222222',
                'country' => null,
                'email' => 'Tarek@gmail.com',
                'role_id' => 3,
                'bio' => 'Raihan is an Animation Expert and Video/Graphics Instructor known for her innovative approach to storytelling through animation. With a background in both 2D and 3D animation, Emily guides students through the world of visual storytelling, helping them unleash their creative potential.',
                'title' => 'Professional Designer Who Loves to Design',
                'designation' => 'UI UX Designer',
                'image' => 'Instructor_Raihan Sazzad_662.jpg',
                'status' => 1,
                'password' => '$2y$12$1x1.vxwZaewnKtRrl4Ieh.8sMHFgz8DFsR5SeAdjPPwQiAiCEEGR6',
                'language' => 'en',
                'access_block' => null,
                'remember_token' => null,
                'created_at' => '2023-12-04 17:25:20',
                'updated_at' => '2024-02-21 14:18:56',
                'deleted_at' => null,
            ],
        ]);
    }
}
