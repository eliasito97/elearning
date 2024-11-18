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
        $selectedDifficulty = $request->input('difficulty', []);

        $course = Course::where('status', 2)
            ->when($selectedCategories, function ($query) use ($selectedCategories) {
                $query->whereIn('course_category_id', $selectedCategories);
            })
            ->when($selectedDifficulty, function ($query1) use ($selectedDifficulty) {
                if (is_array($selectedDifficulty) && count($selectedDifficulty)) {
                    $query1->whereIn('difficulty', $selectedDifficulty);
                } else if (!is_array($selectedDifficulty) && $selectedDifficulty) {
                    $query1->where('difficulty', 'like', "%$selectedDifficulty%");
                }
            })
            ->get();
//        dd($course);
        $DifficultyAll = Course::where('status', 2)
        ->select('difficulty', Course::raw('COUNT(*) as count'))
        ->groupBy('difficulty')
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

        return view('frontend.searchCourse', compact('course', 'category', 'selectedCategories', 'allCourse','courseDuration1','courseDuration2','courseDuration3','courseDuration4','selectedDifficulty','DifficultyAll'));
    }
}
