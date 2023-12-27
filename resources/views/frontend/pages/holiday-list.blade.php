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
<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="og:site_name" content="Export Approval" />
<meta property="og:image" content="" />
<meta name="format-detection" content="telephone=no" />
@endsection
@section('content')
@if($agent->isMobile())
<section class="uk-section page-header uk-padding-small" uk-sticky="offset: 80">
  <div class="uk-text-center">
      <div>
          <img class="uk-margin-remove uk-border-circle mobile-page-image" src="{{asset('frontend/images/calendar.png')}}" alt="">
          <h2 class="uk-text-middle uk-inline uk-margin-remove">
            {{'Holiday list'}}<br>
              <span class="uk-text-small" style="color: #8b8b8b;">{{'NEED CONTENT'}}</span>
          </h2>
      </div>
  </div>
</section>
<section class="uk-section uk-padding-small uk-padding-remove-vertical">
  <div class="uk-padding-small">
      <ul class="uk-breadcrumb uk-text-center uk-margin-remove">
          <li><a href="{{route('frontend.site.home')}}">Home</a></li>
          <li><span>{{'Holiday list'}}</span></li>
      </ul>
  </div>
</section>
<section class="uk-section uk-padding-small">
  <div class="uk-width-1-1">
    <h2>List of Holidays in <b>2023</b></h2>
    <p class="uk-width-1-1 uk-margin-remove-top uk-margin-bottom">Office will remain closed on the holidays denoted by Red Colour. <a target="blank" href="{{route('frontend.site.calender.download', 2023)}}">Download List</a></p>     
  </div>
  <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
    <tbody>
    <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
      <td colspan="3"><strong style="font-weight: 600;">January 2023</strong></td>
    </tr>

    <tr>
      <td style="color: orange;">01-01-2023</td>
      <td style="color: orange;">Sunday</td>
      <td> RH* - New Year's Day</td>
    </tr>
    <tr>
      <td style="color: orange;">14-01-2023</td>
      <td style="color: orange;">Saturday</td>
      <td> RH* - Makar Sankranti</td>
    </tr>

    <tr>
      <td style="color: red;">26-01-2023</td>
      <td style="color: red;">Thursday</td>
      <td>Republic Day of India</td>
    </tr>
    
    <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
      <td colspan="3"><strong style="font-weight: 600;">February 2023</strong></td>
    </tr>
    <tr>
      <td style="color: orange;">18-02-2023</td>
      <td style="color: orange;">Saturday</td>
      <td>RH* - Maha Shivaratri</td>
    </tr>
    
    <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">March 2023</strong></td>
      </tr>

      <tr>
        <td style="color: orange;">07-03-2023</td>
        <td style="color: orange;">Tuesday</td>
        <td>RH* - Holika Dahan</td>
      </tr>
      <tr>
        <td style="color: red;">08-03-2023</td>
        <td style="color: red;">Wednesday</td>
        <td>Holi</td>
      </tr>
      <tr>
        <td style="color: orange;">30-03-2023</td>
        <td style="color: orange;">Thursday</td>
        <td> RH* - Ram Navami</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">April 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">04-04-2023 </td>
        <td style="color: red;">Tuesday</td>
        <td> Mahavir Jayanti</td>
      </tr>
      <tr>
        <td style="color: red;">07-04-2023</td>
        <td style="color: red;">Friday</td>
        <td>Good Friday</td>
      </tr>
      <tr>
        <td style="color: orange;">14-04-2023</td>
        <td style="color: orange;">Friday</td>
        <td>RH* - Ambedkar Jayanti</td>
      </tr>
      <tr>
        <td style="color: red;">22-04-2023</td>
        <td style="color: red;">Saturday</td>
        <td>Eid ul-Fitr</td>
      </tr>
      
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">May 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">05-05-2023</td>
        <td style="color: red;">Friday</td>
        <td>Buddha Purnima</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">June 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">29-06-2023</td>
        <td style="color: red;">Thursday</td>
        <td>Eid ul-Zuha</td>
      </tr> 

    </tbody>
  </table>
  <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
    <tbody>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">July 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">29-07-2023</td>
        <td style="color: red;">Saturday</td>
        <td>Muharram</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong>August 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">15-08-2023</td>
        <td style="color: red;">Tuesday</td>
        <td>Independence Day of India</td>
      </tr>
      <tr>
        <td style="color: orange;">30-08-2023</td>
        <td style="color: orange;">Wednesday</td>
        <td>RH* - Raksha Bandhan</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">September 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">07-09-2023</td>
        <td style="color: red;">Thursday</td>
        <td>Krishna Janmashtami</td>
      </tr>
      <tr>
        <td style="color: red;">28-09-2023</td>
        <td style="color: red;">Thursday</td>
        <td>Eid-Milad (Milad un-Nabi)</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">October 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">02-10-2023</td>
        <td style="color: red;">Monday</td>
        <td>Gandhi Jayanti</td>
      </tr>
      <tr>
        <td style="color: orange;">23-10-2023</td>
        <td style="color: orange;">Monday</td>
        <td> RH* - Dussehra Navami</td>
      </tr>
      <tr>
        <td style="color: red;">24-10-2023</td>
        <td style="color: red;">Tuesday</td>
        <td>Dussehra</td>
      </tr>

      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">November 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">12-11-2023</td>
        <td style="color: red;">Sunday</td>
        <td>Diwali</td>
      </tr>
      <tr>
        <td style="color: red;">13-11-2023</td>
        <td style="color: red;">Monday</td>
        <td>Govardhan Puja</td>
      </tr>
      <tr>
        <td style="color: red;">14-11-2023</td>
        <td style="color: red;">Tuesday</td>
        <td>Bhai Duja</td>
      </tr>
      <tr>
        <td style="color: orange;">19-11-2023</td>
        <td style="color: orange;">Sunday</td>
        <td>RH* - Chatt Puja</td>
      </tr>
      <tr>
        <td style="color: red;">27-11-2023</td>
        <td style="color: red;">Monday</td>
        <td>Guru Nanak Jayanti</td>
      </tr>

      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">December 2023</strong></td>
      </tr>
      <tr>
        <td style="color: red;">25-12-2023</td>
        <td style="color: red;">Monday</td>
        <td>Christmas Day</td>
      </tr>
    </tbody>
  </table>
  <div class="uk-width-1-1">
    <h2>List of Holidays in <b>2024</b></h2>
    <p class="uk-margin-remove-top uk-margin-bottom">Office will remain closed on the holidays denoted by Red Colour. <a target="blank" href="{{route('frontend.site.calender.download', 2024)}}">Download List</a></p>       
   </div>
   <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
    <tbody>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">January 2024</strong></td>
      </tr>

      <tr>
        <td style="color: orange;">01-01-2024</td>
        <td style="color: orange;">Monday</td>
        <td> RH* - New Year's Day</td>
      </tr>
      <tr>
        <td style="color: orange;">15-01-2024</td>
        <td style="color: orange;">Monday</td>
        <td> RH* - Makar Sankranti</td>
      </tr>

      <tr>
        <td style="color: red;">26-01-2024</td>
        <td style="color: red;">Friday</td>
        <td>Republic Day of India</td>
      </tr>
    
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">March 2024</strong></td>
      </tr>

      <tr>
        <td style="color: orange;">8-03-2024</td>
        <td style="color: orange;">Friday</td>
        <td>RH* - Maha Shivaratri</td>
      </tr>
      <tr>
        <td style="color: orange;">24-03-2024</td>
        <td style="color: orange;">Sunday</td>
        <td>RH* - Holika Dahan</td>
      </tr>
      <tr>
        <td style="color: red;">25-03-2024</td>
        <td style="color: red;">Monday</td>
        <td>Holi</td>
      </tr>
      <tr>
        <td style="color: red;">29-03-2024</td>
        <td style="color: red;">Friday</td>
        <td>Good Friday</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">April 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">11-04-2024</td>
        <td style="color: red;">Thursday</td>
        <td>Eid ul-Fitr</td>
      </tr>
      <tr>
        <td style="color: orange;">14-04-2024</td>
        <td style="color: orange;">Sunday</td>
        <td>RH* - Ambedkar Jayanti</td>
      </tr>
      <tr>
        <td style="color: red;">17-04-2024</td>
        <td style="color: red;">Wednesday</td>
        <td> Ram Navami</td>
      </tr>
      <tr>
        <td style="color: red;">21-04-2024 </td>
        <td style="color: red;">Sunday</td>
        <td> Mahavir Jayanti</td>
      </tr>
    
    
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">May 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">23-05-2024</td>
        <td style="color: red;">Thursday</td>
        <td>Buddha Purnima</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">June 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">17-06-2024</td>
        <td style="color: red;">Monday</td>
        <td>Eid ul-Zuha</td>
      </tr> 
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">July 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">17-07-2024</td>
        <td style="color: red;">Wednesday</td>
        <td>Muharram</td>
      </tr>

    </tbody>
  </table>
  <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
    <tbody>
        
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">August 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">15-08-2024</td>
        <td style="color: red;">Thursday</td>
        <td>Independence Day of India</td>
      </tr>
      <tr>
        <td style="color: orange;">19-08-2024</td>
        <td style="color: orange;">Monday</td>
        <td>RH* - Raksha Bandhan</td>
      </tr>
      <tr>
        <td style="color: red;">26-08-2024</td>
        <td style="color: red;">Monday</td>
        <td>Krishna Janmashtami</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">September 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">16-09-2024</td>
        <td style="color: red;">Monday</td>
        <td>Eid-Milad (Milad un-Nabi)</td>
      </tr>
      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">October 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">02-10-2024</td>
        <td style="color: red;">Wednesday</td>
        <td>Gandhi Jayanti</td>
      </tr>
      <tr>
        <td style="color: orange;">11-10-2024</td>
        <td style="color: orange;">Friday</td>
        <td> RH* - Dussehra Navami</td>
      </tr>
      <tr>
        <td style="color: red;">12-10-2024</td>
        <td style="color: red;">Saturday</td>
        <td>Dussehra</td>
      </tr>
      <tr>
        <td style="color: orange;">30-10-2024</td>
        <td style="color: orange;">Wednesday</td>
        <td>RH* - Diwali Eve</td>
      </tr>
      <tr>
        <td style="color: red;">31-10-2024</td>
        <td style="color: red;">Thursday</td>
        <td>Diwali</td>
      </tr>

      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">November 2024</strong></td>
      </tr>

      <tr>
        <td style="color: red;">01-11-2024</td>
        <td style="color: red;">Friday</td>
        <td>Govardhan Puja</td>
      </tr>
      <tr>
        <td style="color: red;">03-11-2024</td>
        <td style="color: red;">Sunday</td>
        <td>Bhai Duja</td>
      </tr>
      <tr>
        <td style="color: orange;">07-11-2024</td>
        <td style="color: orange;">Thursday</td>
        <td>RH* - Chatt Puja</td>
      </tr>
      <tr>
        <td style="color: red;">15-11-2024</td>
        <td style="color: red;">Friday</td>
        <td>Guru Nanak Jayanti</td>
      </tr>

      <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
        <td colspan="3"><strong style="font-weight: 600;">December 2024</strong></td>
      </tr>
      <tr>
        <td style="color: red;">25-12-2024</td>
        <td style="color: red;">Wednesday</td>
        <td>Christmas Day</td>
      </tr>
    </tbody>
  </table>
    <div class="uk-width-1-1">
      <div class="calnder-dys">
          <p><strong>Working Hours on Weekdays :</strong><br> 10:00 AM - 6:30 PM (IST)</p>
          <p class="calnder-pa"><strong>Weekly Holidays:</strong><span style="color: red;"> Saturday</span> &amp; <span style="color: red;">Sunday</span></p>
      </div>
      <p  style="color: orange;">* RH - Restricted Holiday (optional)</p>
      <p>Office work may be affected on <b>RH*</b> holidays denoted by Orange Colour </p>
    </div>
