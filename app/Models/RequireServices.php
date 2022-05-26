<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequireServices extends Model
{
    use HasFactory;
    protected $table = 'require_services';
    protected $fillable = [
        'serviceName',
        'BennarID',
    ];
}
