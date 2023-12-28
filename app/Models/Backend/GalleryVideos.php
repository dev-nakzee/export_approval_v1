<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryVideos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gallery_videos';
    protected $primaryKey = 'gallery_video_id';
    protected $fillable = [
        'gallery_video_title',
        'gallery_video_slug',
        'url',
    ];
}
