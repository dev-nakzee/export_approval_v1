<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';
    protected $primaryKey = 'gallery_image_id';
    protected $fillable = [
        'gallery_image_title',
        'gallery_image_slug',
        'media_id',
        'img_alt',
    ];
}
