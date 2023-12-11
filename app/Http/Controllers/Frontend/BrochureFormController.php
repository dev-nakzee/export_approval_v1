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
        if($request->captcha === $request->captcha_answer) {
            $request->validate([
                'fullname' => 'required|string',
                'organisation' => 'required|string',
                'email' => 'required|email',
                'country' => 'required',
                'mobile' => 'required|numeric',
                'service' => 'required',
            ]);
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
            $service = Services::where('service_id', $request->service)->first();
            $data['service'] = $service;
            // view()->share('frontend.pdf.brochure',[$data, $service]);
            $pdf = PDF::loadView('frontend.pdf.brochure', compact(['service', 'data']));
            Storage::disk('public')->put('brochure/Brochure-'.$id , $pdf->download('Brochure-'.$id.'.pdf'));
            Leads::where('lead_id', $id)->update(['pdf_path' => 'brochure/Brochure-'.$id.'.pdf']);
            $download = env('APP_URL').Storage::url('brochure/Brochure-'.$id.'.pdf');
            return response()->json(['status'=>200, 'message'=> 'Form is successfully submitted!', 'download' => $download]);
        }
    }
}
