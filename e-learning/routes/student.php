<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\QuizController;

Route::get('/quiz/{id}/enroll',[QuizController::class,'enroll'])->name('quiz.enroll');
Route::post('/quiz/{id}/submit',[QuizController::class,'submit'])->name('student.quiz.submit');
Route::get('/quiz/{id}/show',[QuizController::class,'show'])->name('quiz.show');









?>
