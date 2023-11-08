<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'service_name',
        'service_slug',
        'media_id',
        'img_alt',
        'service_description',
        'service_compliance',
        'faqs',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'service_order',
        'service_status',
    ];
}
