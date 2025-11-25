<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TestQuestionController;
use App\Http\Controllers\UserTestController;

// =====================
//  PUBLIC DEFAULT ROUTE
// =====================

Route::get('/', function () {
    return redirect('/user/login');
});

// =====================
// USER ROUTES
// =====================
Route::prefix('user')->group(function () {

    // AUTH PAGES
    Route::get('/login', function () {
        return view('user.login');
    })->name('login');

    Route::get('/signup', function () {
        return view('user.signup');
    })->name('signup');

    // AUTH BACKEND
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // USER PAGES
    Route::get('/home', fn() => view('user.homepage'))->name('home');
    Route::get('/profile', fn() => view('user.profile'))->name('profile.show');
    Route::get('/test', fn() => view('user.test'))->name('test.show');
    Route::get('/jobs', fn() => view('user.jobs'))->name('jobs.list');
    Route::get('/apply/{id}', fn() => view('user.apply'))->name('job.apply');
    Route::get('/resume', fn() => view('user.buildresume'))->name('resume.builder');

    // TEMPORARY PLACEHOLDERS
    Route::get('/job/{id}', fn($id) => "Temporary Job Details - ID: $id")->name('job.show');
    Route::post('/resume', fn() => "Temporary resume stored.")->name('resume.store');

Route::get('/test/start', [UserTestController::class, 'start'])->name('user.test.start');
Route::post('/test/answer', [UserTestController::class, 'answer'])->name('user.test.answer');
Route::get('/test/result', [UserTestController::class, 'result'])->name('user.test.result');


});

// =====================
// ADMIN ROUTES
// =====================
Route::prefix('admin')->group(function () {

    // STATIC PAGES
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/users', fn() => view('admin.users'))->name('admin.users');
    Route::get('/profile', fn() => view('admin.profile'))->name('admin.profile');

    // =====================
    // JOB CRUD
    // =====================
    Route::get('/jobs', [JobController::class, 'index'])->name('admin.jobs');

    Route::get('/jobs/create', [JobController::class, 'create'])->name('admin.job.create');
    Route::post('/jobs/store', [JobController::class, 'store'])->name('admin.job.store');

    Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('admin.job.edit');
    Route::post('/jobs/update/{id}', [JobController::class, 'update'])->name('admin.job.update');

    Route::delete('/jobs/delete/{id}', [JobController::class, 'destroy'])->name('admin.job.delete');

    // =====================
    // TEST QUESTIONS CRUD
    // =====================
    Route::get('/tests', [TestQuestionController::class, 'index'])->name('admin.tests');

    Route::get('/tests/create', [TestQuestionController::class, 'create'])->name('admin.test.create');
    Route::post('/tests/store', [TestQuestionController::class, 'store'])->name('admin.test.store');

    Route::get('/tests/edit/{id}', [TestQuestionController::class, 'edit'])->name('admin.test.edit');
    Route::post('/tests/update/{id}', [TestQuestionController::class, 'update'])->name('admin.test.update');

    Route::delete('/tests/delete/{id}', [TestQuestionController::class, 'destroy'])->name('admin.test.delete');

    Route::get('/debug-key', function () {
    dd(env('GEMINI_API_KEY'));
});

});
