@extends('frontend.layouts.master', ['pages' => 'Home'])
@section('seo')
<title>{{$page->seo_title}}</title>
<meta name="keywords" content="{{$page->seo_keywords}}" />
<meta name="description" content="{{$page->seo_description}}" />
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
<meta property="og:title" content="{{$page->page_name}}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{$page->seo_description}}" />
<meta property="og:url" content="{{url()->full()}}" />
<meta property="og:site_name" content="Export Approval" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />
@endsection
@section('content')
<h1 class="uk-hidden">{{$page->page_name}} {{$page->tagline}}</h1>
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
    <div class="uk-text-center">
        <div>
            <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/communicate.webp')}}" alt="">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
            {{$page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$page->tagline}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Contact-us'}}</span></li>
        </ul>
    </div>
</section>

<section class="uk-section uk-padding-small">
    <div class="uk-text-center">
        <span class="section-tagline">{!!$sections[0]->section_tagline!!}</span>
    </div>
</section>
<form method="POST" action="{{route('frontend.site.contact-us.save')}}" id="contact_form" class="uk-background-muted uk-border-rounded contact-box uk-padding uk-margin-remove-bottom">
    @csrf
    <div class="uk-margin">
        <input class="uk-input" type="text" placeholder="Name" name="name" id="name">
    </div>
    <div class="uk-margin">
        <input class="uk-input" type="text" placeholder="Organisation" name="organisation" id="organisation">
    </div>
    <div class="uk-margin">
        <input class="uk-input" type="email" placeholder="Email" name="email" id="email">
    </div>
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
    <div class="uk-margin">
        <textarea class="uk-textarea" placeholder="Message" name="message"></textarea>
    </div>
    <div class="uk-margin">

        <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
            <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                    <canvas id="captcha_image" class="uk-padding-small uk-width-4-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                    <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                    <input class="uk-input uk-width-1-1 uk-margin-top form-inputs uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
        </div>
    </div>
    <div class="uk-margin">
        <button class="uk-button contact-form-submit uk-border-rounded" type="submit" id="form-submit">Submit</button>
        <div uk-spinner class="uk-margin-left uk-hidden loading" style="color: #052faa;"></div>
    </div>
</form>
<div class="uk-flex-last@s uk-card-media-right uk-cover-container">
    <div class="uk-padding-remove-vertical uk-border-rounded">
    <div style="overflow:hidden;max-width:100%;width:100%;height:480px;"><div id="google-maps-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Brand+Liaison+India+Private+Limited,+Veer+Savarkar+Block,+Guru+Nanak+Pura,+Laxmi+Nagar,+Delhi,+India&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><style>#google-maps-display .text-marker{}.map-generator{max-width: 100%; max-height: 100%; background: none;}</style></div>
    </div>
</div>
<section class="uk-section">
    {!! $sections[0]->section_description !!}
</section>

@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
        <div>
            <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/communicate.webp')}}" alt="Blogs Image">
            <h2 class="uk-text-middle uk-inline uk-margin-remove">
            {{$page->page_name}}<br>
                <span class="uk-text-small" style="color: #8b8b8b;">{{$page->tagline}}</span>
            </h2>
        </div>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right uk-margin-remove-bottom">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'Contact-us'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section home-section-3 uk-padding" style="">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
        <p class="section-heading uk-margin-remove uk-padding-remove-vertical" style="color: #8a8a8a">

        </p>
        <span class="section-tagline">{!!$sections[0]->section_tagline!!}</span>
    </div>
    <div class="uk-section uk-child-width-1-2@s uk-margin-right" uk-grid>
        <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
            <div class="uk-padding-remove-vertical uk-border-rounded">
                <div style="overflow:hidden;max-width:100%;width:100%;height:480px;"><div id="google-maps-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Brand+Liaison+India+Private+Limited,+Veer+Savarkar+Block,+Guru+Nanak+Pura,+Laxmi+Nagar,+Delhi,+India&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><style>#google-maps-display .text-marker{}.map-generator{max-width: 100%; max-height: 100%; background: none;}</style></div>
            </div>
        </div>
        <div>
            <div class="uk-card-body uk-padding-remove-vertical">
               <form method="POST" action="{{route('frontend.site.contact-us.save')}}" id="contact_form" class="uk-background-muted uk-border-rounded contact-box uk-padding-small uk-padding-remove-vertical">
                @csrf
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Name" name="name" id="name">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Organisation" name="organisation" id="organisation">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="email" placeholder="Email" name="email" id="email">
                </div>
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
                <div class="uk-margin">
                    <textarea class="uk-textarea" placeholder="Message" name="message"></textarea>
                </div>
                <div class="uk-margin">

                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                        <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                        <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                        <input class="uk-input uk-width-expand uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                    </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button contact-form-submit uk-border-rounded" type="submit" id="form-submit">Submit</button>
                    <div uk-spinner class="uk-margin-left uk-hidden loading" style="color: #052faa;"></div>
                </div>
               </form>
            </div>
        </div>
    </div>
    <div class="uk-margin-large-top">
    {!! $sections[0]->section_content !!}
    </div>
</section>
@endif
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
   $(document).on("submit", "#contact_form", function(e) {
       e.preventDefault();
       formData = $('#contact_form').serialize();
       var inputs = Array.from(document.getElementsByClassName('form-inputs'));
       inputs.forEach(field => {
           field.classList.remove('form-error');
       });
    //    $('#form-submit').addClass('uk-hidden');
       $('.loading').removeClass('uk-hidden');
       $error = 0;
       if($('#name').val() === '') {
           $('#name').addClass('form-error');
           $('#name').attr("placeholder", "Please enter full name");
           $error = 1;
       }
       if($('#organisation').val() === '') {
           $('#organisation').addClass('form-error');
           $('#organisation').attr("placeholder", "Please enter an organisation name");
           $error = 1;
       }
       if($('#email').val() === '') {
           $('#email').addClass('form-error');
           $('#email').attr("placeholder", "Please enter email address");
           $error = 1;
       }
       if($('#country').val() === '') {
           $('#country').addClass('form-error');
           $('#country').attr("placeholder", "Select country");
           $error = 1;
       }
       if($('#mobile').val() === '') {
           $('#mobile').addClass('form-error');
           $('#mobile').attr("placeholder", "Please enter phone number");
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
           e.currentTarget.submit();
           fetch(e.currentTarget.action, {
               method: 'POST',
               body: formData
           })
           .then(response => {
               UIkit.notification({
                   message: "<h3 class='uk-text-success'><span uk-icon='icon: check; ratio: 2;'></span> Form successfully submitted!</h3>",
                   status: 'primary',
                   pos: 'bottom-center',
                   timeout: 10000
               });
               setTimeout(function () { location.reload(1); }, 10500);
           })
           .catch(error => {
               console.error('There has been a problem with your fetch operation:', error);
           });
       }  
   });
   </script>
@endsection
