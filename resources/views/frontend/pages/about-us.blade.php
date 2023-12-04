@extends('frontend.layouts.master', ['pages' => 'About-us'])
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
        <h1>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{$static_page->media_path}}" alt="{{$static_page->img_alt}}">
            {{$static_page->page_name}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'About us'}}</span></li>
        </ul>
    </div>
</section>
@endsection
@section('scripts')

@endsection