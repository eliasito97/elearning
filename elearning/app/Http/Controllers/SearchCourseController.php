<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class SearchCourseController extends Controller
{
    public function index(Request $request)
    {

        $category = CourseCategory::get();
        $selectedCategories = $request->input('categories', []);

        $course = Course::where('status', 2)->when($selectedCategories, function ($query) use ($selectedCategories) {
                $query->whereIn('course_category_id', $selectedCategories);
            })->get();
        $course1 = Course::where('status', 2)
            ->where('difficulty', 'like', 'beginner') // Corrige aquí el uso de 'like'
            ->get();
        $course2 = Course::where('status', 2)
        ->where('difficulty', 'like', 'Intermediate') // Corrige aquí el uso de 'like'
        ->get();
        $course3 = Course::where('status', 2)
            ->where('difficulty', 'like', 'Advanced') // Corrige aquí el uso de 'like'
            ->get();
        $course4 = Course::where('status', 2)
            ->where('difficulty', 'like', 'Expert') // Corrige aquí el uso de 'like'
            ->get();


        $allCourse = Course::where('status', 2)->get();

        return view('frontend.searchCourse', compact('course', 'category', 'selectedCategories', 'allCourse','course1','course2','course3','course4'));
    }
}
