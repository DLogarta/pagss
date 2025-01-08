<?php

namespace App\Helpers;

use App\Models\Logs;
use Illuminate\Support\Facades\Auth;

class Logger
{
    public static function logAction($action, $description = null)
    {
        $user = Auth::user(); // Get the authenticated user

        Logs::create([
            'user_id' => $user ? $user->id : null, // Null for guests or unauthenticated actions
            'activity_type' => $action,
            'activity_details' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
        ]);
    }
}
