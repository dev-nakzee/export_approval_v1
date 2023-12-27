@extends('frontend.layouts.master', ['pages' => 'Home'])
@section('seo')
<title>{{$page->seo_title}}</title>
<meta name="keywords" content="{{$page->seo_keywords}}" />
<meta name="description" content="{{$page->seo_description}}" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:title" content="{{$page->page_name}}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{$page->seo_description}}" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:site_name" content="Export Approval" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />

@endsection
@section('content')
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/gallery.png')}}" alt="">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                {{'Gallery'}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{'Our Events & Celebrations'}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Gallery'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-small">
    <div class="uk-child-width-1-4@m uk-padding-remove-vertical" uk-height-match=".gallery-image" uk-grid uk-lightbox="animation: scale">
        @if($images)
        @foreach($images as $img)
        <div>
            <div class="uk-card uk-card-default uk-card-body gallery-image uk-margin-small-bottom uk-padding-small">
                <a class="uk-inline" href="{{$img->media_path}}" data-caption="{{$img->gallery_image_title}}">
                    <img src="{{$img->media_path}}" width="1800" height="1200" alt="{{$img->img_alt}}">
                </a>
                <h4 class="uk-margin-small uk-text-center">{{$img->gallery_image_title}}</h4>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/gallery.png')}}" alt="Blogs Image">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                {{'Gallery'}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{'Our Events & Celebrations'}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right uk-margin-remove-bottom">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Gallery'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section home-section-3 uk-padding uk-padding-remove-top" style="">
    <div class="section-two-heading uk-text-center uk-padding ">
    </div>
    <div class="uk-child-width-1-4@m uk-padding uk-padding-remove-vertical" uk-height-match=".gallery-image" uk-grid uk-lightbox="animation: scale">
        @if($images)
        @foreach($images as $img)
        <div>
            <div class="uk-card uk-card-default uk-card-body gallery-image uk-margin-small-bottom uk-padding-small">
                <a class="uk-inline" href="{{$img->media_path}}" data-caption="{{$img->gallery_image_title}}">
                    <img src="{{$img->media_path}}" width="1800" height="1200" alt="{{$img->img_alt}}">
                </a>
                <h4 class="uk-margin-small uk-text-center">{{$img->gallery_image_title}}</h4>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>
@endif
@endsection
@section('scripts')

@endsection