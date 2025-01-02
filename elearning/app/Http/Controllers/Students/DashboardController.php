<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Checkout;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener información del estudiante
        $student_info = Student::find(currentUserId());
        $enrollmentall = Enrollment::where('student_id', currentUserId())->get();
        // Paginar las inscripciones
        $enrollment = Enrollment::where('student_id', currentUserId())
            ->with('course') // Asegúrate de cargar la relación 'course' para evitar consultas adicionales
            ->paginate(3); // Cambia 4 por el número de elementos por página que desees

        // Obtener los cursos (si es necesario)
        $course = Course::get();

        // Obtener el historial de pagos
        $checkout = Checkout::where('student_id', currentUserId())->get();

        // Calcular el progreso para cada inscripción paginada
        foreach ($enrollment as $a) {
            // Obtener el progreso de este curso
            $watchlist_true = Watchlist::where('student_id', currentUserId())
                ->where('course_id', $a->course->id)
                ->where('is_checked', 1) // Solo los marcados como completados
                ->count();

            $watchlist_all = Watchlist::where('student_id', currentUserId())
                ->where('course_id', $a->course->id)
                ->count();

            // Calcular el progreso como un porcentaje
            $a->progress = $watchlist_all > 0 ? ($watchlist_true / $watchlist_all) * 100 : 0;
        }

        // Pasar los datos a la vista
        return view('students.dashboard', compact('student_info', 'enrollment', 'course', 'checkout', 'enrollmentall'));
    }
}
