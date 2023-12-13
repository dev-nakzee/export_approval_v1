<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\DownloadCategory;
use App\Models\Backend\Downloads;
use App\Models\Backend\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class DownloadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.downloads.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $downloadCategory = DownloadCategory::get();
        return view('backend.downloads.create', compact('downloadCategory'));
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
        ]);
        $data = [
            'download_name' => $request->name,
            'download_slug' => $request->slug,
            'download_category_id' => $request->download_category_id,
            'download_document' => $request->download_id,
            'download_status' => 'active',
        ];
        Downloads::create($data);
        return redirect()->route('downloads.index')->with([200, 'response', 'status'=>'success','message'=>'Download created successfully.']);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Downloads::select('download_id', 'download_name', 'download_category')
                ->leftJoin('download_categories', 'download_categories.download_category_id','downloads.download_category_id')
                ->orderBy('download_id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('download_name', function($row){
                    return  $row->download_name;
                })
                ->addColumn('download_category', function($row){
                    return  $row->download_category;
                })
                ->addColumn('action', function($row){
                    $removeBtn = '<a class="btn btn-outline-info btn-sm" href="'.route("downloads.categories.edit", $row->download_id).'"><i class="fa fa-edit"></i></a><a class="btn btn-outline-danger btn-sm" href="'.route("downloads.categories.delete", $row->download_id).'"><i class="fa fa-trash-can"></i></a>';
                    return $removeBtn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
