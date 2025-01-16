<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;

Route::middleware(['auth'])->group(function () {
    Route::post('it-helpdesk/update', [HelpdeskController::class, 'update_report'])->middleware('checkPage:it-helpdesk');
});
