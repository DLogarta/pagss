<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $connection = 'cms';

    protected $table = 'clients';

    protected $fillable = ['name', 'image'];
}
