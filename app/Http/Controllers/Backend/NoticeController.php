<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Backend\Notices;
use App\Models\Backend\NoticeMap;
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

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Services::select('service_id', 'service_name')
            ->orderBy('service_id', 'asc')
            ->get();
        $products = Product::select('product_id', 'product_name')
            ->orderBy('product_id', 'asc')
            ->get();
        return view('backend.notices.index');
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
        $products = Product::select('product_id', 'product_name')
            ->orderBy('product_id', 'asc')
            ->get();
        return view('backend.notices.create', compact('services', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validate = Validator::make($request->all(), [
            'notice_title' => 'required',
            'notice_slug' => 'required',
        ]);
        $data = [
            'notice_title' => $request->name,
            'notice_date' => $request->notice_date
            'notice_slug' => $request->slug,
            'notice_content' => $request->notice_content,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'notice_document' => $request->noticeDocument_id,
            'service_id' => $request->service_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'notice_status' => 1,
        ];
        $notice_id = Notices::insertGetId($data);
        if($request->products) {
            foreach ($request->products as $product_id) {
                NoticeMap::create([
                    'notice_id' => $notice_id,
                    'notice_product_id' => $product_id,
                ]);
            }
        }
        return redirect()->route('notices.index')->with([200, 'response', 'status'=>'success','message'=>'Notice created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Notices::select('notice_id', 'notice_title', 'notice_date', 'service_name')
                ->join('services', 'services.service_id', '=', 'notices.service_id')
                ->orderBy('notices.created_at', 'DESC')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('notice_title', function($row){
                    return $row->notice_title;
                })
                ->addColumn('service_name', function($row){
                    return $row->service_name;
                })
                ->addColumn('notice_date', function($row){
                    return $row->notice_date;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('notices.edit', $row->notice_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('notices.delete', $row->notice_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
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
        $notice = Notices::where('notice_id', $id)->first();
        $services = Services::select('service_id', 'service_name')
            ->orderBy('service_id', 'asc')
            ->get();
        $products = Product::select('product_id', 'product_name')
            ->orderBy('product_id', 'asc')
            ->get();
        $noticeMap = NoticeMap::select('notice_product_id', 'product_name')
            ->join('products', 'products.product_id', '=', 'notice_maps.notice_product_id')
            ->where('notice_id', $id)->get();
        $noticeDocument = Document::select('doc_id', 'document')
            ->where('doc_id', $notice->notice_document)
            ->first();
        $noticeMedia = Media::select('media_id', 'media_name')
            ->where('media_id', $notice->media_id)
            ->first();
        $noticeService = Services::select('service_id', 'service_name')
            ->where('service_id', $notice->service_id)
            ->first();
        return view('backend.notices.edit', compact('notice', 'services', 'products', 'noticeMap', 'noticeDocument', 'noticeMedia', 'noticeService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $validate = Validator::make($request->all(), [
            'notice_title' => 'required',
        ]);
        $data = [
            'notice_title' => $request->name,
            'notice_date' => $request->notice_date
            'notice_slug' => $request->slug,
            'notice_content' => $request->notice_content,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'notice_document' => $request->noticeDocument_id,
            'service_id' => $request->service_id,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
            'notice_status' => 1,
        ];
        Notices::where('notice_id', $id)->update($data);
        NoticeMap::where('notice_id', $id)->delete();
        if($request->products) {
            foreach ($request->products as $product_id) {
                NoticeMap::create([
                    'notice_id' => $notice_id,
                    'notice_product_id' => $product_id,
                ]);
            }
        }
        return redirect()->route('notices.index')->with([200, 'response', 'status'=>'success','message'=>'Notice updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Notices::where('notice_id', $id)->delete();
        NoticeMap::where('notice_id', $id)->delete();
        return redirect()->route('notices.index')->with([200, 'response', 'status'=>'success','message'=>'Notice deleted successfully.']);
    }
}
