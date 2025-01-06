<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

Route::middleware(['auth'])->group(function(){
    Route::post('c-people/delete', [ContentController::class, 'delete_people'])->middleware('checkPage:c-people');

    Route::post('c-people/update', [ContentController::class, 'update_people'])->middleware('checkPage:c-people');

    Route::post('c-people/add', [ContentController::class, 'add_people'])->middleware('checkPage:c-people');

    Route::post('c-clients/delete', [ContentController::class, 'delete_client'])->middleware('checkPage:c-clients');

    Route::post('c-clients/update', [ContentController::class, 'update_client'])->middleware('checkPage:c-clients');

    Route::post('c-clients/add', [ContentController::class, 'add_client'])->middleware('checkPage:c-clients');
});

