<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

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
                    ->select('users.id', 'users.id_number', 'users.name', 'users.pfp', 'users.position', 'users.email', 'permissions.pages')
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

    public function logout()
    {
        Auth::logout(); // Logs out the user
        return redirect('/login')->with('logged-out', 'You have been logged out.');
    }
}
