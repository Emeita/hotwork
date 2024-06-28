<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Logout Route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Dashboard Route - Only accessible to authenticated users
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Profile Route - Only accessible to authenticated users
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');

// Catch-all route to handle 404 errors for undefined routes
Route::fallback(function () {
    return view('errors.404');
});
