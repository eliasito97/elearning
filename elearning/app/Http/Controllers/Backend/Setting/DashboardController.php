<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get();
        $student = Student::get();
        if (fullAccess())
            return view('backend.adminDashboard', compact('user', 'student'));
        else
        if ($user->role = 'instructor')
            return view('backend.instructorDashboard');
        else
            return view('backend.dashboard');

        //   $user = User::get();
        //   if($user->role = 'instructor')
        //     return view('backend.instructorDashboard');
    }
}
