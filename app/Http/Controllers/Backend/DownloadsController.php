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
        return view('backend.downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
    }

    public function save(Request $request): JsonResponse
    {
        //
        $file = $request->file('file');
        $fullName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $onlyName = explode('.'.$extension, $fullName);
        $fileName = str_replace(" ","-",$onlyName[0]).'-'.time().'.'.$file->getClientOriginalExtension();
        Document::create([
            'document' => $file->getClientOriginalName(),
            'doc_path' => 'documents/'.$fileName,
            'doc_type' => $file->getMimeType(),
            'doc_size' => $file->getSize(),
        ]);
        Storage::disk('public')->put('documents/' . $fileName, File::get($file));
        return response()->json(['success'=> $file->getClientOriginalName()]);
    }

    public function gallery ()
    {
        //
        $document = Document::orderBy('doc_id', 'desc')->get();
        foreach($document as $key => $value) {
            $document[$key]['doc_path'] = Storage::url($value['doc_path']);
        }
        return response()->json([$document]);
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
