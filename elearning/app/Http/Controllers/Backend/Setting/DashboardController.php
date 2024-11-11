<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get();
        $student = Student::get();
        $course = Course::get();
        $totalAmount = Payment::where('status', '1')->sum('amount');
        // Datos del informe de ingresos
        $payments= $this->getpayments();
        $months = $this->getSixMonthsLabels();
        $studentforstatus =$this->getstudentsforstatus();
        $studentData = $this->getstudents();

         if (fullAccess())
            return view('backend.adminDashboard', compact('user', 'student','course','totalAmount','payments','months','studentData','studentforstatus'));
        else
        if ($user->role = 'instructor')
            return view('backend.instructorDashboard');
        else
            return view('backend.dashboard');

        //   $user = User::get();
        //   if($user->role = 'instructor')
        //     return view('backend.instructorDashboard');
    }
    private function getpayments()
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(6);

        return Payment::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(amount) as total_income')
            ->where('status', 1)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
    }
    private function getstudents()
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(6);

        return Student::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(id) as total_income')
            ->where('status', 1)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();
    }
    private function getstudentsforstatus()
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(6);

        return Student::selectRaw('status, COUNT(id) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('status')
            ->get();
    }
    private function getSixMonthsLabels()
    {
        $months = [];
        $startDate = Carbon::now()->subMonths(6);

        for ($i = 6; $i >= 1; $i--) {
            $months[] = $startDate->copy()->addMonths($i)->format('F Y');
        }

        return $months;
    }
}
