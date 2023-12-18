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


class BrochureFormController extends Controller
{
    //
    public function index()
    {
        $countries = Countries::get();
        $services = Services::select('service_id', 'service_name')->get();
        return view('frontend.pdf.index', compact(['countries', 'services']));
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
        $subject1 = 'Thank you for your Interest';
        $subject = $data['name'].' requested for '.$service['service_name'];

        // Message
        $thanks = '<p>Thank you for your interest.</p>';
        $message = '<p><strong>Interest in '.$service['service_name'].' service brochure.<strong><br>'.$data['name'].'<br>'.$data['organisation'].'<br>'.$data['email'].'<br>'.$data['country'].'<br>'.$data['phone'].'<br>'.$service['service_name'].'<br>'.$data['source'].'<br>'.$data['message'].'</p>';

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
