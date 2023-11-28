<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Module;
use App\Models\Backend\SubModule;
use App\Models\Backend\Services;
use App\Models\Backend\Clients;
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
            $clients = Clients::select('client_name', 'client_slug', 'img_alt', 'media_path')
            ->leftJoin('media', 'clients.media_id', 'media.media_id')
            ->orderBy('client_id', 'asc')
            ->limit(12)
            ->get();
            foreach ($clients as $client)
            {
                if($client['media_path'] != null) {
                    $client['media_path'] = Storage::url($client['media_path']);
                }
            }
            $view->with(['services' => $services, 'clients' => $clients]);
        });
        Paginator::useBootstrap();
    }
}
