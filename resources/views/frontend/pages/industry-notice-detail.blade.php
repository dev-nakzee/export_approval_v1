@extends('frontend.layouts.master', ['pages' => 'Industrial Notifications'])
@section('content')
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small uk-padding-remove-vertical" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/governance.png')}}" alt="">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                <span class="uk-text-small" style="color: #8b8b8b;">{{$notice_service->service_name}}</span>
                <br>{{'Industrial Notifications'}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.industry-notification.service',$notice_service->service_slug)}}">{{$notice_service->service_name}}</a></li>
            <li><span>{{'Industrial Notifications'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-small">
    <div class="uk-text-center">
        <button class="uk-button uk-button-default" type="button">Notification Services <span uk-drop-parent-icon></span></button>
        <div class="uk-card uk-card-body uk-card-default" uk-drop="mode: click; pos: bottom-center;">
            <ul class="uk-list uk-list-divider">
                @if($services)
                @foreach($services as $service)
                    <li>
                        <a class="uk-link-reset" href="{{route('frontend.site.industry-notification.service',$service->service_slug)}}">{{$service->service_name}}</a>
                    </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="uk-margin uk-text-center uk-text-bold">

    </div>
    <div class="uk-section uk-padding-remove-vertical uk-margin-remove">
        <span class="uk-article-title blog-detail-title"><a class="uk-link-reset" href="">{{$notice->notice_title}}</a></span>
    
        <p class="uk-article-meta">Notification Date : {{$notice->notice_date->format('d-m-Y')}}</a></p>
    
        <span class="uk-text-lead">{!! $notice->notice_content !!}</span>
    
        <div class="uk-grid-small" uk-grid>
            @if($document)
            <p class="notice-dl-text">Please click to 
                <a href="{{ asset('storage/'.$document->doc_path)}}" target="blank" class="uk-link view-file">View</a> or
                <a href="{{ asset('storage/'.$document->doc_path)}}" target="blank" class="uk-link download-file" download>Download</a>
            </p>
            @endif
        </div>
        <div class="uk-margin-top uk-margin-bottom social-share-section uk-text-center">
            <span class="uk-text-bold">Share this page</span><br>
            <a href="" class="twitter" uk-icon="twitter"></a>
            <a href="" class="facebook" uk-icon="facebook"></a>
            <a href="" class="linkedin" uk-icon="linkedin"></a>
            
        </div>
    </div>
</section>
@include('frontend.components.downloadbrochure')
@else
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/governance.png')}}" alt="Notifications Image">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
                <span class="uk-text-small" style="color: #8b8b8b;">{{$notice_service->service_name}}</span>
            <br>{{'Industrial Notifications'}}
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><a href="{{route('frontend.site.industry-notification')}}">{{'Industrial Notifications'}}</a></li>
            <li><a href="{{route('frontend.site.industry-notification.service',$notice_service->service_slug)}}">{{$notice_service->service_name}}</a></li>
            <li><span>{{$notice->notice_title}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-text-bold">
                        <img class="uk-border-circle title-page-image uk-margin-right" src="{{asset('frontend/images/governance.png')}}" alt="notification Image">
                        {{'Industrial Notifications'}}
                    </span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($services)
                        @foreach($services as $service)
                            <li {{ ($service->service_slug === $notice_service->service_slug) ? 'class=uk-active':'' }}>
                                <a class="uk-link-reset" href="{{route('frontend.site.industry-notification.service',$service->service_slug)}}">{{$service->service_name}}</a>
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
                <div class="uk-container uk-padding-remove-horizontal uk-margin-remove uk-width-1-1">
                    <div class="uk-section uk-padding-remove-vertical uk-margin-remove">
                        <div class="uk-margin-bottom">
                            <span class="notification_title">Industrial Notifications for {{$notice_service->service_name}}</span>
                        </div>
                        <span class="uk-article-title blog-detail-title"><a class="uk-link-reset" href="">{{$notice->notice_title}}</a></span>
                    
                        <p class="uk-article-meta">Notification Date : {{$notice->notice_date->format('d-m-Y')}}</a></p>
                    
                        <span class="uk-text-lead">{!! $notice->notice_content !!}</span>
                    
                        <div class="uk-grid-small" uk-grid>
                            @if($document)
                            <p class="notice-dl-text">Please click to 
                                <a href="{{ asset('storage/'.$document->doc_path)}}" target="blank" class="uk-link view-file">View</a> or
                                <a href="{{ asset('storage/'.$document->doc_path)}}" target="blank" class="uk-link download-file" download>Download</a>
                            </p>
                            @endif
                        </div>
                        <div class="uk-margin-top uk-margin-bottom social-share-section">
                            <span class="uk-text-bold">Share this page</span><br>
                            <a href="" class="twitter" uk-icon="twitter"></a>
                            <a href="" class="facebook" uk-icon="facebook"></a>
                            <a href="" class="linkedin" uk-icon="linkedin"></a>
                            
                        </div>
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
<script type="text/javascript">
    $(document).ready(function() {
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
</script>
@endsection