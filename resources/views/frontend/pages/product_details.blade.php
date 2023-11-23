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
<section class="uk-section uk-padding-remove">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <span class="uk-margin-small-left uk-heading-bullet uk-text-bold">{{$product->product_name}}</span>
                <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
                    <li>
                        <a href="#">{{'Overview'}}</a>
                    </li>
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
            <div class="uk-width-expand@m">
                <ul id="component-tab-left" class="uk-switcher">
                    <li>
                        <div class="uk-container ps-tab-header">
                            <span>Overview<span>
                        </div>
                        <div class="uk-container ps-tab-content uk-height-large">
                            {!! $product->product_content !!}
                        </div>
                    </li>
                    @if($sections)
                    @foreach($sections as $section)
                        <li>
                            <div class="uk-container ps-tab-header">
                                <span>{{$section->product_section_name}}<span>
                            </div>
                            <div class="uk-container ps-tab-content uk-height-large">
                                {!! $section->product_section_content !!}
                            </div>
                        </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- <section class="uk-section uk-padding-remove" uk-scrollspy="offset: 80px">
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <ul class="uk-tab-left" uk-tab="connect: #component-tab-left; animation: uk-animation-fade">
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
                </ul>
            </div>
            <div class="uk-width-expand@m">
                <ul id="component-tab-left" class="uk-switcher">
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
                                <span>{{$section->service_section_name}}<span>
                            </div>
                            <div class="uk-container ps-tab-content">
                                {!! $section->service_section_content !!}
                            </div>
                        </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section> --}}
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/datatables/dataTables.uikit.min.css')}}" />
<script type="text/javascript" src="{{asset('frontend/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/datatables/dataTables.uikit.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mandatory-list').DataTable({
            "paging":   true,
            "ordering": false,
            "searching": true,
        });
    });

</script>
@endsection