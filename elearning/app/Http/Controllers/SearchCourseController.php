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
        $coursedifficulty1 = Course::where('status', 2)
            ->where('difficulty', 'like', 'beginner')
            ->get();
        $coursedifficulty2 = Course::where('status', 2)
        ->where('difficulty', 'like', 'Intermediate')
        ->get();
        $coursedifficulty3 = Course::where('status', 2)
            ->where('difficulty', 'like', 'Advanced')
            ->get();
        $coursedifficulty4 = Course::where('status', 2)
            ->where('difficulty', 'like', 'Expert')
            ->get();
        $courseDuration1 = Course::where('status', 2)
            ->whereBetween('duration', [0, 5])
            ->get();

        $courseDuration2 = Course::where('status', 2)
            ->whereBetween('duration', [5, 10])
            ->get();

        $courseDuration3 = Course::where('status', 2)
            ->whereBetween('duration', [10, 15])
            ->get();

        $courseDuration4 = Course::where('status', 2)
            ->where('duration', '>', 15)
            ->get();

        $allCourse = Course::where('status', 2)->get();

        return view('frontend.searchCourse', compact('course', 'category', 'selectedCategories', 'allCourse','coursedifficulty1','coursedifficulty2','coursedifficulty3','coursedifficulty4','courseDuration1','courseDuration2','courseDuration3','courseDuration4'));
    }
}
