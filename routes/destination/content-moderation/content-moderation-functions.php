<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::post('c-people/delete', [ContentController::class, 'delete_people']);

Route::post('c-people/update', [ContentController::class, 'update_people']);

Route::post('c-people/add', [ContentController::class, 'add_people']);

Route::post('c-clients/delete', [ContentController::class, 'delete_client']);

Route::post('c-clients/update', [ContentController::class, 'update_client']);

Route::post('c-clients/add', [ContentController::class, 'add_client']);