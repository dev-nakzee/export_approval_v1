@extends('frontend.layouts.master', ['pages' => 'Industrial Notifications'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            <span class="uk-text-small" style="color: #8b8b8b;">{{'Info & Guidelines'}}</span>
            <br>{{'Downloads'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Downloads'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-section uk-padding-remove-vertical">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-margin-small uk-heading-bullet uk-text-bold">{{'Downloads'}}</span>
                    <ul class="uk-nav-default uk-nav-divider uk-margin-top" uk-nav>
                        @if($services)
                        @foreach($services as $service)
                            <li>
                                <a href="{{route('frontend.site.industry-notification.service',$service->service_slug)}}">{{$service->service_name}}</a>
                            </li>
                        @endforeach
                        @endif
                    </ul>
                    <a class="uk-button uk-margin-top download-brochure-btn" href="#download-brochure"><i uk-icon="download"></i>{{'Download Brochure'}}</a>
                </div>
            </div>
            <div class="uk-width-3-4@m uk-padding-remove uk-margin-remove">
                <div class="uk-flex uk-padding-remove-right uk-margin-remove-right uk-margin-remove-left" uk-grid>
                    <div class="uk-margin-bottom uk-width-1-1">
                        <span class="downloads_list">{{"All Downloads"}}</span>
                    </div>
                    <div class="uk-width-1-1 uk-margin-remove">
                        <table id="downloads-list" class="uk-table uk-table-hover uk-table-striped uk-table-small" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Infomation</th>
                                    <th>Guidelines</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($downloads)
                                @foreach($downloads as $download)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$download->product_name}}</td>
                                    <td>
                                        @if($download->information)
                                        <a class="view-file" href="{{$download->information}}" target="black">View</a> / <a class="download-file" href="{{$download->information}}" download>Downloads</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($download->guidelines)
                                        <a class="view-file" href="{{$download->guidelines}}" target="black">View</a> / <a class="download-file" href="{{$download->guidelines}}" download>Downloads</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection