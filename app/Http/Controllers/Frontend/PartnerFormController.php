<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Countries;
use App\Models\Frontend\PartnerForm;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;

class PartnerFormController extends Controller
{
    //
    public function business_associate() 
    {
        $countries = Countries::get();
        $agent = new Agent;
        return view('frontend.pages.ba', compact('countries', 'agent'));
    }

    public function ba_save(Request $request): RedirectResponse
    {

            $data = [
                'organization' => $request->organization,
                'industry' => $request->industry,
                'contact_person_name' => $request->salutation.'. '.$request->contact,
                'designation_name' => $request->designation,
                'address_street' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'country_code' => $request->countrycode,
                'phone_number' => $request->phone,
                'email' => $request->email,
                'website' => $request->website,
                'partner_details' => $request->details,
                'partner_type' => 'Business Associate',
            ];

            PartnerForm::create($data);
            $to  = 'rk@bl-india.com';

            // Subject
            $subject1 = 'Your application is submitted';
            $subject = $data['contact_person_name'].' form for '. $data['partner_type'];

            // Message
            $thanks = '<p>Thank you for your interest.</p>';
            $message = '<p><strong>Application for position of Business Associate<strong><br>'.$data['organization'].'<br>'.$data['industry'].'<br>'.$data['contact_person_name'].'<br>'.$data['designation_name'].'<br>'.$data['address_street'].'<br>'.$data['city'].'<br>'.$data['state'].'<br>'.$data['country'].'<br>'.$data['zip'].'<br>'.$data['country_code'].$data['phone_number'].'<br>'.$data['email'].'<br>'.$data['website'].'<br>'.$data['partner_details'].'</p>';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            // Additional headers
            $headers .= 'From: Team Export Approval <no-reply@exportapproval.com>' . "\r\n";


            // Mail it
            mail($to, $subject, $message, $headers);
            mail($data['email'], $subject1, $thanks, $headers);
            return redirect()->back()->withSuccess(['Form submitted successfully.']);
    }

    public function resident_executive() 
    {
        $countries = Countries::get();
        $agent = new Agent;
        return view('frontend.pages.re', compact('countries', 'agent'));
    }

    public function re_save(Request $request): RedirectResponse
    {
      
            $data = [
                'contact_person_name' => $request->salutation.'. '.$request->contact,
                'designation_name' => $request->expertise,
                'address_street' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'country_code' => $request->countrycode,
                'phone_number' => $request->phone,
                'email' => $request->email,
                'experience' => $request->experience,
                'partner_details' => $request->details,
                'partner_type' => 'Resident Executive',
            ];
            PartnerForm::create($data);
            $to  = 'rk@bl-india.com';

            // Subject
            $subject1 = 'Your application is submitted';
            $subject = $data['contact_person_name'].' form for '. $data['partner_type'];

            // Message
            $thanks = '<p>Thank you for your interest.</p>';
            $message = '<p><strong>Application for position of Resident Executive<strong><br>'.$data['contact_person_name'].'<br>'.$data['designation_name'].'<br>'.$data['address_street'].'<br>'.$data['address_street'].'<br>'.$data['city'].'<br>'.$data['state'].'<br>'.$data['country'].'<br>'.$data['zip'].'<br>'.$data['country_code'].$data['phone_number'].'<br>'.$data['email'].'<br>'.$data['experience'].'<br>'.$data['partner_details'].'</p>';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            // Additional headers
            $headers .= 'From: Team Export Approval <no-reply@exportapproval.com>' . "\r\n";


            // Mail it
            mail($to, $subject, $message, $headers);
            mail($data['email'], $subject1, $thanks, $headers);
            return redirect()->back()->withSuccess(['Form submitted successfully.']);
    }
}
