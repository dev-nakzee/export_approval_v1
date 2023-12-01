<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $primaryKey = 'blog_category_id';

    protected $fillable = [
        'blog_category_name',
        'blog_category_slug',
        'blog_category_description',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];
}
