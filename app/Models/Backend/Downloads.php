<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Downloads extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'downloads';
    protected $fillable = [
        'download_category_id',
        'download_name',
        'download_slug',
        'download_document',
        'download_status',
    ];
}
