<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.media.index');
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
        $image = $request->file('file');
        $fullName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $onlyName = explode('.'.$extension, $fullName);
        $imageName = str_replace(" ","-",$onlyName[0]).'-'.time().'.'.$image->getClientOriginalExtension();
        Media::create([
            'media_name' => $image->getClientOriginalName(),
            'media_path' => 'media/'.$imageName,
            'media_type' => $image->getMimeType(),
            'media_size' => $image->getSize(),
        ]);
        Storage::disk('public')->put('media/' . $imageName, File::get($image));
        return response()->json(['success'=> $image->getClientOriginalName()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if($request->ajax()){
            $data = Media::orderBy('media_id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('media_name', function($row){
                    $image = '<image width="100px" src="'.Storage::url($row->media_path).'"><br>'.$row->media_name;
                    return $image;
                })
                ->addColumn('media_path', function($row){
                    $path = url('/').Storage::url($row->media_path);
                    return $path;
                })
                ->addColumn('media_detail', function($row){
                    $size = round(intval($row->size) * 0.000001, 3);
                    $media_detail = $size.' MB ('.$row->media_type.')';
                    return $media_detail;
                })
                ->addColumn('action', function($row){
                    $removeBtn = '<a class="btn btn-outline-danger btn-sm" href="'.route("media.delete", $row->media_id).'"><i class="fa-light fa-trash-can"></i></a>';
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
        //
        $media = Media::orderBy('media_id', 'desc')->get();
        foreach($media as $key => $value) {
            $media[$key]['media_path'] = Storage::url($value['media_path']);
        }
        return response()->json([$media]);
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
    public function destroy($id)
    {
        //
        $media = Media::where('media_id', $id)->first();
        if($media) {
            Storage::disk('public')->delete($media->media_path);
            Media::where('media_id', $id)->delete();
            return redirect()->route('media.index')->with([200, 'response', 'status'=>'success','message'=>'Media deleted successfully.']);
        }
        return redirect()->route('media.index')->with([301, 'response', 'status'=>'failed','message'=>'Error deleting media.']);
    }
}
