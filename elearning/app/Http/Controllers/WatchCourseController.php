<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Material;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class WatchCourseController extends Controller
{


    public function watchCourse($id)
    {
        $course = Course::findOrFail(encryptor('decrypt', $id));
        $lessons = Lesson::where('course_id', $course->id)->get();
        $reviews = Review::where('course_id', $course->id)->paginate(5);



       return view('frontend.watchCourse', compact('course', 'lessons','reviews'));
    }
    public function store(Request $request)
    {


    }

}
