<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Product;
use App\Models\Backend\Services;
use App\Models\Backend\ServiceSection;
use App\Models\Backend\ProductCategory;
use App\Models\Backend\ProductSection;
use App\Models\Backend\Notices;
use App\Models\Backend\Downloads;
use App\Models\Backend\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SearchController extends Controller
{
    //
    public function index (Request $request): Response
    {
        $keywords = $request->search_keywords;

        // Services
        $service_id = [];
        $service_table = Services::select('service_id')
            ->where('service_name', 'LIKE', "%{$keywords}%")
            ->orWhere('seo_keywords', 'LIKE', "%{$keywords}%")
            ->get();
        if ($service_table) {
            foreach ($service_table as $service) {
                array_push($service_id, $service->service_id);
            }
        }

        $service_section_table = ServiceSection::select('service_id')
            ->where('service_section_name', 'LIKE', "%{$keywords}%")
            ->orWhere('service_section_content', 'LIKE', "%{$keywords}%")
            ->get();
        if ($service_section_table){
            foreach ($service_section_table as $service) {
                array_push($service_id, $service->service_id);
            }
        }
        
        // Products
        $product_id = [];
        $product_table = Product::select('product_id')
            ->where('product_name', 'LIKE', "%{$keywords}%")
            ->orWhere('product_compliance', 'LIKE', "%{$keywords}%")
            ->orWhere('product_content', 'LIKE', "%{$keywords}%")
            ->orWhere('seo_keywords', 'LIKE', "%{$keywords}%")
            ->get();
        if($product_table) {
            foreach($product_table as $product) {
                array_push($product_id, $product->product_id);
            }
        }

        $product_section_table = ProductSection::select('product_id')
            ->where('product_section_name', 'LIKE', "%{$keywords}%")
            ->orWhere('product_section_content', 'LIKE', "%{$keywords}%")
            ->get();
        if($product_section_table) {
            foreach($product_section_table as $product) {
                array_push($product_id, $product->product_id);
            }
        }

        // Notices
        $notice_id = [];
        $notice_table = Notices::select('notice_id')
            ->where('notice_title', 'LIKE', "%{$keywords}%")
            ->orWhere('notice_content', 'LIKE', "%{$keywords}%")
            ->orWhere('seo_keywords', 'LIKE', "%{$keywords}%")
            ->get();
        if($notice_table) {
            foreach($notice_table as $notice) {
                array_push($notice_id, $notice->notice_id);
            }
        }


        $services = Services::select('service_id', 'service_name', 'service_slug')
            ->whereIn('service_id', $service_id)
            ->get();
        $products = Product::select('product_id', 'product_name', 'product_slug')
            ->whereIn('product_id', $product_id)
            ->get();
        $notices = Notices::select('notice_id', 'notice_title', 'notice_slug', 'service_slug')
            ->join('services', 'services.service_id', 'notices.service_id')
            ->whereIn('notice_id', $notice_id)
            ->get();
        $html = '<ul class="uk-list uk-list-collapse uk-list-striped">';
        foreach ($services as $service) {
            $html = $html. '<li><a href="'.route('frontend.site.service', $service->service_slug).'">Service - '.$service->service_name.'</a></li>';
        }
        foreach ($products as $product) {
            $html = $html. '<li><a href="'.route('frontend.site.product', $product->product_slug).'">Product - '.$product->product_name.'</a></li>';
        }
        foreach ($notices as $notice) {
            $html = $html. '<li><a href="'.route('frontend.site.service', $notice->notice_slug).'">Notice - '.$notice->notice_title.'</a></li>';
        }
        $html = $html.'</ul>';
        return response($html);
    }
}
