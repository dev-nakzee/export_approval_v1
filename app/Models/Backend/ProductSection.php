<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_sections';
    protected $fillable = [
        'product_section_name',
        'product_section_slug',
        'product_section_content',
        'product_section_status',
        'product_section_order',
        'product_id',
    ];
}
