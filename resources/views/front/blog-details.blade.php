



@extends('front/layout/master')
@section('main-contant')
    <div class="inerheader2 inerheader4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="servicehead">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- <h1>Blog Details</h1> -->
                                <div class="text-center registration_outer">
                                    <div class="registration_logo">
                                        <img src="{{ url('front') }}/images/blog_icon.png" alt="">
                                    </div>
                                    <h1>Blog Details</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <ul class="breadcum inerheader3">
                        <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-caret-right"></i></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog-details-desc mb-30">
                        <div class="image mb-20"> <img src="{{ url('/uploads/Blog/BigImg/' . $blogData->image) }}" alt="{{$blogData->alt_tag}}"> </div>
                        <ul class="info-list mb-20">
                            <li><i class="bx bx-calendar"></i> {{ date('M d, Y',strtotime($blogData->created_at)) }} </li>
                            <li><i class="bx bx-tag"></i></li>
                        </ul>
                        <div class="content3 mb-20">
                            <h3>{{ $blogData->title }}</h3>

                            {!! $blogData->description !!}
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <aside class="widget-area">

                        <div class="blog_outer">
                            <div class="widget widget-article mb-30 ">
                                <h3 class="sub-title">Popular Categories</h3>
                                <ul>

                                  @if(count($blogListing)>0)
                                    @foreach ($blogListing as $value)
                                    <li><a href="{{ url('blog-details/'.$value->slug) }}">{{ Str::limit($value->title,60) }}</a> </li>
                                    @endforeach
                                  @endif
                              
{{--                               
                                    <li><a href="#">BIS Registration for Automatic Data Processing ...</a> </li>
                                    <li><a href="#">What is BIS Registration (CRS) for IT and Electronic ..</a>
                                    </li>
                                    <li><a href="#">WHAT IS BIS CERTIFICATION?</a> </li>
                                    <li><a href="#">BIS Registration for Automatic Data Processing ...</a> </li>
                                    <li><a href="#">What is BIS Registration (CRS) for IT and Electronic ..</a>
                                    </li>
                                    <li><a href="#">IS 13252 Part-1 in IT Equipment and Electronic items</a>
                                    </li>
                                    <li style="border: none;"><a href="#">The Evolution of Electronic Items
                                            import in India</a> </li> --}}

                                </ul>



                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection