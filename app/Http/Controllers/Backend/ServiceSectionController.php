<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Services;
use App\Models\Backend\ServiceSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;


class ServiceSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($service)
    {
        //
        $services = Services::select('service_id','service_name')
            ->where('service_id', $service)
            ->first();
        return view('backend.services.sections.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($service)
    {
        //
        $services = Services::select('service_id','service_name')
            ->where('service_id', $service)
            ->first();
        return view('backend.services.sections.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $service)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'service_section_name' => $request->name,
            'service_section_slug' => $request->slug,
            'service_id' => $service,
            'service_section_content' => $request->service_section_content,
            'service_section_status' => $request->service_section_status,
            'service_section_order' => $request->service_section_order,
        ];
        ServiceSection::create($data);
        return redirect()->route('services.sections.index', $service)->with('success', 'Service section created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $service)
    {
        //
        if($request->ajax()){
            $data = ServiceSection::where('service_id', $service)
            ->select('service_section_id', 'service_section_name', 'service_id','service_section_status')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('service_section_name', function($row){
                    return $row->service_section_name;
                })
                ->addColumn('service_section_status', function($row){
                    $status = "";
                    if($row->service_section_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('services.sections.edit', [$row->service_id, $row->service_section_id]).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('services.delete', [$row->service_id, $row->service_section_id]).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
    public function edit($service, $id)
    {
        //
        $services = Services::select('service_id','service_name')
        ->where('service_id', $service)
        ->first();
        $service_section = ServiceSection::where('service_section_id', $id)
        ->first();
        return view('backend.services.sections.edit', compact('services', 'service_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $service, $id)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'service_section_name' => $request->name,
            'service_section_slug' => $request->slug,
            'service_id' => $service,
            'service_section_content' => $request->service_section_content,
            'service_section_status' => $request->service_section_status,
            'service_section_order' => $request->service_section_order,
        ];
        ServiceSection::where('service_section_id', $id)->update($data);
        return redirect()->route('services.sections.index', $service)->with('success', 'Service section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($service, $id): RedirectResponse
    {
        //
        ServiceSection::where('service_section_id', $id)->delete();
        return redirect()->route('services.sections.index')->with([200, 'response', 'status'=>'success','message'=>'Service section removed successfully.']);
    }
}
