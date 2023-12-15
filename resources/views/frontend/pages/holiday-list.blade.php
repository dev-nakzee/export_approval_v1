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
            {{'Holiday list'}}
        </h1>
    </div>
</section>
<section class="uk-section uk-padding-large uk-padding-remove-vertical">
    <div class="uk-padding-small">
        <ul class="uk-breadcrumb uk-align-right uk-margin-remove-bottom">
            <li><a href="{{route('frontend.site.home')}}">Home</a></li>
            <li><span>{{'holiday-list'}}</li>
        </ul>
    </div>
</section>
<section class="uk-section home-section-3 uk-padding uk-padding-remove-top" style="">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
        <p class="section-heading uk-margin-remove uk-padding-remove-vertical" style="color: #8a8a8a">
          Working Hours on Weekdays : 10:00 AM - 6:30 PM (IST)<br>Weekly Holidays: Saturday & Sunday
        </p>
        <p style="color: orange;">* RH - Restricted Holiday (optional)<br>
          Office work may be affected on RH* holidays denoted by Orange Colour</p>
    </div>
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-vertical">
      <div class="uk-container uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
        @if($holidays)
        @php
        $year ='';
        $month ='';
        @endphp
        @foreach($holidays as $holiday)
        @if($holiday->holiday_year != $year)
        <p class="uk-width-1-1" style="color: red;"><strong>List of Holidays in {{$holiday->holiday_year}}</strong><br>Office will remain closed on the holidays denoted by Red Colour:</p>       
        @endif
        @if ($holiday->holiday_month != $month)
          <h4 class="uk-width-1-1">{{$holiday->holiday_month}} {{$holiday->holiday_year}}</h4>
          <table class="uk-table uk-width-1-2 uk-margin-remove uk-text-bolder" border="1">
            <tr>
              <td class="uk-width-1-5">{{'Date'}}</td>
              <td class="uk-width-1-5">{{'Day'}}</td>
              <td class="uk-width-2-5">{{'Holiday'}}</td>
            </tr>
          </table>
          <table class="uk-table uk-width-1-2 uk-margin-remove uk-text-bolder" border="1">
            <tr>
              <td class="uk-width-1-5">{{'Date'}}</td>
              <td class="uk-width-1-5">{{'Day'}}</td>
              <td class="uk-width-2-5">{{'Holiday'}}</td>
            </tr>
          </table>
        @endif
        <table class="uk-table uk-width-1-2 uk-margin-remove" border="1">
          <tr class="uk-text-bolder" @if($holiday->holiday_type === 1)style="color: orange;"@else style="color: red;" @endif>
            <td class="uk-width-1-5">{{$holiday->holiday_show}}</td>
            <td class="uk-width-1-5">{{$holiday->holiday_day}}</td>
            <td class="uk-width-2-5">@if($holiday->holiday_type === 1) *RH - @endif{{$holiday->holiday_name}}</td>
          </tr>
        </table>
        @php
        $month = $holiday->holiday_month;
        @endphp
        @php
        $year = $holiday->holiday_year;
        @endphp
        @endforeach
        @endif
      </div>
    </div>
</section>

@endsection
