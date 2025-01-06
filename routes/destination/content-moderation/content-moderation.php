<?php

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Organization;
use App\Models\Clients;

Route::middleware(['auth'])->group(function(){
    Route::get('c-about-us', function() {
        return view('moderator/about-us');
    })->middleware('checkPage:c-about-us');
    
    Route::get('c-people', function(){
        return view('moderator/people');
    })->middleware('checkPage:c-people');
    
    Route::get('c-people/data', function(){
        $people = Organization::whereIn('category', ['executive', 'manager'])
                    ->orderBy('category')
                    ->get();
        return Datatables::of($people)->make(true);
    })->middleware('checkPage:c-people');
    
    Route::get('c-clients', function() {
        return view('moderator/clients');
    })->middleware('checkPage:c-clients');
    
    Route::get('c-clients/data', function () {
        $clients = Clients::query(); // Select only required columns
        return Datatables::of($clients)->make(true);
    })->middleware('checkPage:c-clients');
});

