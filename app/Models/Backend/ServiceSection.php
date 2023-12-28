<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_sections';
    protected $fillable = [
        'service_section_name',
        'service_section_slug',
        'service_section_content',
        'service_section_status',
        'service_section_order',
        'service_id',
    ];
}
