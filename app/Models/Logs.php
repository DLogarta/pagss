<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $connection = 'analytics';

    protected $table = 'user_activity_logs';

    protected $fillable = ['user_id', 'activity_type', 'activity_details', 'ip_address', 'user_agent'];

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
}
