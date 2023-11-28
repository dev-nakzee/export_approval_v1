<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Services;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;

class IndustryNotificationController extends Controller
{
    //
    public function index()
    {
        $services = Services::get();
        return view('frontend.pages.industry-notification', compact('services'));
    }
}
