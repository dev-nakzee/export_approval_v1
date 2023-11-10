<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.products.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.products.categories.create');
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
            'product_category_name' => $request->name,
            'product_category_slug' => $request->slug,
            'product_category_content' => $request->product_category_content,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'product_category_status' => 1,
        ];
        $productCategory = ProductCategory::create($data);
        return redirect()->route('products.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Product category created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = ProductCategory::orderBy('product_category_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product_category_name', function($row){
                    return $row->product_category_name;
                })
                ->addColumn('product_category_status', function($row){
                    $status = "";
                    if($row->product_category_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('products.categories.edit', $row->product_category_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('products.categories.edit', $row->product_category_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
        $productCategory = ProductCategory::where('product_category_id', $id)->first();
        return view('backend.products.categories.edit', compact('productCategory'));
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
            'product_category_name' => $request->name,
            'product_category_slug' => $request->slug,
            'product_category_content' => $request->product_category_content,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'product_category_status' => 1,
        ];
        $productCategory = ProductCategory::where('product_category_id', $id)->update($data);
        return redirect()->route('products.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Product category updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $productCategory = ProductCategory::where('product_category_id', $id)->delete();
        return redirect()->route('products.categories.index')->with([200, 'response', 'status'=>'success','message'=>'Product category deleted successfully.']);
    }
}