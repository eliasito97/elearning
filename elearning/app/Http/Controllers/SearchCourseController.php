<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchCourseController extends Controller
{
    public function index(Request $request)
    {
        $category = CourseCategory::get();
        $allCourse = Course::where('status', 2)->paginate(10);
        $selectedCategories = $request->input('categories', []);
        $selectedDifficulty = $request->input('difficulty', []);
        $selectedTypepayment = $request->input('typepayment', []);
        $student_info = Student::find(currentUserId());

        $course = $this->getcourse($selectedCategories,$selectedDifficulty,$selectedTypepayment);

        // Paginación manual
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 4; // Número de resultados por página
        $paginatedCourses = $this->paginateCollection($course, $perPage, $currentPage);

        // Filtrar precios en los cursos paginados
        $filteredCourses = $this->getprice($paginatedCourses->getCollection());

        // Crear un nuevo paginador con los cursos filtrados
        $filteredCourses = new LengthAwarePaginator(
            $filteredCourses,
            $paginatedCourses->total(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        $TypepaymentAll= $this->getpayments();
        $DifficultyAll= $this->getdifficulty();


        return view('frontend.searchCourse', compact(
            'filteredCourses', 'category', 'selectedCategories',
            'allCourse', 'selectedDifficulty', 'course' ,
            'DifficultyAll', 'TypepaymentAll', 'selectedTypepayment','student_info'
        ));
    }
    private function paginateCollection(Collection $collection, int $perPage, int $currentPage)
    {
        $items = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
        return new LengthAwarePaginator(
            $items,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }
    private function getpayments()
    {
       return Course::with('typepayment')
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
    }
    private function getdifficulty()
    {
        return Course::where('status', 2)
            ->select('difficulty', Course::raw('COUNT(*) as count'))
            ->groupBy('difficulty')
            ->get();
    }
    private function getcourse($selectedCategories,$selectedDifficulty,$selectedTypepayment)
    {
            return Course::where('status', 2)
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
    }

    private function getprice($courses)
    {
        return $courses->filter(function ($course) {
            return $course->full_course_subscription !== null ||
                $course->annual_subscription !== null ||
                $course->weekly_subscription !== null ||
                $course->daily_subscription !== null;
        });
    }

}