</section>
@else
<section class="uk-section page-header uk-padding-small">
    <div class="uk-container uk-text-center">
      <div>
        <img class="uk-margin-right uk-border-circle service-details-image" src="{{asset('frontend/images/calendar.png')}}" alt="Holiday list Image">
        <h2 class="uk-text-middle uk-inline uk-margin-remove">
          {{'Holiday list'}}<br>
          <span class="uk-text-small" style="color: #8b8b8b;">{{'NEED CONTENT'}}</span>
        </h2>
      </div>
   
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
  <div class="uk-container uk-margin-remove uk-width-1-1" >
    <div uk-grid class="uk-child-width-1-2@m">
      <div class="uk-width-1-1">
        <h2 class="uk-margin-remove">List of Holidays in <b>2023</b></h2>
        <p class="uk-width-1-1 uk-margin-remove">Office will remain closed on the holidays denoted by Red Colour. <a target="blank" href="{{route('frontend.site.calender.download', 2023)}}">Download List</a></p>     
      </div>  
       <div class="uk-margin-small-top uk-margin-bottom" >
              <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
                <tbody>
                <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                  <td colspan="3"><strong style="font-weight: 600;">January 2023</strong></td>
                </tr>

                <tr>
                  <td style="color: orange;">01-01-2023</td>
                  <td style="color: orange;">Sunday</td>
                  <td> RH* - New Year's Day</td>
                </tr>
                <tr>
                  <td style="color: orange;">14-01-2023</td>
                  <td style="color: orange;">Saturday</td>
                  <td> RH* - Makar Sankranti</td>
                </tr>

                <tr>
                  <td style="color: red;">26-01-2023</td>
                  <td style="color: red;">Thursday</td>
                  <td>Republic Day of India</td>
                </tr>
                
                <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                  <td colspan="3"><strong style="font-weight: 600;">February 2023</strong></td>
                </tr>
                <tr>
                  <td style="color: orange;">18-02-2023</td>
                  <td style="color: orange;">Saturday</td>
                  <td>RH* - Maha Shivaratri</td>
                </tr>
                
                <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                    <td colspan="3"><strong style="font-weight: 600;">March 2023</strong></td>
                  </tr>

                  <tr>
                    <td style="color: orange;">07-03-2023</td>
                    <td style="color: orange;">Tuesday</td>
                    <td>RH* - Holika Dahan</td>
                  </tr>
                  <tr>
                    <td style="color: red;">08-03-2023</td>
                    <td style="color: red;">Wednesday</td>
                    <td>Holi</td>
                  </tr>
                  <tr>
                    <td style="color: orange;">30-03-2023</td>
                    <td style="color: orange;">Thursday</td>
                    <td> RH* - Ram Navami</td>
                  </tr>
                  <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                    <td colspan="3"><strong style="font-weight: 600;">April 2023</strong></td>
                  </tr>
                  <tr>
                    <td style="color: red;">04-04-2023 </td>
                    <td style="color: red;">Tuesday</td>
                    <td> Mahavir Jayanti</td>
                  </tr>
                  <tr>
                    <td style="color: red;">07-04-2023</td>
                    <td style="color: red;">Friday</td>
                    <td>Good Friday</td>
                  </tr>
                  <tr>
                    <td style="color: orange;">14-04-2023</td>
                    <td style="color: orange;">Friday</td>
                    <td>RH* - Ambedkar Jayanti</td>
                  </tr>
                  <tr>
                    <td style="color: red;">22-04-2023</td>
                    <td style="color: red;">Saturday</td>
                    <td>Eid ul-Fitr</td>
                  </tr>
                  
                  <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                    <td colspan="3"><strong style="font-weight: 600;">May 2023</strong></td>
                  </tr>
                  <tr>
                    <td style="color: red;">05-05-2023</td>
                    <td style="color: red;">Friday</td>
                    <td>Buddha Purnima</td>
                  </tr>
                  <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                    <td colspan="3"><strong style="font-weight: 600;">June 2023</strong></td>
                  </tr>
                  <tr>
                    <td style="color: red;">29-06-2023</td>
                    <td style="color: red;">Thursday</td>
                    <td>Eid ul-Zuha</td>
                  </tr> 

                </tbody>
              </table>
       </div>

       <div class="uk-margin-small-top" >

          <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
            <tbody>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">July 2023</strong></td>
              </tr>
              <tr>
                <td style="color: red;">29-07-2023</td>
                <td style="color: red;">Saturday</td>
                <td>Muharram</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong>August 2023</strong></td>
              </tr>
              <tr>
                <td style="color: red;">15-08-2023</td>
                <td style="color: red;">Tuesday</td>
                <td>Independence Day of India</td>
              </tr>
              <tr>
                <td style="color: orange;">30-08-2023</td>
                <td style="color: orange;">Wednesday</td>
                <td>RH* - Raksha Bandhan</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">September 2023</strong></td>
              </tr>
              <tr>
                <td style="color: red;">07-09-2023</td>
                <td style="color: red;">Thursday</td>
                <td>Krishna Janmashtami</td>
              </tr>
              <tr>
                <td style="color: red;">28-09-2023</td>
                <td style="color: red;">Thursday</td>
                <td>Eid-Milad (Milad un-Nabi)</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">October 2023</strong></td>
              </tr>
              <tr>
                <td style="color: red;">02-10-2023</td>
                <td style="color: red;">Monday</td>
                <td>Gandhi Jayanti</td>
              </tr>
              <tr>
                <td style="color: orange;">23-10-2023</td>
                <td style="color: orange;">Monday</td>
                <td> RH* - Dussehra Navami</td>
              </tr>
              <tr>
                <td style="color: red;">24-10-2023</td>
                <td style="color: red;">Tuesday</td>
                <td>Dussehra</td>
              </tr>

              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">November 2023</strong></td>
              </tr>
              <tr>
                <td style="color: red;">12-11-2023</td>
                <td style="color: red;">Sunday</td>
                <td>Diwali</td>
              </tr>
              <tr>
                <td style="color: red;">13-11-2023</td>
                <td style="color: red;">Monday</td>
                <td>Govardhan Puja</td>
              </tr>
              <tr>
                <td style="color: red;">14-11-2023</td>
                <td style="color: red;">Tuesday</td>
                <td>Bhai Duja</td>
              </tr>
              <tr>
                <td style="color: orange;">19-11-2023</td>
                <td style="color: orange;">Sunday</td>
                <td>RH* - Chatt Puja</td>
              </tr>
              <tr>
                <td style="color: red;">27-11-2023</td>
                <td style="color: red;">Monday</td>
                <td>Guru Nanak Jayanti</td>
              </tr>

              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">December 2023</strong></td>
              </tr>
              <tr>
                <td style="color: red;">25-12-2023</td>
                <td style="color: red;">Monday</td>
                <td>Christmas Day</td>
              </tr>
            </tbody>
          </table>

       </div>
       <div class="uk-width-1-1">
        <h2  class="uk-margin-remove">List of Holidays in <b>2024</b></h2>
        <p class="uk-margin-remove uk-margin-bottom">Office will remain closed on the holidays denoted by Red Colour. <a target="blank" href="{{route('frontend.site.calender.download', 2024)}}">Download List</a></p>       
       </div>
       
        <div class="" style="margin-top: 8px;" >
          <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
            <tbody>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">January 2024</strong></td>
              </tr>

              <tr>
                <td style="color: orange;">01-01-2024</td>
                <td style="color: orange;">Monday</td>
                <td> RH* - New Year's Day</td>
              </tr>
              <tr>
                <td style="color: orange;">15-01-2024</td>
                <td style="color: orange;">Monday</td>
                <td> RH* - Makar Sankranti</td>
              </tr>

              <tr>
                <td style="color: red;">26-01-2024</td>
                <td style="color: red;">Friday</td>
                <td>Republic Day of India</td>
              </tr>
            
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">March 2024</strong></td>
              </tr>

              <tr>
                <td style="color: orange;">8-03-2024</td>
                <td style="color: orange;">Friday</td>
                <td>RH* - Maha Shivaratri</td>
              </tr>
              <tr>
                <td style="color: orange;">24-03-2024</td>
                <td style="color: orange;">Sunday</td>
                <td>RH* - Holika Dahan</td>
              </tr>
              <tr>
                <td style="color: red;">25-03-2024</td>
                <td style="color: red;">Monday</td>
                <td>Holi</td>
              </tr>
              <tr>
                <td style="color: red;">29-03-2024</td>
                <td style="color: red;">Friday</td>
                <td>Good Friday</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">April 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">11-04-2024</td>
                <td style="color: red;">Thursday</td>
                <td>Eid ul-Fitr</td>
              </tr>
              <tr>
                <td style="color: orange;">14-04-2024</td>
                <td style="color: orange;">Sunday</td>
                <td>RH* - Ambedkar Jayanti</td>
              </tr>
              <tr>
                <td style="color: red;">17-04-2024</td>
                <td style="color: red;">Wednesday</td>
                <td> Ram Navami</td>
              </tr>
              <tr>
                <td style="color: red;">21-04-2024 </td>
                <td style="color: red;">Sunday</td>
                <td> Mahavir Jayanti</td>
              </tr>
            
            
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">May 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">23-05-2024</td>
                <td style="color: red;">Thursday</td>
                <td>Buddha Purnima</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">June 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">17-06-2024</td>
                <td style="color: red;">Monday</td>
                <td>Eid ul-Zuha</td>
              </tr> 
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">July 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">17-07-2024</td>
                <td style="color: red;">Wednesday</td>
                <td>Muharram</td>
              </tr>

            </tbody>
          </table>
       </div>

       <div class="uk-width-1-2" style="margin-top: 8px;" >
          <table class="uk-table uk-table-divider" style="border: 1px solid #e9b6b68a;">      
            <tbody>
                
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">August 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">15-08-2024</td>
                <td style="color: red;">Thursday</td>
                <td>Independence Day of India</td>
              </tr>
              <tr>
                <td style="color: orange;">19-08-2024</td>
                <td style="color: orange;">Monday</td>
                <td>RH* - Raksha Bandhan</td>
              </tr>
              <tr>
                <td style="color: red;">26-08-2024</td>
                <td style="color: red;">Monday</td>
                <td>Krishna Janmashtami</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">September 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">16-09-2024</td>
                <td style="color: red;">Monday</td>
                <td>Eid-Milad (Milad un-Nabi)</td>
              </tr>
              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">October 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">02-10-2024</td>
                <td style="color: red;">Wednesday</td>
                <td>Gandhi Jayanti</td>
              </tr>
              <tr>
                <td style="color: orange;">11-10-2024</td>
                <td style="color: orange;">Friday</td>
                <td> RH* - Dussehra Navami</td>
              </tr>
              <tr>
                <td style="color: red;">12-10-2024</td>
                <td style="color: red;">Saturday</td>
                <td>Dussehra</td>
              </tr>
              <tr>
                <td style="color: orange;">30-10-2024</td>
                <td style="color: orange;">Wednesday</td>
                <td>RH* - Diwali Eve</td>
              </tr>
              <tr>
                <td style="color: red;">31-10-2024</td>
                <td style="color: red;">Thursday</td>
                <td>Diwali</td>
              </tr>

              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">November 2024</strong></td>
              </tr>

              <tr>
                <td style="color: red;">01-11-2024</td>
                <td style="color: red;">Friday</td>
                <td>Govardhan Puja</td>
              </tr>
              <tr>
                <td style="color: red;">03-11-2024</td>
                <td style="color: red;">Sunday</td>
                <td>Bhai Duja</td>
              </tr>
              <tr>
                <td style="color: orange;">07-11-2024</td>
                <td style="color: orange;">Thursday</td>
                <td>RH* - Chatt Puja</td>
              </tr>
              <tr>
                <td style="color: red;">15-11-2024</td>
                <td style="color: red;">Friday</td>
                <td>Guru Nanak Jayanti</td>
              </tr>

              <tr class="winner__table" colspan="3" style="background-color: #f9f4f4;">          
                <td colspan="3"><strong style="font-weight: 600;">December 2024</strong></td>
              </tr>
              <tr>
                <td style="color: red;">25-12-2024</td>
                <td style="color: red;">Wednesday</td>
                <td>Christmas Day</td>
              </tr>
            </tbody>
          </table>
       </div>
      
    </div>
    <div class="uk-margin-large-top uk-width-1-1" >
      <div uk-grid>
          <div class="uk-width-1-2" >
            <div class="calnder-dys">
                <p><strong>Working Hours on Weekdays :</strong> 10:00 AM - 6:30 PM (IST)</p>
                <p class="calnder-pa"><strong>Weekly Holidays:</strong><span style="color: red;"> Saturday</span> &amp; <span style="color: red;">Sunday</span></p>
            </div>
          </div>
          <div class="uk-width-1-2" >
            <p  style="color: orange;">* RH - Restricted Holiday (optional)</p>
            <p>Office work may be affected on <b>RH*</b> holidays denoted by Orange Colour </p>
          </div>
      </div>
    </div>
  </div>
</section>
@endif
@endsection
