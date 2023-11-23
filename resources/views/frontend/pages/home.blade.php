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
</section>
@endsection