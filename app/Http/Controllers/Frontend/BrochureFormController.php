<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Leads;
use App\Models\Backend\Services;
use App\Models\Backend\ServiceSection;
use App\Models\Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use PDF;
use Jenssegers\Agent\Agent;

class BrochureFormController extends Controller
{
    //
    public function index()
    {
        $agent = new Agent();
        $countries = Countries::get();
        $services = Services::select('service_id', 'service_name')->get();
        return view('frontend.pdf.index', compact(['countries', 'services', 'agent']));
    }

    public function store(Request $request)
    {
        $json = $request->country;
        $country = json_decode($json)[0];
        $phonecode = json_decode($json)[1];
        $data = [
            'name' => $request->fullname,
            'organisation' => $request->organisation,
            'email' => $request->email,
            'country' => $country,
            'phone' => '+'.$phonecode.'-'.$request->mobile,
            'service' => $request->service,
            'source' => $request->source,
            'message' => $request->message,
            'status' => 'open',
            'ip_address' => $request->ip(),
        ];
        $lead = Leads::create($data);
        $id = $lead->id;
        $service = Services::where('services.service_id', $request->service)
        ->select('services.service_name', 'services.service_description', 'services.faqs')
        ->first();
        $sections = ServiceSection::where('service_id', $request->service)
        ->orderBy('service_section_order', 'asc')
        ->get();
        $data['service'] = $service;
        $data['sections'] = $sections;
        $pdf = PDF::loadView('frontend.pdf.brochure', compact(['service', 'data', 'sections']));
       


        $to  = 'info@bl-india.com';

        // Subject
        $subject1 = "<p>Hello ".$data['name'].",<br/>".

        "Thank you for downloading our brochure for ".$service['service_name']."!</p>".
        
        "<p>We appreciate your interest in Export Approval, powered by Brand Liaison - a compliance consultant company offering comprehensive support to foreign manufacturers in obtaining required Indian approvals and certifications to export their products to India. Our Export Approval platform is designed to provide seamless assistance, ensuring that your products meet the required standards for successful international trade.</p>".
        
        "<p>Our team has received your interest, and we want to assure you that we are here to assist you promptly. You can expect to hear from us within the next 6 working hours.</p>".
        
        "<p>If you have any immediate questions or concerns, feel free to reach out to us at +91-9810363988.</p>".
        
        "<p>Wishing you a great day ahead!</p>".
        
        "<p>Best regards,<br>".
        "Team Brand Liaison<br>".
        "Contact No: +91-9250056788, +91-8130615678<br>".
        "Email: info@bl-india.com</p>";

        $subject = $data['name'].' requested for '.$service['service_name'];

        // Message
        $thanks = '<p>Thank you for your interest.</p>';
        $message = '<table style="width:100%">'.
        '<tr><td colspan="2">Interest in '.$service['service_name'].' service brochure.</td></tr>'.
        '<tr><td>Full Name</td><td>'.$data['name'].'</td></tr>'.
        '<tr><td>Organisation</td><td>'.$data['organisation'].'</td></tr>'.
        '<tr><td>Email</td><td>'.$data['email'].'</td></tr>'.
        '<tr><td>Country</td><td>'.$data['country'].'</td></tr>'.
        '<tr><td>Phone</td><td>'.$data['phone'].'</td></tr>'.
        '<tr><td>Interested Service</td><td>'.$service['service_name'].'</td></tr>'.
        '<tr><td>Source</td><td>'.$data['source'].'</td></tr>'.
        '<tr><td>Message</td><td>'.$data['message'].'</td></tr></table>';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        // Additional headers
        $headers .= 'From: Team Export Approval <no-reply@exportapproval.com>' . "\r\n";


        // Mail it
        mail($to, $subject, $message, $headers);
        mail($data['email'], $subject1, $thanks, $headers);

        return $pdf->download('Brochure -'.$service['service_name'].'.pdf');

    }
}
