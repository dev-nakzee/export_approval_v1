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