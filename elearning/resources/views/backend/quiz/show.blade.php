@foreach ($quizzes as $quiz)
    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="quiz-container">
        @csrf
        <h2>{{ $course }}</h2>
        <h1>{{ $quiz->title }}</h1>

        @foreach ($quiz->question as $question)
            <div class="question-container">
                <h4>{{ $question->content }}</h4>
                @foreach ($question->option as $option)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                        {{ $option->option_text }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">{{ __('Submit Answers') }}</button>
    </form>
@endforeach


<style>
    /* Contenedor general */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    /* Contenedor del formulario */
    .quiz-container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Título del curso */
    .quiz-container h2 {
        font-size: 26px;
        color: #0578be;
        text-align: center;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    /* Título del quiz */
    .quiz-container h1 {
        font-size: 22px;
        color: #333333;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Contenedor de cada pregunta */
    .question-container {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Título de la pregunta */
    .question-container h4 {
        font-size: 18px;
        color: #555555;
        margin-bottom: 10px;
    }

    /* Opciones */
    .question-container label {
        display: block;
        font-size: 16px;
        color: #333333;
        margin-bottom: 5px;
        cursor: pointer;
    }

    .question-container input[type="radio"] {
        margin-right: 10px;
    }

    /* Botón de enviar */
    .quiz-container .btn {
        display: block;
        width: 100%;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        color: #ffffff;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    .quiz-container .btn:hover {
        background-color: #218838;
    }

</style>
