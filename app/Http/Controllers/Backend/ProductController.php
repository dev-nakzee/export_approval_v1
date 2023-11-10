<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\ProductCategory;
use App\Models\Backend\Product;
use App\Models\Backend\Services;
use App\Models\Backend\Document;
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
        $services = Services::select('service_id', 'service_name')
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
    public function store(Request $request): JsonResponse
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'service_id' => 'required|integer',
            'product_category_id' => 'required|integer',
        ]);
        dd($validate);
        $product_information = null;
        $product_guidelines = null;
        if($request->hasFile('product_information')) {
            $file = $request->file('product_information');
            $fullName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $onlyName = explode('.'.$extension, $fullName);
            $fileName = str_replace(" ","-",$onlyName[0]).'-'.time().'.'.$file->getClientOriginalExtension();
            $data = [
                'document' => $file->getClientOriginalName(),
                'doc_path' => 'documents/'.$fileName,
                'doc_type' => $file->getMimeType(),
                'doc_size' => $file->getSize(),
            ];
            $document = Document::create($data);
            $product_information = $document->id;
            Storage::disk('public')->put('documents/' . $fileName, File::get($file));
        }
        if($request->hasFile('product_guidelines')) {
            $file = $request->file('product_guidelines');
            $fullName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $onlyName = explode('.'.$extension, $fullName);
            $fileName = str_replace(" ","-",$onlyName[0]).'-'.time().'.'.$file->getClientOriginalExtension();
            $data = [
                'document' => $file->getClientOriginalName(),
                'doc_path' => 'documents/'.$fileName,
                'doc_type' => $file->getMimeType(),
                'doc_size' => $file->getSize(),
            ];
            $document = Document::create($data);
            $product_guidelines = $document->id;
            Storage::disk('public')->put('documents/' . $fileName, File::get($file));
        }
        $productData = [
            'product_name' => $request->name,
            'product_slug' => $request->slug,
            'service_id' => $request->service_id,
            'product_category_id' => $request->product_category_id,
            'product_content' => $request->product_content,
            'information' => $product_information,
            'guidelines' => $product_guidelines,
            'product_status' => 1,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ];
        $product = Product::create($productData);
        return response()->json(['success'=> $product->product_name]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Products::select('product_id', 'product_name', 'product_category_name', 'service_name','product_status')
                ->join('product_categories', 'product_categories.product_category_id', 'products.product_category_id')
                ->join('services', 'services.service_id', 'products.service_id')
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
                    $actionBtn = '<a href="'.route('products.edit', $row->product_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('products.edit', $row->product_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
    public function destroy(string $id)
    {
        //
    }
}
