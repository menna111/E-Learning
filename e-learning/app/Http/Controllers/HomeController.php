<?php

namespace App\Http\Controllers;

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
            return view('student.home',compact('user','student'));
        }

    }
}
