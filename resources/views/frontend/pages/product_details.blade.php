@extends('frontend.layouts.master', ['pages' => 'Product'])
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
<section class="uk-section page-header uk-padding-small uk-padding-remove-vertical" id="overview" uk-sticky="offset: 80;">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/best-product.png')}}" alt="{{$product->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                <span class="uk-text-small" style="color: #8b8b8b;">{{$service->service_name}} For</span>
                <br>{{$product->product_name}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.service', $service->service_slug)}}">{{$service->service_name}}</a></li>
            <li><a href="{{route('frontend.site.service', $service->service_slug)}}#{{'mandatory-product-list'}}">{{"Mandatory List"}}</a></li>
            <li><span>{{$product->product_name}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-small">
    <ul uk-accordion>
        @if($sections)
        <li class="uk-open" id="{{'overview'}}">
            <a class="uk-accordion-title section-title uk-padding-small" href="#{{'overview'}}">{{'Product Overview'}}</a>
            <div class="uk-accordion-content section-content">
                <div class="uk-padding-small" uk-grid>
                    <div class="uk-width-2-5@m uk-background-contain uk-padding-remove-right">
                        <img class="uk-width-1-1" src="{{$product->media_path}}" alt="{{$product->img_alt}}">
                    </div>
                    <div class="uk-width-3-5@m">
                        <ul class="uk-list uk-list-divider">
                            <li><b>General Product Name</b> : {{$product->product_name}}</li>
                            @if($product->product_technical_name != null)
                            <li><b>Technical Product Name</b> : <span>{{$product->product_technical_name}}</span></li>
                            @endif
                            <li><b>Product Category</b> : {{$product->product_category_name}}</li>
                            <li><b>Compliance Name</b> : {{$service->service_name}}</li>
                            @if(unserialize($product->product_compliance) == null)
                            @else
                            @foreach(unserialize($product->product_compliance) as $key => $value)
                            @if($key != 0)
                            <li><b>{{$key}}</b> : {{$value}}</li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="uk-padding-small">
                        {!! $product->product_content !!}
                </div> 
            </div>
        </li>
        @foreach($sections as $section)
        <li id="{{$section->product_section_slug}}">
            <a class="uk-accordion-title section-title uk-padding-small" href="#{{$section->product_section_slug}}">{{$section->product_section_name}}</a>
            <div class="uk-accordion-content section-content">
                {!! $section->product_section_content !!}
            </div>
        </li>
        @endforeach
        @endif
    </ul>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical" id="overview">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/best-product.png')}}" alt="{{$product->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                <span class="uk-text-small" style="color: #8b8b8b;">{{$service->service_name}} For</span>
                <br>{{$product->product_name}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.service', $service->service_slug)}}">{{$service->service_name}}</a></li>
            <li><a href="{{route('frontend.site.service', $service->service_slug)}}#{{'mandatory-product-list'}}">{{"Mandatory List"}}</a></li>
            <li><span>{{$product->product_name}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-flex">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">

                    <span class="uk-margin-small-left uk-text-bold">
                        <img class="uk-margin-remove uk-border-circle title-page-image" src="{{asset('frontend/images/best-product.png')}}" alt="{{$product->img_alt}}">
                        {{$product->product_name}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        <li>
                            <a class="uk-link-reset" href="#overview">{{'Product Overview'}}</a>
                        </li>
                        @if($sections)
                        @foreach($sections as $section)
                            <li>
                                <a class="uk-link-reset" href="#{{$section->product_section_slug}}">{{$section->product_section_name}}</a>
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
            <div class="uk-width-3-4@m uk-padding-remove-right">
                <div class="uk-padding-small ps-tab-header">
                    <span>{{'Product Overview'}}</span>
                </div>
                <div class="uk-padding-small" uk-grid>
                    <div class="uk-width-2-5@m uk-background-contain uk-padding-remove-right">
                        <img class="uk-width-1-1" src="{{$product->media_path}}" alt="{{$product->img_alt}}">
                    </div>
                    <div class="uk-width-3-5@m">
                        <ul class="uk-list uk-list-divider">
                            <li><b>General Product Name</b> : {{$product->product_name}}</li>
                            @if($product->product_technical_name != null)
                            <li><b>Technical Product Name</b> : <span>{{$product->product_technical_name}}</span></li>
                            @endif
                            <li><b>Product Category</b> : {{$product->product_category_name}}</li>
                            <li><b>Compliance Name</b> : {{$service->service_name}}</li>
                            @if(unserialize($product->product_compliance) == null)
                            @else
                            @foreach(unserialize($product->product_compliance) as $key => $value)
                            @if($key != 0)
                            <li><b>{{$key}}</b> : {{$value}}</li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="uk-padding-small">
                        {!! $product->product_content !!}
                </div>  
                @if($sections)
                @foreach($sections as $section)
                <div class="ps-sections" id="{{$section->product_section_slug}}">
                    <div class="uk-padding-small ps-tab-header">
                        <span>{{$section->product_section_name}}</span>
                    </div>
                    <div class="uk-padding-small">
                        {!! $section->product_section_content !!}
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
@section('scripts')
@endsection