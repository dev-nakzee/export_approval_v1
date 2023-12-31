@extends('frontend.layouts.master', ['pages' => 'About-us'])
@section('seo')
<title>{{$static_page->seo_title}}</title>
<meta name="keywords" content="{{$static_page->seo_keywords}}" />
<meta name="description" content="{{$static_page->seo_description}}" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:title" content="{{$static_page->page_name}}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{$static_page->seo_description}}" />
<meta property="og:url" content="{{url()->full()}}" />
<meta property="og:site_name" content="Export Approval" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />
@endsection
@section('content')
<h1 class="uk-hidden"> {{$static_page->page_name}}</h1>
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle mobile-page-image" src="{{$static_page->media_path}}" alt="{{$static_page->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{$static_page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$static_page->tagline}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'About Us'}}</span></li>
        </ul>
    </div>
</section>
<div class="uk-text-center uk-background-default uk-padding-small" uk-sticky="offset: 150">
    <button class="uk-button uk-button-default uk-text-bolder uk-width-1-1" type="button" style="text-transform:capitalize !important;">Explore The Info <span uk-drop-parent-icon></span></button>
    <div class="uk-card uk-card-body uk-card-default" uk-drop="mode: click; pos: bottom-center;">
        <ul class="uk-list uk-list-divider uk-text-bolder">
            @if($sections)
            @foreach($sections as $section)
            <li>
                <a class="uk-link-reset" href="#{{$section->section_slug}}">{{$section->section_name}}</a>
            </li>
            @endforeach
            @endif
            <li>
                <a class="uk-link-reset" href="#{{'download-brochure'}}">Download Brochure</a>
            </li>
        </ul>
    </div>
</div>
<section class="uk-section uk-padding-small">
    <div class="">
        @if($sections)
        @foreach($sections as $section)
        <div class="ps-sections" id="{{$section->section_slug}}">
            <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                <span>{{$section->section_name}}<span>
            </div>
            <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                @if ($section->static_page_section_id === 7)
                {!! $section->section_description !!}
                @else
                {!! $section->section_description !!}
                @endif  
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>
@include('frontend.components.downloadbrochure')
@else
<h1 class="uk-hidden"> {{$static_page->page_name}}</h1>
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{$static_page->media_path}}" alt="{{$static_page->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{$static_page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{'Founded in 2014'}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'About Us'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-margin-small-left uk-text-bold">
                        <img class="uk-margin-right uk-border-circle title-page-image" src="{{$static_page->media_path}}" alt="{{$static_page->img_alt}}"> 
                        {{'About us'}}
                    </span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($sections)
                        @foreach($sections as $section)
                            <li>
                                <a href="#{{$section->section_slug}}">{{$section->section_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-margin-top download-brochure-btn uk-padding-remove" href="#download-brochure">
                        <svg fill="#052faa" height="800px" width="800px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                        <g>
                            <path d="m100.3,294.1l155.7,155.9 155.7-155.8h-69.3c-11.2,0-20.3-9.1-20.3-20.3v-222.2h-137.3v222.1c0,11.2-9.1,20.3-20.3,20.3h-64.2zm141.3,199l-204.6-204.9c-5.8-5.8-7.5-14.6-4.4-22.2 3.1-7.6 10.5-12.6 18.8-12.6h92.9v-222.1c0-11.2 9.1-20.3 20.3-20.3h177.9c11.2,0 20.3,9.1 20.3,20.3v222.1h98c8.2,0 15.6,5 18.8,12.6 3.1,7.6 1.4,16.3-4.4,22.2l-204.8,204.9c-10.5,10.4-18.2,10.6-28.8,0z"/>
                        </g>
                        </svg> {{'Download Brochure'}}
                    </a>
                </div>
            </div>
            <div class="uk-section uk-width-3-4@m uk-padding-remove-right uk-padding-remove-vertical">
                @if($sections)
                @foreach($sections as $section)
                <div class="ps-sections" id="{{$section->section_slug}}">
                    <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                        <span>{{$section->section_name}}<span>
                    </div>
                    <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                        @if ($section->static_page_section_id === 7)
                        {!! $section->section_description !!}
                        @else
                        {!! $section->section_description !!}
                        @endif  
                    </div>
                </div>
                @endforeach
                @endif
                @include('frontend.components.downloadbrochure')
            </div>
        </div>
    </div>
</section>
@endif
@endsection
