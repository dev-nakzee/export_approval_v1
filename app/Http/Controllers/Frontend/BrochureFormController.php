<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Leads;
use App\Models\Backend\Services;
use App\Models\Backend\ServiceSection;
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
        return view('frontend.pdf.brochure');
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'fullname' => 'required',
            'organisation' => 'required',
            'email' => 'required',
            'country' => 'required',
            'mobile' => 'required',
            'service' => 'required',
        ]);
        $json = $request->country;
        $country = json_decode($json)[0];
        $phonecode = json_decode($json)[1];
        $data = [
            'name' => $request->fullname,
            'source' => $request->organisation,
            'email' => $request->email,
            'country' => $country,
            'phone' => '+'.$phonecode.'-'.$request->mobile,
            'service' => $request->service,
            'message' => $request->message,
            'status' => 'open',
            'ip_address' => $request->ip(),
        ];
        $lead = Leads::create($data);
        $id = $lead->id;
        return response()->json(['success' => 'Form is successfully submitted!', 'lead_id' => $id]);
    }
}
