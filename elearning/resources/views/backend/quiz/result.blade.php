<h1>{{ $quiz->course->title_en }}</h1>
<h1>Resultados del examen:</h1>
<p>Puntaje: {{ $score }} / {{ $totalQuestions }}</p>
<p>Porcentaje: {{ $percentage }}%</p>

@if ($percentage >= 70)
    <p class="text-success">{{ __('Congratulations! You passed the exam.') }}</p>
    <a href="{{ route('certificate.show', encryptor('encrypt', $quiz->id)) }}" class="btn btn-primary">{{ __('Print Certificate') }}</a>
@else
    <p class="text-danger">{{ __('Sorry, you did not pass. Try again.') }}</p>
@endif

<a href="{{ route('watchCourse', encryptor('encrypt',$quiz->course_id)) }}" class="btn btn-primary">{{ __('Go Back') }}</a>
