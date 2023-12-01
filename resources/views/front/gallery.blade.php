



@extends('front/layout/master')
@section('main-contant')

@php 

                                      

                              function getYoutubeVideoId($url) {
                                  // Define a regular expression pattern to match the video ID
                                  $pattern = '/(?<=v=|\/videos\/|embed\/|youtu.be\/|\/v\/|\/e\/|watch\?v=|\/embed\/)[^#\&\?]*/';
                
                                  // Use preg_match to find the video ID in the URL
                                  preg_match($pattern, $url, $matches);
                
                                  // Check if a match was found
                                  if (isset($matches[0])) {
                                      return $matches[0];
                                  } else {
                                      // If no match was found, return null or an error message
                                      return null;
                                  }
                              }
@endphp

<div class="inerheader2 inerheader4">
  <div class="container">
      <div class="row">
          <div class="col-sm-12">
              <div class="servicehead">
                  <div class="row">
                      <div class="col-sm-12">
                          <!-- <h1>Gallery</h1> -->
                          <div class="text-center registration_outer">
                              <div class="registration_logo">
                                  <img src="{{ url('front') }}/images/gallery_icon.png" alt="">
                              </div>
                              <h1>Gallery</h1>
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
                  <!-- <li><a href="#">Gallery</a> <i class="fa fa-caret-right"></i></li> -->

                  <li>Gallery</li>
              </ul>
          </div>
      </div>
  </div>
</div>



<section class="contact-page-section">
  <div class="container unicont-outer">
      <div class="row">
          <div class="col-md-4 col-lg-3" id="myScrollspy">
              <div class="sticky-top unileftmenu">
                  <div class="sidebar">
                      <div class="sidebar-widget category-widget sidebar-widget2">
                          <h4>Gallery</h4>
                          <div class="inner-box inner-box2">
                              <nav2>
                                  <ul class="product-category-list nav nav-pills nav-stacked sticky-sm-top"
                                      data-spy="affix" data-offset-top="205">
                                      <li><a href="#section1" class="targetlink">Image / Video</a></li>
                                      <li><a href="#section2" class="targetlink">Media Coverage</a></li>
                                      <li><a href="#section3" class="targetlink">Events Image / Video</a></li>
                                     
                                  </ul>
                                  </nav>
                          </div>
                      </div>
                  </div>

                  <div class="sidebar">
                      <div class="sidebar-widget category-widget sidebar-widget2">
                          <h4 class="packagebuy2"> <a href="{{url('contact-us')}}">
                              <div class="registration_logo">
                                        <img src="https://getmyapproval.akslearning.in/front/images/contact_us_icon.png" alt="">
                              </div>
                              Send a Query</a></h4>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end -->
          <div class="col-md-8 col-lg-9">
              <div class="unisection section_bg section_bg2" style="position: relative;">
                  <div class="gotoSection" id="section1"></div>


                  <h3>Image / Video</h3>
                  <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabs-1"
                              role="tab">Image Gallery</a> </li>
                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-2"
                              role="tab">Video Gallery</a> </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div class="tab-pane active" id="tabs-1" role="tabpanel">
                          <div class="scroll_gallery" id="style-6">
                              <div class="row">
                                @if(count($imageGalleryList)>0)
                                    @foreach ($imageGalleryList as $value)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="gap gallery"> <a
                                                href="{{ url('/uploads/gallery/'.$value->image) }}"
                                                data-toggle="lightbox" data-gallery="gallery">
                                                <img src="{{ url('/uploads/gallery/'.$value->image) }}"
                                                    class="img-fluid rounded">
                                                <h6>{{ $value->title }}</h6>
                                            </a> </div>
                                    </div>
                                    @endforeach
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane" id="tabs-2" role="tabpanel">
                          <div class="scroll_gallery" id="style-6">
                              <div class="row">
                                @if(count($imageVideoList)>0)
                                    @foreach ($imageVideoList as $key => $value)
                                  @php
                                  $videoId = getYoutubeVideoId($value->url);
                                 @endphp
                                        <div class="col-md-6 col-sm-6">
                                            <div class="gallery-item video">
                                                <!--<h6 style="text-align: center; font-size: 14px;">1.1</h6>-->
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <iframe src="https://www.youtube.com/embed/{{$videoId}}"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                </div>
                                                <div class="title-hover">{{ $value->title }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                  @endif

                                  
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- partial -->
              </div>

              <div class="unisection section_bg section_bg2" style="position: relative;">
                  <div class="gotoSection" id="section2"></div>
                  <h3>Media Coverage</h3>

                  <div class="container">
                      <div class="row">

                        @if(count($mediaCoverageList)>0)
                            @foreach ($mediaCoverageList as  $key =>$value)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="client_logo">
                                    <a
                                        href="{{!empty($value->link) ? $value->link : '#'}}">
                                        <img src="{{ url('uploads/media_coverage/'.$value->image) }}" class="media-image"
                                            title="Driving Awareness Programme : Brand Liaison">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                          @endif
                      </div>
                  </div>

              </div>





              <div class="unisection section_bg section_bg2" style="position: relative;">
                  <div class="gotoSection" id="section3"></div>
                  <h3>Events Image / Video</h3>
                  <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabs-3"
                              role="tab">Events Image</a> </li>
                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-4"
                              role="tab">Events Video</a> </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div class="tab-pane active" id="tabs-3" role="tabpanel">

                          <div class="scroll_gallery" id="style-6">



                              <div class="row">
                                @if(count($eventsImageList)>0)
                                @foreach ($eventsImageList as $key => $value)
                                    
                                
                                  <div class="col-lg-4 col-md-6">
                                      <div class="blog-item card border-0 mt-30 blog-page-item events_card"> <a
                                              href="#"><img class="card-img-top card-img-top2"
                                                  src="{{ url('/uploads/events_image/'.$value->image) }}" alt="{{$value->alt_tag}}"></a>
                                          <div class="card-body"> <a href="#" class="h4 h5">
                                            {{ $value->title }}</a>
                                              <p>{{ $value->short_description }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                                  @endif




                              </div>
                          </div>
                      </div>
                      <div class="tab-pane" id="tabs-4" role="tabpanel">
                          <div class="scroll_gallery" id="style-6">
                              <div class="row">


                                @if(count($eventsVideoList)>0)

                                @foreach ($eventsVideoList as $value)
                                
                                                  
                                    
                              @php
                              $videoId = getYoutubeVideoId($value->url);

                          @endphp

                                <div class="col-lg-4 col-md-6">
                                    <div class="blog-item card border-0 mt-30 blog-page-item events_card"> <a
                                            href="#">
                                            <!-- <img class="card-img-top card-img-top2" src="{{ url('front') }}/images/events_img_02.jpg" alt=""> -->

                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe width="100%"
                                                    src="https://www.youtube.com/embed/{{$videoId}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                            </div>

                                        </a>
                                        <div class="card-body"> <a href="#" class="h4 h5"> {{ $value->title }}</a>
                                            <p>{{ $value->short_description }}</p>

                                        </div>
                                    </div>
                                </div>
                                    
                                @endforeach
                                @endif
                                 


                               
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- partial -->
              </div>
          </div>
      </div>
  </div>
</section>



@section('js')


<script type="text/javascript">
    window.onload = function () {
        $('.gotoSection').addClass('gotoSection2');
    }
     
    // targetlink
      var i = 1;
      $(document).ready(function() {
            $('.targetlink').click(function() {
                if(i>1){
                    $('.gotoSection').removeClass('gotoSection2');   
                }
                ++i;
            });
            
            
             $('.targetlink').click(function() {
            $('.targetlink').removeClass("active"); // Remove "active" class from all elements
            $(this).addClass("active"); // Add "active" class to the clicked element
        });

        });
  </script>   
   
  <script src='{{ url('front') }}/js/ekko-lightbox.min.js'></script>
  
  <script src="{{ url('front') }}/js/main.js"></script>

  @endsection
@endsection