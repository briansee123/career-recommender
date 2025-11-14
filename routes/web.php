<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

    // === AUTH PAGES ===
    Route::get('/login', function () {
        return view('user.login');
    })->name('login');

    Route::get('/signup', function () {
        return view('user.signup');
    })->name('signup');

    // === AUTH POST ROUTES (real backend) ===
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // === USER PAGES ===
    Route::get('/home', function () {
        return view('user.homepage');
    })->name('home');

    Route::get('/profile', function () {
        return view('user.profile');
    })->name('profile.show');

    Route::get('/test', function () {
        return view('user.test');
    })->name('test.show');

    Route::get('/jobs', function () {
        return view('user.jobs');
    })->name('jobs.list');

    Route::get('/apply/{id}', function () {
        return view('user.apply');
    })->name('job.apply');

    Route::get('/resume', function () {
        return view('user.buildresume');
    })->name('resume.builder');


    // ============================
    // TEMPORARY PLACEHOLDER ROUTES
    // ============================

    Route::get('/job/{id}', function ($id) {
        return "Temporary Job Details - ID: $id";
    })->name('job.show');

    Route::post('/apply/{id}', function ($id) {
        return "Temporary submit for job ID $id";
    })->name('job.submitApplication');

    Route::post('/resume', function () {
        return "Temporary resume stored.";
    })->name('resume.store');
});


// =====================
// ADMIN ROUTES
// =====================
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/jobs', function () {
        return view('admin.jobs');
    })->name('admin.jobs');

    Route::get('/tests', function () {
        return view('admin.tests');
    })->name('admin.tests');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');
});
