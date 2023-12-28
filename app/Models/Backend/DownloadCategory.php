<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloadCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'download_categories';
    protected $fillable = [
        'download_category',
        'download_category_slug'
    ];
}
