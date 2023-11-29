<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Module;
use App\Models\Backend\SubModule;
use App\Models\Backend\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer('backend.layouts.partials.sidebar', function($view){
            $modules = Module::where('enabled', 1)->orderBy('sort_order')->get();
            $submodules = SubModule::where('enabled',1)->orderBy('sort_order')->get();
            $view->with(['modules' => $modules, 'submodules' => $submodules]);
        });

        view()->composer('frontend.layouts.master', function($view){
            $services = Services::select('service_name', 'service_slug', 'img_alt', 'media_path')
            ->join('media', 'services.media_id', 'media.media_id')
            ->where('service_status', 1)
            ->orderBy('service_order', 'asc')
            ->get();

            $view->with(['services' => $services]);
        });
        Paginator::useBootstrap();
    }
}
