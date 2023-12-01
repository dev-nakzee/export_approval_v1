<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'client_id';
    protected $fillable = [
        'client_name',
        'client_slug',
        'media_id',
        'img_alt',
        'client_content',
        'client_rating',
    ];
}
