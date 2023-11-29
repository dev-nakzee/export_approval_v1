@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            <img class="uk-margin-right service-details-image" src="{{$service->media_path}}" alt="{{$service->img_alt}}">
            {{$service->service_name}}
        </h1>
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
    <div class="uk-flex">
        <div uk-grid>
            <div class="uk-width-1-4@m">
                <div class="ps-details-section">
                    <span class="uk-margin-small-left uk-heading-bullet uk-text-bold">{{$service->service_name}}</span>
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
                            <a href="#{{'frequently-asked-questions'}}">Frequently asked questions</a>
                        </li>
                        @endif
                        <li>
                            <a href="#">{{'Download Brochure'}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-3-4@m uk-padding-remove-right">
                @if($sections)
                @foreach($sections as $section)
                    <div class="ps-sections" id="{{$section->service_section_slug}}">
                        <div class="uk-container ps-tab-header">
                            <span>{{$section->service_section_name}}<span>
                        </div>
                        <div class="uk-container ps-tab-content">
                            {!! $section->service_section_content !!}
                        </div>
                    </div>
                    @if($loop->first)
                        @if($service->service_product_show === 1) 
                        <div class="ps-sections" id="mandatory-product-list">
                            <div class="uk-container ps-tab-header">
                                <span>Mandatory Product List<span>
                            </div>
                            <div class="uk-container ps-tab-content">
                                <table id="mandatory-list" class="uk-table uk-table-hover uk-table-striped uk-table-small" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th class="uk-hidden">category</th>
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
                                        @php
                                            $category = ''
                                        @endphp
                                        @foreach($products as $product)
                                        @if($category === $product->product_category_name)
                                        <tr class="product-page-link" data-slug="{{$product->product_slug}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td class="uk-hidden">{{$product->product_category_name}}</td>
                                            <td>{{$product->product_name}}</td>
                                            @if($service->service_compliance)
                                            @foreach(unserialize($product->product_compliance) as $compliance)
                                                <td>{{$compliance}}</td>
                                            @endforeach
                                            @endif
                                        </tr>
                                        @else
                                            <tr>
                                                <td class="uk-hidden"></td>
                                                <td colspan="100%" class="uk-text-center uk-text-bold">{{$product->product_category_name}}</td>
                                                <td class="uk-hidden"></td>
                                                @if($service->service_compliance)
                                                @foreach(unserialize($product->product_compliance) as $compliance)
                                                    <td class="uk-hidden"></td>
                                                @endforeach
                                                @endif
                                            </tr>
                                            <tr class="product-page-link" data-slug="{{$product->product_slug}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td class="uk-hidden">{{$product->product_category_name}}</td>
                                                <td>{{$product->product_name}}</td>
                                                @if($service->service_compliance)
                                                @foreach(unserialize($product->product_compliance) as $compliance)
                                                    <td>{{$compliance}}</td>
                                                @endforeach
                                                @endif
                                            </tr>
                                        @endif
                                        @php
                                        $category = $product->product_category_name;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        @endif
                    @endif
                @endforeach
                @endif
                @if($service->faqs) 
                <div class="ps-sections" id="frequently-asked-questions">
                    <div class="section-content-header px-2">
                        <span>{{$section->service_section_name}}<span>
                    </div>
                    <div class="px-2 pt-4">
                    {!! $section->service_section_content !!}
                    </div>
                </div>
                @endif
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
        $('#mandatory-list').DataTable({
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
    $(document).on('click', '.product-page-link', function() {
        var slug = $(this).data('slug');
        var url = "{{route('frontend.site.product', ":slug")}}";
        url = url.replace(':slug', slug);
        window.location.href = url;
    });
</script>
@endsection