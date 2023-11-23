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

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($service, $slug)
    {
        //
        $product = Product::select('products.*', 'media_path')
            ->leftJoin('media', 'products.media_id', 'media.media_id')
            ->where('product_slug', $slug)
            ->first();
        $product['media_path'] = Storage::url($product['media_path']);
        $service = Services::select('services.*', 'media_path')
            ->join('media', 'services.media_id', 'media.media_id')
            ->where('service_id', $product->product_service_id)
            ->first();
        $service['media_path'] = Storage::url($service['media_path']);
        return view('frontend.pages.product_details', compact('product', 'service'));
    }
}
