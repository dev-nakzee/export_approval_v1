@extends('frontend.layouts.master', ['pages' => 'Search'])
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
            <li><span> {{'Search result'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-remove">
    <div class="uk-padding-small">
        <div class="uk-heading uk-h4">
            Results for "{{$keywords}}"
        </div>
        <form id="search_form" action="{{route('frontend.site.search.page')}}" method="POST">
            @csrf
            <div class="uk-inline uk-width-expanded">
                <button uk-icon="icon: search" type="submit" class="uk-background-primary uk-light uk-form-icon uk-form-icon-flip home-search-button" disabled style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </button>
                <input id="home_search" name="search_keywords" class="uk-input uk-border-rounded uk-form-medium" type="text" placeholder="Find your product name OR compliance name" aria-label="Search">
                <div id="home_search_result" style="z-index: 999;" class="uk-hidden uk-width-1-1 uk-position-absolute uk-margin-remove uk-padding-remove uk-background-muted uk-border-rounded uk-box-shadow-large uk-height-small uk-overflow-auto">
                </div>
            </div>
        </form>
            @foreach($services as $service)
            <a class="uk-link-reset" href="{{route('frontend.site.service', $service->service_slug)}}">
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-small-bottom">
                    <h5 class="uk-card-title site-blue">Services - {{$service->service_name}}</h5>
                </div>
            </a>
            @endforeach

            @foreach($products as $products)
            <a class="uk-link-reset" href="{{route('frontend.site.product', $products->product_slug)}}">
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-small-bottom">
                    <h5 class="uk-card-title site-blue">Products - {{$products->product_name}}</h5>
                </div>
            </a>
            @endforeach
        
        
            @foreach($notices as $notice)
                <a class="uk-link-reset" href="{{route('frontend.site.product', $notice->notice_slug)}}">
                    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-small-bottom">
                        <h5 class="uk-card-title site-blue">Notifications - {{$notice->notice_title}}</h5>
                    </div>
                </a>
            @endforeach
    </div>
</section>
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{$static_page->media_path}}" alt="{{$static_page->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{$static_page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{'Need Content'}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'Search result'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <div class="uk-heading uk-h3">
            Results for "{{$keywords}}"
        </div>
        <form class="uk-margin-bottom uk-width-1-2" id="search_form" action="{{route('frontend.site.search.page')}}" method="POST">
            @csrf
            <div class="uk-inline uk-width-expanded">
                <button uk-icon="icon: search" type="submit" class="uk-background-primary uk-light uk-form-icon uk-form-icon-flip home-search-button" disabled style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                </button>
                <input id="home_search" name="search_keywords" class="uk-input uk-border-rounded uk-form-medium" type="text" placeholder="Find your product name OR compliance name" aria-label="Search">
                <div id="home_search_result" style="z-index: 999;" class="uk-hidden uk-width-1-1 uk-position-absolute uk-margin-remove uk-padding-remove uk-background-muted uk-border-rounded uk-box-shadow-large uk-height-small uk-overflow-auto">
                </div>
            </div>
        </form>

            @foreach($services as $service)
            <a class="uk-link-reset" href="{{route('frontend.site.service', $service->service_slug)}}">
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-small-bottom">
                    <h5 class="uk-card-title site-blue">Services - {{$service->service_name}}</h5>
                </div>
            </a>
            @endforeach

            @foreach($products as $products)
            <a class="uk-link-reset" href="{{route('frontend.site.product', $products->product_slug)}}">
                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-small-bottom">
                    <h5 class="uk-card-title site-blue">Products - {{$products->product_name}}</h5>
                    
                </div>
            </a>
            @endforeach
        
        
            @foreach($notices as $notice)
                <a class="uk-link-reset" href="{{route('frontend.site.product', $notice->notice_slug)}}">
                    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-small-bottom">
                        <h5 class="uk-card-title site-blue">Notifications - {{$notice->notice_title}}</h5>

                    </div>
                </a>
            @endforeach
    </div>
</section>
@endif
@endsection

@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).keyup('#home_search', function(e) {
    var search = $('#home_search').val();
    var searchData = $('#search_form').serialize();
    if(search.length > 2){
        $('#home_search_result').removeClass('uk-hidden');
        $('#home_search_result').html('<div class="uk-text-center"><span uk-spinner="ratio: 3"></span></div>');
        $.ajax({
            url:"{{route('frontend.site.search')}}",
            method:"POST",
            data: searchData,
            success:function(response){
                $('#home_search_result').html(response);
            }
        });
        
    } else {
        $('#home_search_result').empty();
        $('#home_search_result').addClass('uk-hidden');
    }
});
</script>
@endsection