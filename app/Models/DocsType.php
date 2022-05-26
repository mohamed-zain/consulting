<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocsType extends Model
{
    use HasFactory;
    protected $table = 'doc_type';
    protected $fillable = [
        'DocTypeName',
        'FileStage',

    ];
}
