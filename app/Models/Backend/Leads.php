<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leads extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'organisation',
        'source',
        'email',
        'country',
        'phone',
        'service',
        'message',
        'status',
        'ip_address',
    ];
}
