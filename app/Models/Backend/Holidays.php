<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holidays extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'holiday_name',
        'holiday_date',
        'holiday_type',
    ];
}
