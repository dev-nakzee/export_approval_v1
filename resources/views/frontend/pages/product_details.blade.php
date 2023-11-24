@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <h1>
            {{$service->service_name}} For {{$product->product_name}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-remove uk-width-1-1">
    <div class="uk-container uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.home', $service->service_slug)}}">{{$service->service_name}}</a></li>
            <li><span>{{$product->product_name}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding uk-padding-remove-vertical">
    <div class="uk-container">
        <div uk-grid id="js-oversized">
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-heading-bullet uk-text-bold">{{$product->product_name}}</span>
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
            <div class="uk-width-3-4@m">
                <div class="uk-container">
                    <div class="uk-container">
                        <span>Overview<span>
                    </div>
                    <div class="uk-container">
                        <img src="{{$product->media_url}}" alt="{{$product->img_alt}}">
                        {!! $product->product_content !!}
                    </div>
                </div>
                @if($sections)
                @foreach($sections as $section)
                    <div class="uk-container">
                        <div class="uk-container ps-tab-header">
                            <span>{{$section->product_section_name}}<span>
                        </div>
                        <div class="uk-container ps-tab-content">
                            {!! $section->product_section_content !!}
                        </div>
                    </div>
                @endforeach
                @endif
                {{-- <ul id="component-tab-left" class="uk-switcher">
                    <li>
                        <div class="uk-container ps-tab-header">
                            <span>Overview<span>
                        </div>
                        <div class="uk-container ps-tab-content">
                            {!! $product->product_content !!}
                        </div>
                    </li>
                    @if($sections)
                    @foreach($sections as $section)
                        <li>
                            <div class="uk-container ps-tab-header">
                                <span>{{$section->product_section_name}}<span>
                            </div>
                            <div class="uk-container ps-tab-content">
                                {!! $section->product_section_content !!}
                            </div>
                        </li>
                    @endforeach
                    @endif
                </ul> --}}
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection