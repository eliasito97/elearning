<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'id' => 1,
                'title' => 'TechTalk Series: Exploring the Future of Artificial Intelligence',
                'description' => 'Join us for an immersive exploration into the fascinating world of Artificial Intelligence. In this TechTalk series, our expert panelists will delve deep into the latest trends, breakthroughs, and real-world applications of AI. From machine learning to natural language processing, discover how AI is reshaping industries and influencing our daily lives. This virtual event is designed for both enthusiasts and professionals seeking a comprehensive understanding of the future possibilities that AI holds. Do not miss out on this opportunity to engage with thought leaders and expand your knowledge in the realm of Artificial Intelligence.',
                'image' => '1.jpg',
                'topic' => 'Artificial Intelligence',
                'goal' => 'Enhance understanding of AI current landscape and its potential future impact.',
                'location' => 'Virtual Event',
                'hosted_by' => 'Your Platform Team',
                'date' => '2024-01-10 00:00:00',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'title' => 'Mastering Web Design and Development: A Hands-On Workshop',
                'description' => 'Embark on a journey to master the art of web development with our intensive hands-on workshop. Whether you are a beginner or an experienced developer, this event is designed to elevate your skills to new heights. Join industry professionals as they guide you through essential coding techniques, best practices, and the latest trends in web development. Bring your laptop and get ready to code alongside experts in a collaborative virtual environment. This workshop promises an interactive and enriching experience for all participants.',
                'image' => '2.jpg',
                'topic' => 'Web Development',
                'goal' => 'Equip participants with practical skills to excel in web development.',
                'location' => 'On Site Classroom',
                'hosted_by' => 'Your Platform Team',
                'date' => '2024-02-15 00:00:00',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'title' => 'Digital Marketing Trends: Navigating the Ever-Changing Landscape',
                'description' => 'Stay ahead of the curve in the dynamic world of digital marketing. Our in-depth webinar explores the latest trends, tools, and strategies that are shaping the digital marketing landscape. Led by seasoned marketing professionals, this event is a must-attend for anyone looking to enhance their online presence and stay competitive in the digital realm. From social media marketing to SEO best practices, gain actionable insights to elevate your digital marketing game.',
                'image' => '3.jpg',
                'topic' => 'Digital Marketing',
                'goal' => 'Provide an overview of current digital marketing trends and effective implementation strategies.',
                'location' => 'Online Webinar',
                'hosted_by' => 'Your Platform Team',
                'date' => '2024-03-20 00:00:00',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ]);
    }
}
