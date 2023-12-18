<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\GalleryImages;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.gallery.images.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.gallery.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
        ]);
        $data = [
            'gallery_image_title' => $request->name,
            'gallery_image_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
        ];
        GalleryImages::create($data);
        return redirect()->route('gallery.images.index')->with([200, 'response', 'status'=>'success','message'=>'Gallery Image added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = GalleryImages::orderBy('gallery_image_id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('gallery_image_title', function($row){
                    return $row->gallery_image_title;
                })
                ->addColumn('action', function($row){
                    $removeBtn = '<a class="btn btn-outline-primary btn-sm" href="'.route("gallery.images.edit", $row->gallery_image_id).'"><i class="fa fa-edit"></i></a>&nbsp;<a class="btn btn-outline-danger btn-sm" href="'.route("gallery.images.delete", $row->gallery_image_id).'"><i class="fa fa-trash-can"></i></a>';
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
        $galleryImage = GalleryImages::select('gallery-images.*', 'media.media_name')
            ->where('gallery_image_id', $id)
            ->join('media', 'media.media_id', 'gallery_images.media_id')
            ->first();
        return view('backend.gallery.images.edit', compact('galleryImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
        ]);
        $data = [
            'gallery_image_title' => $request->name,
            'gallery_image_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
        ];
        GalleryImages::where('gallery_image_id', $id)->update($data);
        return redirect()->route('gallery.images.index')->with([200, 'response', 'status'=>'success','message'=>'Gallery Image updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
