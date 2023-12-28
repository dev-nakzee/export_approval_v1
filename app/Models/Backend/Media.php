<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'media';
    protected $fillable = [
        'media_name',
        'media_path',
        'media_type',
        'media_size',
    ];
    protected $softDelete = true;
}
