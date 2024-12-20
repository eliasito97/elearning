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
        $student_info = Student::find(currentUserId());
        $enrollment = Enrollment::where('student_id', currentUserId())->get();
        $course = Course::get();
        $checkout = Checkout::where('student_id', currentUserId())->get();

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
            if ($watchlist_all > 0) {
                $a->progress = ($watchlist_true / $watchlist_all) * 100;
            } else {
                $a->progress = 0; // Si no hay materiales en el curso
            }

        }

        // $purchaseHistory = Enrollment::with(['course', 'checkout'])->orderBy('enrollment_date', 'desc')->get();
        return view('students.dashboard', compact('student_info','enrollment', 'course','checkout'));
    }
}
