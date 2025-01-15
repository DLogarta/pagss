<?php

use Illuminate\Support\Facades\Route;
use App\Models\Organization;
use App\Models\Clients;
use App\Http\Controllers\HelpdeskController;

Route::get('/', function () {
    return view('landing/index');
});

Route::get('about-us', function () {
    return view('landing/about-us');
});

Route::get('people', function () {
    $people = Organization::whereIn('category', ['executive', 'manager'])
                ->orderBy('category')
                ->get();
    return view('landing/people', compact('people'));
});

Route::get('services', function () {
    return view('landing/services');
});

Route::get('service', function () {
    return view('landing/service');
});

Route::get('awards', function () {
    return view('landing/awards');
});

Route::get('clients', function () {
    $clients = Clients::orderBy('name', 'asc')->get();
    return view('landing/clients', compact('clients'));
});

Route::get('events', function () {
    return view('landing/events');
});

Route::get('careers', function () {
    return view('landing/careers');
});

Route::get('contact', function () {
    return view('landing/contact');
});

Route::get('report', function () {
    return view('landing/report');
});

Route::post('report/add-img', [HelpdeskController::class, 'add_img']);

Route::post('report/remove-img', [HelpdeskController::class, 'remove_img']);

Route::post('report/add', [HelpdeskController::class, 'add_report']);
