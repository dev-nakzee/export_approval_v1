<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'static_pages';
    protected $primaryKey = 'static_page_id';
    protected $fillable = [
        'page_name',
        'page_slug',
        'tagline',
        'media_id',
        'img_alt',
        'page_status',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];
}
