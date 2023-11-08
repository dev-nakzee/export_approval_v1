<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'product_category_name',
        'product_category_slug',
        'product_category_content',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'product_category_status',
        'product_category_order',
    ];
}
