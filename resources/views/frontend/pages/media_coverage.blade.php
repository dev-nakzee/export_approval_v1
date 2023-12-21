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
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small uk-padding-remove-vertical" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/microphone.png')}}" alt="">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                <span class="uk-text-small" style="color: #8b8b8b;">{{'NEED CONTENT'}}</span>
                <br> {{'Media Coverage'}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Media Coverage'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-small">
    <div uk-grid class="uk-child-width-1-5@m uk-grid uk-container uk-width-1-1 uk-padding uk-padding-remove-right uk-padding-remove-vertical">
    @if($news)
    @foreach($news as $news)
    <a href="{{$news->news_url}}" class="media-blocks" target="blank">
        <img class="" src="{{$news->media_path}}" uk-img />
    </a>
    @endforeach
    @endif
    </div>
</section>
@else
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1 class="uk-padding-small">
            {{'Media Coverage'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right uk-margin-remove-bottom">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Media Coverage'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section home-section-3 uk-padding uk-padding-remove-top" style="">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
        <div uk-grid class="uk-child-width-1-5@m uk-grid uk-container uk-width-1-1 uk-padding uk-padding-remove-right uk-padding-remove-vertical uk-margin-large-top">
        @if($news)
        @foreach($news as $news)
        <a href="{{$news->news_url}}" class="media-blocks" target="blank">
            <img class="" src="{{$news->media_path}}" uk-img />
        </a>
        @endforeach
        @endif
        </div>
    </div>
</section>
@endif
@endsection
@section('scripts')

@endsection