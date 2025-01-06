<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function(){
    Route::post('user-management/add', [UserController::class, 'add_user'])->middleware('checkPage:user-management');

    Route::post('user-management/update', [UserController::class, 'update_user'])->middleware('checkPage:user-management');
    
    Route::post('role-management/add', [UserController::class, 'add_role'])->middleware('checkPage:role-management');
    
    Route::post('role-management/update', [UserController::class, 'update_role'])->middleware('checkPage:role-management');
    
    Route::post('role-management/delete', [UserController::class, 'delete_role'])->middleware('checkPage:role-management');
    
    Route::post('permission-management/add', [UserController::class, 'add_permission'])->middleware('checkPage:permission-management');
    
    Route::post('permission-management/update', [UserController::class, 'update_permission'])->middleware('checkPage:permission-management');
    
    Route::post('permission-management/delete', [UserController::class, 'delete_permission'])->middleware('checkPage:permission-management');
});

