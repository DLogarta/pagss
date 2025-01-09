<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Logger;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('authentication/login');
    }

    public function attempt_auth(Request $request) {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

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

                $logDetails = "User login success. Email: '{$validatedData['email']}', ID No.: " . strtoupper($user->id_number) . ", Name: " . ucwords($user->name);
                Logger::logAction('User Login', $logDetails);

                return redirect('/dashboard')->with('login-success', 'Logged in successfully.');
            } else {
                $logDetails = "User login failed. Email: '{$validatedData['email']}'";
                Logger::logAction('User Login', $logDetails);

                return redirect()->back()->with('login-failed', 'Login failed. Check username or password.');
            }
        } catch (\Exception $e) {
            // Log error during login attempt
            $logDetails = "User login error. Email: '{$request->input('email')}', Error: '{$e->getMessage()}'";
            Logger::logAction('User Login', $logDetails);

            return redirect()->back()->with('error', "An error occurred. Error: " . $e->getMessage());
        }
    }


    public function change_password(Request $request) {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:user_admin.users,id',  // Ensure the user exists in the database
                'name' => 'required',
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'repeat_password' => 'required' // New password confirmation and length validation
            ]);

            $user = Users::find($validatedData['id']);

            if ($request->new_password != $request->repeat_password) {
                $logDetails = "User password change failed. Name: ". ucwords($validatedData['name']) . ", Password mismatch";
                Logger::logAction('Password Change Attempt', $logDetails);

                return redirect()->back()->with('repeat_password', 'Password did not match.');
            }

            if (!$user) {
                $logDetails = "User password change failed. Name: ". ucwords($validatedData['name']) . ", User not found";
                Logger::logAction('Password Change Attempt', $logDetails);

                return redirect()->back()->with('id', 'User does not exist.');
            }

            if (!Hash::check($request->current_password, $user->password)) {
                $logDetails = "User password change failed. Name: ". ucwords($validatedData['name']) . ", Incorrect current password";
                Logger::logAction('Password Change Attempt', $logDetails);

                return redirect()->back()->with('current_password', 'Current password is incorrect.');
            }

            $user->password = Hash::make($request->new_password);
            $user->first_login = 0;
            $user->save();

            $logDetails = "User password changed successfully. Name: ". ucwords($validatedData['name']);
            Logger::logAction('Password Change', $logDetails);

            return redirect()->back()->with('success', 'Password changed successfully.');
        } catch (\Exception $e) {
            // Log the error during password change attempt
            $logDetails = "User password change error. Name: ". ucwords($request->name) . ", Error: '{$e->getMessage()}'";
            Logger::logAction('Password Change Error', $logDetails);

            return redirect()->back()->with('error', "An error occurred. Error: " . $e->getMessage());
        }
    }


    public function logout()
    {
        $user = Auth::user();

        Auth::logout();

        if ($user) {
            $logDetails = "User logged out. ID No.: " . strtoupper($user->id_number). ", Name: " . ucwords($user->name);
            Logger::logAction('User Logout', $logDetails);
        }

        return redirect('/login')->with('logged-out', 'You have been logged out.');
    }

}
