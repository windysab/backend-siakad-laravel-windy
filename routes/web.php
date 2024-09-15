<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; // Tambahkan ini jika menggunakan LoginController

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

// Tambahkan rute login untuk metode GET dan POST
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.app.dashboard-siakad', ['type_menu' => '']);
    })->name('home');
    Route::resource('user', UserController::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Tambahkan rute logout di sini
});

// resource route for subject with middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('subject', SubjectController::class);
});
