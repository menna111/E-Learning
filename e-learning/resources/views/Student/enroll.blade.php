@extends('layouts.app')

@section('meta_title', env('APP_NAME') . ' | الكويزات')
@section('css')
    <style>
        .top-alert {
            position: fixed;
            top: 10px;
            left: 10px;
        }
        .btn-edit {
            font-size: 30px;
            height: auto;
            width: 100px;
        }
        .timer {
            background-color: var(--yellow);
        }
        .timer li {
            border: 1px solid #353b48;
            border-radius: 100%;
            height: 50px;
            width: 50px;
            margin: 0 1em;
            color: #000;
        }
    </style>
@endsection
@section('content')

    @if($is_available === true)
        <div class="top-alert">
            <button class="btn btn-edit submit" type="submit">انهاء</button>
            <div class="mt-2 p-2 timer">
                <p class="text-center" id="remaining_time">الوقت المتبقى:</p>
                <ul class="d-flex align-items-center justify-content-center list-unstyled">
                    <li class="circle seconds d-flex align-items-center justify-content-center"></li>
                    <li class="circle minutes d-flex align-items-center justify-content-center"></li>
                </ul>
            </div>

        </div>
    @endif
    <!-- ==================================================
                        Start Content
    ================================================== -->
    <div class="container">
        <div class="row w-lg-75 mx-auto">
            @if($is_available === false)
                <p class="text-white">نأسف. لقد انتهى الوقت المحدد للكويز 🙂</p>
            @else
                <div class="col-12">
                    <div class="quiz-title">
                        <p class="title mb-3">{{ $quiz->title }}</p>
                    </div>
                </div>
                {{-- <form class="w-100" action="{{ route('student.quizzes.submit', $quiz->id) }}" method="POST"> --}}
                <form class="w-100" action="{{ route('student.quizz.submit', $quiz->id) }}" method="POST">
                    @csrf
                    @foreach($questions as $index => $question)
                        <input type="hidden" readonly value="{{ $quiz->id }}" name="quiz_id">
                        <input type="hidden" readonly value="{{ $questions->count() }}" name="num_of_questions">
                        <div class="col-12">
                            <div class="quiz-question">
                                <p class="question text-center">{{ $question->content }}</p>
                                @if($question->image != NULL)
                                    <a href="{{ render_image($question->image) }}" target="_blank">
                                        <img class="mx-xl-5 mx-auto ml-lg-auto" src="{{ render_image($question->image) }}" alt="{{ $question->body }}" title="{{ $question->body }}">
                                    </a>
                                @endif

                                @foreach($question->answers()->get()->shuffle() as $answer)
                                    <label class="answer">
                                        {{ $answer->content }}
                                        <input type="radio" name="answer_{{$index}}" value="{{ $answer->id }}" required>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <button class="d-none submit-form" type="submit">submit</button>
                </form>
            @endif
        </div>
    </div>
    <!-- ==================================================
                        End Content
    ================================================== -->
@endsection

@section('script')
    <script>

        $('.submit').click(() => {
            $('form').submit();
        })

        // Timer
        var countDownDate = new Date("{{ $ends_time }}").getTime();
        var x = setInterval(function() {

            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;


            // Time calculations for days, hours, minutes and seconds
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            let minutes_place = document.querySelector(".minutes")
            let seconds_place = document.querySelector(".seconds")
            minutes_place.innerHTML = minutes;
            seconds_place.innerHTML = seconds;
            // If the count down is finished, write some text
            if (minutes === 0 && seconds === 0) {
                clearInterval(x);
                $('form').submit()
            }
        }, 1000);
    </script>
@endsection
