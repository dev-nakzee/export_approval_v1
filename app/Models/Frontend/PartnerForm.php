<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization_name',
        'industry_name',
        'contact_person_name',
        'designation_name',
        'address_street',
        'city',
        'state',
        'zip',
        'country',
        'country_code',
        'phone_number',
        'email',
        'website',
        'experience',
        'partner_details',
        'partner_type'
    ];
}
