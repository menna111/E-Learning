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
    Route::get('/delete/{id}',[QuizController::class,'deleteQuiz'])->name('quiz.delete');
    Route::post('/publish',[QuizController::class,'publish'])->name('quiz.publish');


    Route::get('/{id}/questions',[QuestionController::class,'index'])->name('question.index');
    Route::get('{id}/question/create',[QuestionController::class,'create'])->name('question.create');
    Route::post('{id}/question/store',[QuestionController::class,'store'])->name('question.store');
    Route::get('/question/edit/{id}',[QuestionController::class,'edit'])->name('question.edit');
    Route::post('/question/update/{id}',[QuestionController::class,'update'])->name('question.update');
    Route::get('/question/delete/{id}',[QuestionController::class,'deleteQuestion'])->name('question.delete');

    Route::get('/{id}/result',[QuizController::class,'result'])->name('quiz.result');
    Route::get('/{id}/result/download',[QuizController::class,'download'])->name('quiz.result.download');




});

