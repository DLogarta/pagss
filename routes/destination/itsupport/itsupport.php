<?php

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Helpdesk;

Route::middleware(['auth'])->group(function () {
    Route::get('it-helpdesk', function(){
        return view('itsupport/helpdesk');
    })->middleware('checkPage:it-helpdesk');

    Route::get('it-helpdesk/data', function(){
       $tickets = Helpdesk::query();
       return Datatables::of($tickets)->make(true);
    })->middleware('checkPage:it-helpdesk');
});
