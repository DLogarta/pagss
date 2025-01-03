<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $connection = 'cms';

    protected $table = 'organizations';

    protected $fillable = ['image', 'name', 'title', 'category'];
}
