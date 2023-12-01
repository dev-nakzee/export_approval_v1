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

class StaticPageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page)
    {
        //
        $static_page = StaticPages::where('static_page_id', $page)->first();
        return view('backend.static_pages.sections.index', compact('static_page'));
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
    public function show(Request $request, $page)
    {
        //
        if($request->ajax()){
            $data = StaticPageSection::where('static_page_id', $page)
            ->select('static_page_section_id', 'static_page_id', 'section_name', 'section_status')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('section_name', function($row){
                    return $row->section_name;
                })
                ->addColumn('section_status', function($row){
                    $status = "";
                    if($row->section_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('static.pages.sections.edit', [$row->static_page_id, $row->static_page_section_id]).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a>';
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
    public function edit($page, $id)
    {
        //
        $static_page = StaticPages::where('static_page_id', $page)->first();
        $static_page_section = StaticPageSection::select('static_page_sections.*', 'media_name')
            ->where('static_page_section_id', $id)
            ->leftJoin('media', 'static_page_sections.media_id', '=', 'media.media_id')
            ->first();
        return view('backend.static_pages.sections.edit', compact('static_page', 'static_page_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $page, $id): RedirectResponse
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $data = [
            'static_page_id' => $page,
            'section_name' => $request->name,
            'section_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'section_tagline' => $request->section_tagline,
            'section_description' => $request->section_description,
            'section_content' => $request->section_content,
            'section_status' => $request->section_status,
            'section_order' => $request->section_order,
            'section_color' => $request->section_color,
        ];
        StaticPageSection::where('static_page_section_id', $id)->update($data);
        return redirect()->route('static.pages.sections.index', $page)->with('success', 'Static Page Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
