<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\ContactForm;

class ContactController extends Controller
{
    //
    public function index()
    {       
        return view('frontend.pages.contact', compact('countries'));
    }

    public function contact(Request $request)
    {
        $json = $request->country;
        $country = json_decode($json)[0];
        $phonecode = json_decode($json)[1];
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'organisation' => $request->organisation,
            'country' => $country,
            'phone' => '+'.$phonecode.'-'.$request->mobile,
            'message' => $request->message,
        ];
        ContactForm::create($data);

        $to  = 'info@bl-india.com';

        // Subject
        $subject1 = 'Thank you for your Interest';
        $subject = "Contact form received by ".$data['name'];

        // Message
        $thanks = "<p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Hello ".$data['name'].",</p>

        <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Thank you for reaching out to Export Approval!</p>
        
        <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>We appreciate your interest in Export Approval platform, powered by Brand Liaison - a compliance consultant company. We are dedicated to assisting foreign manufacturers in getting the essential Indian approvals and certification to export their products to India. Our team of compliance experts is committed to ensuring a smooth and hassle-free approval process for your export needs.</p>
        
        <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Be assured, your inquiry is important to us. Our dedicated team is currently reviewing the details you provided, and we will get back to you promptly. You can expect to hear from us within 6 working hours.</p>
        
        <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>For any immediate concerns or if you wish to provide additional information, please feel free to contact us directly at +91-9810363988.</p>
        
        <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Wishing you a great day ahead!</p>
        
        <p style='font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: #000;'>Best regards,<br/>
        Team Brand Liaison<br/>
        Contact No: +91-9250056788, +91-8130615678<br/>
        Email: info@bl-india.com</p>";

        $message = '<table style="width:100%; font-family: Arial, Helvetica, sans-serif; font-size: 18px;">'.
        '<tr><th colspan="2">Application for position of Resident Executive</th></tr>'.
        '<tr><th>Name</th><td>'.$data['name'].'</td></tr>'.
        '<tr><th>Organisation</th><td>'.$data['organisation'].'</td></tr>'.
        '<tr><th>Email</th><td>'.$data['email'].'</td></tr>'.
        '<tr><th>Country</th><td>'.$data['country'].'</td></tr>'.
        '<tr><th>Phone</th><td>'.$data['phone'].'</td></tr>'.
        '<tr><th>Message</th><td>'.$data['message'].'</td></tr></table>';

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
