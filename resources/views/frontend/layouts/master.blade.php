<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{asset('frontend/css/uikit.min.css')}}" />
        @if ($agent->isMobile())
        <link rel="stylesheet" href="{{asset('frontend/css/mobile.css')}}" />
        @else
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
        @endif
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" />
        <script src="{{asset('frontend/js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit-icons.min.js')}}"></script>

        @yield('scripts')
        <script>
            $(document).ready(function(){
                var scrollTop = 80;
                $(window).scroll(function(){
                    if($(window).scrollTop() >= scrollTop){
                        $('.back-to-top').removeClass('uk-hidden');
                    }
                    if($(window).scrollTop() < scrollTop){
                        $('.back-to-top').addClass('uk-hidden');  
                    }
                });
                $(window).scroll(function(){
                    if($(window).scrollTop() >= scrollTop){
                        $('.ps-details-section').addClass('ps-sidebar-fixed');  
                    }
                    if($(window).scrollTop() < scrollTop){
                        $('.ps-details-section').removeClass('ps-sidebar-fixed');  
                    }
                });

                if($(window).scrollTop() >= scrollTop) {
                    $('.ps-details-section').addClass('ps-sidebar-fixed');  
                }
                else {
                    $('.ps-details-section').addClass('ps-sidebar-fixed');  
                }

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

            @if ($agent->isMobile())
            jQuery(function($) {
                $('a[href*="#"]:not([href="#"])').click(function() {
                    var target = $(this.hash);
                        $('html,body').stop().animate({
                        scrollTop: target.offset().top - 220
                        }, 'linear');   
                });    
                if (location.hash){
                    var id = $(location.hash);
                }
                $(window).on('load', function() {
                    if (location.hash){
                        $('html,body').animate({scrollTop: id.offset().top - 220}, 'linear')
                    };
                });
            });
            @else
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
            @endif
        </script>
    </head>
    <body>
        @if ($agent->isMobile())
        <nav style="border-bottom: 0.09em solid #c4c4c4;" class="uk-navbar-container uk-box-shadow-medium uk-padding-small uk-padding-remove-vertical uk-background-transparent" uk-navbar="mode: click" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <a class="uk-navbar-item uk-logo" href="{{route('frontend.site.home')}}">
                <img class="uk-img-logo" src="{{asset('frontend/images/logo.png')}}">
            </a>
            <div class="uk-navbar-item">
                <a href="#main_menu" uk-toggle class="mobile-nav-toggle">
                    <span uk-icon="icon: menu; ratio: 2.5"></span>
                </a>
            </div>
            <div id="main_menu" class="" uk-offcanvas="overlay: true; flip: true; mode: push;">
                <div class="uk-offcanvas-bar uk-flex uk-flex-column mobile-menu">
                    <button class="uk-offcanvas-close uk-margin-top uk-margin-right" type="button" uk-close></button>
                    <ul class="uk-nav-primary uk-nav-center uk-margin-auto-vertical" uk-nav>
                        <li><a href="{{route('frontend.site.home')}}">Home</a></li>
                        <li><a href="{{route('frontend.site.about-us')}}">About us</a></li>
                        <li class="uk-parent">
                            <a href="#">Services <span uk-nav-parent-icon></span></a>
                            <ul class="uk-nav-sub">
                                @if($services)
            
                                @foreach($services as $service)
                                <li><a href="{{route('frontend.site.service', $service->service_slug)}}">{{$service->service_name}}</a></li>
                                @endforeach
    
                                @endif
                                <li><a href="{{route('frontend.site.services.all')}}">All Services</li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Resources <span uk-nav-parent-icon></span></a>
                            <ul class="uk-nav-sub">
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
                        </li>
                        <li><a href="{{route('frontend.site.industry-notification')}}">Industry Notifications</a></li>
                        <li><a href="{{route('frontend.site.contact-us')}}">Contact us</a></li>
                    </ul>
                    <span class="mobile-menu-poweredby">Powered by</span>
                    <img class="footer-logo" src="{{asset('frontend/images/bl-logo-hq.jpg')}}" alt="Export Approval">
                </div>
            </div>
        </nav>
        @else
        <nav style="border-bottom: 0.09em solid #c4c4c4;" class="uk-navbar-container uk-box-shadow-medium uk-padding-large uk-padding-remove-vertical uk-background-transparent" uk-navbar="mode: click" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="{{route('frontend.site.home')}}">
                    <img class="uk-img-logo uk-visible@s" src="{{asset('frontend/images/logo.png')}}">
                </a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav top-navbar uk-visible@s">
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
                                <li><a href="{{route('frontend.site.services.all')}}">All Services</li>
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
        @endif
        @yield('content')
        @if (request()->route()->getName() === 'frontend.site.home' || request()->route()->getName() === 'frontend.site.gallery')
            @include('frontend.components.downloadbrochure')
        @endif
        @if (request()->route()->getName() === 'frontend.site.home')
            @include('frontend.components.clients')
        @endif
        @yield('clients')
        <section class="uk-section uk-background-default uk-footer website-footer uk-padding-remove-bottom uk-light">
            <div class="uk-padding-large uk-padding-remove-vertical" uk-grid id="footer">
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Powered by</li>
                    </ul>
                    <img class="footer-logo" src="{{asset('frontend/images/bl-logo-hq.jpg')}}" alt="Export Approval">
                    <p class="">Export Approval is a trusted platform for foreign manufacturers entering the Indian market. Our platform simplifies necessary Indian certifications and approvals for seamless product exportation to India.                    </p>
                </div>
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default uk-text-bolder uk-text-default">
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
                    <ul class="uk-nav uk-nav-default uk-text-bolder uk-text-default">
                        <li class="uk-nav-header">Partner with us</li>
                        <li><a href="{{route('frontend.site.business.associate')}}">Business Associate</a></li>
                        <li><a href="{{route('frontend.site.resident.executive')}}">Resident Executive</a></li>
                    </ul>
                </div>
                <div class="uk-width-1-4@s">
                    <ul class="uk-nav uk-nav-default uk-text-bolder uk-text-default">
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
                            <i uk-icon="icon:location; ratio: 1.25;" style="margin-top: 5px;"></i>
                        </span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove"><strong>Brand Liaison India Pvt. Ltd.</strong><br>110, Sharma Complex<br> A-2, Guru Nanak Pura, Laxmi Nagar<br>
                            Delhi - 110092, India</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove">
                            <i uk-icon="icon:whatsapp; ratio: 1.25;"></i>
                        </span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove">+91-9810363988</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove">
                            <i uk-icon="icon:mail; ratio: 1.25;"></i>
                        </span>
                        <p class="uk-width-4-5 uk-padding-remove uk-margin-remove">info@bl-india.com</p>
                        <span class="uk-width-1-1 uk-margin-small"></span>
                        <span class="uk-width-1-5 uk-text-center uk-padding-remove uk-margin-remove">
                            <i uk-icon="icon:social; ratio: 1.25;"></i>
                        </span>
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
        @if(!Cookie::has('popup'))
            @include('frontend.components.popup')
        @endif
    </body>
</html>