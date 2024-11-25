<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            [
                'id' => 1,
                'title' => 'Introduction to HTML',
                'course_id' => 1,
                'description' => 'In this lesson, students will be introduced to the fundamental structure of web development with HTML (Hypertext Markup Language). They will learn about the basic syntax of HTML tags, the document structure, and how to create a simple webpage. Emphasis will be placed on understanding the purpose of common HTML elements such as headings, paragraphs, lists, and links.',
                'notes' => "Introduction to HTML:\r\n\r\nHTML stands for Hypertext Markup Language.\r\nIt is the standard markup language for creating web pages.\r\nHTML tags are used to define and structure content on a webpage.\r\nDocument Structure:\r\n\r\nExplain the basic structure of an HTML document: !DOCTYPE html, html, head, and body tags.\r\nDiscuss the purpose of the head section for meta-information and the body section for content.\r\nCommon HTML Elements:\r\n\r\nIntroduce essential HTML tags such as h1, p, ul, li, and a.\r\nDemonstrate how to create hyperlinks using the a tag.\r\nHands-on Activity:\r\n\r\nHave students create a simple webpage with a heading, paragraphs, a list, and a hyperlink.\r\nEncourage them to experiment with different HTML elements.",
                'created_at' => '2023-12-17 12:28:08',
                'updated_at' => '2023-12-21 00:14:51',
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'title' => 'Introduction to CSS',
                'course_id' => 1,
                'description' => 'This lesson focuses on Cascading Style Sheets (CSS) and how it is used to enhance the presentation of HTML documents. Students will learn about selectors, properties, and values. The goal is for students to understand how to apply styles to HTML elements and gain insight into the concept of styling cascades.',
                'notes' => "Introduction to CSS:\r\n\r\nCSS stands for Cascading Style Sheets.\r\nIt is used to style the layout and presentation of HTML documents.\r\nSelectors and Properties:\r\n\r\nIntroduce CSS selectors and how they target HTML elements.\r\nDiscuss common CSS properties such as color, font-size, margin, and padding.\r\nBox Model:\r\n\r\nExplain the CSS box model: margin, border, padding, and content.\r\nDemonstrate how to use the box model to control spacing and layout.\r\nStyling Cascades:\r\n\r\nDiscuss the concept of cascading styles and how conflicting styles are resolved.\r\nIntroduce specificity and the importance of understanding the order of styles.\r\nHands-on Activity:\r\n\r\nHave students apply styles to the HTML webpage created in Lesson 1.\r\nExperiment with changing colors, fonts, and layout properties.",
                'created_at' => '2023-12-17 21:21:51',
                'updated_at' => '2023-12-21 00:16:54',
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'title' => 'JavaScript Tutorial',
                'course_id' => 1,
                'description' => 'This lesson introduces students to the basics of JavaScript, a programming language that enables dynamic and interactive web pages. Students will learn about variables, data types, and basic control structures. The lesson culminates in a simple interactive program.',
                'notes' => "Introduction to JavaScript:\r\n\r\nJavaScript is a scripting language that enables client-side interactivity in web browsers.\r\nIt is used to manipulate the content and behavior of HTML documents.\r\nVariables and Data Types:\r\n\r\nIntroduce the concept of variables and how they are used to store data.\r\nCover basic data types: strings, numbers, and booleans.\r\nBasic Control Structures:\r\n\r\nExplain control structures such as if statements for conditional logic.\r\nIntroduce loops, specifically the for loop, for repetitive tasks.\r\nDOM Manipulation:\r\n\r\nDiscuss the Document Object Model (DOM) and how JavaScript can be used to manipulate HTML elements dynamically.\r\nShow examples of changing text, styles, and adding/removing elements.\r\nHands-on Activity:\r\n\r\nGuide students in creating a simple interactive program using JavaScript.\r\nEncourage them to modify the HTML and CSS based on user interactions.",
                'created_at' => '2023-12-19 21:51:36',
                'updated_at' => '2023-12-21 00:17:47',
                'deleted_at' => null,
            ],
        ]);
    }
}
