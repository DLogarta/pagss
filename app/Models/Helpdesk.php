<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Helpdesk extends Model
{
    protected $connection = 'helpdesk';
    protected $keyType = 'string';

    protected $table = 'tickets';
    protected $fillable = ['name', 'id_number', 'phone', 'email', 'subject', 'description', 'priority_level', 'status', 'attachments', 'assigned_to'];

    public $incrementing = false;

    public function users()
    {
        return $this->belongsTo(Users::class, 'assigned_to', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
             do {
                 $id = strtoupper(Str::random(8));
             } while (self::where('id', $id)->exists());

             $model->id = $id;
        });
    }

}
