<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'media_id' => 'required|numeric',
        ]);
        $faq = array_combine($request->question, $request->answer);
        $data = [
            'service_name' => $request->name,
            'service_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'service_description' => $request->description,
            'service_compliance' => $request->service_compliance,
            'faqs' => json_encode($faq),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'service_featured' => $request->service_featured,
            'service_product_show' => $request->service_product_show,
            'service_order' => $request->service_order,
            'service_status' => $request->service_status,
        ];
        Services::create($data);
        return redirect()->route('services.index')->with([200, 'response', 'status'=>'success','message'=>'Service created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if($request->ajax()){
            $data = Services::select('service_id', 'service_name', 'service_status')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('service', function($row){
                    return $row->service_name;
                })
                ->addColumn('status', function($row){
                    $status = "";
                    if($row->service_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('services.edit', $row->service_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('services.delete', $row->service_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a><a href="'.route('services.sections.index', $row->service_id).'" class="btn btn-outline-info btn-sm py-0 px-1"><i class="fa-light fa-list-dropdown"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $services = Services::select('services.*', 'media_name')
        ->join('media', 'services.media_id', 'media.media_id')
        ->where('services.service_id', $id)
        ->get();
        return view('backend.services.edit', compact('services', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'media_id' => 'required|numeric',
        ]);
        $faq = array_combine($request->question, $request->answer);
        $data = [
            'service_name' => $request->name,
            'service_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'service_description' => $request->description,
            'service_compliance' => $request->service_compliance,
            'faqs' => json_encode($faq),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'service_featured' => $request->service_featured,
            'service_product_show' => $request->service_product_show,
            'service_order' => $request->service_order,
            'service_status' => $request->service_status,
        ];
        Services::where('service_id', $id)->update($data);
        return redirect()->route('services.index')->with([200, 'response', 'status'=>'success','message'=>'Service updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //
        Services::where('service_id', $id)->delete();
        return redirect()->route('services.index')->with([200, 'response', 'status'=>'success','message'=>'Service updated successfully.']);
    }
}
