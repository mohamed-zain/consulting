<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Documents extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
        'Office_code',
        'Bennar',
        'DocDetails',
        'DocName',
        'Docs',
        'DocType',
    ];
    public function scopeOwne($query)
    {
        $query->where('Office_code', '=', Auth::user()->Office_code);
    }
}
