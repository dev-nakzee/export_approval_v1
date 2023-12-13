<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Downloads extends Model
{
    use HasFactory;
    protected $table = 'downloads';
    protected $fillable = [
        'download_category_id',
        'download_name',
        'download_slug',
        'download_document',
        'download_status',
    ];
}
