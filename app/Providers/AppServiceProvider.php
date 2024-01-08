<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Module;
use App\Models\Backend\SubModule;
use App\Models\Backend\Services;
use App\Models\Countries;
use App\Models\Backend\Clients;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\URL;

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
        if (app()->environment('remote') || env('FORCE_HTTPS',false)) {
            URL::forceScheme('https');
        }

        view()->composer('backend.layouts.partials.sidebar', function($view){
            $modules = Module::where('enabled', 1)->orderBy('sort_order')->get();
            $submodules = SubModule::where('enabled',1)->orderBy('sort_order')->get();
            $view->with(['modules' => $modules, 'submodules' => $submodules]);
        });

        view()->composer('frontend.layouts.master', function($view){
            $services = Services::select('service_id','service_name', 'service_slug', 'img_alt', 'media_path')
            ->join('media', 'services.media_id', 'media.media_id')
            ->where('service_status', 1)
            ->orderBy('service_order', 'asc')
            ->get();

            $agent = new Agent;
            $view->with(['services' => $services, 'agent' => $agent]);
        });
        view()->composer('frontend.components.clients', function ($view) {
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

            $view->with(['clients' => $clients]);
        });
        view()->composer('frontend.components.downloadbrochure', function ($view) {
            $countries = Countries::select('id','name', 'iso', 'iso3', 'phonecode')->get();
            $services = Services::select('service_id','service_name')
            ->orderBy('service_order', 'asc')
            ->get();

            $view->with(['services' => $services, 'countries' => $countries]);
        });
        Paginator::useBootstrap();
    }
}
