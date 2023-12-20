<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Services;
use App\Models\Backend\ServiceSection;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;
use Jenssegers\Agent\Agent;

class ServiceController extends Controller
{
    //
    public function index($service_slug)
    {
        $service = Services::select('services.*', 'media_path')
            ->join('media', 'services.media_id', 'media.media_id')
            ->where('service_slug', $service_slug)
            ->orderBy('service_id', 'desc')
            ->first();
        $service['media_path'] = Storage::url($service['media_path']);

        $products = Product::select('product_category_name','products.product_id', 'products.product_name', 'products.product_slug', 'products.product_compliance')
            ->join('product_categories', 'product_categories.product_category_id', 'products.product_category_id')
            ->where('products.product_service_id', $service->service_id)
            ->orderBy('products.product_category_id')
            ->get();
        $agent = new Agent;
        $sections = ServiceSection::where('service_id', $service->service_id)
            ->orderBy('service_section_order', 'asc')->get();
        return view('frontend.pages.service_details', compact('service', 'sections', 'products', 'agent'));
    }
}
