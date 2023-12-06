<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $primaryKey = 'news_id';
    protected $table = 'news';
    protected $fillable = [
        'news_title',
        'news_slug',
        'media_id',
        'img_alt',
        'news_url',
    ];
}
