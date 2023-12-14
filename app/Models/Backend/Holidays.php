<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    use HasFactory;
    protected $fillable = [
        'holiday_name',
        'holiday_date',
        'holiday_type',
    ];
}
