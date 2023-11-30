<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Leads;
use App\Models\Backend\Services;
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'message' => 'required',
        ]);

        $data = $request->all();

        $brochure = new BrochureForm();
        $brochure->name = $data['name'];
        $brochure->email = $data['email'];
        $brochure->country = $data['country'];
        $brochure->phone = $data['phone'];
        $brochure->address = $data['service'];
        $brochure->message = $data['message'];
        $brochure->save();

        return redirect()->back()->with('success', 'Brochure Form Submitted Successfully');
    }
}
