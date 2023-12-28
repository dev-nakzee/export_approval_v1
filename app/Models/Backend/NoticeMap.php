<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoticeMap extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'notice_maps';

    protected $primaryKey = 'notice_map_id';

    protected $fillable = [
        'notice_id',
        'notice_product_id',
    ];
}
