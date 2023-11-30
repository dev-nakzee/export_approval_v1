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
                                    <a href="#">Careers</a>
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
        <section class="uk-section uk-background-muted uk-padding-large uk-padding-remove-vertical">
            <div class="uk-text-large uk-text-bold uk-text-center">
            <span>Get brochure from us</span>
            </div>
            <form class="uk-form-stacked uk-padding">
                <div uk-grid>
                    <div class="uk-width-1-2@m">
                        <label class="uk-form-label" for="form-stacked-text">Full Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" type="text" placeholder="Complete Name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m">
                        <label class="uk-form-label" for="form-stacked-text">Organisation</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" type="text" placeholder="Company name">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
                        <label class="uk-form-label" for="form-stacked-text">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" type="text" placeholder="Email address">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
                        <label class="uk-form-label" for="form-stacked-text">Mobile</label>
                        <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                            <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical" id="form-stacked-select" style="font-size: 12px;">
                                @if($countries)
                                @foreach($countries as $country)
                                <option value=""{{json_encode([$country->name, $country->phonecode])}}>{{ucfirst(strtolower($country->name))." (+".$country->phonecode.")"}}</option>
                                @endforeach
                                @endif
                            </select>
                            <input class="uk-input uk-width-3-5 uk-padding-small uk-padding-remove-vertical" id="form-stacked-text" type="text" placeholder="mobile number">
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">    
                        <label class="uk-form-label" for="form-stacked-select">Services</label>
                        <div class="uk-form-controls">
                            <select class="uk-select" id="form-stacked-select">
                                @if($services)
                                @foreach($services as $service)
                                <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m uk-margin-small-top">
                        <label class="uk-form-label" for="form-stacked-select"><input class="uk-checkbox" type="checkbox"> &nbsp; Terms & conditions</label>
                        <label class="uk-text-small">By checking this, I accept terms & conditions of the site and I allow BL India to contact me for details.</label>
                    </div>
                    <div class="uk-width-1-1@m uk-margin-small-top">    
                        <label class="uk-form-label" for="form-stacked-select">Some message</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <div class="uk-width-1-1@m uk-text-center uk-margin-small-top">
                        <button class="uk-button uk-button-primary uk-width-1-4">Submit</button>
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
    </body>
</html>