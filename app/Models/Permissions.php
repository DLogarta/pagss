<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $connection = 'user_admin';

    protected $table = 'permissions';

    protected $fillable = ['name', 'description, pages'];
}
