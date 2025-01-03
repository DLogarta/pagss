<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('role-management/add', [UserController::class, 'add_role']);

Route::post('role-management/update', [UserController::class, 'update_role']);

Route::post('role-management/delete', [UserController::class, 'delete_role']);

Route::post('permission-management/add', [UserController::class, 'add_permission']);

Route::post('permission-management/update', [UserController::class, 'update_permission']);

Route::post('permission-management/delete', [UserController::class, 'delete_permission']);