<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;
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
