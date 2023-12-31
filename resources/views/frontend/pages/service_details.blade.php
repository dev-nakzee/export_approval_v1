@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('seo')
<title>{{$service->seo_title}}</title>
<meta name="keywords" content="{{$service->seo_keywords}}" />
<meta name="description" content="{{$service->seo_description}}" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:title" content="{{$service->service_name}}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{$service->seo_description}}" />
<meta property="og:url" content="{{url()->full()}}" />
<meta property="og:site_name" content="Export Approval" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />
@endsection

@section('content')
<h1 class="uk-hidden">{{$service->service_name}}</h1>
@if($agent->isMobile())

<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle mobile-page-image" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{$service->service_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{!!$service->service_description!!}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>Services</span></li>
            <li><span>{{$service->service_slug}}</span></li>
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
                    <a class="uk-link-reset" href="#{{$section->service_section_slug}}">{{$section->service_section_name}}</a>
                </li>
                @if($loop->first)
                    @if($service->service_product_show === 1) 
                    <li>
                        <a class="uk-link-reset" href="#{{'mandatory-product-list'}}">Mandatory Product List</a>
                    </li>
                    @endif
                @endif
            @endforeach
            @endif
            <li>
                <a class="uk-link-reset" href="#{{'download-brochure'}}">Download Brochure</a>
            </li>
        </ul>
    </div>
</div>
<section class="uk-section uk-padding-small">
    <div class="uk-margin-top">
        @if($sections)
        @foreach($sections as $section)
            <div class="ps-sections" id="{{$section->service_section_slug}}">
                <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                    <span>{{$section->service_section_name}}<span>
                </div>
                <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                    {!! $section->service_section_content !!}
                </div>
            </div>
            @if($loop->first)
                @if($service->service_product_show === 1) 
                <div class="ps-sections" id="mandatory-product-list">
                    <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                        <span>Mandatory Product list<span>
                    </div>
                    <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                        <table id="mandatory-list" class="uk-table uk-table-hover uk-table-striped uk-table-small">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>category</th>
                                    @if($service->service_compliance)
                                    @foreach(explode(',',$service->service_compliance) as $compliance)
                                    @if($compliance)
                                    <th>{{$compliance}}</th>
                                    @endif
                                    @endforeach
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="product-page-link" data-slug="{{$product->product_slug}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_category_name}}</td>
                                    @if($service->service_compliance)
                                    @foreach(unserialize($product->product_compliance) as $compliance)
                                        <td>{{$compliance}}</td>
                                    @endforeach
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            @endif
        @endforeach
        @endif
        @if($service->faqs) 
        <div class="ps-sections" id="{{'frequently-asked-questions'}}">
            <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                <span>{{'Frequently Asked Questions'}}<span>
            </div>
            <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                <ul uk-accordion class="uk-margin-large-bottom">
                    @foreach(json_decode($service->faqs, true) as $que=>$ans)
                    <li class="faq-element @if ($loop->first) uk-open @endif">
                        <a class="uk-accordion-title faq-question uk-margin-top uk-margin-bottom" href>{{$loop->iteration}}. {{$que}}</a>
                        <div class="uk-accordion-content faq-answer uk-margin-remove-top uk-margin-bottom">
                            {{ $ans }}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
            <h2 class="uk-text-middle uk-inline uk-margin-remove service-heading">
                {{$service->service_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{!!$service->service_description!!}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">

        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>Services</span></li>
            <li><span>{{$service->service_slug}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div>
        <div uk-grid  uk-height-match>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-heading uk-text-bold uk-text-middle">
                        <img style="width: 50px;" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
                        {{$service->service_name}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($sections)
                        @foreach($sections as $section)
                            <li>
                                <a href="#{{$section->service_section_slug}}">{{$section->service_section_name}}</a>
                            </li>
                            @if($loop->first)
                                @if($service->service_product_show === 1) 
                                <li class="nav-item">
                                    <a href="#{{'mandatory-product-list'}}">Mandatory Product List</a>
                                </li>
                                @endif
                            @endif
                        @endforeach
                        @endif
                        @if($service->faqs) 
                        <li class="nav-item">
                            <a href="#{{'frequently-asked-questions'}}">F.A.Q.</a>
                        </li>
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
                @if($sections)
                @foreach($sections as $section)
                    <div class="ps-sections" id="{{$section->service_section_slug}}">
                        <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                            <span>{{$section->service_section_name}}<span>
                        </div>
                        <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                            {!! $section->service_section_content !!}
                        </div>
                    </div>
                    @if($loop->first)
                        @if($service->service_product_show === 1) 
                        <div class="ps-sections" id="mandatory-product-list">
                            <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                                <span>Mandatory Product list<span>
                            </div>
                            <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                                <table id="mandatory-list" class="uk-table uk-table-hover uk-table-striped uk-table-small" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>category</th>
                                            @if($service->service_compliance)
                                            @foreach(explode(',',$service->service_compliance) as $compliance)
                                            @if($compliance)
                                            <th>{{$compliance}}</th>
                                            @endif
                                            @endforeach
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr class="product-page-link" data-slug="{{$product->product_slug}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->product_category_name}}</td>
                                            @if($service->service_compliance)
                                            @foreach(unserialize($product->product_compliance) as $compliance)
                                                <td>{{$compliance}}</td>
                                            @endforeach
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    @endif
                @endforeach
                @endif
                @if($service->faqs) 
                <div class="ps-sections" id="{{'frequently-asked-questions'}}">
                    <div class="uk-section ps-tab-header uk-margin-remove-left uk-margin-remove-right">
                        <span>{{'Frequently Asked Questions'}}<span>
                    </div>
                    <div class="uk-section ps-tab-content uk-margin-remove-left uk-margin-remove-right">
                        <ul uk-accordion class="uk-margin-large-bottom">
                            @foreach(json_decode($service->faqs, true) as $que=>$ans)
                            <li class="faq-element @if ($loop->first) uk-open @endif">
                                <a class="uk-accordion-title faq-question uk-margin-top uk-margin-bottom" href>{{$loop->iteration}}. {{$que}}</a>
                                <div class="uk-accordion-content faq-answer uk-margin-remove-top uk-margin-bottom">
                                    {{ $ans }}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @include('frontend.components.downloadbrochure')
            </div>
        </div>
    </div>
</section>
@endif
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/datatables/dataTables.uikit.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/datatables/responsive.dataTables.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/datatables/rowReorder.dataTables.min.css')}}" />
<style>

</style>
<script type="text/javascript" src="{{asset('frontend/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.uikit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.rowReorder.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mandatory-list').DataTable({
            "paging":   true,
            "ordering": false,
            "searching": true,
            "oLanguage": {
                "sSearch": ""
            },
            language: {
                searchPlaceholder: "Search {{$service->service_name}} products",
                "paginate": {
                    "previous": "<span uk-icon='chevron-left'></span>",
                    "next": "<span uk-icon='chevron-right'></span>",
                }
            }
        });
        $(window).scroll(function(){
            var scrollTop = 80;
            if($(window).scrollTop() >= scrollTop){
                $('.ps-details-section').addClass('ps-sidebar-fixed');  
            }
            if($(window).scrollTop() < scrollTop){
                $('.ps-details-section').removeClass('ps-sidebar-fixed');  
            }
        });
    });
    $(document).on('click', '.product-page-link', function() {
        var slug = $(this).data('slug');
        var url = "{{route('frontend.site.product', ":slug")}}";
        url = url.replace(':slug', slug);
        window.location.href = url;
    });
</script>
@endsection