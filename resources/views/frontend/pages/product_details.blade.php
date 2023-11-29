@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            <span class="uk-text-small">{{$service->service_name}} For</span>
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
                        @if($sections)
                        @foreach($sections as $section)
                            <li>
                                <a href="#{{$section->product_section_slug}}">{{$section->product_section_name}}</a>
                            </li>
                        @endforeach
                        @endif
                        <li>
                            <a href="#">{{'Download Brochure'}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-3-4@m uk-padding-remove-right">
                <div class="uk-padding-small ps-tab-header" id="overview">
                    <span>{{'Product Overview'}}</span>
                </div>
                <div class="uk-padding-small" uk-grid>
                    <div data-src="{{$product->media_path}}" uk-img class="uk-width-1-3@m uk-background-contain uk-padding-remove">
                    </div>
                    <div class="uk-width-2-3@m">
                        <ul class="uk-list uk-list-divider">
                            <li><b>Product Name</b> : {{$product->product_name}}</li>
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