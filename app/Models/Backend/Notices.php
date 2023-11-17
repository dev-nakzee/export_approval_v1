<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    use HasFactory;

    protected $table = 'notices';

    protected $primaryKey = 'notice_id';

    protected $fillable = [
        'notice_title',
        'notice_slug',
        'media_id',
        'img_alt',
        'notice_content',
        'service_id',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'notice_document',
        'notice_status',
    ];

}
