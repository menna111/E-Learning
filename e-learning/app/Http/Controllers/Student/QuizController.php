<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\QuizStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function enroll($id){
        $user=Auth::user();
        $student_id=$user->student->id;

        $quiz=Quiz::findOrFail($id);
        if ($quiz->published== 0){
            abort(404);
        }

        $questions=$quiz->questions;
        $enroll=null;
        $is_available=true;

        $end_time=Carbon::now()->addMinutes($quiz->duration);
        $quiz_expire_at=$quiz->expire_at;

        if ($end_time->gt($quiz_expire_at)){

            $end_at=$quiz_expire_at;

        }else{
            $end_at=$end_time->toDateTimeString();
        }

        $quiz_student=QuizStudent::where('student_id',$student_id)->where('quiz_id',$quiz->id)->first();
//        dd($quiz_student, $student_id, $quiz->id);
        if($quiz_student == null ) {
            $quiz_student=QuizStudent::create([
                'student_id' => Auth::user()->student->id,
                'quiz_id' => $id,
                'end_at' => $end_at
            ]);
        } else if($quiz_student->finished == 1){
            if ($quiz_student->end_at > $end_at || Carbon::now() > $quiz_student->end_at){
                $is_available=false;
            }

        }
        $end_time=$quiz_student->end_at;
        return view('student.enroll',compact('quiz','end_at','questions','is_available','enroll','end_time'));

    }

    public function submit(Request $request,$id){
        $user=Auth::user();
        $student=$user->student;
        $quiz=Quiz::findOrFail($id);
         $result=0;
        $quiz_student = QuizStudent::where('student_id', $student->id)->where('quiz_id', $quiz->id)->first();

        foreach ($request->answer as $item) {
            $correct_answer = Answer::where('id', $item)->where('is_correct', 1)->first();

            if(!is_null($correct_answer)) {
                $result += $correct_answer->question->full_mark;
            }

        }

        // saving the result
        $quiz_student->result = $result;
        $quiz_student->finished = 1;
        $quiz_student->save();

        // get the full mark of the quiz

        $questions = $quiz->questions()->select('full_mark')->get();
        $full_mark = 0;
        foreach ($questions as $question) {
            $full_mark += $question->full_mark;
        }

        return redirect()->route('home')->with('success', 'تم انهاء الكورس بنجاح. لقد حصلت على ' . $result .' من ' .$full_mark);
    }


    public function show($id){
        $quiz=Quiz::findOrFail($id);
        $questions=$quiz->questions;
        return view('student.show',compact('quiz','questions'));
    }
}
