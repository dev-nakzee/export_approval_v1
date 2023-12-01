@extends('frontend.layouts.master', ['pages' => 'Industrial Notifications'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            <span class="uk-text-small" style="color: #8b8b8b;">{{$notice_service->service_name}}</span>
            <br>{{'Industrial Notifications'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Industrial Notifications'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-margin-small-left uk-heading-bullet uk-text-bold">{{'Industrial Notifications'}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($services)
                        @foreach($services as $service)
                            <li {{ ($service->service_slug === $notice_service->service_slug) ? 'class=uk-active':'' }}>
                                <a href="{{route('frontend.site.industry-notification.service',$service->service_slug)}}">{{$service->service_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-width-1-1 uk-margin-top download-brochure-btn" href="#download-brochure">{{'Download Brochure'}}</a>
                </div>
            </div>
            <div class="uk-width-3-4@m uk-padding-remove-right uk-height-small">
                <div class="uk-container">
                    <div class="ps-sections">
                        <div class="uk-container">
                            <span class="notice-title">{{$notice->notice_title}}<span>
                        </div>
                        <div class="uk-container ps-tab-content">
                            {!! $notice->notice_content !!}

                            @if($document)
                            <p class="notice-dl-text">Please click to 
                                <a href="{{ asset('storage/'.$document->doc_path)}}" target="blank" class="uk-link">View</a> or
                                <a href="{{ asset('storage/'.$document->doc_path)}}" target="blank" class="uk-link" download>Download</a>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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