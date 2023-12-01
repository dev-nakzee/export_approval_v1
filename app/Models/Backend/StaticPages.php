<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    use HasFactory;
    protected $table = 'static_pages';
    protected $primaryKey = 'static_page_id';
    protected $fillable = [
        'page_name',
        'page_slug',
        'media_id',
        'img_alt',
        'page_status'
    ];
}
