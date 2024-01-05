<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Product;
use App\Models\Backend\ProductSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class ProductSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product)
    {
        //
        $product = Product::where('product_id', $product)->first();
        return view('backend.products.sections.index', compact('product'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product)
    {
        //
        $product = Product::where('product_id', $product)->first();;
        return view('backend.products.sections.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'product_section_name' => $request->name,
            'product_section_slug' => $request->slug,
            'product_id' => $product,
            'product_section_content' => $request->product_section_content,
            'product_section_status' => $request->product_section_status,
            'product_section_order' => $request->product_section_order,
        ];
        ProductSection::create($data);
        return redirect()->route('products.sections.index', $product)->with('success', 'Products section created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $product)
    {
        //
        if($request->ajax()){
            $data = ProductSection::where('product_id', $product)
            ->select('product_section_id', 'product_section_name', 'product_id','product_section_status')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product_section_name', function($row){
                    return $row->product_section_name;
                })
                ->addColumn('product_section_status', function($row){
                    $status = "";
                    if($row->product_section_status === 1) {
                        $status = "Active";
                    } else {
                        $status = "Disabled";
                    }
                    return $status;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('products.sections.edit', [$row->product_id, $row->product_section_id]).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('products.sections.delete', [$row->product_id, $row->product_section_id]).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
    public function edit($product, $id)
    {
        //
        $product = Product::where('product_id', $product)->first();
        $productSection = ProductSection::where('product_section_id', $id)->first();
        return view('backend.products.sections.edit', compact('product','productSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product, $id)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'product_section_name' => $request->name,
            'product_section_slug' => $request->slug,
            'product_id' => $product,
            'product_section_content' => $request->product_section_content,
            'product_section_status' => $request->product_section_status,
            'product_section_order' => $request->product_section_order,
        ];
        ProductSection::where('product_section_id', $id)->update($data);
        return redirect()->route('products.sections.index', $product)->with('success', 'Products section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product, $id)
    {
        //
        $productSection = ProductSection::where('product_section_id', $id)->first();
        ProductSection::where('product_section_id', $id)->delete();
        return redirect()->route('products.sections.index', $product)->with('success', 'Products section deleted successfully');
    }
}
