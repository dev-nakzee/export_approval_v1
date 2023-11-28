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
use App\Models\Backend\Document;
use DataTables;

class IndustryNotificationController extends Controller
{
    //
    public function index()
    {
        $services = Services::select('service_name', 'service_slug')->get();
        $notices = Notices::select('notice_id', 'notice_title', 'notice_date', 'notice_slug', 'service_slug')
        ->join('services', 'services.service_id', '=', 'notices.service_id')
        ->orderBy('notices.created_at', 'DESC')
        ->get();
        return view('frontend.pages.industry-notification', compact('services', 'notices'));
    }

    public function service(Request $request, $service)
    {
        $notice_service = Services::select('service_id','service_slug')->where('service_slug', $service)->first();
        $services = Services::select('service_name', 'service_slug')->get();
        $notices = Notices::select('notice_id', 'notice_title', 'notice_date', 'notice_slug', 'service_slug')
            ->join('services', 'services.service_id', '=', 'notices.service_id')
            ->where('notices.service_id', $notice_service->service_id)
            ->orderBy('notices.created_at', 'DESC')
            ->get();
        return view('frontend.pages.industry-notice-service', compact('services', 'notices', 'notice_service'));
    }

    public function detail(Request $request, $service, $notice_slug)
    {
        $services = Services::select('service_name', 'service_slug')->get();
        $notice_service = Services::select('service_id','service_slug')->where('service_slug', $service)->first();
        $notice = Notices::where('notice_slug', $notice_slug)->first();
        $document = Document::where('doc_id', $notice->notice_document)->first();
        $media = Media::where('media_id', $notice->media_id)->first();
        return view('frontend.pages.industry-notice-detail', compact('services', 'notice', 'notice_service', 'document', 'media'));
    }
}
