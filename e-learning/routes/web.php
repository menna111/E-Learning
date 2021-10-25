<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/student-register', [RegisterController::class, 'studentRegister'])->name('student.register');
Route::middleware('auth')->group(function (){
    Route::post('/update',[ProfileController::class,'updateTeacher'])->name('profile.teacher');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

