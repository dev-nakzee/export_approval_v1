<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Notices;
use App\Models\Backend\NoticeMap;
use App\Models\Backend\Services;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;
use DataTables;

class IndustryNotificationController extends Controller
{
    //
    public function index()
    {
        $services = Services::get();
        return view('frontend.pages.industry-notification', compact('services'));
    }

    public function show(Request $request)
    {
        if($request->ajax()){
            $data = Notices::select('notice_id', 'notice_title', 'notices.created_at', 'notice_slug', 'service_slug')
            ->join('services', 'services.service_id', '=', 'notices.service_id')
            ->orderBy('notices.created_at', 'DESC')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('notice_title', function($row){
                    $notificationLink = '<a href="'.route('frontend.site.industry-notification.detail', [$row->service_slug, $row->notice_slug]).'">'.$row->notice_title.'</a>';
                    return $notificationLink;
                })
                ->addColumn('notice_date', function($row){
                    $notificationLink = '<a href="'.route('frontend.site.industry-notification.detail', [$row->service_slug, $row->notice_slug]).'">'.$row->created_at.'</a>';
                    return $notificationLink;
                })
                ->rawColumns(['notice_title', 'notice_date'])
                ->escapeColumns([])
                ->make(true);
        }
    }
}
