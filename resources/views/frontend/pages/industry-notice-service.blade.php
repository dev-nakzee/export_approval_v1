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
                    <a class="uk-button uk-margin-top download-brochure-btn" href="#download-brochure"><i class="fa-solid fa-down-long"></i> {{'Download Brochure'}}</a>
                </div>
            </div>
            <div class="uk-width-3-4@m uk-padding-remove-right">
                <div class="uk-container uk-padding-remove-right uk-margin-remove-right">
                    <div class="uk-margin-bottom">
                        <span class="notification_title">Industrial Notifications for {{$notice_service->service_name}}</span>
                    </div>
                    <table id="industrial-notification-list" class="uk-table uk-table-hover uk-table-striped uk-table-small" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notification</th>
                                <th width="100px">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($notices)
                            @foreach($notices as $notice)
                            <tr class="notice-detail-link" data-link="{{route('frontend.site.industry-notification.detail', [$notice->service_slug,$notice->notice_slug])}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$notice->notice_title}}</td>
                                <td>{{$notice->notice_date->format('d-m-Y')}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/datatables/dataTables.uikit.min.css')}}" />
<script type="text/javascript" src="{{asset('frontend/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.uikit.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#industrial-notification-list').DataTable({
            "paging":   true,
            "ordering": false,
            "searching": true,
            "oLanguage": {
                "sSearch": ""
            },
            language: {
                searchPlaceholder: "Search {{$notice_service->service_name}} notifications"
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
    $(document).on('click', '.notice-detail-link', function() {
        var url = $(this).data('link');
        window.location.href = url;
    })
</script>
@endsection