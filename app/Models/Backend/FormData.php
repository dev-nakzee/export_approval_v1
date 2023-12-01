<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $table = 'form_data';
    protected $primaryKey = 'form_data_id';
    protected $fillable = [
        'form_id',
        'form_data',
        'form_data_response',
        'form_data_status',
    ];
}
