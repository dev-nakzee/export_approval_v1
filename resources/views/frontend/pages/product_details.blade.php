@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical" id="overview">
    <div class="uk-container uk-text-center">
        <h1>
            <span class="uk-text-small" style="color: #8b8b8b;">{{$service->service_name}} For</span>
            <br>{{$product->product_name}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.home', $service->service_slug)}}">{{$service->service_name}}</a></li>
            <li><span>{{$product->product_name}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-flex">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <a class="uk-heading-bullet uk-text-bold" href="#overview">{{$product->product_name}}</a>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        <li>
                            <a href="#overview">{{'Product Overview'}}</a>
                        </li>
                        @if($sections)
                        @foreach($sections as $section)
                            <li>
                                <a href="#{{$section->product_section_slug}}">{{$section->product_section_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-width-1-1 uk-margin-top download-brochure-btn" href="#download-brochure">{{'Download Brochure'}}</a>
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
                            <li><b>{{$key}}</b> : {{$value}}</li>
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
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            var scrollTop = 80;
            if($(window).scrollTop() >= scrollTop){
                $('.ps-details-section').addClass('ps-sidebar-fixed');  
            }
            if($(window).scrollTop() < scrollTop){
                $('.ps-details-section').removeClass('ps-sidebar-fixed');  
            }
        })
    });
</script>
@endsection