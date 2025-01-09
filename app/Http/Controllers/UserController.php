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
    public function add_user(Request $request)
    {
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

            $logDetails = "User created. ID Number: '{$user->id_number}', Name: " . ucwords($user->name);
            Logger::logAction('User Creation', $logDetails);

            Mail::to($validatedData['email'])->send(new UserCreatedMail($user, $password));

            return redirect('/user-management')->with('add-success', 'User information added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occurred. Error: " . $e->getMessage());
        }
    }


    public function update_user(Request $request)
    {
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

            $old_name = ucwords($user->name);

            $changes = [];

            if ($user->id_number !== $validatedData['id_number']) {
                $changes[] = "ID Number from " . strtoupper($user->id_number) . " to " . strtoupper($validatedData['id_number']);
                $user->id_number = $validatedData['id_number'];
            }

            if ($user->name !== $validatedData['name']) {
                $changes[] = "Name from " . ucwords($user->name) . " to " . ucwords($validatedData['name']);
                $user->name = $validatedData['name'];
            }

            if ($user->position !== $validatedData['position']) {
                $changes[] = "Position from " . ucwords($user->position) . " to " . ucwords($validatedData['position']);
                $user->position = $validatedData['position'];
            }

            if ($user->email !== $validatedData['email']) {
                $changes[] = "Email from " . ucwords($user->email) . " to " . ucwords($validatedData['email']);
                $user->email = $validatedData['email'];
            }

            if ($user->roles()->pluck('role_id')->toArray() !== $validatedData['roles']) {
                $oldRoles = $user->roles()->pluck('name')->toArray();
                $newRoles = Roles::whereIn('id', $validatedData['roles'])->pluck('name')->toArray();
                $changes[] = "Roles changed from " . implode(', ', $oldRoles) . " to " . implode(', ', $newRoles);

                $user->roles()->detach();
                $user->roles()->attach($validatedData['roles']);
            }

            if (count($changes) > 0) {
                $user->save();

                $logDetails = "User updated (Name: $old_name): " . implode(', ', $changes);
                Logger::logAction('User Update', $logDetails);
            }

            return redirect('/user-management')->with('update-success', 'User information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('update-failed', "An error occurred. Error: " . $e->getMessage());
        }
    }



    public function delete_user(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
            ]);

            $id = $request->input('id');

            $user = Users::find($id);

            if (!$user) {
                return redirect('/user-management')->with('delete-error', 'User not found.');
            }

            Logger::logAction('User Deletion', "User: " . ucwords($user->name) . " ID No.: " . strtoupper($user->id_number) . " deleted.");

            $status = $user->delete();

            if ($status) {
                return redirect('/user-management')->with('delete-success', 'User deleted successfully.');
            } else {
                return redirect('/user-management')->with('delete-error', 'Failed to delete the user.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('delete-error', "An error occurred. Error: " . $e->getMessage());
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

            $logDetails = "Role created. Name: " . ucwords($validatedData['name']) . ", Description: " . ucwords($validatedData['description']);
            Logger::logAction('Added Role', $logDetails);

            return redirect('/role-management')->with('add-success', 'Role added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('add-failed', "An error occurred. Error: " . $e->getMessage());
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

            $old_name = ucwords($role->name);

            $changes = [];

            if ($role->name !== $validatedData['name']) {
               $changes[] = "Name from " . ucwords($role->name) . " to " . ucwords($validatedData['name']);
               $role->name = $validatedData['name'];
            }

            if ($role->description !== $validatedData['description']) {
                $changes[] = "Description from " . ucwords($role->description) . " to " . ucwords($validatedData['description']);
                $role->description = $validatedData['description'];
            }

            if ($role->permissions()->pluck('permission_id')->toArray() !== $validatedData['permissions']) {
                $oldPermissions = $role->permissions()->pluck('name')->toArray();
                $newPermissions = Permissions::whereIn('id', $validatedData['permissions'])->pluck('name')->toArray();
                $changes[] = "Permissions changed from " . implode(', ', $oldPermissions) . " to " . implode(', ', $newPermissions);

                $role->permissions()->detach();
                $role->permissions()->attach($validatedData['permissions']);
            }

            $role->color = $validatedData['edit-color'];

            $role->save();

            if (count($changes) > 0) {
                $logDetails = "Role updated (Name: $old_name): " . implode(', ', $changes);
                Logger::logAction('Updated Role', $logDetails);
            }

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

        $role = Roles::find($id);

        if (!$role) {
            return redirect('/role-management')->with('delete-error', 'Role not found.');
        }

        Logger::logAction('Role Deletion', "Role: " . ucwords($role->name) . " Description: " . ucwords($role->description) . " deleted.");

        $status = $role->delete();

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

            $logDetails = "Permission created. Name: " . ucwords($permission->name) . ", Description: " . ucwords($permission->description);
            Logger::logAction('Permission Creation', $logDetails);

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

            $old_name = ucwords($permission->name);

            $changes = [];

            if ($permission->name !== $validatedData['name']) {
                $changes[] = "Name from " . ucwords($permission->name) . " to " . ucwords($validatedData['name']);
                $permission->name = $validatedData['name'];
            }

            if ($permission->description !== $validatedData['description']) {
                $changes[] = "Description from " . ucwords($permission->description) . " to " . ucwords($validatedData['description']);
                $permission->description = $validatedData['description'];
            }

            if ($permission->pages !== json_encode($validatedData['permissions'])) {
                $oldPermissions = json_decode($permission->pages);
                $oldPermissions = implode(",", $oldPermissions);
                $newPermissions = implode(",", $validatedData['permissions']);
                $changes[] = "Pages changed from " . $oldPermissions . " to " . $newPermissions;

                $permission->pages = json_encode($validatedData['permissions']);
            }

            if (count($changes) > 0) {
                $permission->save();

                $logDetails = "Permission updated (Name: $old_name): " . implode(', ', $changes);
                Logger::logAction('Updated Permission', $logDetails);
            }

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

        $permission = Permissions::find($id);

        if (!$permission) {
            return redirect('/permission-management')->with('delete-error', 'Permission not found.');
        }

        Logger::logAction('Permission Deletion', "Permission: " . ucwords($permission->name) . ", Description: " . ucwords($permission->description));

        $status = $permission->delete();

        if($status) {
            return redirect('/permission-management')->with('delete-success', 'Permission deleted successfully.');
        } else {
            // Redirect using URI with an error message
            return redirect('/permission-management')->with('delete-error', 'Failed to delete the permission.');
        }
    }
}
