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
            {{'Holiday list'}} 
        </p>
    </div>
    <div class="uk-container uk-width-1-1 uk-padding" uk-grid>
        <div class="uk-width-1-3">
            <div class="month">      
                <ul>
                <li class="prev">&#10094;</li>
            
                <li style="">
                    November<br>
                    <span style="font-size:18px">2023</span>
                </li>
                </ul>
            </div>
            
            <ul class="weekdays">
                <li>Sunday</li>
                <li>Monday</li>
                <li>Tuesday</li>
                <li>Wednesday</li>
                <li>Thursday</li>
                <li>Friday</li>
                <li>Saturday</li>
            </ul>
            
            <ul class="days"> 
                <li></li>
                <li></li>
                <li></li>
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li class="holiday">4</li>
                <li class="holiday">5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li>9</li>
                <li>10</li>
                <li class="holiday">11</li>
                <li class="holiday">12</li>
                <li class="holiday">13</li>
                <li class="holiday">14</li>
                <li>15</li>
                <li>16</li>
                <li>17</li>
                <li class="holiday">18</li>
                <li class="holiday">19</li>
                <li>20</li>
                <li>21</li>
                <li>22</li>
                <li>23</li>
                <li>24</li>
                <li class="holiday">25</li>
                <li class="holiday">26</li>
                <li class="holiday">27</li>
                <li>28</li>
                <li>29</li>
                <li>30</li>
            </ul>
        </div>
            <div class="uk-width-1-3">
                <div class="month">      
                    <ul>
                
                      <li style="">
                        December<br>
                        <span style="font-size:18px">2023</span>
                      </li>
                    </ul>
                  </div>
                  
                  <ul class="weekdays">
                    <li>Sunday</li>
                    <li>Monday</li>
                    <li>Tuesday</li>
                    <li>Wednesday</li>
                    <li>Thursday</li>
                    <li>Friday</li>
                    <li>Saturday</li>
                  </ul>
                  
                  <ul class="days"> 
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li>1</li>
                    <li class="holiday">2</li>
                    <li class="holiday">3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li class="holiday">9</li>
                    <li class="holiday">10</li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li class="holiday">16</li>
                    <li class="holiday">17</li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li class="holiday">23</li>
                    <li class="holiday">24</li>
                    <li class="holiday">25<br><i>Christmas</i></li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li class="holiday">30</li>
                    <li class="holiday">31<br><i>New Year's Eve</i></li>
                  </ul>
            </div>
            <div class="uk-width-1-3">
                <div class="month">      
                    <ul>
                 
                      <li class="next">&#10095;</li>
                      <li style="">
                        January<br>
                        <span style="font-size:18px">2024</span>
                      </li>
                    </ul>
                  </div>
                  
                  <ul class="weekdays">
                    <li>Sunday</li>
                    <li>Monday</li>
                    <li>Tuesday</li>
                    <li>Wednesday</li>
                    <li>Thursday</li>
                    <li>Friday</li>
                    <li>Saturday</li>
                  </ul>
                  
                  <ul class="days">
                    <li></li>
                    <li class="holiday">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li class="holiday">9</li>
                    <li class="holiday">9</li>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>11</li>
                    <li>12</li>
                    <li class="holiday">13</li>
                    <li class="holiday">14</li>
                    <li class="holiday">15</li>
                    <li>16</li>
                    <li>17</li>
                    <li>18</li>
                    <li>19</li>
                    <li class="holiday">20</li>
                    <li class="holiday">21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li class="holiday">26</li>
                    <li class="holiday">27</li>
                    <li class="holiday">28</li>
                    <li>29</li>
                    <li>30</li>
                    <li>31</li>
                  </ul>
            </div>
    </div>
</section>

@endsection
@section('scripts')
<style>
    * {box-sizing: border-box;}
    ul {list-style-type: none;}
    
    .month {
      padding: 30px 25px;
      width: 100%;
      background: #b8b8b8;
      text-align: center;
    }
    
    .month ul {
      margin: 0;
      padding: 0;
    }
    
    .month ul li {
      color: white;
      font-size: 20px;
      text-transform: uppercase;
      letter-spacing: 3px;
    }
    
    .month .prev {
      float: left;
      padding-top: 10px;
    }
    
    .month .next {
      float: right;
      padding-top: 10px;
    }
    
    .weekdays {
      margin: 0;
      padding: 10px 0;
      background-color: #ddd;
    }
    
    .weekdays li {
      display: inline-block;
      width: 13.6%;
      color: #666;
      font-size: 14px;
      text-align: center;
    }
    
    .days {
      padding: 10px 0;
      background: #eee;
      margin: 0;
    }
    
    .days li {
      list-style-type: none;
      display: inline-block;
      width: 13.6%;
      height: 70px;
      text-align: center;
      margin-bottom: 5px;
      font-size:20px;
      color: #777;
    }
    
    .days li .active {
      padding: 5px;
      background: #b9b9b9;
      color: white !important
    }
    
    /* Add media queries for smaller screens */
    @media screen and (max-width:720px) {
      .weekdays li, .days li {width: 13.1%;}
    }
    
    @media screen and (max-width: 420px) {
      .weekdays li, .days li {width: 12.5%;}
      .days li .active {padding: 2px;}
    }
    
    @media screen and (max-width: 290px) {
      .weekdays li, .days li {width: 12.2%;}
    }

    .holiday {
        color: red !important;
    }
    .holiday i {
        font-size: 12px !important;
    }

    </style>
@endsection