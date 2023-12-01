<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
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
