<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\CourseCategory;

class AboutController extends Controller
{
    public function index()
    {
        $instructor = Instructor::get();
        $student_info = Student::find(currentUserId());

        return view(
            'frontend.about',
            compact('instructor', 'student_info')
        );
    }
}
