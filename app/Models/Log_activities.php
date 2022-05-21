<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Log_activities extends Model
{
	 protected $table = 'log_activities';
    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'user_id','Date'
    ];
}
