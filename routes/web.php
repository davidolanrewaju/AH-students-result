<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student/loggedin', [StudentController::class, 'checkLogin'])->name('student.checkLogin');
Route::post('/student', [StudentController::class, 'checkSignup'])->name('student.checkSignup');
Route::get('/student/signup', [StudentController::class, 'signup'])->name('student.signup');
Route::get('/student/dashboard/{student}', [StudentController::class, 'show'])->name('student.show');

Route::get('/student/login', [StudentController::class, 'login'])->name('student.login');

// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);
