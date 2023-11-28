@extends('frontend.layouts.master', ['pages' => 'Industrial Notifications'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            {{'Industrial Notifications'}}
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
                            <li>
                                <a href="{{route('frontend.site.industry-notification.service',$service->service_slug)}}">{{$service->service_name}}</a>
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
                
                <div class="uk-container">
                    <table id="industrial-notification-list" class="uk-table uk-table-hover uk-table-striped uk-table-small" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notification</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($notices)
                            @foreach($notices as $notice)
                            <tr class="notice-detail-link" data-link="{{route('frontend.site.industry-notification.detail', [$notice->service_slug,$notice->notice_slug])}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$notice->notice_title}}</td>
                                <td>{{$notice->notice_date}}</td>
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