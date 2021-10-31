<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\TestController;
use App\Http\Controllers\Teacher\QuizController;

//Route::get('/test',[TestController::class,'index']);


Route::prefix('quiz')->group(function (){
    Route::get('/index',[QuizController::class,'index'])->name('quiz.index');
    Route::get('/create',[QuizController::class,'create'])->name('quiz.create');
});
