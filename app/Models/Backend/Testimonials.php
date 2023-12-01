<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
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
