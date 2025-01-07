<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('authentication/login');
    }

    public function attempt_auth(Request $request){
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
        
            // Attempt to log the user in
            if (Auth::attempt($validatedData)) {
                $user = Auth::user();
                $current = Users::join('user_roles', 'users.id', '=', 'user_roles.user_id')
                    ->join('role_permissions', 'user_roles.role_id', '=', 'role_permissions.role_id')
                    ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
                    ->where('users.id', $user->id)
                    ->selectRaw('
                        users.id, 
                        users.id_number, 
                        users.name, 
                        users.pfp, 
                        users.position,
                        users.first_login,
                        users.email,
                        GROUP_CONCAT(permissions.pages) AS pages
                    ')
                    ->groupBy('users.id', 'users.id_number', 'users.name', 'users.pfp', 'users.position', 'users.first_login', 'users.email')
                    ->first();
                    
                session()->put('user', $current);
                return redirect('/dashboard')->with('login-sucess', 'Logged in successfuly.');
            } else {
                return redirect()->back()->with('login-failed', 'Login failed. Check username or password.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function change_password(Request $request){
        try {
            // Validate the input
            $validatedData = $request->validate([
                'id' => 'required|exists:user_admin.users,id',  // Ensure the user exists in the database
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'repeat_password' => 'required' // New password confirmation and length validation
            ]);

            // Find the user by ID
            $user = Users::find($validatedData['id']);

            if($request->new_password != $request->repeat_password){
                return redirect()->back()->with('repeat_password', 'Password did not match.');
            }

            // Check if the user exists
            if (!$user) {
                return redirect()->back()->with('id', 'User does not exist.');
            }

            // Check if the current password is correct
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('current_password', 'Current password is incorrect.');
            }

            // Update the user's password
            $user->password = Hash::make($request->new_password);
            $user->first_login = 0;
            $user->save();

            // Redirect with a success message
            return redirect()->back()->with('success', 'Password changed successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "An error occured. Error: " . $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout(); // Logs out the user
        return redirect('/login')->with('logged-out', 'You have been logged out.');
    }
}
