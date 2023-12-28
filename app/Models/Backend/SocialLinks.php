<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLinks extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'social_media',
        'social_link_url',
        'social_link_icon'
    ];
}
