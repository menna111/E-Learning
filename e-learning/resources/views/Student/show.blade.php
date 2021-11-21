@extends('layouts.app')

@section('meta_title', env('APP_NAME') . ' | الكويزات')
@section('css')

@endsection
@section('content')


    <!-- ==================================================
                        Start Content
    ================================================== -->
    <div class="container">
        <div class="row w-lg-75 mx-auto">

                <div class="col-12">
                    <div class="quiz-title">
                        <p class="title mb-3">{{ $quiz->title }}</p>
                    </div>
                </div>
                {{-- <form class="w-100" action="{{ route('student.quizzes.submit', $quiz->id) }}" method="POST"> --}}
                <form class="w-100" >
                    @csrf
                    @foreach($questions as $index => $question)
                        <input type="hidden" readonly value="{{ $quiz->id }}" name="quiz_id">
                        <input type="hidden" readonly value="{{ $questions->count() }}" name="num_of_questions">
                        <div class="col-12">
                            <div class="quiz-question p-2">
                                <p class="question text-center">{{ $question->content }}</p>
                                @if($question->image != NULL)
                                    <a href="{{ render_image($question->image) }}" target="_blank">
                                        <img class="mx-xl-5 mx-auto ml-lg-auto" src="{{ render_image($question->image) }}" alt="{{ $question->body }}" title="{{ $question->body }}">
                                    </a>
                                @endif

                                @foreach($question->answers()->get()->shuffle() as $answer)
                                    <label class="answer">
                                        {{ $answer->content }}
                                        <input type="radio"
                                               @if($answer->is_correct == 1) checked @endif
                                               name="answer[{{$question->id}}]" value="{{ $answer->id }}" required>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </form>

        </div>
    </div>
    <!-- ==================================================
                        End Content
    ================================================== -->
@endsection


