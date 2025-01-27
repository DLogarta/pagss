<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserRoles extends Model
{
    use HasFactory, Notifiable;

    protected $connection = 'user_admin';

    protected $table = 'user_roles';

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
