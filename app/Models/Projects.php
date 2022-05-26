<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Projects extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'Bennar',
        'FileCode',
        'Country',
        'City',
        'Status',
        'stat',
        'OfficeCode',
    ];
    public function scopeOwne($query)
    {
        $query->where('OfficeCode', '=', Auth::user()->Office_code);
    }
}
