@extends('frontend.layouts.master', ['pages' => 'Services'])
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
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                <span class="uk-text-small" style="color: #8b8b8b;">{{"NEED CONTENT"}}</span>
                <br> {{'Services'}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>Services</span></li>
        </ul>
    </div>
</section>
<section class="uk-section home-section-2 uk-padding-small">
    <div class="uk-text-center">
        <p class="section-heading uk-margin-remove-bottom">
            {{$sections[0]->section_name}} 
        </p>
        <span class="section-tagline">{!!$sections[0]->section_tagline!!}</span>
        <p class="section-description">{!! $sections[0]->section_description !!}</p>
    </div>
    <div class="uk-section uk-padding-small uk-padding-remove-top uk-padding-remove-right uk-margin-large-bottom">
        <div class="uk-child-width-1-4@m uk-grid-match uk-flex-center" uk-grid>
            @if($services)
            @foreach($services as $service)
            <div class="uk-margin-small-bottom home-ml-section">
                <article class="uk-comment uk-padding-remove uk-card uk-box-shadow-large uk-card-body uk-border-rounded" role="comment">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-1-3">
                                <img class="uk-comment-avatar" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                            </div>
                            <div class="uk-width-expand uk-padding-small uk-padding-remove-left">
                                <a class="uk-link-reset" href="{{route('frontend.site.service', $service->service_slug)}}"><h4 class="uk-comment-title uk-margin-remove">{{$service->service_name}}</h4>
                                <span>{!!$service->service_description!!}</span>
                                <p class="uk-margin-remove-vertical uk-padding-remove uk-text-small view-all-products">View Details</p>
                                </a>
                            </div>
                        </div>
                    </header>
                </article>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                <span class="uk-text-small" style="color: #8b8b8b;">{{"NEED CONTENT"}}</span>
                <br>{{'Services'}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>Services</span></li>
        </ul>
    </div>
</section>
<section class="uk-section home-section-2 uk-padding uk-padding-remove-vertical">
    <div class="section-two-heading uk-text-center uk-padding">
        <p class="section-heading uk-margin-remove-bottom">
            {{$sections[0]->section_name}} 
        </p>
        <span class="section-tagline">{!!$sections[0]->section_tagline!!}</span>
        <p class="section-description">{!! $sections[0]->section_description !!}</p>
    </div>
    <div class="uk-section uk-padding-small uk-padding-remove-top uk-padding-remove-right uk-margin-large-bottom">
        <div class="uk-child-width-1-4@m uk-grid-match uk-flex-center" uk-grid>
            @if($services)
            @foreach($services as $service)
            <div class="uk-margin-remove home-ml-section">
                <article class="uk-comment uk-padding-remove uk-card uk-box-shadow-large uk-card-body uk-border-rounded" role="comment">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-comment-avatar" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                            </div>
                            <div class="uk-width-expand uk-padding-small uk-padding-remove-left">
                                <a class="uk-link-reset" href="{{route('frontend.site.service', $service->service_slug)}}#mandatory-product-list"><h4 class="uk-comment-title uk-margin-remove">{{$service->service_name}}</h4>
                                <span>{!!$service->service_description!!}</span>
                                <p class="uk-margin-remove-vertical uk-padding-remove uk-text-small view-all-products">View All Products</p>
                                </a>
                            </div>
                        </div>
                    </header>
                </article>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@include('frontend.components.downloadbrochure')
@endif
@endsection
@section('scripts')


@endsection