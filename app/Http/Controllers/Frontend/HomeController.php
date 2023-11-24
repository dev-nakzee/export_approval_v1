<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Services;
use App\Models\Backend\StaticPages;
use App\Models\Backend\StaticPageSection;
use App\Models\Backend\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;

class HomeController extends Controller
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
        $sections = StaticPageSection::select('static_page_sections.*','media_path')
            ->leftJoin('media', 'static_page_sections.media_id', 'media.media_id')
            ->where('static_page_id', 1)
            ->orderBy('section_order', 'asc')
            ->get();
        $blogs = Blog::select('blogs.*', 'blog_categories.blog_category_slug', 'media_path')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.blog_category_id')
            ->leftJoin('media', 'blogs.media_id', 'media.media_id')
            ->orderBy('blog_id', 'desc')
            ->limit(5)
            ->get();
        foreach($blogs as $key => $value) {
            $blogs[$key]['media_path'] = Storage::url($value['media_path']);
        }
        return view('frontend.pages.home', compact('services', 'sections', 'blogs'));
    }
}
