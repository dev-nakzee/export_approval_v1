<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'blogs';

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'blog_title',
        'blog_slug',
        'blog_category_id',
        'media_id',
        'img_alt',
        'blog_content',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];
}
