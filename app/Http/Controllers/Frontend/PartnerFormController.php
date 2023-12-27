<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Countries;
use App\Models\Frontend\PartnerForm;
use App\Models\Backend\StaticPages;

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
        $page = StaticPages::where('static_page_id', 1)->first();
        return view('frontend.pages.ba', compact('countries', 'agent', 'page'));
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
            $subject = "Business Associate Interest by ".$data['contact_person_name'];

            // Message
            $thanks = "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Hello ".$data['contact_person_name'].",</p>".

            "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Thank you for your interest in becoming a Business Associate Partner with Export Approval!</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>We recognize and value the time and effort you have invested in completing the form to initiate this partnership with Export Approval, powered by Brand Liaison - a compliance consultant company. We specialize in providing comprehensive assistance and support to foreign manufacturers for required Indian approvals and certifications to export their products to India. Our commitment to facilitating seamless export approval processes for our clients sets us apart in the industry.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>We are thrilled about the prospect of having you as a valued Business Associate Partner, and we believe that your expertise will contribute significantly to the success of our collaborative efforts. Our team is currently reviewing the information you provided, and we will get back to you soon to discuss potential next steps and answer any questions you may have.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>If you have any immediate inquiries or wish to reach out to us, please feel free to contact us at +91-9810363988.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>We look forward to working together and creating mutually beneficial relationships. Wishing you a great day ahead!</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Best regards,<br>
            Team Brand Liaison<br>
            Contact No: +91-9250056788, +91-8130615678<br>
            Email: info@bl-india.com </p>";

            $message = '<table style="width:100%; font-family: Arial, Helvetica, sans-serif; font-size: 18px;">'.
            '<tr><th colspan="2">Application for position of Resident Executive</th></tr>'.
            '<tr><th>Organisation</th><td>'.$data['organization'].'</td></tr>'.
            '<tr><th>Industry</th><td>'.$data['industry'].'</td></tr>'.
            '<tr><th>Full Name</th><td>'.$data['contact_person_name'].'</td></tr>'.
            '<tr><th>Designation</th><td>'.$data['designation_name'].'</td></tr>'.
            '<tr><th>Address</th><td>'.$data['address_street'].'</td></tr>'.
            '<tr><th>City</th><td>'.$data['city'].'</td></tr>'.
            '<tr><th>State</th><td>'.$data['state'].'</td></tr>'.
            '<tr><th>Country</th><td>'.$data['country'].'</td></tr>'.
            '<tr><th>Zip Code</th><td>'.$data['zip'].'</td></tr>'.
            '<tr><th>Phone</th><td>'.$data['country_code'].$data['phone_number'].'</td></tr>'.
            '<tr><th>Email</th><td>'.$data['email'].'</td></tr>'.
            '<tr><th>Website</th><td>'.$data['website'].'</td></tr>'.
            '<tr><th>partner_details</th><td>'.$data['partner_details'].'</td></tr></table>';

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
        $page = StaticPages::where('static_page_id', 1)->first();
        return view('frontend.pages.re', compact('countries', 'agent', 'page'));
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
            $subject = "Resident Executive Interest by ".$data['contact_person_name'];

            // Message
            $thanks = "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Dear ".$data['contact_person_name'].",</p>".

            "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Thank you for your interest in becoming a Resident Executive Partner with Export Approval!</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>We sincerely appreciate the time and effort you dedicated to completing the form, demonstrating your commitment to contributing as an Authorized Indian Representative (AIR) for foreign manufacturers.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Export Approval platform, powered by Brand Liaison - a compliance consultant company, specializes in providing invaluable assistance and support to foreign manufacturers for essential Indian approvals and certifications required to export their products to India. As a Resident Executive Partner, your role will be crucial in connecting foreign manufacturers with the regulatory framework in India.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Our team is currently reviewing the information you provided, and we will get back to you shortly with the next steps in the onboarding process.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>If you have any immediate questions or concerns, please feel free to reach out to us at +91-9810363988.</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>We look forward to the opportunity to collaborate with you. Wishing you a great day ahead!</p>
            
            <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Best regards,<br/>
            Team Brand Liaison</br>
            Contact No: +91-9250056788, +91-8130615678</br>
            Email: info@bl-india.com </p>";

            $message = '<table style="width:100%; font-family: Arial, Helvetica, sans-serif; font-size: 18px;">'.
            '<tr><th colspan="2">Application for position of Resident Executive</th></tr>'.
            '<tr><th>Full Name</th><td>'.$data['contact_person_name'].'</td></tr>'.
            '<tr><th>Organisation</th><td>'.$data['designation_name'].'</td></tr>'.
            '<tr><th>Address</th><td>'.$data['address_street'].'</td></tr>'.
            '<tr><th>City</th><td>'.$data['city'].'</td></tr>'.
            '<tr><th>State</th><td>'.$data['state'].'</td></tr>'.
            '<tr><th>Country</th><td>'.$data['country'].'</td></tr>'.
            '<tr><th>Zip Code</th><td>'.$data['zip'].'</td></tr>'.
            '<tr><th>Phone</th><td>'.$data['country_code'].$data['phone_number'].'</td></tr>'.
            '<tr><th>Email</th><td>'.$data['email'].'</td></tr>'.
            '<tr><th>experience</th><td>'.$data['experience'].'</td></tr>'.
            '<tr><th>partner_details</th><td>'.$data['partner_details'].'</td></tr></table>';

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
