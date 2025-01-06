<?php

use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Roles;
use App\Models\Permissions;
use App\Models\Users;

Route::middleware(['auth'])->group(function(){
    Route::get('user-management', function() {
        $roles = Roles::all();
    
        return view('admin/user-management', compact('roles'));
    })->middleware('checkPage:user-management');
    
    Route::get('user-management/data', function () {
        $users = Users::with('roles')->get();
        return Datatables::of($users)
        ->addColumn('roles_id', function ($user) {
            return $user->roles->pluck('id')->implode(', ');
        })
        ->addColumn('roles', function($user){
            return $user->roles->map(function ($role) {
                return ['name' => $role->name, 'color' => $role->color];
            })->toArray();
        })
        ->make(true);
    })->middleware('checkPage:user-management');
    
    Route::get('user-activity-reports', function(){
        return view('admin/logs');
    })->middleware('checkPage:user-activity-reports');
    
    Route::get('role-management', function(){
        $permissions = Permissions::all();
        
        return view('admin.roles', compact('permissions'));
    })->middleware('checkPage:role-management');
    
    Route::get('role-management/data', function(){
        $roles = Roles::with('permissions')->get();
        // return Datatables::of($roles)->make(true);
        return Datatables::of($roles)
        ->addColumn('permissions', function ($role) {
            return $role->permissions->pluck('id')->implode(', ');
        })
        ->make(true);
    })->middleware('checkPage:role-management');
    
    Route::get('permission-management', function(){
        return view('admin/permissions');
    })->middleware('checkPage:permission-management');
    
    Route::get('permission-management/data', function(){
        $permissions = Permissions::all()->map(function ($permission) {
            $permission->pages = implode(', ', json_decode($permission->pages, true));
            return $permission;
        });
        return Datatables::of($permissions)->make(true);
    })->middleware('checkPage:permission-management');
});

