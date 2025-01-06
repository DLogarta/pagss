<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard');
    });
});
