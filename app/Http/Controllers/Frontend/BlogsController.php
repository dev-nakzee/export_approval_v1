<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Blog;
use App\Models\Backend\BlogCategory;
use App\Models\Backend\StaticPages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Media;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Route;

class BlogsController extends Controller
{
    //
    public function index ()
    {
        //
        $blogs = Blog::select('blogs.*', 'blog_category_name', 'blog_category_slug', 'media_path')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.blog_category_id')
            ->leftJoin('media', 'blogs.media_id', 'media.media_id')
            ->orderBy('blog_id', 'desc')
            ->paginate(6);
        foreach($blogs as $key => $value) {
            $blogs[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $categories = BlogCategory::get();
        $agent = new Agent;
        $page = StaticPages::where('static_page_id', 10)->first();
        $service_slug = '';
        $routeName = Route::currentRouteName();
        return view('frontend.pages.blogs', compact('blogs', 'categories', 'agent', 'page', 'service_slug', 'service_slug', 'routeName'));
    }

    public function category ($category)
    {
        //
        $blogs = Blog::select('blogs.*', 'blog_category_name', 'blog_category_slug', 'media_path')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.blog_category_id')
            ->leftJoin('media', 'blogs.media_id', 'media.media_id')
            ->where('blog_category_slug', $category)
            ->orderBy('blog_id', 'desc')
            ->paginate(6);
        foreach($blogs as $key => $value) {
            $blogs[$key]['media_path'] = Storage::url($value['media_path']);
        }
        $category_name = BlogCategory::where('blog_category_slug', $category)->first();
        $category_slug = $category;
        $categories = BlogCategory::get();
        $agent = new Agent;
        $service_slug = '';
        $routeName = Route::currentRouteName();
        return view('frontend.pages.blog-category', compact('blogs', 'categories', 'category_slug', 'category_name', 'agent', 'service_slug', 'routeName'));
    }

    public function detail ($category, $slug)
    {
        //
        $blog = Blog::select('blogs.*', 'blog_category_name', 'blog_category_name', 'blog_category_slug', 'media_path')
            ->join('blog_categories', 'blogs.blog_category_id', 'blog_categories.blog_category_id')
            ->leftJoin('media', 'blogs.media_id', 'media.media_id')
            ->where('blog_slug', $slug)
            ->first();
        $blog['media_path'] = Storage::url($blog['media_path']);
        $categories = BlogCategory::get();
        $category_slug = $category;
        $agent = new Agent;
        $service_slug = '';
        $routeName = Route::currentRouteName();
        return view('frontend.pages.blog_details', compact('blog', 'categories', 'category_slug', 'agent', 'service_slug', 'routeName'));
    }
}
