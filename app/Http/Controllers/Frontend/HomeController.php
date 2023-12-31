<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Services;
use App\Models\Backend\StaticPages;
use App\Models\Backend\StaticPageSection;
use App\Models\Backend\Blog;
use App\Models\Backend\Product;
use App\Models\Backend\Document;
use App\Models\Backend\Clients;
use App\Models\Backend\DownloadCategory;
use App\Models\Backend\Downloads;
use App\Models\Backend\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;
use App\Models\Countries;
use App\Models\Backend\GalleryImages;
use App\Models\Backend\Holidays;
use Carbon\Carbon;
use PDF;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Route;

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
        foreach($sections as $key => $value) {
            $sections[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $blogs = Blog::select('blogs.*', 'blog_categories.blog_category_slug', 'media_path')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.blog_category_id')
            ->leftJoin('media', 'blogs.media_id', 'media.media_id')
            ->orderBy('blog_id', 'desc')
            ->limit(5)
            ->get();
        foreach($blogs as $key => $value) {
            $blogs[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $page = StaticPages::where('static_page_id', 1)->first();
        $agent = new Agent;
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.home', compact('services', 'sections', 'blogs', 'agent', 'page', 'routeName', 'service_slug'));
    }

    public function about()
    {
        $static_page = StaticPages::select('static_pages.*', 'media_path')
            ->leftJoin('media', 'static_pages.media_id', 'media.media_id')
            ->where('page_slug', 'about-us')
            ->first();
        $static_page['media_path'] = Storage::url($static_page['media_path']);
        $sections = StaticPageSection::select('static_page_sections.*','media_path')
            ->leftJoin('media', 'static_page_sections.media_id', 'media.media_id')
            ->where('static_page_id', 2)
            ->where('section_status', 1)
            ->orderBy('section_order', 'asc')
            ->get();
        foreach($sections as $key => $value) {
            $sections[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $agent = new Agent;
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.about-us', compact('sections', 'static_page', 'agent', 'routeName'));
    }

    public function downloads() {
        $services = Product::select('services.service_name', 'services.service_slug')
            ->join('services', 'products.product_service_id','services.service_id')
            ->where('information', '!=', null)
            ->orWhere('guidelines', '!=', null)
            ->distinct()
            ->get();
        $downloads = Product::select('product_id', 'product_name', DB::raw('(SELECT doc_path FROM documents WHERE doc_id=information) AS information'), DB::raw('(SELECT doc_path FROM documents WHERE doc_id=guidelines) AS guidelines'))
            ->where('information', '!=', null)
            ->orWhere('guidelines', '!=', null)
            ->orderBy('product_id', 'asc')
            ->get();
        foreach($downloads as $key => $value) {
            if($downloads[$key]['information'] != null) {
                $downloads[$key]['information'] = Storage::url($value['information']);
            }
            if($downloads[$key]['guidelines'] != null) {
                $downloads[$key]['guidelines'] = Storage::url($value['guidelines']);
            }
        }
        $downloadCategory = DownloadCategory::orderBy('download_category_id', 'asc')->get();

        $otherDownload = Downloads::select('downloads.*', 'doc_path as downloads')
            ->join('documents', 'documents.doc_id', 'downloads.download_document')
            ->get();
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 6)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.downloads', compact('services', 'downloads', 'downloadCategory', 'otherDownload', 'agent', 'page', 'routeName', 'service_slug'));
    }

    public function download_service($service_slug) {
        $services = Product::select('services.service_name', 'services.service_slug')
        ->join('services', 'products.product_service_id','services.service_id')
        ->where('information', '!=', null)
        ->orWhere('guidelines', '!=', null)
        ->distinct()
        ->get();
        $serviceDownload = Services::select('services.service_id', 'services.service_name', 'services.service_slug')->where('service_slug', $service_slug)->first();
        $downloads = Product::select('product_id', 'product_name', DB::raw('(SELECT doc_path FROM documents WHERE doc_id=information) AS information'), DB::raw('(SELECT doc_path FROM documents WHERE doc_id=guidelines) AS guidelines'))
            ->where('product_service_id', $serviceDownload['service_id'])
            ->where('information', '!=', null)
            ->orWhere('guidelines', '!=', null)
            ->orderBy('product_id', 'asc')
            ->get();
        foreach($downloads as $key => $value) {
            if($downloads[$key]['information'] != null) {
                $downloads[$key]['information'] = Storage::url($value['information']);
            }
            if($downloads[$key]['guidelines'] != null) {
                $downloads[$key]['guidelines'] = Storage::url($value['guidelines']);
            }
        }
        $downloadCategory = DownloadCategory::orderBy('download_category_id', 'asc')->get();
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 6)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.download_service', compact('services', 'downloads', 'downloadCategory', 'serviceDownload','agent', 'page', 'routeName', 'service_slug'));
    }

    public function download_category($category_slug) {

        $services = Product::select('services.service_name', 'services.service_slug')
        ->join('services', 'products.product_service_id','services.service_id')
        ->where('information', '!=', null)
        ->orWhere('guidelines', '!=', null)
        ->distinct()
        ->get();
        $categoryDownload = DownloadCategory::select('download_category_id', 'download_category','download_category_slug')->where('download_category_slug', $category_slug)->first();
      
        $downloadCategory = DownloadCategory::orderBy('download_category_id', 'asc')->get();

        $downloads = Downloads::select('downloads.*', 'doc_path')
        ->join('documents', 'documents.doc_id', 'downloads.download_document')
        ->where('download_category_id', $categoryDownload->download_category_id)
        ->get();
        foreach($downloads as $key => $value) {
            $downloads[$key]['doc_path'] = Storage::url($value['doc_path']);
        }
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 6)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.download_category', compact('services', 'downloads', 'downloadCategory', 'categoryDownload', 'agent', 'page', 'routeName', 'service_slug'));
    }

    public function media_cover() {
        $news = News::select('news.*', 'media_path')
            ->join('media', 'media.media_id', 'news.media_id')
            ->get();
        foreach ($news as $key => $value) {
            $news[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 4)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        // dd($news);
        return view('frontend.pages.media_coverage', compact('news', 'agent', 'page', 'routeName', 'service_slug'));
    }

    public function gallery()
    {
        $images = GalleryImages::select('gallery_images.*', 'media_path')
            ->join('media', 'media.media_id', 'gallery_images.media_id')
            ->get();
        foreach ($images as $key => $value) {
            $images[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 5)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.gallery', compact('images', 'agent', 'page', 'routeName', 'service_slug'));
    }

    public function contact() {
        $countries = Countries::select('id','name', 'iso', 'iso3', 'phonecode')->get();
        $sections = StaticPageSection::select('static_page_sections.*','media_path')
            ->leftJoin('media', 'static_page_sections.media_id', 'media.media_id')
            ->where('static_page_id', 3)
            ->where('section_status', 1)
            ->orderBy('section_order', 'asc')
            ->get();
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 3)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.contact', compact('sections', 'countries', 'agent', 'page', 'routeName', 'service_slug'));
    }

    public function holidays() {
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 8)->first();
        $routeName = Route::currentRouteName();
        $service_slug = '';
        return view('frontend.pages.holiday-list', compact('agent', 'page', 'routeName', 'service_slug'));
    }

    public function calendar($year) {
        $pdf = PDF::loadView('frontend.pdf.calender', compact(['year']));
        return $pdf->download('Brand Liaison Holiday list-'.$year.'.pdf');
    }
}
