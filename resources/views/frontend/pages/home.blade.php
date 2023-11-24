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
<section class="uk-section home-section-1 uk-child-width-expand@s uk-padding" uk-grid>
    <div>
        {!! $sections[0]->section_content !!}
        <div class="uk-margin">
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></a>
                <input class="uk-input uk-form-large uk-form-width-large" type="text" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <div class="uk-container uk-child-width-1-2 uk-padding-remove uk-width-expand" uk-grid>
            @if($services)
            @foreach($services as $service)
            <div class="uk-background-transparent uk-margin-remove">
                <article class="uk-comment uk-background-default uk-border-rounded" role="comment">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-auto home-service-image">
                                <img class="uk-comment-avatar" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                            </div>
                            <div class="uk-width-expand uk-padding-remove">
                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{$service->service_name}}</a></h4>
                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                    <li><a href="{{route('frontend.site.service', $service->service_slug)}}">About {{$service->service_name}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </article>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div data-src="{{asset('frontend/images/indiamap.png')}}" uk-img class="uk-background-contain">
        <p> {{ $sections[0]->section_tagline }}</p>
    </div>
</section>
<section class="uk-section home-section-2 uk-padding">
    <div class="section-two-heading uk-text-center uk-padding">
        <p class="section-heading">
            {{$sections[1]->section_name}} 
        </p>
        <span class="section-tagline">{{$sections[1]->section_tagline}}</span>
        <p class="section-description">{!! $sections[1]->section_description !!}</p>
    </div>
    <div class="uk-container uk-padding-remove-top">
        <div class="uk-child-width-1-3@m uk-grid-match uk-flex-center" uk-grid>
            @if($services)
            @foreach($services as $service)
            <div class="uk-padding-small uk-margin-remove home-ml-section">
                <article class="uk-comment uk-padding-small uk-card uk-box-shadow-large uk-card-body uk-border-rounded" role="comment">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-comment-avatar" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                            </div>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{{$service->service_name}}</a></h4>
                                <span>{!!$service->service_description!!}</span>
                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                    <li><a href="{{route('frontend.site.service', $service->service_slug)}}">View all Products</a></li>
                                </ul>
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
@if($sections[2]->section_status == 1)
<section class="uk-section home-section-3 uk-padding" style="background-color: {{$sections[2]->section_color}}">
    <div class="section-two-heading uk-text-center uk-padding">
        <p class="section-heading">
            {{$sections[2]->section_name}} 
        </p>
        <span class="section-tagline">{{$sections[2]->section_tagline}}</span>
        <p class="section-description">{!! $sections[2]->section_description !!}</p>
    </div>
    <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
            <img src="images/light.jpg" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                {!! $sections[2]->section_content !!}
            </div>
        </div>
    </div>
</section>
@endif
@if($sections[3]->section_status == 1)
<section class="uk-section home-section-3 uk-padding" style="background-color: {{$sections[3]->section_color}}">
    <div class="section-two-heading uk-text-center uk-padding">
        <p class="section-heading">
            {{$sections[3]->section_name}} 
        </p>
        <span class="section-tagline">{{$sections[3]->section_tagline}}</span>
        <p class="section-description">{!! $sections[3]->section_description !!}</p>
    </div>
    <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container">
            <img src="{{$sections[3]->media_path}}" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                {!! $sections[3]->section_content !!}
            </div>
        </div>
    </div>
</section>
@endif
@if($sections[4]->section_status == 1)
<section class="uk-section home-section-3 uk-padding" style="background-color: {{$sections[4]->section_color}}">
    <div class="section-two-heading uk-text-center uk-padding">
        <p class="section-heading">
            {{$sections[4]->section_name}} 
        </p>
        <span class="section-tagline">{{$sections[4]->section_tagline}}</span>
        <p class="section-description">{!! $sections[4]->section_description !!}</p>
    </div>
    @if($blogs)
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid" uk-height-match=".home-blog-tabs">
            @foreach($blogs as $blog)
            <li>
                <div class="uk-card uk-card-default home-blog-tabs">
                    <div class="uk-card-media-top">
                        <img src="{{$blog->media_path}}" alt="{{$blog->img_alt}}">
                    </div>
                    <div class="uk-card-body">
                        <a href="{{route('frontend.site.blog.detail', [$blog->blog_category_slug, $blog->blog_slug])}}"><span class="uk-card-title">{{$blog->blog_title}}</span></a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
    
    </div>
    @endif
</section>
@endif
@endsection