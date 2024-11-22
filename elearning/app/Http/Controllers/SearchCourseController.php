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
        $selectedTypepayment = $request->input('typepayment', []);

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
            ->when(!empty($selectedTypepayment) && !in_array('', $selectedTypepayment), function ($query2) use ($selectedTypepayment) {
                // Si "Todos" no está seleccionado, aplica el filtro de tipo de pago
                $query2->whereIn('typepayment_id', $selectedTypepayment);
            })
            ->get();
//        dd($course);
        $DifficultyAll = Course::where('status', 2)
        ->select('difficulty', Course::raw('COUNT(*) as count'))
        ->groupBy('difficulty')
        ->get();

        $TypepaymentAll = Course::with('typepayment')
            ->where('status', 2)
            ->select('typepayment_id', Course::raw('COUNT(*) as count'))
            ->groupBy('typepayment_id')
            ->get()
            ->map(function ($course) {
                return [
                    'typepayment_id' => $course->typepayment_id,
                    'typepayment_plan' => $course->typepayment->typepayment_plan ?? 'Sin tipo de pago',
                    'count' => $course->count,
                ];
            });

        $allCourse = Course::where('status', 2)->get();


        return view('frontend.searchCourse', compact('course', 'category', 'selectedCategories', 'allCourse','selectedDifficulty','DifficultyAll','TypepaymentAll','selectedTypepayment'));
    }
}
