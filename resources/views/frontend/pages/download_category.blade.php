@extends('frontend.layouts.master', ['pages' => 'Industrial Notifications'])
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
<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/file.webp')}}" alt="">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
            {{$page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$page->tagline}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.downloads')}}"><span>{{'Downloads'}}</span></a></li>
            <li><span>{{$categoryDownload->download_category}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-small">
    <div class="uk-text-center">
        <button class="uk-button uk-button-default uk-text-bolder" type="button" style="text-transform:capitalize !important;">Download Categories <span uk-drop-parent-icon></span></button>
        <div class="uk-card uk-card-body uk-card-default" uk-drop="mode: click; pos: bottom-center;">
            <ul class="uk-list uk-list-divider uk-text-bolder">
                @if($services)
                @foreach($services as $service)
                    <li>
                        <a class="uk-link-reset" href="{{route('frontend.site.download.service',$service->service_slug)}}">{{$service->service_name}}</a>
                    </li>
                @endforeach
                @endif
                @if($downloadCategory)
                @foreach($downloadCategory as $category)
                <li>
                    <a class="uk-link-reset" href="{{route('frontend.site.download.category',$category->download_category_slug)}}">{{$category->download_category}}</a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="uk-margin uk-text-center uk-text-bold">
        {{"Downloads for ". $categoryDownload->download_category}}
    </div>
    <table id="downloads-list" class="uk-table uk-table-hover uk-table-striped uk-table-small">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Documents</th>
            </tr>
        </thead>
        <tbody>
            @if($downloads)
            @foreach($downloads as $download)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$download->download_name}}</td>
                <td>
                    @if($download->doc_path)
                    <a class="view-file" href="{{$download->doc_path}}" target="black">View</a> / <a class="download-file" href="{{$download->doc_path}}" download>Downloads</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/file.webp')}}" alt="Download Image">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
            {{$page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$page->tagline}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.downloads')}}"><span>{{'Downloads'}}</span></a></li>
            <li><span>{{$categoryDownload->download_category}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-margin-small uk-text-bold">
                        <img class="uk-margin-right uk-border-circle title-page-image" src="{{asset('frontend/images/file.webp')}}" alt="Download Image">
                        {{'Downloads'}}
                    </span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($services)
                        @foreach($services as $service)
                            <li>
                                <a class="uk-link-reset" href="{{route('frontend.site.download.service',$service->service_slug)}}">{{$service->service_name}}</a>
                            </li>
                        @endforeach
                        @endif
                        @if($downloadCategory)
                        @foreach($downloadCategory as $category)
                        <li>
                            <a @if($category->download_category_slug === $categoryDownload->download_category_slug) style="font-weight: 700; color: #ed462f !important;" @endif class="uk-link-reset" href="{{route('frontend.site.download.category',$category->download_category_slug)}}">{{$category->download_category}}</a>
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
            <div class="uk-width-3-4@m uk-padding-remove uk-margin-remove">
                <div class="uk-flex uk-padding-remove-right uk-margin-remove-right uk-margin-remove-left" uk-grid>
                    <div class="uk-margin-bottom uk-width-1-1">
                        <span class="downloads_list">{{"Downloads for ". $categoryDownload->download_category}}</span>
                    </div>
                    <div class="uk-width-1-1 uk-margin-remove-right uk-margin-remove-left uk-margin-remove-top uk-margin-large-bottom">
                        <table id="downloads-list" class="uk-table uk-table-hover uk-table-striped uk-table-small" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Documents</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($downloads)
                                @foreach($downloads as $download)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$download->download_name}}</td>
                                    <td>
                                        @if($download->doc_path)
                                        <a class="view-file" href="{{$download->doc_path}}" target="black">View</a> / <a class="download-file" href="{{$download->doc_path}}" download>Downloads</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
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

<script type="text/javascript" src="{{asset('frontend/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.uikit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.rowReorder.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#downloads-list').DataTable({
            "paging":   true,
            "ordering": false,
            "searching": true,
            "oLanguage": {
                "sSearch": ""
            },
            language: {
                searchPlaceholder: "Search",
                "paginate": {
                    "previous": "<span uk-icon='chevron-left'></span>",
                    "next": "<span uk-icon='chevron-right'></span>",
                }
            }
        });
    });
</script>
<style>
    .ps-sidebar-fixed {
        width: 100% !important;
    }
</style>
@endsection