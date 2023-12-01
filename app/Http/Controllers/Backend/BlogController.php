<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\BlogCategory;
use App\Models\Backend\Blog;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $blog_categories = BlogCategory::all();
        return view('backend.blogs.create', compact('blog_categories'));
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
            'blog_category_id' => 'required|integer',
        ]);
        $data = [
            'blog_title' => $request->name,
            'blog_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'blog_category_id' => $request->blog_category_id,
            'blog_content' => $request->blog_content,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ];

        $blog = Blog::create($data);
        return redirect()->route('blogs.index')->with([200, 'response', 'status'=>'success','message'=>'Blog created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Blog::select('blog_id','blog_title', 'blog_category_name')
                ->join('blog_categories', 'blog_categories.blog_category_id', '=', 'blogs.blog_category_id')
                ->orderBy('blog_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('blog_title', function($row){
                    return $row->blog_title;
                })
                ->addColumn('blog_category_name', function($row){
                    return $row->blog_category_name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('blogs.edit', $row->blog_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('products.delete', $row->blog_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
    public function edit(string $id)
    {
        //
        $blog = Blog::find($id);
        $blog_categories = BlogCategory::all();
        $media = Media::where('media_id', $blog->media_id)->first();
        $blogCategory = BlogCategory::where('blog_category_id', $blog->blog_category_id)->first();
        return view('backend.blogs.edit', compact('blog', 'blog_categories', 'media', 'blogCategory'));  
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
            'blog_category_id' => 'required|integer',
        ]);

        $data = [
            'blog_title' => $request->name,
            'blog_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'blog_category_id' => $request->blog_category_id,
            'blog_content' => $request->blog_content,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ];

        $blog = Blog::where('blog_id', $id)->update($data);
        return redirect()->route('blogs.index')->with([200, 'response', 'status'=>'success','message'=>'Blog updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogs.index')->with([200, 'response', 'status'=>'success','message'=>'Blog deleted successfully.']);
    }
}
