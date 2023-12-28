<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Countries extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso',
        'iso3',
        'phonecode',
        'numcode',
        'nicename',
    ];
}
