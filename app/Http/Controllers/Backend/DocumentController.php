<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.document.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
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

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Document::orderBy('doc_id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('document', function($row){
                    $image = '<i class="fa-light fa-2xl fa-file-pdf"></i> '.$row->document;
                    return $image;
                })
                ->addColumn('doc_path', function($row){
                    $path = url('/').Storage::url($row->doc_path);
                    return $path;
                })
                ->addColumn('doc_detail', function($row){
                    $size = round(intval($row->doc_size) * 0.000001, 3);
                    $doc_detail = $size.' MB ('.$row->doc_type.')';
                    return $doc_detail;
                })
                ->addColumn('action', function($row){
                    $removeBtn = '<a class="btn btn-outline-danger btn-sm" href="'.route("document.delete", $row->doc_id).'"><i class="fa fa-trash-can"></i></a>';
                    return $removeBtn;
                })
                ->rawColumns(['action', 'media_path', 'media_detail'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
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
