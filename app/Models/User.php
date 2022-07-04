<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'City',
        'Office_code',
        'OfficeType',
        'Identity',
        'IdentityType',
        'roll',
        'last_login_at',
        'image',
        'provinces',
        'streetAddress',
        'officeActivity',
        'officeManager',
        'OMPhone',
        'OMEmail',
        'EngnieeringCert',
        'TradeCert',
        'isActive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function UrsName($id)
    {
        //return Cache::has('user-is-online-' . $this->id);
       $name = User::findOrFail($id);
       return $name->name;
    }

    public function message()
    {
        return $this->hasMany(Message::class,'user_id','id');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
