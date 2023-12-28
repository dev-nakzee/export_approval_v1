<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonials extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'testimonials';
    protected $primaryKey = 'testimonial_id';
    protected $fillable = [
        'testimonial_name',
        'testimonial_slug',
        'testimonial_designation',
        'testimonial_company',
        'media_id',
        'img_alt',
        'testimonial_content',
        'testimonial_rating',
    ];
}
