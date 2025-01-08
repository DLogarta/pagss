<?php

namespace App\Http\Controllers;
use App\Helpers\Logger;
use App\Models\Roles;
use App\Models\Users;
use App\Models\Permissions;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreatedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function add_user(Request $request){
        try {
            $validatedData = $request->validate([
                'id_number' => 'required|string|max:11',
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:50',
                'email' => 'required|string|max:255',
                'roles' => 'required|array',
            ]);
    
            $user = new Users;
            $user->id_number = $validatedData['id_number'];
            $user->name = $validatedData['name'];
            $user->pfp = "pagss_default_user.jpg";
            $user->position = $validatedData['position'];
            $user->email = $validatedData['email'];
            $password = Str::random(12);
            $hashedPassword = Hash::make($password);
            $user->password = $hashedPassword;
    
            $user->save();
    
            $user->roles()->attach($validatedData['roles']);

            Mail::to($validatedData['email'])->send(new UserCreatedMail($user, $password));
    
            return redirect('/user-management')->with('add-success', 'User information added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function update_user(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:user_admin.users,id',
                'id_number' => 'required|string|max:11',
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:50',
                'email' => 'required|string|max:255',
                'roles' => 'required|array',
            ]);
    
            $user = Users::find($validatedData['id']);
    
            $user->id_number = $validatedData['id_number'];
            $user->name = $validatedData['name'];
            $user->position = $validatedData['position'];
            $user->email = $validatedData['email'];
    
            $user->save();
    
            $user->roles()->detach();
    
            $user->roles()->attach($validatedData['roles']);
    
            return redirect('/user-management')->with('update-success', 'User information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function delete_user(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $status = Users::find($id)->delete();

        if($status) {
            return redirect('/user-management')->with('delete-success', 'User deleted successfully.');
        } else {
            // Redirect using URI with an error message
            return redirect('/user-management')->with('delete-error', 'Failed to delete the user.');
        }
    }

    public function add_role(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:535',
                'color' => 'required|string|max:11',
                'permissions' => 'required|array',
            ]);
    
            $role = new Roles;
            $role->name = $validatedData['name'];
            $role->description = $validatedData['description'];
            $role->color = $validatedData['color'];
    
            $role->save();
    
            $role->permissions()->attach($validatedData['permissions']);

            Logger::logAction('Added Role', 'Added ' . $validatedData['name'] . ' role with description: ' . $validatedData['description']);
    
            return redirect('/role-management')->with('add-success', 'Role added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function update_role(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:user_admin.roles,id',
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:535',
                'edit-color' => 'required|string|max:11',
                'permissions' => 'required|array',
            ]);
    
            $role = Roles::find($validatedData['id']);
    
            $role->name = $validatedData['name'];
            $role->description = $validatedData['description'];
            $role->color = $validatedData['edit-color'];
    
            $role->save();
    
            $role->permissions()->detach();
    
            $role->permissions()->attach($validatedData['permissions']);
    
            return redirect('/role-management')->with('update-success', 'Role updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function delete_role(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $status = Roles::find($id)->delete();

        if($status) {
            return redirect('/role-management')->with('delete-success', 'Role deleted successfully.');
        } else {
            // Redirect using URI with an error message
            return redirect('/role-management')->with('delete-error', 'Failed to delete the role.');
        }
    }

    public function add_permission(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:535',
                'permissions' => 'required|array',
            ]);
    
            $permission = new Permissions;
            $permission->name = $validatedData['name'];
            $permission->description = $validatedData['description'];
            $permission->pages = json_encode($validatedData['permissions']);
    
            $permission->save();
    
            return redirect('/permission-management')->with('add-success', 'Permission added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function update_permission(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:user_admin.permissions,id',
                'name' => 'required|string|max:50',
                'description' => 'required|string|max:535',
                'permissions' => 'required|array',
            ]);
    
            $permission = Permissions::find($validatedData['id']);
    
            $permission->name = $validatedData['name'];
            $permission->description = $validatedData['description'];
            $permission->pages = json_encode($validatedData['permissions']);
    
            $permission->save();
    
            return redirect('/permission-management')->with('update-success', 'Permission updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function delete_permission(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->input('id');

        $status = Permissions::find($id)->delete();

        if($status) {
            return redirect('/permission-management')->with('delete-success', 'Permission deleted successfully.');
        } else {
            // Redirect using URI with an error message
            return redirect('/permission-management')->with('delete-error', 'Failed to delete the permission.');
        }
    }
}
