<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeMap extends Model
{
    use HasFactory;

    protected $table = 'notice_maps';

    protected $primaryKey = 'notice_map_id';

    protected $fillable = [
        'notice_id',
        'notice_product_id',
    ];
}
