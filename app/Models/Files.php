<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Files extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'Usr_id',
        'OfficeCode',
        'projectID',
        'mission',
        'cat',
        'DocDetails',
        'DocName',
        'Docs',
        'reject_accept',
        'reject_accept_at',
        'reject_reason',
        'reject_count'

    ];
    public function scopeOwne($query)
    {
        $query->where('OfficeCode', '=', Auth::user()->Office_code);
    }
}
