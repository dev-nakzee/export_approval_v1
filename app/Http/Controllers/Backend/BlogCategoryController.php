<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\BlogCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.blogs.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.blogs.categories.create');
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
            'blog_category_name' => $request->name,
            'blog_category_slug' => $request->slug,
            'blog_category_description' => $request->blog_category_content,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ];
        BlogCategory::create($data);
        return redirect()->route('blogs.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Blog category created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = BlogCategory::orderBy('blog_category_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('blog_category_name', function($row){
                    return $row->blog_category_name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('blogs.categories.edit', $row->blog_category_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('blogs.categories.delete', $row->blog_category_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
        $blogCategory = BlogCategory::find($id);
        return view('backend.blogs.categories.edit', compact('blogCategory'));
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
            'blog_category_name' => $request->name,
            'blog_category_slug' => $request->slug,
            'blog_category_description' => $request->blog_category_content,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ];
        BlogCategory::where('blog_category_id', $id)->update($data);
        return redirect()->route('blogs.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Blog category updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();
        return redirect()->route('blogs.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Blog category deleted successfully.']);
    }
}
