<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\ProductCategory;
use App\Models\Backend\Product;
use App\Models\Backend\Services;
use App\Models\Backend\Document;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Services::select('service_id', 'service_name', 'service_compliance')
            ->orderBy('service_id', 'asc')
            ->get();
        $categories = ProductCategory::select('product_category_id', 'product_category_name')
            ->orderBy('product_category_id', 'asc')
            ->get();
        return view('backend.products.create', compact('services', 'categories'));
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
        $product_compliance[] = $request->product_compliance;
        $product_compliance = json_encode($product_compliance);
        $data = [
            'product_name' => $request->name,
            'product_slug' => $request->slug,
            'product_service_id' => $request->product_service_id,
            'product_category_id' => $request->product_category_id,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'product_compliance' => $product_compliance,
            'product_content' => $request->product_content,
            'information' => $request->infoDocument_id,
            'guidelines' => $request->guideDocument_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'product_status' => 1,
            'product_order' => 0,
        ];
        Product::create($data);
        return redirect()->route('products.index')->with([200, 'response', 'status'=>'success','message'=>'Product created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Product::join('product_categories', 'product_categories.product_category_id', 'products.product_category_id')
                ->join('services', 'services.service_id', 'products.product_service_id')
                ->select('product_id', 'product_name', 'service_name', 'product_category_name', 'product_status')
                ->orderBy('product_id', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product_name', function($row){
                    return $row->product_name;
                })
                ->addColumn('product_category_name', function($row){
                    return $row->product_category_name;
                })
                ->addColumn('service_name', function($row){
                    return $row->service_name;
                })
                ->addColumn('product_status', function($row){
                    $status = "";
                    if($row->product_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('products.edit', $row->product_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('products.delete', $row->product_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a><a href="'.route('products.sections.index', $row->product_id).'" class="btn btn-outline-info btn-sm py-0 px-1"><i class="fa-light fa-list-dropdown"></i></a>';
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
        $product = Product::where('product_id', $id)->first();
        $service = Services::select('service_id', 'service_name', 'service_compliance')
            ->where('service_id', $product->product_service_id)
            ->first();
        $category = ProductCategory::select('product_category_id', 'product_category_name')
            ->where('product_category_id', $product->product_category_id)
            ->first();
        $image = Media::select('media_id', 'media_name')
            ->where('media_id', $product->media_id)
            ->first();
        $infoDocument = Document::select('doc_id', 'document')
            ->where('doc_id', $product->information)
            ->first();
        $guideDocument = Document::select('doc_id', 'document')
            ->where('doc_id', $product->guidelines)
            ->first();
        $services = Services::select('service_id', 'service_name')
        ->orderBy('service_id', 'asc')
        ->get();
        $categories = ProductCategory::select('product_category_id', 'product_category_name')
        ->orderBy('product_category_id', 'asc')
        ->get();
        return view('backend.products.edit', compact('product', 'services', 'categories', 'service', 'category', 'image', 'infoDocument', 'guideDocument'));
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
        $product_compliance[] = $request->product_compliance;
        $product_compliance = json_encode($product_compliance);
        $data = [
            'product_name' => $request->name,
            'product_slug' => $request->slug,
            'product_service_id' => $request->product_service_id,
            'product_category_id' => $request->product_category_id,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'product_compliance' => $product_compliance,
            'product_content' => $request->product_content,
            'information' => $request->infoDocument_id,
            'guidelines' => $request->guideDocument_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'product_status' => 1,
            'product_order' => 0,
        ];
        Product::where('product_id', $id)->update($data);
        return redirect()->route('products.index')->with([200, 'response', 'status'=>'success','message'=>'Product updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Product::where('product_id', $id)->delete();
        return redirect()->route('products.index')->with([200, 'response', 'status'=>'success','message'=>'Product deleted successfully.']);
    }
}
