<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Testimonials;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'testimonial_name' => $request->name,
            'testimonial_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'testimonial_designation' => $request->testimonial_designation,
            'testimonial_company' => $request->testimonial_company,
            'testimonial_content' => $request->testimonial_content,
        ];
        Testimonials::create($data);
        return redirect()->route('testimonials.index')->with([200, 'response', 'status'=>'success','message'=>'Testimonial created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Testimonials::orderBy('testimonial_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('testimonial_name', function($row){
                    return $row->testimonial_name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('testimonials.edit', $row->testimonial_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('testimonials.delete', $row->testimonial_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
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
        $testimonial = Testimonials::where('testimonial_id', $id)->first();
        $media = Media::where('media_id', $testimonial->media_id)->first();
        return view('backend.testimonials.edit', compact('testimonial', 'media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'testimonial_name' => $request->name,
            'testimonial_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'testimonial_designation' => $request->testimonial_designation,
            'testimonial_company' => $request->testimonial_company,
            'testimonial_content' => $request->testimonial_content,
        ];
        Testimonials::where('testimonial_id', $id)->update($data);
        return redirect()->route('testimonials.index')->with([200, 'response', 'status'=>'success','message'=>'Testimonial updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $testimonial = Testimonials::find($id);
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with([200, 'response', 'status'=>'success','message'=>'Testimonial deleted successfully.']);
    }
}
