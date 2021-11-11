<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\QuizController;

Route::get('/quiz/{id}/enroll',[QuizController::class,'enroll'])->name('quiz.enroll');










?>
