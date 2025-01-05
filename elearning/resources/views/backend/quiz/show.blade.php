
@foreach ($quizzes as $quiz)
    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
        @csrf
        <h2>{{$course}}</h2>
        <h1>{{ $quiz->title }}</h1>

        @foreach ($quiz->question as $question)
            <div>
                <h4>{{ $question->content }}</h4>
                @foreach ($question->option as $option)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                        {{ $option->option_text }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3 ">{{ __('Submit Answers') }}</button>
    </form>
@endforeach

