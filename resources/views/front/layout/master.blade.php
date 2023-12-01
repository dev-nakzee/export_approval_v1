<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>{{!empty($meta_title) ? $meta_title :'Export Approval'}}</title>
    <meta name="description" content="{{!empty($meta_description) ? $meta_description : ''}}">
    <meta name="keywords" content="{{!empty($meta_keywords) ? $meta_keywords : ''}}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('front')}}/images/favicon.png">
    <!-- animate CSS ============================================ -->
    <link rel="stylesheet" href="{{ url('front') }}/css/animate.css">
    <link rel="stylesheet" href="{{ url('front') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('front') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('front') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('front') }}/css/menu.css">
    <link rel="stylesheet" href="{{ url('front') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ url('front') }}/css/owl.carousel.min.css">
    <script src="{{ url('front') }}/js/active-placeholder.min.js"></script>
    <script src="{{ url('front') }}/js/typewriter.js"></script>
    <!-- slider-section -->

    <link href="{{ url('front') }}/css/custom.flexslider.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="{{ url('front') }}/js/jquery-1.9.0.min.js"></script>
    <script src="{{ url('front') }}/js/jquery.flexslider-min.js"></script>
    <!----- css for toaster ---->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- slider-section -->
</head>

<body>
    <div class="modal" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="popup-body">
                    <div class="webpopup">
                        <img class="img-responsive img" src="{{ url('front') }}/images/logo.png"
                            alt="BIS, ISI, WPC Certification Provider Company Logo"> <br><br>
                        <h2>Welcome to Export Approval!</h2>
                        <p>This is Exclusive for Foreign Applicant's, if you are <span>INDIAN</span> Applicant's.
                            <!-- Please<strong> <span>CLICK HERE </span></strong> -->
                        </p>
                    </div>
                </div>
                <div class="popup-bottom">
                    <div class="text-center">
                        <a href="https://www.bl-india.com/" target="blank" class="btn btn-warning mar-b10">Yes, Visit
                            the new website</a>
                        <button class="btn btn-no" data-dismiss="modal">No, Stay here only</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER-TOP START -->

    <div class="header-top">
        <div class="container">
            <div class="header-right-menu top-wishlist">
                <nav class="navbar navbar-light navbar-expand-lg py-0">
                    <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>  -->
                    <div class="navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-block ml-lg-auto d-lg-flex justify-content-lg-between">
                            <li class="nav-item"> <a href="https://api.whatsapp.com/send?phone=919810367908"
                                    target="_blank"><i class="fa fa-whatsapp"></i> &nbsp;+91-9810367908</a> </li>
                        </ul>
                        <div class="google_tra">
                            <div id="google_translate_element" style="margin-left: -13px;"></div>
                            <script>
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'en'
                                    }, 'google_translate_element');
                                }
                            </script>
                            <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
                    </div>
                </nav>
                <div class="clear"></div>
            </div>
        </div>
        <!-- HEADER-MIDDLE START -->
        <section class="header-middle page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="logo"> <span class="logo1"><a href="{{ url('/') }}"> <img
                                        src="{{ url('front') }}/images/logo.png" class="animated bounceInDown"
                                        title="Quick-e Service"></a></span> <span class="mobile-logo"><a
                                    href="{{ url('/') }}"><img src="{{url('front')}}/images/mobile-logo.jpg"
                                        class="animated bounceInDown"></a></span> </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div>
                            <nav id='cssmenu'>
                                <div id="head-mobile">Menu</div>
                                <div class="button1"></div>
                                <ul>
                                    <!-- class='active2' -->
                                    <li><a href='{{ url('/') }}' class="home1 {{ Request::is('/') ? 'active' : '' }}">
                                            <!-- <i class="fa fa-home" aria-hidden="true"></i> -->
                                            Home</a></li>
                                    <li><a href='{{url('about-us')}}' class="home1 {{ Request::is('about-us') ? 'active' : '' }}">About Us </a></li>
                                    <li><a href='#' class="home1 {{ Request::is('service/*') ? 'active' : '' }}">Services</a>

                                        <ul>
                                            @php
                                            $categoryList = App\Models\Category::where('status',1)->get();
                                            @endphp

                                            @if(count($categoryList)>0)
                                            @foreach ($categoryList as $key => $value)
                                                <li><a href="{{ url('service/'.$value->slug) }}">{{ $value->name }}</a></li>
                                            @endforeach
                                            @endif

                                            {{--                                             
                                            <li><a href="#">ISI / BIS Certification</a></li>
                                            <li><a href="#">WPC / ETA Approval</a></li>
                                            <li><a href="#">BEE Registration</a></li>
                                            <li><a href="#">EPR Authorization for E-Waste</a></li>
                                            <li><a href="#">EPR Authorization for P-Waste</a></li>
                                            <li><a href="#">EPR Authorization for Battery Waste</a></li>
                                            <li><a href="#">TEC Certification</a></li>
                                            <li><a href="#">Brand Representation</a></li>
                                            <li><a href="#">Trademark</a></li> --}}
                                        </ul>
                                    </li>
                                    <li><a href='{{url('industry-notifcations')}}' class="home1 {{ Request::is('industry-notifcations') ? 'active' : '' }}">Industry Notifications</a></li>
                                    <li><a href='{{ url('gallery') }}' class="home1 {{ Request::is('gallery') ? 'active' : '' }}">Gallery</a></li>
                                    <li><a href='{{ url('join-us') }}' class="home1 {{ Request::is('join-us') ? 'active' : '' }}" >Joins Us </a></li>
                                    <li><a href='{{ url('contact-us') }}'  class="home1 {{ Request::is('contact-us') ? 'active' : '' }}" >Contact Us</a></li>
                                    <li class="nav-item toploginbtn"><a href="javascript:void(0);" id="myBtn"><i
                                        class="fa fa-lock"></i> Login</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HEADER-MIDDLE END -->
    </div>
    
    @yield('main-contant')

    <a id="back-to-top" href="#" class="back-to-top" role="button"> <i class="fa fa-chevron-up"></i> </a>
    <!-- BRAND-CLIENT-AREA END -->
    <footer class="footer wow animated fadeIn">
        <div class="container">
            <div class="foot-container1">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="foot-list">
                            <h4>Site Info</h4>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{url('about-us')}}">About Us</a></li>
                                <li><a href="{{url('industry-notifcations')}}">Notifications</a></li>
                                <!-- <li><a href="events.html">Upcoming Events</a></li> -->
                                <li><a href="{{ url('gallery') }}">Gellery</a></li>
                                <!-- <li><a href='news.html'>News</a></li> -->
                                <li><a href="{{ url('join-us') }}">Joins Us</a></li>
                                <li><a href="{{url('blog')}}">Blog</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="foot-list">
                            <h4>Services</h4>
                            <ul>
                            @php
                            $categoryList = App\Models\Category::where('status',1)->get();
                            @endphp

                                @if(count($categoryList)>0)
                                @foreach ($categoryList as $key => $value)
                                    <li><a href="{{ url('service/'.$value->slug) }}">{{ $value->name }}</a></li>
                                @endforeach
                                @endif
                            </ul>
                            
                            
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="foot-list">
                            <h4>Contact Info</h4>
                        </div>
                        <ul class="footer-contact-address">
                            <li> <i class="fa fa-map-marker"></i>110, Sharma Complex
                                A-2, Guru Nanak Pura,<br>
                                Laxmi Nagar
                                Delhi - 110092, India </li>
                            <li><i class="fa fa-phone"></i> <a href="tel:+911142686678" target="_blank">
                                    +91-11-42686678</a></li>
                            <li> <i class="fa fa-envelope"></i><a href="mailto:info@exportapproval.com"
                                    target="_blank">info@exportapproval.com</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- COPYRIGHT-AREA START -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="copy-right">
                        <address>
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            Export Approval | All Rights Reserved.
                        </address>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="powerd-by"> <a href="https://www.akswebsoft.com/"
                            title="AKS WebSoft Consulting Pvt Ltd" target="_blank"><img
                                src="{{ url('front') }}/images/aks.png" alt="AKS WebSoft Consulting Pvt Ltd" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- login popup start -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content animated bounceInDown"> <span class="close">&times;</span>
            <!-- <ul class="tabs">
              <li class="tabbing tab-link current" data-tab="tab-1">Tab One</li>
              <li class="tabbing tab-link" data-tab="tab-2">Tab Two</li>
            </ul> -->
            <div id="tab-1" class="tab-content current loginouter">
                <div class="card d-flex mx-auto">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 loginleft"> <img
                                src="{{ url('front') }}/images/login-bg.jpg" class="" alt=""
                                style="max-width: 100%">
                            <div class="row justify-content-center">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                    <h1 class="wlcm"> <img src="{{ url('front') }}/images/logo.png"
                                            class="" alt="" style="max-width: 100%"> </h1>
                                    <span class="sp1"> <span class="px-3 bg-danger rounded-pill"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 pl-5 loginrht">
                            <div class="row"> </div>
                            <div class="formouter">
                                <div class="d-flex">
                                    <h3 class="font-weight-bold">Login Here</h3>
                                </div>
                                <input type="text" name="userid" placeholder="Email">
                                <input type="password" name="passw" placeholder="Password">
                                <span class="ac" id="forgot">Forgot?</span> <a href="user-dashboard.html"><a
                                        href="user-dashboard.html">
                                        <button class="text-white text-weight-bold bt">Login</button>
                                    </a></a>
                                <h5 class="ac" id="register"> Don't have an Account? <a
                                        href="javascript:void(0);" class="tabbing" data-tab="tab-2">Register Now!
                                    </a> </h5>
                                <div class="ordevider"><span>OR</span></div>
                                <button class="text-white text-weight-bold bt mt-5 bluebtn tabbing"
                                    data-tab="tab-3">Login With OTP</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-3" class="tab-content loginouter">
                <div class="card d-flex mx-auto">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 loginleft"> <img
                                src="{{ url('front') }}/images/otp-bg.jpg" class="" alt=""
                                style="max-width: 100%">
                            <div class="row justify-content-center">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                    <h1 class="wlcm"> <img src="{{ url('front') }}/images/logo.png"
                                            class="" alt="" style="max-width: 100%"> </h1>
                                    <span class="sp1"> <span class="px-3 bg-danger rounded-pill"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 pl-5 loginrht">
                            <div class="row"> </div>
                            <div class="formouter">
                                <div class="d-flex">
                                    <h3 class="font-weight-bold">Login With OTP</h3>
                                </div>
                                <input type="text" name="userid" placeholder="Enter 10 digit Mobile No.">
                                <input type="text" name="passw" placeholder="Enter OTP">
                                <a href="user-dashboard.html">
                                    <button class="text-white text-weight-bold bt">Login</button>
                                </a>
                                <h5 class="ac" id="register"> Allready have an Account? <a
                                        href="javascript:void(0);" class="tabbing" data-tab="tab-1">Login Now! </a>
                                </h5>
                                <h5 class="ac" id="register"> or Don't have an Account? <a
                                        href="javascript:void(0);" class="tabbing" data-tab="tab-2">Register Now!
                                    </a> </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-content loginouter">
                <div class="card d-flex mx-auto">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 loginleft"> <img
                                src="{{ url('front') }}/images/register-bg.jpg" class="" alt=""
                                style="max-width: 100%">
                            <div class="row justify-content-center">
                                <div class="w-75 mx-md-5 mx-1 mx-sm-2 mb-5 mt-4 px-sm-5 px-md-2 px-xl-1 px-2">
                                    <h1 class="wlcm"> <img src="{{ url('front') }}/images/logo.png"
                                            class="" alt="" style="max-width: 100%"> </h1>
                                    <span class="sp1"> <span class="px-3 bg-danger rounded-pill"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> <span
                                            class="ml-2 px-1 rounded-circle"></span> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 c2 pl-5 loginrht">
                            <div class="row"> </div>
                            <div class="formouter">
                                <div class="d-flex">
                                    <h3 class="font-weight-bold">Register Here</h3>
                                </div>
                                <input type="text" placeholder="Name">
                                <input type="text" placeholder="Email ID">
                                <input type="text" placeholder="Mobile">
                                <input type="password" placeholder="Password">
                                <input type="password" placeholder="Confirm Password">
                                <input type="password" placeholder="Referred Code">
                                <button class="text-white text-weight-bold bt">Register</button>
                                <h5 class="ac" id="register"> Allready have an Account? <a
                                        href="javascript:void(0);" class="tabbing" data-tab="tab-1">Login Now! </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
    <script>
        new TypeWriter('#zipcodeInput', ['Enter your product Name', 'Enter your product Name'], {
            writeDelay: 60
        });
    </script>
    <!-- login popup end -->
    <!-- <script>
        var modal = document.getElementById("myModal");


        var btn = document.getElementById("myBtn");


        var span = document.getElementsByClassName("close")[0];


        btn.onclick = function() {
            modal.style.display = "block";
        }


        span.onclick = function() {
            modal.style.display = "none";
        }


        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script> -->


    <script type="text/javascript">
        $(document).ready(function() {
            $('.tabbing').click(function() {
                var tab_id = $(this).attr('data-tab');

                $('.tabbing').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            })
        })
    </script>
    <script src="{{ url('front') }}/js/jquery-3.6.0.min.js"></script>


    
    <!-- meanmenu js  -->
    <script type="text/javascript" src="{{ url('front') }}/js/jquery.marquee-client.js"></script>
    <script>
        $(function() {
            var $mwo = $('.marquee-with-options');
            $('.marquee').marquee();
            $('.marquee-with-options').marquee({
                speed: 30000,
                gap: 6,
                delayBeforeStart: 0,
                direction: 'left',
                duplicated: true,
                pauseOnHover: true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });
    </script>
    <script src="{{ url('front') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('front') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // ==========banner slider===========
        $('.banner').owlCarousel({
            items: 1,
            loop: true,
            smartSpeed: 1000,
            mouseDrag: false,
            touchDrag: false,
            animateIn: "fadeIn",
            animateOut: "fadeOut",
            margin: 0,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
        });

        // ==========banner slider===========
        
        
        $('.mandatory-pro').owlCarousel({
            items: 3,
            loop: true,
            smartSpeed: 1000,
            mouseDrag: true,
            touchDrag: true,
            dots: true,
            nav: false,
            thumbs: true,

            // animateIn: "fadeIn",
            // animateOut: "fadeOut",
            margin: 20,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
        
        $('.testimonial').owlCarousel({
            items: 3,
            loop: true,
            smartSpeed: 1000,
            mouseDrag: true,
            touchDrag: true,
            dots: true,
            nav: true,
            thumbs: true,

            // animateIn: "fadeIn",
            // animateOut: "fadeOut",
            margin: 20,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }



        });
    </script>
    <script src="{{ url('front') }}/js/jqueryui.js"></script>
    <script src="{{ url('front') }}/js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{ url('front') }}/js/index.js"></script>


    <script>
        $(document).ready(function() {
            @if(Request::is('/s'))
            $('#myModal2').modal('show');
            @endif
        });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 0) {
                $('.top-wishlist').addClass("topbarhide");
            } else {
                $('.top-wishlist').removeClass("topbarhide");
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"
      switch(type){
        case 'info':
               toastr.info("{{ Session::get('message') }}");            
                Swal.fire(
                'Thank You!',
                '{{ Session::get('message') }}',
                'success'
                ).then(function() {
                window.location = "{{ url('/') }}";
                });
               break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                break;
            case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif   
</script> 

<script type="text/javascript" src="https://parsleyjs.org/dist/parsley.js"></script>
@yield('js')




</body>

</html>
