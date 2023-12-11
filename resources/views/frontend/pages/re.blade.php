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
            <br>{{'Resident Executive'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span> {{'Resident Executive'}}</span></li>
        </ul>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-container">
        <form method="POST" action="{{route('frontend.site.re.save')}}">      
            <div uk-grid>
                <legend class="uk-legend uk-width-1-1">Become a <strong>Resident Executive</strong> with us</legend>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Complete name" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Field of expertise" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-1@m">
                    <input class="uk-input" type="text" placeholder="Complete address" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="State / Province" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="City / Town" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <select class="uk-select" aria-label="Select">
                        <option value="">Select Country</option>
                        @if($countries)
                        @foreach($countries as $country)
                        <option value="{{ucfirst(strtolower($country->name))}}">{{ucfirst(strtolower($country->name))}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                        <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical" id="country" name="country" style="font-size: 12px;">
                            <option value="">Country Code</option>
                            @if($countries)
                            @foreach($countries as $country)
                            <option value="{{json_encode([$country->name, $country->phonecode])}}">{{ucfirst(strtolower($country->name))." (+".$country->phonecode.")"}}</option>
                            @endforeach
                            @endif
                        </select>
                        <input class="uk-input uk-width-3-5 uk-padding-small uk-padding-remove-vertical" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="mobile" type="text" placeholder="Phone number">
                    </div>
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="email" placeholder="Email" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-2@m">
                    <input class="uk-input" type="text" placeholder="Website (if any)" aria-label="Input">
                </div>
                <div class="uk-margin-small uk-width-1-1@m">
                    <textarea class="uk-textarea" placeholder="Profile details" aria-label="Textarea"></textarea>
                </div>
                <div class="uk-width-1-1@m uk-text-center uk-margin-small">
                    <button class="uk-border-rounded uk-button uk-button-primary partner-form-btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('scripts')

@endsection