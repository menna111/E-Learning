<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function enroll($id){
        $quiz=Quiz::findOrFail($id);

        $end_time=Carbon::now()->addMinutes($quiz->duration);
        $quiz_expire_at=$quiz->expire_at;
        if ($end_time->gt($quiz_expire_at)){

            $end_at=$quiz_expire_at;

        }else{
            $end_at=$end_time->toDateTimeString();
        }
        QuizStudent::create([
            'student_id' => Auth::user()->student->id,
            'quiz_id'    => $id,
            'end_at'     =>$end_at
        ]);
        dd('mmmm');

    }
}
