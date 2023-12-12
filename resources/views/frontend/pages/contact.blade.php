@extends('frontend.layouts.master', ['pages' => 'Home'])
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
        <h1 class="uk-padding-small">
            {{'Contact Us'}}
        </h1>
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
<section class="uk-section home-section-3 uk-padding uk-padding-remove-top" style="">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
        <p class="section-heading uk-margin-remove uk-padding-remove-vertical" style="color: #8a8a8a">
            {{$sections[0]->section_name}} 
        </p>
        <span class="section-tagline">{!!$sections[0]->section_tagline!!}</span>
        <p class="section-description">{!! $sections[0]->section_description !!}</p>
    </div>
    <div class="uk-section uk-child-width-1-2@s uk-margin-right" uk-grid>
        <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
            <div class="uk-padding-remove-vertical uk-border-rounded">
                <div style="overflow:hidden;max-width:100%;width:100%;height:100%;"><div id="google-maps-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Brand+Liaison+India+Private+Limited,+Veer+Savarkar+Block,+Guru+Nanak+Pura,+Laxmi+Nagar,+Delhi,+India&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="google-map-html" href="https://www.bootstrapskins.com/themes" id="enable-map-info">premium bootstrap themes</a><style>#google-maps-display .text-marker{}.map-generator{max-width: 100%; max-height: 100%; background: none;}</style></div>
            </div>
        </div>
        <div>
            <div class="uk-card-body uk-padding-remove-vertical">
               <form method="POST" action="" class="uk-background-muted uk-border-rounded contact-box uk-padding-small uk-padding-remove-vertical">
                @csrf
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Name" name="name" required>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" placeholder="Organisation" name="organisation" required>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="email" placeholder="Email" name="email" required>
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
                    <textarea class="uk-textarea" placeholder="Message" name="message" required></textarea>
                </div>
                <div class="uk-margin">

                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        {{-- <span class="captcha">{!! captcha_img() !!}</span> --}}
                        <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                        <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                        <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                        <input class="uk-input uk-width-expand uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                    </div>
                </div>
                <div class="uk-margin">
                    <button class="uk-button contact-form-submit uk-border-rounded" type="submit">Submit</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</section>
{!! $sections[0]->section_content !!}
@endsection
@section('scripts')

@endsection