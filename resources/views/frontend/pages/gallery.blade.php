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
            {{'Contact Us'}}
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
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
        <p class="section-heading uk-margin-remove uk-padding-remove-vertical" style="color: #8a8a8a">
            {{'Complete Gallery'}} 
        </p>
    </div>
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
        <div class="uk-child-width-1-4@m" uk-grid uk-lightbox="animation: scale">
            @if($images)
            @foreach($images as $img)
            <div>
                <a class="uk-inline" href="{{$img->media_path}}" data-caption="{{$img->gallary_image_title}}">
                    <img class="uk-height-medium" alt="{{$img->img_alt}}" src="{{$img->media_path}}" width="600" height="400" uk-img>
                    <span class="uk-heading">{{$img->gallary_image_title}}</h1>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection