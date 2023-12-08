<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    use HasFactory;
    protected $table = 'download_categories';
    protected $fillable = [
        'download_category',
        'download_category_slug'
    ];
}
