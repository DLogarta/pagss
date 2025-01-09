<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $connection = 'cms';
    protected $table = 'organizations';
    protected $fillable = ['image', 'name', 'title', 'category'];
}
