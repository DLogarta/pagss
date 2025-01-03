<?php

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Organization;
use App\Models\Clients;
use App\Http\Controllers\ContentController;

// Landing Routes
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


// Authentication Routes
Route::get('login', function(){
    return view('authentication/login');
});

Route::get('forgot-password', function(){
    return view('authentication/forgot-password');
});


// Dashboard Route
Route::get('dashboard', function(){
    return view('dashboard');
});


// Admin Panel Route
Route::get('user-management', function(){
    return view('admin/user-management');
});

Route::get('user-activity-reports', function(){
    return view('admin/logs');
});

//Content Moderation Route
Route::get('c-about-us', function() {
    return view('moderator/about-us');
});

Route::get('c-people', function(){
    return view('moderator/people');
});

Route::get('c-people/data', function(){
    $people = Organization::whereIn('category', ['executive', 'manager'])
                ->orderBy('category')
                ->get();
    return Datatables::of($people)->make(true);
});

Route::get('c-clients', function() {
    return view('moderator/clients');
});

Route::get('c-clients/data', function () {
    $clients = Clients::query(); // Select only required columns
    return Datatables::of($clients)->make(true);
});

//Content Moderation Functions
Route::post('c-people/delete', [ContentController::class, 'delete_people']);

Route::post('c-people/update', [ContentController::class, 'update_people']);

Route::post('c-people/add', [ContentController::class, 'add_people']);

Route::post('c-clients/delete', [ContentController::class, 'delete_client']);

Route::post('c-clients/update', [ContentController::class, 'update_client']);

Route::post('c-clients/add', [ContentController::class, 'add_client']);