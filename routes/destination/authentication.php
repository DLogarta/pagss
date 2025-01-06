<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login/auth', [LoginController::class, 'attempt_auth']);

Route::get('logout', [LoginController::class, 'logout']);

Route::get('forgot-password', function(){
    return view('authentication/forgot-password');
});