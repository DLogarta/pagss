<?php

use App\Http\Controllers\HelpdeskController;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Helpdesk;
use App\Models\Users;

Route::middleware(['auth'])->group(function () {
    Route::get('it-helpdesk', function(){
        return view('itsupport/helpdesk');
    })->middleware('checkPage:it-helpdesk');

    Route::get('it-helpdesk/data', function(){
       $tickets = Helpdesk::with('users');

       return Datatables::of($tickets)
       ->addColumn('responder', function($ticket){
           return $ticket->users ? $ticket->users->name : 'None';
       })
       ->make(true);
    })->middleware('checkPage:it-helpdesk');
});
