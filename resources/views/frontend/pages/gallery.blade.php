@extends('frontend.layouts.master', ['pages' => 'Home'])
@section('seo')
<title>"title"</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:title" content="" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:description" content="" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:site_name" content="" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />

@endsection
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1 class="uk-padding-small">
            {{'Gallery'}}
        </h1>
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
@endsection
@section('scripts')

@endsection