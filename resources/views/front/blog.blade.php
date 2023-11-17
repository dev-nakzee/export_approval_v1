
@extends('front/layout/master')
@section('main-contant')


<div class="inerheader2 inerheader4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="servicehead">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- <h1>Blog</h1> -->
                            <div class="text-center registration_outer">
                                <div class="registration_logo">
                                    <img src="{{ url('front') }}/images/blog_icon.png" alt="">
                                </div>
                                <h1>Blog</h1>
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
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="col-lg-8">
            <form method="get" class="electroni-form electroni-form2 electroni-form3">
                <div class="input-group full-input-box mb-3">
                    <input type="text" name="search" value="" class="form-control input-box"
                        placeholder="Enter Your Blog Name" aria-label="Recipient's username">
                    <div class="input-group-append">
                        <button ype="submit" class="input-group-text" style="height:34px;"><i
                                class="fa fa-search"></i><span>Search</span></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<section class="section cm-blogs bg-light-gray">
    <div class="container">
        <div class="row">


          @if(count($blogListing)>0)
          @foreach ($blogListing as $key => $value)
            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="{{ url('blog-details/'.$value->slug) }}"><img
                            class="card-img-top card-img-top2" src="{{ url('/uploads/Blog/BigImg/' . $value->image) }}" alt="{{$value->alt_tag}}"></a>
                    <div class="card-body"> <a href="{{ url('blog-details/'.$value->slug) }}" class="h4 h5">
                      {{ $value->title }}</a>
                        <p>{{ Str::limit($value->short_description,140) }}</p>
                    </div>
                    <div class="packagebuy"> <a href="{{ url('blog-details/'.$value->slug) }}">Read More</a> </div>
                </div>
            </div>

            @endforeach
            @endif

          {{-- 
            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_02.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">WHAT IS BIS CERTIFICATION?</a>
                        <p>BIS certification, also known as the Bureau of Indian Standards (BIS) registration, is a
                            mandatory quality and safety assurance certification for certain IT & Electronics and
                            various.</p>

                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div> --}}


            {{-- <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_03.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">BIS Registration for Automatic Data
                            Processing ...</a>
                        <p>The Bureau of Indian Standards (BIS) released an official gazette notification on 3rd July,
                            2013 stating the requirement of compulsory. </p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item">
                    <a href="#"><img class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_04.jpg"
                            alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">What is BIS Registration (CRS) for IT and
                            Electronic ...</a>
                        <p>Indian importer needs to get the copy of BIS Registration Certificate from the foreign
                            manufacturer and the importer will be asked.</p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>

            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_05.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">IS 13252 Part-1 in IT Equipment and
                            Electronic items</a>
                        <p>The presented standard IS 13252: Part 1 which incorporated a critical assortment of IT
                            hardware and items that can straightforwardly.</p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_06.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">The Evolution of Electronic Items import
                            in India</a>
                        <p>At this time IT and Electronic items business are only the main factor of a successful
                            business in India. And the acuteness.</p>

                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_07.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">Scope of manufacturing business of IT
                            ...</a>
                        <p>Manufacturing of Electronics and IT items are very advantageous for those entrepreneurs who
                            are going to start up the new business.</p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item">
                    <a href="#"><img class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_08.jpg"
                            alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">Revolution of Providing Compliance
                            Services ...</a>
                        <p>Ecommerce has a considerable influence on business costs and productivity. Ecommerce has a
                            chance to be widely adopted.</p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>

            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_09.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">BIS/CRS Registration to Electronic LED
                            TV ...</a>
                        <p>India is not only developed country but also the fastest growing country in the world. India
                            almost succeeded in all the industries. </p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_10.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">ISI/BIS Certification: A Gateway to the
                            Indian Market</a>
                        <p>For companies who are looking to enter the Indian market, obtaining BIS certification, which
                            stands for Bureau of Indian Standards.</p>

                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item"> <a href="#"><img
                            class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_11.jpg" alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">Will the importance of Product
                            compliances ...</a>
                        <p>Product compliance is the process of ensuring that a product meets all safety standards. Our
                            experts help manufacturers. </p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="blog-item card border-0 mt-30 blog-page-item">
                    <a href="#"><img class="card-img-top card-img-top2" src="{{ url('front') }}/images/blog_img_12.jpg"
                            alt=""></a>
                    <div class="card-body"> <a href="#" class="h4 h5">What is BIS Certification (ISI Mark) or
                            BIS ...</a>
                        <p>Only the manufacturer of the product can apply for BIS certification (ISI Mark). Any
                            manufacturer (domestic or foreign) who wishes.</p>
                    </div>
                    <div class="packagebuy"> <a href="blog-details.html">Read More</a> </div>
                </div>

            </div> --}}

        </div>
    </div>
    </div>
</section>



@endsection