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

class DownloadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.downloads.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.downloads.categories.create');
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
            'download_category' => $request->name,
            'download_category_slug' => $request->slug,
        ];
        DownloadCategory::create($data);
        return redirect()->route('downloads.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Download category created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = DownloadCategory::orderBy('download_category_id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('download_category', function($row){
                    return  $row->download_category;
                })
                ->addColumn('action', function($row){
                    $removeBtn = '<a class="btn btn-outline-info btn-sm" href="'.route("downloads.categories.edit", $row->download_category_id).'"><i class="fa fa-edit"></i></a><a class="btn btn-outline-danger btn-sm" href="'.route("downloads.categories.delete", $row->download_category_id).'"><i class="fa fa-trash-can"></i></a>';
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
    public function edit($id)
    {
        //
        $downloadCategory = DownloadCategory::where('download_category_id', $id)->first();
        return view('backend.downloads.categories.edit', compact('downloadCategory'));
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
            'download_category' => $request->name,
            'download_category_slug' => $request->slug,
        ];
        DownloadCategory::where('download_category_id', $id)->update($data);
        return redirect()->route('downloads.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Download category updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
