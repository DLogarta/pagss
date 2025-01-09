<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Users extends Model
{
    use HasFactory, Notifiable;

    protected $connection = 'user_admin';

    protected $table = 'users';

    protected $fillable = ['id_number', 'name', 'pfp', 'position', 'email', 'password'];

    protected $hidden = ['password'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'user_roles', 'user_id', 'role_id');
    }

    public function user_roles()
    {
        return $this->hasMany(UserRoles::class, 'user_id');
    }

    // Relationship to permissions via roles
    public function permissions()
    {
        return $this->roles->flatMap->permissions->pluck('pages')->flatten();
    }

    // Check if user has permission to access the page
    public function hasPermissionTo($page)
    {
        return $this->permissions->contains($page);
    }
}
