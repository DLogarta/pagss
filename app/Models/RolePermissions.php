<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RolePermissions extends Model
{
    use HasFactory, Notifiable;

    protected $connection = 'user_admin';

    protected $table = 'role_permissions';
    protected $fillable = ['role_id', 'permission_id'];
}
