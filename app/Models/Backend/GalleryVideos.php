<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideos extends Model
{
    use HasFactory;
    protected $table = 'gallery_videos';
    protected $primaryKey = 'gallery_video_id';
    protected $fillable = [
        'gallery_video_title',
        'gallery_video_slug',
        'url',
    ];
}
