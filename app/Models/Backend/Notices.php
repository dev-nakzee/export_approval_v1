<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notices extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'notices';

    protected $primaryKey = 'notice_id';

    protected $fillable = [
        'notice_title',
        'notice_date',
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

    protected $casts = [
        'notice_date' => 'datetime:d-m-Y',
    ];
}
