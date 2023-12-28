<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'form_data';
    protected $primaryKey = 'form_data_id';
    protected $fillable = [
        'form_id',
        'form_data',
        'form_data_response',
        'form_data_status',
    ];
}
