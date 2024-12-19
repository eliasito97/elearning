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
        $reviews = Review::where('course_id', $course->id)->get();



       return view('frontend.watchCourse', compact('course', 'lessons','reviews'));
    }
    public function store(Request $request)
    {

        //dd($request->all());

        try {
            $reviews = new Review;
            $reviews->student_id = $request->student_id;
            $reviews->rating = '5';
            $reviews->course_id = $request->course_id;
            $reviews->comment = $request->comment;


            if ($reviews->save())
                return redirect()->back()->withInput()->with('success', 'Data Saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }

}
