<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MobileInfo extends Model
{
   protected $table = 'mobile_infos';
    protected $fillable = [
        'PhoneNum',
        'PhonePass',
        'SendrName',

    ];
}
