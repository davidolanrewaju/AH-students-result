<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->group(function() {
    Route::get('/login', [StudentController::class, 'login'])->name('student.login');
    Route::get('/dashboard', [StudentController::class, 'show'])->name('student.show');
    Route::get('/signup', [StudentController::class, 'signup'])->name('student.signup');
    Route::post('/loggedin', [StudentController::class, 'checkLogin'])->name('student.checkLogin');
    Route::post('/signedup', [StudentController::class, 'checkSignup'])->name('student.checkSignup');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/signup', [AdminController::class, 'signup'])->name('admin.signup');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/loggedin', [AdminController::class, 'checkLogin'])->name('admin.checkLogin');
    Route::post('/signedup', [AdminController::class, 'checkSignup'])->name('admin.checkSignup');
});

// Route::get($uri);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);
