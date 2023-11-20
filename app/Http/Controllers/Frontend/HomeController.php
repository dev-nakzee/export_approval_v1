<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;

class HomeController extends Controller
{
    //
    public function index()
    {
        $services = Services::select('service_name', 'service_slug', 'img_alt', 'media_path')
            ->join('media', 'services.media_id', 'media.media_id')
            ->where('service_status', 1)
            ->orderBy('service_id', 'asc')
            ->get();
        foreach($services as $key => $value) {
            $services[$key]['media_path'] = Storage::url($value['media_path']);
        }
        return view('frontend.pages.home', compact('services'));
    }
}
