<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('frontend/css/uikit.min.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
        <script src="{{asset('frontend/js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit-icons.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" />
        @yield('scripts')
        <script>
            $('#brochure-form').submit(function(e){
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(form[0]);
                $.ajax({
                    url: "{{route('frontend.site.brochure')}}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data){
                        var lead = JSON.parse(data);
                        var id = lead.lead_id;
                        var url = "{{route('frontend.site.brochure', "+id+" )}}";
                    }
                });
            });
            $(document).on('click', '#reload-captcha', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: "{{route('frontend.site.brochure.reload-captcha')}}",
                    success: function (data) {
                        $(".captcha").html(data.captcha);
                    }
                });
            });
            
            $(document).ready(function(){
                $(window).scroll(function(){
                    var scrollTop = 80;
                    if($(window).scrollTop() >= scrollTop){
                        $('.back-to-top').removeClass('uk-hidden');
                    }
                    if($(window).scrollTop() < scrollTop){
                        $('.back-to-top').addClass('uk-hidden');  
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
                // UIkit.modal('#site-pop-up').show();

                UIkit.icon.add('twitter','<svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>');

                function isInViewport(el) {
                    const rect = el.getBoundingClientRect();
                    return (
                        rect.top >= 0 &&
                        rect.left >= 0 &&
                        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                        rect.right <= (window.innerWidth || document.documentElement.clientWidth)

                    );
                }


                const box = document.querySelector('#brochure');
                const message = document.querySelector('#message');

                document.addEventListener('scroll', function () {
                    if(isInViewport(box)) {
                        $('.ps-details-section').addClass('ps-sidebar-absolute');
                        console.log('in viewport');
                    } else {
                        $('.ps-details-section').removeClass('ps-sidebar-absolute');
                    }
                }, {
                    passive: true
                });
            });

            jQuery(function($) {
                $('a[href*="#"]:not([href="#"])').click(function() {
                    var target = $(this.hash);
                        $('html,body').stop().animate({
                        scrollTop: target.offset().top - 90
                        }, 'linear');   
                });    
                if (location.hash){
                    var id = $(location.hash);
                }
                $(window).on('load', function() {
                    if (location.hash){
                        $('html,body').animate({scrollTop: id.offset().top - 90}, 'linear')
                    };
                });
                
            });

        </script>
    </head>
    <body>
        <nav style="border-bottom: 0.09em solid #c4c4c4;" class="uk-navbar-container uk-box-shadow-medium uk-padding-large uk-padding-remove-vertical uk-background-transparent" uk-navbar="mode: click" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="{{route('frontend.site.home')}}">
                    <img class="uk-img-logo" src="{{asset('frontend/images/logo.png')}}">
                </a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav top-navbar">
                    <li><a href="{{route('frontend.site.home')}}">Home</a></li>
                    <li><a href="{{route('frontend.site.about-us')}}">About us</a></li>
                    <li>
                        <a href="#">Services <span uk-navbar-parent-icon></span></a>
                        <div class="uk-navbar-dropdown" style="top: -20px !important;">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                @if($services)
            
                                    @foreach($services as $service)
                                    <li><a href="{{route('frontend.site.service', $service->service_slug)}}">{{$service->service_name}}</a></li>
                                    @endforeach
        
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#">Resources <span uk-navbar-parent-icon></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <a href="#">Downloads</a>
                                </li>
                                <li>
                                    <a href="{{route('frontend.site.blog')}}">Blogs</a>
                                </li>
                                <li>
                                    <a href="#">Media Coverage</a>
                                </li>
                                <li>
                                    <a href="#">Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{route('frontend.site.industry-notification')}}">Industry Notifications</a></li>
                    <li><a href="{{route('frontend.site.home')}}">Contact us</a></li>
                </ul>
                <button class="uk-button uk-button-default uk-button-small">Login / Register</button>  
            </div>
        </nav>
        @yield('content')
        <section class="uk-box-shadow-medium brochure-section uk-section uk-background-muted uk-padding-large uk-padding-remove-vertical" id="download-brochure">
            <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom" id="brochure">
                <p class="section-heading uk-margin-remove-bottom">
                    Download Brochure
                </p>
                <span class="section-tagline">Process &amp; Guidelines</span>
            </div>
            <form class="uk-form-stacked uk-padding" id="brochure-form" method="POST">
                @csrf
                <div uk-grid>
                    <div class="uk-width-1-2@m">
     
                        <div class="uk-form-controls">
                            <input class="uk-input" name="fullname" id="fullname" type="text" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m">
              
                        <div class="uk-form-controls">
                            <input class="uk-input" name="organisation" id="organisation" type="text" placeholder="Company name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">

                        <div class="uk-form-controls">
                            <input class="uk-input" name="email" id="email" type="email" placeholder="Email address">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
        
                        <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                            <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical" id="country" name="country" style="font-size: 12px;">
                                <option value="">Select Country</option>
                                @if($countries)
                                @foreach($countries as $country)
                                <option value="{{json_encode([$country->name, $country->phonecode])}}">{{ucfirst(strtolower($country->name))." (+".$country->phonecode.")"}}</option>
                                @endforeach
                                @endif
                            </select>
                            <input class="uk-input uk-width-3-5 uk-padding-small uk-padding-remove-vertical" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="mobile" type="text" placeholder="mobile number">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">    

                        <div class="uk-form-controls">
                            <select class="uk-select" id="service" name="service">
                                <option value="">Select Service</option>
                                @if($services)
                                @foreach($services as $service)
                                <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">    
         
                        <div class="uk-form-controls">
                            <select class="uk-select" id="source" name="source">
                                <option value="">How did you find us?</option>
                                <option value="Website">Website</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Referral">Referral</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-1-1@m uk-margin-small-top">    

                        <div class="uk-form-controls">
                            <textarea name="message" class="uk-textarea" placeholder="Enter you query along with product details"></textarea>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">

                        <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                            <span class="uk-width-2-5 uk-padding-remove-left">
                                <span class="captcha">{!! captcha_img() !!}</span>
                                <button type="button" class="uk-button uk-button-small" id="reload-captcha" uk-icon="refresh">
                                </button>
                            </span>
                            <input class="uk-input uk-width-3-5 uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-text-center uk-margin-small-top">
                        <button class="uk-border-rounded uk-button uk-button-primary brochure-form-submit">Submit</button>
                    </div>
                </div>
            </form>
        </section>
        @yield('clients')
        <section class="uk-section uk-background-default uk-footer website-footer uk-padding-remove-vertical">
            <div  class="uk-padding-large" uk-grid>
                <div class="uk-width-1-4@s">
                    <img class="footer-logo" src="{{asset('frontend/images/logo.png')}}" alt="Export Approval">
                    <p class="uk-text-small">At Brand Liaison India Pvt Ltd, We Pride Ourselves On Being Your Trusted Partner In Regulatory Compliance. With A Commitment To Excellence, We Offer A Comprehensive Range Of Services To Ensure That Your Products Meet The Necessary Standards And Approvals.</p>
                    <div class="footer-social">
                        <a href="" class="facebook" uk-icon="facebook"></a>
                        <a href="" class="twitter" uk-icon="instagram"></a>
                        <a href="" class="linkedin" uk-icon="linkedin"></a>
                        <a href="" class="twitter" uk-icon="pinterest"></a>
                        <a href="" class="twitter" uk-icon="twitter"></a>
                        <a href="" class="whatsapp" uk-icon="whatsapp"></a>
                        
                    </div>
                </div>
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Services</li>
                        @if($services)
                        @foreach($services as $service)
                        <li>
                            <a href="{{route('frontend.site.service', $service->service_slug)}}">
                                {{$service->service_name}}
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Partner with us</li>
                        <li><a href="{{route('frontend.site.home')}}">Partnership</a></li>
                        <li><a href="{{route('frontend.site.home')}}">Careers</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Important Links</li>
                        <li><a href="{{route('frontend.site.home')}}">Home</a></li>
                        <li><a href="{{route('frontend.site.about-us')}}">About us</a></li>
                        <li>
                            <a href="#">Downloads</a>
                        </li>
                        <li>
                            <a href="{{route('frontend.site.blog')}}">Blogs</a>
                        </li>
                        <li>
                            <a href="#">Media Coverage</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li><a href="{{route('frontend.site.industry-notification')}}">Industry Notifications</a></li>
                    <li><a href="{{route('frontend.site.home')}}">Contact us</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-4@s">
                    <div uk-grid class="uk-margin-remove">
                        <span class="uk-nav-header uk-width-1-1 uk-margin-remove">Contact us</span>
                        <span class="uk-width-1-5 uk-align-center uk-padding-remove uk-margin-remove" uk-icon="location"></span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove uk-text-small">First Floor, F-205, Green House, Gali No 06, Mangal Bazar Laxmi Nagar, New Delhi, East Delhi, Delhi, 110092</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-align-center uk-padding-remove uk-margin-remove" uk-icon="receiver"></span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove uk-text-small">+91-9810363988</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-align-center uk-padding-remove uk-margin-remove" uk-icon="mail"></span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove uk-text-small">Testing@Gmail.Com</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="back-to-top uk-border-circle uk-position-small uk-position-fixed uk-position-bottom-right uk-overlay uk-overlay-default uk-background-primary uk-margin uk-light uk-hidden uk-padding-small">
            <a href="#" uk-scroll><img src="{{asset('frontend/images/upload.svg')}}" alt="back to top"/></a>
        </div>
        {{-- <div id="site-pop-up" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Headline</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                </p>
            </div>
        </div> --}}
    </body>
</html>