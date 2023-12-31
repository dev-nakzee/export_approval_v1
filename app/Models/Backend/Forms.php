<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forms extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'forms';
    protected $primaryKey = 'form_id';
    protected $fillable = [
        'form_name',
        'form_slug',
        'form_email',
        'form_components',
        'form_status',
    ];
}
