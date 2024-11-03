<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\CourseCategory;

class AboutController extends Controller
{
    public function index()
    {
        $instructor = Instructor::get();

        return view(
            'frontend.about',
            compact('instructor')
        );
    }
}
