<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Users;

class CheckPageAccess
{
    public function handle(Request $request, Closure $next, $page)
    {
        $currentUser = session('user');

        if ($currentUser && $currentUser->pages) {
            $cleanedPages = str_replace(['[', ']', '"'], '', $currentUser->pages);
            $allowedPages = explode(',', $cleanedPages);

            // Refresh permissions if they have changed
            $user = auth()->user();
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

            if (session('user') != $current) {
                session()->put('user', $current); // Update the session with fresh permissions
                $cleanedPages = str_replace(['[', ']', '"'], '', $currentUser->pages);
                $allowedPages = explode(',', $cleanedPages);
            }

            
            if (in_array($page, $allowedPages)) {
                return $next($request);
            }
        }

        return redirect('/unauthorized')->with('error', 'You do not have access to this page.');
    }
}

