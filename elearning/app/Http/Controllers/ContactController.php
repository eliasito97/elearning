<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {

        $student_info = Student::find(currentUserId());

        return view(
            'frontend.contact',
            compact('student_info')
        );
    }
}
