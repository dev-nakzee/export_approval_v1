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
        $subject = $data['name'].' contact form received';

        // Message
        $thanks = '<p>Thank you for your interest.</p>';
        $message = '<p><strong>Contact form received<strong><br>'.$data['name'].'<br>'.$data['organisation'].'<br>'.$data['email'].'<br>'.$data['country'].'<br>'.$data['phone'].'<br>'.$data['message'].'</p>';

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
