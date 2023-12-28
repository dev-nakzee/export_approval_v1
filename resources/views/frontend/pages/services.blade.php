@extends('frontend.layouts.master', ['pages' => 'Services'])
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
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{'Services'}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{"Indian Approvals & Certifications"}}</span>
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
    <div class="uk-section uk-padding-large uk-padding-remove-vertical uk-margin-large-bottom">

        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
                <img src="{{$sections[1]->media_path}}" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">{{$sections[1]->section_name}}</h3>
                    <p>{!! $sections[1]->section_description !!}</p>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                <img src="{{$sections[2]->media_path}}" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">{{$sections[2]->section_name}}</h3>
                    <p>{!! $sections[2]->section_description !!}</p>
                </div>
            </div>
        </div>
        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
                <img src="{{$sections[3]->media_path}}" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                <h3 class="uk-card-title">{{$sections[3]->section_name}}</h3>
                    <p>{!! $sections[3]->section_description !!}</p>
                </div>
            </div>
        </div>
        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                <img src="{{$sections[4]->media_path}}" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                <h3 class="uk-card-title">{{$sections[4]->section_name}}</h3>
                    <p>{!! $sections[4]->section_description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{'Services'}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{"Indian Approvals & Certifications"}}</span>
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
    <div class="uk-section uk-padding-large uk-padding-remove-vertical uk-margin-large-bottom">

        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
                <img src="images/light.jpg" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">{{$sections[1]->section_name}}</h3>
                    <p>{!! $sections[1]->section_description !!}</p>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                <img src="images/light.jpg" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title">{{$sections[2]->section_name}}</h3>
                    <p>{!! $sections[2]->section_description !!}</p>
                </div>
            </div>
        </div>
        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-card-media-left uk-cover-container">
                <img src="images/light.jpg" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                <h3 class="uk-card-title">{{$sections[3]->section_name}}</h3>
                    <p>{!! $sections[3]->section_description !!}</p>
                </div>
            </div>
        </div>
        <div class="uk-card uk-card-default uk-grid-collapse uk-margin uk-child-width-1-2" uk-grid>
            <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                <img src="images/light.jpg" alt="" uk-cover>
                <canvas width="600" height="400"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                <h3 class="uk-card-title">{{$sections[4]->section_name}}</h3>
                    <p>{!! $sections[4]->section_description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.downloadbrochure')
@endif
@endsection