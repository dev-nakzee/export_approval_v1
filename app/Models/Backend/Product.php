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
        'product_technical_name',
        'media_id',
        'img_alt',
        'product_compliance',
        'product_content',
        'product_service_id',
        'product_category_id',
        'information',
        'guidelines',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'product_status',
        'product_order',
    ];
}
