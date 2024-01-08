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
<meta property="og:url" content="{{url()->full()}}" />
<meta property="og:site_name" content="Export Approval" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />

@endsection
@section('content')
<h1 class="uk-hidden">{{$page->page_name}) {{$page->tagline}}</h1>
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/microphone.webp')}}" alt="">
            <h1 class="uk-text-middle uk-inline uk-margin-remove">
            {{$page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$page->tagline}}</span>
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
    <div uk-grid class="uk-child-width-1-5@m uk-grid">
    @if($news)
    @foreach($news as $news)
    <div>
            <a href="{{$news->news_url}}" class="uk-card uk-card-default uk-card-body uk-padding-small uk-link-reset news-articles" target="blank">
                <div class="uk-card-media-top">
                    <img class="" src="{{$news->media_path}}" uk-img />
                </div>
                <div class="uk-card-body uk-padding-remove-horizontal uk-text-middle">
                    <h3 class="uk-card-title">{{$news->news_title}}</h3>
                </div>
            </a>
    </div>
    @endforeach
    @endif
    </div>
</section>
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/microphone.webp')}}" alt="Media Coverage Image">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
            {{$page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$page->tagline}}</span>
            </h2>
        </div>
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
        <div uk-grid class="uk-child-width-1-5@m uk-grid uk-container uk-width-1-1 uk-padding uk-padding-remove-right uk-padding-remove-vertical uk-margin-large-top" uk-height-match=".news-articles">
        @if($news)
        @foreach($news as $news)
        <div>
            <a href="{{$news->news_url}}" class="uk-card uk-card-default uk-card-body uk-padding-small uk-link-reset news-articles" target="blank">
                <div class="uk-card-media-top">
                    <img class="" src="{{$news->media_path}}" uk-img />
                </div>
                <div class="uk-card-body uk-padding-remove-horizontal uk-text-middle">
                    <h3 class="uk-card-title">{{$news->news_title}}</h3>
                </div>
            </a>
        </div>
        @endforeach
        @endif
        </div>
    </div>
</section>
@endif
@endsection
@section('scripts')

@endsection