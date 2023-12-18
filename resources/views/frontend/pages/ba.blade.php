@extends('frontend.layouts.master', ['pages' => 'About-us'])
@section('seo')
<title>"title"</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:title" content="" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:description" content="" />
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:site_name" content="" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />
@endsection
@section('content')
<section class="uk-section page-header uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container uk-text-center">
        <h1>
            <span class="uk-text-small" style="color: #8b8b8b;">{{'Partner with us'}}</span>
            <br>{{'Business Associate'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'Business Associate'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container">
        <form method="POST" action="{{route('frontend.site.ba.save')}}" id="partner_associate_form"> 
            @csrf       
            <div uk-grid>
                <legend class="uk-legend uk-width-1-1">Become a <strong>Business Associate</strong> with us</legend>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Organisation name" id="organisation" name="organisation" aria-label="Input" value="{{ old('organisation') }}">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Industry" id="industry" name="industry" aria-label="Input" value="{{ old('industry') }}">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        <select class="uk-select uk-width-1-5 uk-padding-small uk-padding-remove-vertical" id="salutation" name="salutation" style="font-size: 12px;" value="{{ old('salutation') }}">
                            <option value="">Salutation</option>
                            <option value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Miss">Miss</option>
                            <option value="Others">Others</option>
                        </select>
                        <input class="uk-input uk-width-4-5 uk-padding-small uk-padding-remove-vertical" id="contact" name="contact" placeholder="Contact Person name" aria-label="Input" value="{{ old('contact') }}">
                    </div>
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Designation name" id="designation" name="designation" aria-label="Input" value="{{ old('designation') }}">
                </div>
                <div class="uk-margin-small uk-width-1-1@m">
                    <input class="uk-input" type="text" placeholder="Complete address" aria-label="Input" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="State / Province" aria-label="Input" id="state" name="state" value="{{ old('state') }}">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="City / Town" aria-label="Input" id="city" name="city" value="{{ old('city') }}">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        <select class="uk-select uk-width-3-5 uk-padding-small uk-padding-remove-vertical" id="country" name="country" value="{{ old('country') }}">
                            <option value="">Select Country</option>
                            @if($countries)
                            @foreach($countries as $country)
                            <option value="{{ucfirst(strtolower($country->name))}}">{{ucfirst(strtolower($country->name))}}</option>
                            @endforeach
                            @endif
                        </select>
                        <input class="uk-input uk-width-2-5 uk-padding-small uk-padding-remove-vertical" id="zip" name="zip" placeholder="Zip code" aria-label="Input" value="{{ old('zip') }}">
                    </div>
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical" id="countrycode" name="countrycode" style="font-size: 12px;" value="{{ old('countrycode') }}">
                            <option value="">Country Code</option>
                            @if($countries)
                            @foreach($countries as $country)
                            <option value="{{$country->phonecode}}">{{ucfirst(strtolower($country->name))." (+".$country->phonecode.")"}}</option>
                            @endforeach
                            @endif
                        </select>
                        <input class="uk-input uk-width-3-5 uk-padding-small uk-padding-remove-vertical" value="{{ old('phone') }}" id="phone" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="mobile" type="text" placeholder="Phone number">
                    </div>
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="email" placeholder="Email" aria-label="Input" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Website (if any)" aria-label="Input" id="website" name="website" value="{{ old('website') }}">
                </div>
                <div class="uk-margin-small uk-width-1-1@m">
                    <textarea class="uk-textarea" placeholder="Field of expertise" aria-label="Textarea" id="details" name="details">{{ old('details') }}</textarea>
                </div>
                <div class="uk-width-1-2@m uk-margin-small">
                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        {{-- <span class="captcha">{!! captcha_img() !!}</span> --}}
                        <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                        <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                        <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                        <input class="uk-input uk-width-expand uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                    </div>
                </div>
                <div class="uk-width-1-2@m uk-margin-small">
                    <button class="uk-border-rounded uk-button uk-button-primary partner-form-btn" id="form-submit" type="submit">Submit</button>
                    <div uk-spinner class="uk-margin-left uk-hidden loading" style="color: #052faa;"></div>
                </div>
                <div></div>
            </div>
        </form>
    </div>
</section>
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
   });
   $(document).on("submit", "#partner_associate_form", function(e) {
       e.preventDefault();
       formData = $('#partner_associate_form').serialize();
       var inputs = Array.from(document.getElementsByClassName('form-inputs'));
       inputs.forEach(field => {
           field.classList.remove('form-error');
       });
        $('#form-submit').addClass('uk-hidden');
       $('.loading').removeClass('uk-hidden');
       $error = 0;
       if($('#organisation').val() === '') {
           $('#organisation').addClass('form-error');
           $('#organisation').attr("placeholder", "Please enter organisation name");
           $error = 1;
       }
       if($('#industry').val() === '') {
           $('#industry').addClass('form-error');
           $('#industry').attr("placeholder", "Please enter industry name");
           $error = 1;
       }
       if($('#salutation').val() === '') {
           $('#salutation').addClass('form-error');
           $('#salutation').attr("placeholder", "Please select a salutation");
           $error = 1;
       }
       if($('#contact').val() === '') {
           $('#contact').addClass('form-error');
           $('#contact').attr("placeholder", "Please enter full name");
           $error = 1;
       }
       if($('#designation').val() === '') {
           $('#designation').addClass('form-error');
           $('#designation').attr("placeholder", "Please enter designation");
           $error = 1;
       }
       if($('#address').val() === '') {
           $('#address').addClass('form-error');
           $('#address').attr("placeholder", "Please enter an address");
           $error = 1;
       }
       if($('#state').val() === '') {
           $('#state').addClass('form-error');
           $('#state').attr("placeholder", "Please enter an state / province");
           $error = 1;
       }
       if($('#city').val() === '') {
           $('#city').addClass('form-error');
           $('#city').attr("placeholder", "Please enter an City / Town");
           $error = 1;
       }
       if($('#country').val() === '') {
           $('#country').addClass('form-error');
           $('#country').attr("placeholder", "Select a country");
           $error = 1;
       }
       if($('#zip').val() === '') {
           $('#zip').addClass('form-error');
           $('#zip').attr("placeholder", "Please enter an Zip Code");
           $error = 1;
       }
       if($('#email').val() === '') {
           $('#email').addClass('form-error');
           $('#email').attr("placeholder", "Please enter email address");
           $error = 1;
       }
       if($('#countrycode').val() === '') {
           $('#countrycode').addClass('form-error');
           $('#countrycode').attr("placeholder", "Select phone code");
           $error = 1;
       }
       if($('#phone').val() === '') {
           $('#phone').addClass('form-error');
           $('#phone').attr("placeholder", "Please enter phone number");
           $error = 1;
       }
       if($('#website').val() === '') {
           $('#website').addClass('form-error');
           $('#website').attr("placeholder", "Please enter website");
           $error = 1;
       }
       if($('#captcha').val() === '') {
           $('#captcha').addClass('form-error');
           $('#captcha').attr("placeholder", "Please enter a captcha");
           $error = 1;
       }
       if($('#captcha').val() != $('#captcha_answer').val()) {
           $('#captcha').addClass('form-error');
           $('#captcha').val('');
           captcha();
           $('#captcha').attr("placeholder", "Incorrect captcha");
           $error = 1;
       }
       if($error === 0) {
            fetch(e.currentTarget.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                UIkit.notification({
                    message: "<h3 class='uk-text-success'><span uk-icon='icon: check; ratio: 2;'></span> Your for is submitted successfully!</h3>",
                    status: 'primary',
                    pos: 'bottom-center',
                    timeout: 5000
                });
                setTimeout(function () { location.reload(1); }, 1500);
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
       }
   });
   </script>
@endsection
