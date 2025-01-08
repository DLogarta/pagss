<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login/auth', [LoginController::class, 'attempt_auth']);
    Route::get('forgot-password', function () {
        return view('authentication/forgot-password');
    });
});

Route::post('change-password', [LoginController::class, 'change_password']);
Route::get('logout', [LoginController::class, 'logout']);
