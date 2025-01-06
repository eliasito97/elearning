<div class="container">
    <h1>{{ $quiz->course->title_en }}</h1>
    <h1>{{ __('Exam Results:') }}</h1>
    <p>{{ __('Score:') }} {{ $score }} / {{ $totalQuestions }}</p>
    <p>{{ __('Percentage:') }} {{ $percentage }}%</p>

    @if ($percentage >= 70)
        <p class="text-success">{{ __('Congratulations! You passed the exam.') }}</p>
        <a href="{{ route('certificate.show', encryptor('encrypt', $quiz->id)) }}" class="btn btn-primary">{{ __('Print Certificate') }}</a>
    @else
        <p class="text-danger">{{ __('Sorry, you did not pass. Try again.') }}</p>
    @endif

    <a href="{{ route('watchCourse', encryptor('encrypt',$quiz->course_id)) }}" class="btn btn-primary">{{ __('Go Back') }}</a>
</div>
<style>
    /* Estilo general para el contenedor */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    /* Estilo para el contenedor principal */
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Estilo para el título del curso */
    .container h1:first-of-type {
        font-size: 28px;
        color: #0578be;
        margin-bottom: 10px;
        text-align: center;
        text-transform: uppercase;
    }

    /* Estilo para el encabezado de resultados */
    .container h1:last-of-type {
        font-size: 24px;
        color: #333333;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }

    /* Estilo para el texto de puntaje */
    .container p {
        font-size: 18px;
        color: #555555;
        margin: 10px 0;
        text-align: center;
    }

    /* Texto de éxito */
    .text-success {
        font-size: 20px;
        color: #28a745;
        font-weight: bold;
        text-align: center;
    }

    /* Texto de error */
    .text-danger {
        font-size: 20px;
        color: #dc3545;
        font-weight: bold;
        text-align: center;
    }

    /* Botones generales */
    .container a.btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        margin: 15px 5px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    /* Botón primario */
    .container a.btn-primary {
        background-color: #0578be;
        border: 1px solid #0469a2;
    }

    .container a.btn-primary:hover {
        background-color: #045b90;
        border: 1px solid #034b75;
    }

    /* Margen para los enlaces */
    .container a:not(:first-of-type) {
        margin-left: 10px;
    }

</style>
