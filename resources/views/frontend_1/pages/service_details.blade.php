@extends('frontend.layouts.master', ['pages' => 'Services'])
@section('content')
<div class="container-fluid">
    <div class="row h-100">
        <div class="col-md-12 service-header text-center">
            <h2><img class="me-4" src="{{$service->media_path}}" alt="{{$service->img_alt}}">{{$service->service_name}}</h2>
        </div>
    </div>
</div>
<div class="d-flex bread-crums-section px-5 py-2">
    <nav style="--bs-breadcrumb-divider: '&#9656;';" aria-label="breadcrumb" class="ms-auto">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Services</li>
        <li class="breadcrumb-item active" aria-current="page">{{$service->service_name}}</li>
        </ol>
    </nav>
</div>
<div class="d-flex service-section-one">
    <div class="row px-5 sticky-top">
        <div class="col-md-3 sidebar">
            <div class="sidebar-heading pt-0">{{$service->service_name}}</div>
            <ul class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                @if($sections)
                @foreach($sections as $section)
                    <li class="nav-item">
                        <a class="nav-link" href="#{{$section->service_section_slug}}" data-bs-target="#{{$section->service_section_slug}}" role="tab" aria-controls="{{$section->service_section_slug}}">{{$section->service_section_name}}</a>
                    </li>
                @endforeach
                @endif
                @if($service->service_product_show === 1) 
                <li class="nav-item">
                    <a class="nav-link" href="#{{'mandatory-product-list'}}" data-bs-target="#{{'mandatory-product-list'}}" role="tab" aria-controls="#{{'mandatory-product-list'}}">Mandatory Product List</a>
                </li>
                @endif
                @if($service->faqs) 
                <li class="nav-item">
                    <a class="nav-link" href="#{{'frequently-asked-questions'}}" data-bs-target="#{{'frequently-asked-questions'}}" role="tab" aria-controls="#{{'frequently-asked-questions'}}">Frequently asked questions</a>
                </li>
                @endif
            </ul>
        </div>
        
        <div class="tab-content col-md-9" id="v-pills-tabContent">
            @if($sections)
            @foreach($sections as $section)
            <div class="tab-pane fade show active" id="{{$section->service_section_slug}}" role="tabpanel" tabindex="0">
                <div class="section-content-header px-2">
                    <span>{{$section->service_section_name}}<span>
                </div>
                <div class="px-2 pt-4">
                {!! $section->service_section_content !!}
                </div>
            </div>
            @endforeach
            @endif
            @if($service->service_product_show === 1) 
            <div class="tab-pane fade show active" id="{{'mandatory-product-list'}}" role="tabpanel" tabindex="0">
                <div class="section-content-header px-2">
                    <span>{{'Mandatory product list'}}<span>
                </div>
                @php
  
                @endphp
                <div class="px-2 pt-4">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Compliance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_category_name}}</td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            @if($service->faqs)
            <div class="tab-pane fade show active" id="{{'frequently-asked-questions'}}" role="tabpanel" tabindex="0">
                <div class="section-content-header px-2">
                    <span>{{'Frequently asked questions'}}<span>
                </div>
                @php
                $faqs = json_decode($service->faqs, true);
                $i = 1;
                @endphp
                @foreach($faqs as $q=>$a)
                <div class="px-2">
                    <div class="accordion accordion-flush" id="faqs">
                        <div class="accordion-item" style="border-bottom: 1px solid #333;">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{'faq-'.$i}}" aria-expanded="false" aria-controls="{{'faq-'.$i}}">
                              {{$i.". ". $q}}
                            </button>
                          </h2>
                          <div id="{{'faq-'.$i}}" class="accordion-collapse collapse" data-bs-parent="#faqs">
                            <div class="accordion-body">
                                {{$a}}
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                @php
                $i++;
                @endphp
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection