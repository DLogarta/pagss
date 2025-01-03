<?php

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Roles;
use App\Models\Permissions;

Route::get('user-management', function(){
    return view('admin/user-management');
});

Route::get('user-activity-reports', function(){
    return view('admin/logs');
});

Route::get('role-management', function(){
    $permissions = Permissions::all();
    
    return view('admin.roles', compact('permissions'));
});

Route::get('role-management/data', function(){
    $roles = Roles::with('permissions')->get();
    // return Datatables::of($roles)->make(true);
    return Datatables::of($roles)
    ->addColumn('permissions', function ($role) {
        return $role->permissions->pluck('id')->implode(', ');
    })
    ->make(true);
});

Route::get('permission-management', function(){
    return view('admin/permissions');
});

Route::get('permission-management/data', function(){
    $permissions = Permissions::all()->map(function ($permission) {
        $permission->pages = implode(', ', json_decode($permission->pages, true));
        return $permission;
    });
    return Datatables::of($permissions)->make(true);
});