<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('frontend/css/uikit.min.css')}}" />
        <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
        <script src="{{asset('frontend/js/jquery-3.7.1.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit.min.js')}}"></script>
        <script src="{{asset('frontend/js/uikit-icons.min.js')}}"></script>
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
                UIkit.modal('#site-pop-up').show();
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
                    <li><a href="{{route('frontend.site.home')}}">About us</a></li>
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
        <section class="brochure-section uk-section uk-background-muted uk-padding-large uk-padding-remove-vertical" id="download-brochure">
            <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
                <p class="section-heading uk-margin-remove-bottom">
                    Download Brochure
                </p>
                <span class="section-tagline">Guidelines & Requirements</span>
            </div>
            <form class="uk-form-stacked uk-padding" id="brochure-form" method="POST">
                @csrf
                <div uk-grid>
                    <div class="uk-width-1-2@m">
                        <label class="uk-form-label" for="fullname">Your Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="fullname" id="fullname" type="text" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m">
                        <label class="uk-form-label" for="organisation">Organisation</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="organisation" id="organisation" type="text" placeholder="Company name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
                        <label class="uk-form-label" for="email">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" name="email" id="email" type="email" placeholder="Email address">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
                        <label class="uk-form-label" for="mobile">Mobile</label>
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
                        <label class="uk-form-label" for="service">Services</label>
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
                        <label class="uk-form-label" for="source">How did you find you?</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" id="source" name="source">
                                <option value="">Select Source</option>
                                <option value="Website">Website</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Referral">Referral</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-1-1@m uk-margin-small-top">    
                        <label class="uk-form-label" for="message">Message</label>
                        <div class="uk-form-controls">
                            <textarea name="message" class="uk-textarea" placeholder="Enter you query along with product details"></textarea>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
                        <label class="uk-form-label" for="captcha">Captcha</label>
                        <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                            <span class="uk-width-1-2 uk-padding-remove-left">{!! captcha_img() !!}<button type="button" class="uk-button uk-button-small" class="reload" id="reload" uk-icon="refresh">
                            </button></span>
                            
                            <input class="uk-input uk-width-1-2 uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Validate captcha">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-text-center uk-margin-small-top">
                        <button class="uk-button-small uk-button uk-button-primary brochure-form-submit uk-margin-top uk-width-1-1">Submit</button>
                    </div>
                </div>
            </form>
        </section>
        @yield('clients')
        <section class="uk-section uk-background-default uk-footer website-footer">
            <div class="uk-container uk-padding uk-padding-remove-vertical" uk-grid>
                <div class="uk-width-1-5@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Quick Links</li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                    </ul>
                </div>
                <div class="uk-width-1-5@s">
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
                </div>
                <div class="uk-width-1-5@s">
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-nav-header">Important Links</li>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                    </ul>
                </div>
                <div class="uk-width-2-5@s">
                    <div class="">
                        <span class="uk-nav-header">Export Approval</span>
                        <address>
                        </address>
                        <span class="uk-nav-header">Subscribe to our newsletter</span>
                        <form class="uk-form-stacked uk-margin-top">
                            <div class="uk-margin">
                                <div class="uk-inline uk-width-1-1">
                                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                    <input class="uk-input uk-form-small" type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <button class="uk-button uk-button-primary uk-width-1-1">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="back-to-top uk-position-fixed uk-position-bottom-right uk-padding-small uk-background-primary uk-margin uk-light uk-hidden">
            <a href="#" uk-totop uk-scroll></a>
        </div>
        <div id="site-pop-up" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <h2 class="uk-modal-title">Headline</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p class="uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                </p>
            </div>
        </div>
    </body>
</html>