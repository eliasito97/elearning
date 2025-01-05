<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Quiz;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class CertificateController extends Controller
{
    public function show($quizId)
    {

//        dd(encryptor('decrypt', $quizId));
        $quiz = Quiz::findOrFail( encryptor('decrypt', $quizId));
        $course = Course::where('id', $quiz->course_id)->first();
        $student = Student::find(currentUserId());;
        $pdf = PDF::loadView('backend.quiz.certificate', compact('quiz', 'student','course'));
        return $pdf->download('certificado_' . $student->name . $student->lastname . '.pdf');
    }
}
