<?php

namespace App\Http\Controllers\Backend\Quizzes;

use App\Models\Enrollment;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Exception;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        $quiz = Quiz::paginate(10);
        return view('backend.quiz.quizzes.index', compact('quiz','enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        $course = Course::get();
        return view('backend.quiz.quizzes.create', compact('course','enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $quiz = new Quiz;
            $quiz->title = $request->quizTitle;
            $quiz->course_id = $request->courseId;

            if ($quiz->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('quiz.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $quiz)
    {
        $course = $quiz->title_en;
        $quizzes = Quiz::with(['question.option'])
            ->where('course_id', $quiz->id)
            ->get();

        if ($quizzes->isEmpty()) {
            return back()->with('error', 'No hay quizzes disponibles para este curso.');
        }
        return view('backend.quiz.show', compact('quizzes','course'));
    }
    public function submit(Request $request, Quiz $quiz)
    {
        $course = $quiz->title_en;
        // Obtener respuestas enviadas
        $answers = $request->input('answers');

        // Inicializar variables para cálculo
        $score = 0; // Puntaje del usuario
        $totalQuestions = $quiz->question->count(); // Total de preguntas en el quiz

        // Recorrer las preguntas y verificar respuestas
        foreach ($quiz->question as $question) {
            if (isset($answers[$question->id])) {
                // Verificar si la opción seleccionada es correcta
                $selectedOptionId = $answers[$question->id];
                $correctOption = $question->option->where('is_correct', true)->first();

                if ($correctOption && $correctOption->id == $selectedOptionId) {
                    $score++; // Incrementar puntaje si es correcta
                }
            }
        }

        // Calcular porcentaje
        $percentage = ($totalQuestions > 0) ? ($score / $totalQuestions) * 100 : 0;

        // Redirigir a la página de resultados con datos
        return view('backend.quiz.result', [
            'course' => $course,
            'quiz' => $quiz,
            'score' => $score,
            'totalQuestions' => $totalQuestions,
            'percentage' => round($percentage, 2), // Redondear porcentaje
        ]);
    }

    public function result(Quiz $quiz)
    {
        return view('quiz.result', [
            'quiz' => $quiz,
            'score' => session('score'),
            'percentage' => session('percentage'),
            'totalQuestions' => session('totalQuestions'),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $enrollment = Enrollment::OrderBy('enrollment_date', 'DESC')->limit(5)->get();
        $course = Course::get();
        $quiz = Quiz::findOrFail(encryptor('decrypt', $id));
        return view('backend.quiz.quizzes.edit', compact('course', 'quiz','enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $quiz = Quiz::findOrFail(encryptor('decrypt', $id));
            $quiz->title = $request->quizTitle;
            $quiz->course_id = $request->courseId;

            if ($quiz->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('quiz.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Quiz::findOrFail(encryptor('decrypt', $id));
        if ($data->delete()) {
            $this->notice::error('Data Deleted!');
            return redirect()->back();
        }
    }
}
