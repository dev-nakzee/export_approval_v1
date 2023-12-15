<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('frontend/css/uikit.min.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" />
        <script src="{{asset('frontend/js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit-icons.min.js')}}"></script>

        @yield('scripts')
        <script>
            function captcha(){
                var x = Math.floor((Math.random() * 9) + 1);
                var y = Math.floor((Math.random() * 9) + 1);
                var canvas = document.getElementById("captcha_image");
                var ctx=canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.fillStyle = "Blue";
                ctx.textAlign = "center";
                ctx.font = "12px Arial";
                ctx.strokeText(x+" + "+y+"   =",60,20);
                var answer = document.getElementById("captcha_answer");
                answer.value = x + y;
            }
            $(document).on("click", "#reload_captcha", function(){
                captcha();
            });

            $(document).ready(function(){
                captcha();
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
                                    <a href="{{route('frontend.site.downloads')}}">Downloads</a>
                                </li>
                                <li>
                                    <a href="{{route('frontend.site.blog')}}">Blogs</a>
                                </li>
                                <li>
                                    <a href="{{route('frontend.site.media-cover')}}">Media Coverage</a>
                                </li>
                                <li>
                                    <a href="{{route('frontend.site.gallery')}}">Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{route('frontend.site.industry-notification')}}">Industry Notifications</a></li>
                    <li><a href="{{route('frontend.site.contact-us')}}">Contact us</a></li>
                </ul>
            </div>
        </nav>
        @yield('content')
        @if (request()->route()->getName() === 'frontend.site.home' || request()->route()->getName() === 'frontend.site.gallery')
        <section class="uk-box-shadow-medium brochure-section uk-section uk-background-muted uk-padding-large uk-padding-remove-vertical" id="download-brochure">
            <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
                <p class="section-heading uk-margin-remove-bottom">
                    Download Brochure
                </p>
                <span class="section-tagline">Process &amp; Guidelines</span>
            </div>
            <div id="download-brochure-error-success">
            @if ($errors->any())
                <div class="uk-margin-small uk-width-1-1">
                    <div class="uk-alert-warning" uk-alert>
                        <a href class="uk-alert-close" uk-close></a>
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                @endif
                @if (session()->has('success'))
                <div class="uk-margin-small uk-width-1-1">
                    <div class="uk-alert-success" uk-alert>
                        <a href class="uk-alert-close" uk-close></a>
                        @foreach (session('success') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <form class="uk-form-stacked uk-padding" id="brochure-form" method="POST" action="{{route('frontend.site.brochure.store')}}">
                @csrf
                <div uk-grid>
                    <div class="uk-width-1-2@m">
     
                        <div class="uk-form-controls">
                            <input class="uk-input" name="fullname" id="fullname" type="text" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m">
              
                        <div class="uk-form-controls">
                            <input class="uk-input" name="organisation" id="organisation" type="text" placeholder="Organisation name">
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
                            {{-- <span class="captcha">{!! captcha_img() !!}</span> --}}
                            <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                            <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                            <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                            <input class="uk-input uk-width-expand uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-text-center uk-margin-small-top">
                        <button class="uk-border-rounded uk-button uk-button-primary brochure-form-submit">Submit</button>
                    </div>
                </div>
            </form>
        </section>
        @endif

        @yield('clients')
        <section class="uk-section uk-background-default uk-footer website-footer uk-padding-remove-bottom">
            <div  class="uk-padding-large uk-padding-remove-vertical" uk-grid id="footer">
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Powered by</li>
                    </ul>
                    <img class="footer-logo" src="{{asset('frontend/images/bl-logo-hq.jpg')}}" alt="Export Approval">
                    <p class="uk-text-small">Export Approval is a trusted platform for foreign manufacturers entering the Indian market. Our platform simplifies necessary Indian certifications and approvals for seamless product exportation to India.                    </p>
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
                        <li><a href="{{route('frontend.site.business.associate')}}">Business Associate</a></li>
                        <li><a href="{{route('frontend.site.resident.executive')}}">Resident Executive</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Important Links</li>
                        <li><a href="{{route('frontend.site.home')}}">Home</a></li>
                        <li><a href="{{route('frontend.site.about-us')}}">About us</a></li>
                        <li>
                            <a href="{{route('frontend.site.downloads')}}">Downloads</a>
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
                        <li><a href="{{route('frontend.site.holiday.list')}}">Holiday List</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-4@s">
                    <div uk-grid class="uk-margin-remove-top uk-margin-remove-left uk-margin-bottom uk-margin-remove-right">
                        <span class="uk-nav-header uk-width-1-1 uk-margin-small">Contact us</span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove">
                            <i uk-icon="location"></i>
                        </span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove uk-text-small"><strong>Brand Liaison India Pvt. Ltd.</strong><br>110, Sharma Complex<br> A-2, Guru Nanak Pura, Laxmi Nagar<br>
                            Delhi - 110092, India</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove">
                            <i uk-icon="whatsapp"></i>
                        </span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove uk-text-small">+91-9810363988 (Whatsapp call)</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove">
                            <i uk-icon="mail"></i>
                        </span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove uk-text-small">info@bl-india.com</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove"></span>
                        <div class="uk-width-4-5 footer-social uk-padding-remove uk-margin-remove">
                            <a href="" class="facebook" uk-icon="facebook"></a>
                            <a href="" class="twitter" uk-icon="instagram"></a>
                            <a href="" class="linkedin" uk-icon="linkedin"></a>
                            <a href="" class="pinterest" uk-icon="pinterest"></a>
                            <a href="" class="twitter" uk-icon="twitter"></a>
                        </div>
                    </div>
                    
                </div>
                <div class="uk-width-1-1 uk-text-center uk-text-small copyright-text">
                    <p class="">Copyright © 2023 Brand Liaison India Pvt Ltd.</p>
                </div>
                <div class="uk-width-1-1">
                </div>

            </div>
        </section>
        <div class="back-to-top uk-border-circle uk-position-small uk-position-fixed uk-position-bottom-right uk-overlay uk-overlay-default uk-background-primary uk-margin uk-hidden uk-padding-small">
            <a href="#" uk-scroll>
                <span uk-icon="icon: chevron-up; ratio: 1.5"></span>
            </a>
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