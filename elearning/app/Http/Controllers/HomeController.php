<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\CourseCategory;

class HomeController extends Controller
{
    public function index()
    {
        $course = Course::get();
        $instructor = Instructor::get();
        $category = CourseCategory::get();
        $popularCourses = Course::where('tag', 'popular')->get();

        $designCategories = CourseCategory::whereIn('category_name', ['Graphics Desgin', 'Web Design', 'Video Editing'])->pluck('id')->toArray();
        $designCourses = Course::whereIn('course_category_id', $designCategories)->where('tag', 'popular')->get();

        $developmentCategories = CourseCategory::whereIn('category_name', ['Web Development', 'Mobile Development', 'Game Development', 'Database Design & Development', 'Data Science'])->pluck('id')->toArray();
        $developmentCourses = Course::whereIn('course_category_id', $developmentCategories)->where('tag', 'popular')->get();

        $businessCategories = CourseCategory::whereIn('category_name', ['Digital Marketing', 'Entrepreneurship'])->pluck('id')->toArray();
        $businessCourses = Course::whereIn('course_category_id', $businessCategories)->where('tag', 'popular')->get();

        $itCategories = CourseCategory::whereIn('category_name', ['Hardware', 'Network Technology', 'Software & Security', 'Operating System & Server', '2D Animation', '3D Animation'])->pluck('id')->toArray();
        $itCourses = Course::whereIn('course_category_id', $itCategories)->where('tag', 'popular')->get();

        return view(
            'frontend.home',
            compact('course', 'instructor', 'category', 'popularCourses', 'designCourses', 'developmentCourses', 'businessCourses', 'itCourses')
        );
    }
    public function Search(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        // Buscar cursos
        $searchTerm = $request->input('search');
        $course = Course::where('title_en', 'LIKE', "%{$searchTerm}%")
            ->orWhere('description_en', 'LIKE', "%{$searchTerm}%")
            ->get();

        // Inicializar variables adicionales necesarias para la vista
        $category = CourseCategory::get();
        $allCourse = Course::where('status', 2)->get();
        $selectedCategories = []; // Vacío porque no hay filtro de categorías en búsqueda
        $selectedDifficulty = []; // Vacío porque no hay filtro de dificultad en búsqueda
        $selectedTypepayment = []; // Vacío porque no hay filtro de tipo de pago en búsqueda
        $DifficultyAll = $this->getdifficulty();
        $TypepaymentAll = $this->getpayments();
        $filteredCourses = $this->getprice($course); // Aplicar lógica de filtrado

        // Retornar vista con los datos necesarios
        return view('frontend.searchCourse', compact(
            'filteredCourses', 'category', 'selectedCategories',
            'allCourse', 'selectedDifficulty', 'course',
            'DifficultyAll', 'TypepaymentAll', 'selectedTypepayment', 'searchTerm'
        ));
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
