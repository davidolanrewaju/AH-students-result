<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentScoreController;

Route::prefix('student')->group(function() {
    Route::get('/login', [StudentController::class, 'login'])->name('student.login');
    Route::get('/dashboard', [StudentController::class, 'show'])->name('student.show');
    Route::get('/signup', [StudentController::class, 'signup'])->name('student.signup');
    Route::post('/loggedin', [StudentController::class, 'checkLogin'])->name('student.checkLogin');
    Route::post('/signedup', [StudentController::class, 'checkSignup'])->name('student.checkSignup');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login'); //Login
    Route::get('/signup', [AdminController::class, 'signup'])->name('admin.signup'); //Signup
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout'); //Logout
    Route::get('/courses', [AdminController::class, 'courses'])->name('admin.courses'); //Courses
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings'); //Settings
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); //Dashboard
    Route::get('/timetable', [AdminController::class, 'timetable'])->name('admin.timetable'); //Timetable
    Route::post('/loggedin', [AdminController::class, 'checkLogin'])->name('admin.checkLogin'); //Check login
    Route::post('/signedup', [AdminController::class, 'checkSignup'])->name('admin.checkSignup'); //Check signup
    Route::get('/upload-results', [AdminController::class, 'uploadResults'])->name('admin.upload'); //Upload
});

Route::post('/import', [StudentScoreController::class, 'import'])->name('import');

// Route::get($uri);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);
