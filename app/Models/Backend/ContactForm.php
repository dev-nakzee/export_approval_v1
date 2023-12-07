<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $table = 'contact_forms';
    protected $primaryKey = 'contact_form_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'organisation',
        'country',
        'message',
    ];
}
