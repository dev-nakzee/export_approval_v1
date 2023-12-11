<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Countries;
use App\Models\Frontend\PartnerForm;

class PartnerFormController extends Controller
{
    //
    public function business_associate() 
    {
        $countries = Countries::get();
        return view('frontend.pages.ba', compact('countries'));
    }

    public function resident_executive() 
    {
        $countries = Countries::get();
        return view('frontend.pages.re', compact('countries'));
    }
}
