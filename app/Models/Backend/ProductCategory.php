<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

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
