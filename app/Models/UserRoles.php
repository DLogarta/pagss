<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $connection = 'user_admin';

    protected $table = 'user_roles';

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
