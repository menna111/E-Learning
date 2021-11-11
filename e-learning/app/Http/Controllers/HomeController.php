<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user=Auth::user();
        if ($user->role=='teacher'){
            $teacher=$user->teacher;
            return redirect()->route('quiz.index');
        }else{
            $student=$user->student;
            $quizzes=Quiz::where('level_id',$student->level_id)
                -> where('published',1)
                -> where('expire_at','>',Carbon::now()->toDateTimeString())
                ->latest()
                ->paginate(1);

//            dd($quizzes);
            return view('student.home',compact('user','student','quizzes'));
        }

    }
}
