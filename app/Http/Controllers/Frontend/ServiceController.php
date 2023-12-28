<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Services;
use App\Models\Backend\ServiceSection;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use App\Models\Backend\StaticPages;
use App\Models\Backend\StaticPageSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Route;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Services::select('service_name', 'service_slug', 'service_description','img_alt', 'media_path')
        ->join('media', 'services.media_id', 'media.media_id')
        ->where('service_status', 1)
        ->orderBy('service_id', 'asc')
        ->get();
        foreach($services as $key => $value) {
            $services[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $page = StaticPages::where('static_page_id', 7)->first();
        $sections = StaticPageSection::select('static_page_sections.*','media_path')
            ->leftJoin('media', 'static_page_sections.media_id', 'media.media_id')
            ->where('static_page_id', 7)
            ->orderBy('section_order', 'asc')
            ->get();
        foreach($sections as $key => $value) {
            $sections[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $agent = new Agent;
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.services', compact('services', 'page', 'sections', 'agent', 'routeName'));
    }

    //
    public function service($service_slug)
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
        $routeName = Route::currentRouteName();
        return view('frontend.pages.service_details', compact('service', 'sections', 'products', 'agent', 'routeName', 'service_slug'));
    }


}
