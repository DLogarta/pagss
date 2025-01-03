<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function(){
    return view('authentication/login');
});

Route::get('forgot-password', function(){
    return view('authentication/forgot-password');
});