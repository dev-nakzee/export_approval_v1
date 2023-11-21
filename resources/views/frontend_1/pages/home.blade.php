@extends('frontend.layouts.master', ['pages' => 'Home'])
@section('seo')
<title>Home</title>
<meta name="description" content="">
<meta name="keywords" content="">
@endsection
@section('content')
<div class="d-flex section-one">
    <div class="container">
        <div class="container row h-100">
            <div class="col-md-6 pt-3">
                <p class="banner-text">Are you Planning to<br>
                <span class="banner-heading-1">Export your Product to India?</span><br>
                <span class="banner-text-1">Get your Product Approvel for Indian Market fast & Economical way.<span></p>
                <p><span class="banner-heading-2">Find the export compliance for India</span></p>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-regular fa-search"></i></span>
                    <input type="text" class="form-control form-control-lg" aria-label="Dollar amount (with dot and two decimal places)">
                    <button type="button" class="btn btn-light">Search</button>
                </div>
                <div class="banner-image-links pt-4">
                    @if($services)
                    @foreach($services as $service)
                    <a class="banner-img-service"  href="{{route('frontend.site.service', $service->service_slug)}}">
                        <div class="banner-img align-middle">
                            <img class="align-middle" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                        </div>
                        <div class="banner-img-text text-center">
                            <span class="banner-img-h3">{{$service->service_name}}</span><br>
                            <span class="banner-img-p">About {{$service->service_name}}</span>
                        </div>
                    </a>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="{{asset('frontend/images/indiamap.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<div class="container section-two py-5">
    <div class="section-two-heading text-center">
        <h3>
            Mandatory Certification for your Products
        </h3>
        <span>Get your Product Approvel for the Indian Market fast and economical way.</span>
        <p class="px-4">Get your Product Approved for the Indian Market fast and economical way. Get your Product Approved for the Indian
            Market fast and economical way. Get your Product Approved for the Indian Market fast and economical way. Get your
            Product Approved for the Indian Market fast and economical way. Get your Product Approved for the Indian Market fast and
            economical way.</p>
    </div>
    <div class="row d-flex">
        @if($services)
        @foreach($services as $service)
        <div class="col-md-3 mandatory-list pt-3">
            <div class="mandatory-list-wrapper">
                <div class="mandatory-list-img align-middle">
                    <img class="align-middle" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                </div>
                <div class="mandatory-list-text text-center">
                    <span class="mandatory-list-h3">{{$service->service_name}}</span><br>
                    <a class="mandatory-list-p" href="{{route('frontend.site.service', $service->service_slug)}}">{{$service->service_name}} Product list</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
<div class="container-fuild section-three py-5">
    <div class="section-three-heading text-center">
        <h3>
            Export Approval is Powerd by Brand Liaison
        </h3>
        <span>Get your Product Approvel for the Indian Market fast and economical way. (tagline)</span>
        <p>Get your Product Approved for the Indian Market fast and economical way. Get your Product Approved for the Indian
            Market fast and economical way. Get your Product Approved for the Indian Market fast and economical way. Get your
            Product Approved for the Indian Market fast and economical way. Get your Product Approved for the Indian Market fast and
            economical way.</p>
    </div>
    <div class="row container">
        <div class="col-md-7">
            <p>Get your Product Approved for the Indian Market fast and economical way. Get your Product Approved for the Indian
                Market fast and economical way. Get your Product Approved for the Indian Market fast and economical way. Get your
                Product Approved for the Indian Market fast and economical way. Get your Product Approved for the Indian Market fast and
                economical way.</p>
        </div>
        <div class="col-md-5">
            <img class="img-responsive" src="{{asset('frontend/images/indiamap.png')}}" alt="">
        </div>
    </div>
</div>
@endsection