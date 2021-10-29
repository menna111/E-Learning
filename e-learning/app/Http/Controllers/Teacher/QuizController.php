<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(){
        $user=Auth::user();
        $teacher=$user->teacher;
        $quizzes=Quiz::paginate(10);
        return view('teacher.quiz.index',compact('user','teacher','quizzes'));
    }
}
