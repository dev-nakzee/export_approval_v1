<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticPageSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'static_page_sections';
    protected $primaryKey = 'static_page_section_id';
    protected $fillable = [
        'static_page_id',
        'media_id',
        'img_alt',
        'section_name',
        'section_slug',
        'section_tagline',
        'section_description',
        'section_content',
        'section_status',
        'section_order',
        'section_color',
    ];
}
