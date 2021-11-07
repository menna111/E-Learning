<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\QuestionController;

//Route::get('/test',[TestController::class,'index']);


Route::prefix('quiz')->group(function (){
    Route::get('/index',[QuizController::class,'index'])->name('quiz.index');
    Route::get('/create',[QuizController::class,'create'])->name('quiz.create');
    Route::post('/choose-subject/{id}',[QuizController::class,'chooseSubject'])->name('quiz.choose.subject');
    Route::post('/store',[QuizController::class,'store'])->name('quiz.store');
    Route::get('/edit/{id}',[QuizController::class,'edit'])->name('quiz.edit');
    Route::post('/update/{id}',[QuizController::class,'update'])->name('quiz.update');

    Route::get('/{id}/questions',[QuestionController::class,'index'])->name('question.index');
    Route::get('{id}/question/create',[QuestionController::class,'create'])->name('question.create');
    Route::post('{id}/question/store',[QuestionController::class,'store'])->name('question.store');


});

