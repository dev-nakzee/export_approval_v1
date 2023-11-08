<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_slug',
        'media_id',
        'img_alt',
        'product_content',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'product_status',
        'product_order',
        'product_category_id',
        'information',
        'guidelines',
    ];
}
