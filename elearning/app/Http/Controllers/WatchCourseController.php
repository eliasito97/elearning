<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Material;
use App\Models\Review;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class WatchCourseController extends Controller
{


    public function watchCourse($id)
    {
        $course = Course::findOrFail(encryptor('decrypt', $id));
        $lessons = Lesson::where('course_id', $course->id)->get();

        $reviews = Review::where('course_id', $course->id)->orderby('id', 'DESC')->paginate(10);
        $lessonArrays = Lesson::where('course_id', $course->id)->get('id');
        foreach ($lessonArrays as $array)
        {
            $lesson1 [] = $array->id;
        }

        $watchlist_true = Watchlist::where('student_id', currentUserId())
            ->where('course_id', $course->id)
            ->whereIn('lesson_id', $lesson1)
            ->where('is_checked', 1) // Solo los valores verdaderos
            ->count();

        $watchlist_all = Watchlist::where('student_id', currentUserId())
            ->where('course_id', $course->id)
            ->whereIn('lesson_id', $lesson1)
            ->count();

        // Calculando el porcentaje de los elementos verdaderos con respecto al total
        if ($watchlist_all > 0) {
            $progress = ($watchlist_true / $watchlist_all) * 100;  // Calculando el porcentaje de 'true' sobre el total
        } else {
            $progress = 0; // Si no hay registros en total, el progreso es 0%
        }




       return view('frontend.watchCourse', compact('course', 'lessons','reviews','progress'));
    }
    public function store(Request $request)
    {


    }

}
