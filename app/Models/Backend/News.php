<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

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
