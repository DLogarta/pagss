<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Permissions extends Model
{
    use HasFactory, Notifiable;

    protected $connection = 'user_admin';

    protected $table = 'permissions';

    protected $fillable = ['name', 'description, pages'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_permissions', 'permission_id', 'role_id');
    }
}
