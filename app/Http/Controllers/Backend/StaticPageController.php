<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\StaticPages;
use App\Models\Backend\StaticPageSection;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.static_pages.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = StaticPages::select('static_page_id', 'page_name', 'page_status')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('page_name', function($row){
                    return $row->page_name;
                })
                ->addColumn('page_status', function($row){
                    $status = "";
                    if($row->page_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('static.pages.edit', $row->static_page_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('static.pages.sections.index', $row->static_page_id).'" class="btn btn-outline-info btn-sm py-0 px-1"><i class="fa-light fa-list-dropdown"></i></a>';
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
        $static_page = StaticPages::select('static_pages.*', 'media_name', 'media_path')
            ->leftJoin('media', 'static_pages.media_id', 'media.media_id')
            ->where('static_page_id', $id)->first();
        return view('backend.static_pages.edit', compact('static_page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $data = [
            'page_name' => $request->name,
            'page_slug' => $request->slug,
            'tagline' => $request->tagline,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'page_status' => $request->status,
        ];
        $static_page = StaticPages::where('static_page_id', $id)->update($data);
        return redirect()->route('static.pages.index')->with('success', 'Static Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
