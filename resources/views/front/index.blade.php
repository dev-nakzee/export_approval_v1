


@extends('front/layout/master')
@section('main-contant')
    <!-- HEADER-TOP END -->
    <div class="slider-bg">
      <div class="clear"></div>
      <!--slider --->
      <div class="slider-banner">
          <div class="banner owl-carousel">
           
              <div class="slider slider-txt">
                  <div class="container">
                      <!-- <h4 class="home_page_slider_para"><a href="https://www.brandliaison.in" target="_blank">This is Exclusive for Foreign Applicant's, if you are <span>INDIAN </span>Applicant's , Please <span>CLICK HERE</span> </a></h4> -->
                      <div class="row align-items-center">
                          <div class=" col-lg-7 col-12 pr-sm-0">
                              <div class="banner-txt">
                                  <h2>Are you Planning to </h2>
                                  <h1>Export your Product to India?</h1>
                                  <p>Get your Product Approvel for Indian Market fast & Economical way.</p>
                                  <h4>Know the Product Compliance for India</h4>


                                  <form  action="{{url('/search/')}}" method="get" id="searchForm">  
                                    <div class="searchbox">
                                      <div class="input-wrapper"> <i class="fa fa-search"></i>
                                        <input type="text" id="zipcodeInput" class="searchbar" name="q" autocomplete="off" >
                                      </div>
                                      <!-- <button type="submit" class="btn dream-btn orange">Search</button> -->
                                    </div>
                                  </form>


                                  <ul class="slidercontent-list">
                                      <li> <img src="{{ url('front') }}/images/bnr-icon1.png" alt="icon img">
                                          <h4><a href="{{url('service/bis-crs-registration')}}">BIS / CRS Registration</a></h4>
                                      </li>
                                      <li> <img src="{{ url('front') }}/images/bnr-icon2.png" alt="icon img">
                                          <h4><a href="{{url('service/isi-bis-certification')}}">ISI / BIS Certification</a></h4>
                                      </li>
                                      <li> <img src="{{ url('front') }}/images/bnr-icon3.png" alt="icon img">
                                          <h4><a href="{{url('service/wpc-eta-approval')}}">WPC / ETA Approval</a></h4>
                                      </li>
                                      <!-- <li>
                                      <img src="images/bnr-icon4.png" alt="icon img">
                                      <h4><a href="javascript:void(0);">BEE Registration</a></h4>
                                    </li> -->
                                  </ul>
                              </div>
                          </div>
                          <div class="col-12 col-lg-5">
                              <!--  <div class="home-enquiry">
                                <h4>Enquiry Now <span>Contact us for custom quote</span> </h4>
                                <div class="enquiryrow">
                                    <label>Name</label>
                                    <input type="text" class="form-group" placeholder="Your Name *">
                                </div>
                                <div class="enquiryrow">
                                    <label>Name</label>
                                    <input type="text" class="form-group" placeholder="Email *">
                                </div>
                                <div class="enquiryrow">
                                <label>Name</label>
                                    <input type="text" class="form-group" placeholder="Mobile *">
                                </div>
                                <div class="enquiryrow">
                                <label>Name</label>
                                    <input type="text" class="form-group" placeholder="Enquiry For *">
                                </div>
                                <div class="enquiryrow">
                                    <input type="submit" class="form-group enq-sbmtbtn">
                                </div>
                                </div> -->
                              <div class="home-enquiry"> <img src="{{ url('front') }}/images/indiamap.png"> </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- slider crousal end -->
      </div>
      <!-- slider end---->
  </div>
  <div class="overflowx-hidden welcomecont">
      <div class="container">
          <div class="pro-container wow animated fadeInUp">
              <div class="aboutsection2-bg"></div>
              <div class="row">
                  <div class="col-lg-6 offset-lg-3">
                      <div class="left-title-area text-center">
                          <h1>Prominent Product Compliance for India for <span>Foreign Manufacturer</span></h1>
                          <!--  <img src="images/aboutimg.png" alt="about image"> -->
                      </div>
                  </div>
              </div>


              <div class="row text-align-center">

                @if(count($categoryList)>0)
                @foreach ($categoryList as $key => $value )
                
                  <div class="col-lg-3 col-md-6 col-sm-12"> <a href="{{url('service/'.$value->slug)}}">
                          <div class="border">
                              <div class="img_width"><img src="{{url('/uploads/logo/'.$value->logo)}}" alt="{{$value->alt_tag}}"></div>
                              <div class="content2">
                                  <h3>{{$value->name}}</h3>
                                  <p>For IT &amp; Electronics Products</p>
                              </div>
                              <div class="clear"></div>
                          </div>
                      </a> </div>

                        @endforeach
                      @endif
                  {{-- <div class="col-lg-3 col-md-6 col-sm-12"> <a href="{{url('service/isi-bis-certification')}}">
                          <div class="border">
                              <div class="img_width"><img src="{{ url('front') }}/images/isi.png "
                                      alt="BIS Certificate"></div>
                              <div class="content2">
                                  <h3>ISI / BIS Certification</h3>
                                  <p>For IT &amp; Electronics Products</p>
                              </div>
                              <div class="clear"></div>
                          </div>
                      </a> 
                    </div>
                  <div class="col-lg-3 col-md-6 col-sm-12"> <a href="{{url('service/wpc-eta-approval')}}">
                          <div class="border">
                              <div class="img_width"><img src="{{ url('front') }}/images/wpc1.png "></div>
                              <div class="content2">
                                  <h3>WPC / ETA Approval</h3>
                                  <p>For IT &amp; Electronics Products</p>
                              </div>
                              <div class="clear"></div>
                          </div>
                      </a> 
                    </div>
                  <div class="col-lg-3 col-md-6 col-sm-12"> <a href="#">
                          <div class="border">
                              <div class="img_width"><img src="{{ url('front') }}/images/tc.png"></div>
                              <div class="content2">
                                  <h3>TEC Certification</h3>
                                  <p>For IT &amp; Electronics Products</p>
                              </div>
                              <div class="clear"></div>
                          </div>
                      </a>
                     </div> --}}
              </div>
          </div>
      </div>
  </div>
  
  @php
  $serviceList = App\Models\Category::where('status',1)->whereNotIn('id',[9,10])->get();
  @endphp
  
  @if(count($serviceList)>0)
  <div class="your_bussiness">
      <div class="container wow animated fadeInUp">
          <div class="col-lg-6 offset-lg-3 text-center">
              <div class="left-title-area text-center">
                  <h1>Mandatory Product List for Indian Approval <span>Verify your Product</span></h1>
                  <!--  <img src="{{ url('front') }}/images/aboutimg.png" alt="about image"> -->
              </div>
          </div>
          <div class="row">
            @foreach ($serviceList as $val)       
              <!-- product start -->
              <div class="col-lg-4 col-md-6"  style="margin-bottom:20px;">
                     <div class="section-title text-center position-relative  mb-4 mx-auto" style="background: #197fbd1f;margin-bottom: 0px !important;border: 1px solid #d0d0d0;">
                        <h4 class="mb-0 bis-crs-index1" style="margin-top: 10px;margin-left: -141px;font-size: 18px;"><a class="" href="#" style=" color: #f39323;">Mandatory Products List</a></h4>
                        <h4 class="mb-0 bis-crs-index" style="font-size: 25px; padding: 9px 21px; text-align: start;"> <a class="" href="{{url('service/'.$val->slug)}}">{{Str::limit($val->name,25)}} </a> </h4>
                    </div>
                    <div class="mandatory-pro owl-carousel">
                        
                                        @php
                                             $mandatoryProduct = explode(',',$val->product_category_id);
                                              $productList = App\Models\Product::whereIn('product_category_id',$mandatoryProduct)->get();
                                              
                                        @endphp
                        
                        
                        @if(count($productList)>0)
                        @foreach($productList as $value)
                          <div class="mandatory-procont">
                              <a href="{{url('/product/'.$value->slug)}}"><img src="{{url('/uploads/product/image/'.$value->image)}}"></a>
                              <p style="text-align: center;">
                                  <a href="{{url('/product/'.$value->slug)}}" style="font-size:12px;color:#676666;font-weight: 300;">{{Str::limit($value->name,30)}}</a>
                              </p>
                          </div>
                          @endforeach
                          @endif             
                    </div>
              </div>
              
              <!-- product end -->
              
              @endforeach
              
              
              
              
              
            <div class="col-lg-12"></div>



              {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="whyus-box"> <img src="{{ url('front') }}/images/ISI-BIS-Certification.jpg">
                      <div class="service_content">
                          <h5>Other Then ITR Electronics Prodcuts</h5>
                          <ul class="product_service">
                              <li>LED Lamps</li>
                              <li>Printer / Plotter</li>
                              <li>LED Lamps</li>
                              <li>Printer / Plotter</li>
                          </ul>
                          <a href="#" class="more-btn">View Details</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="whyus-box"> <img src="{{ url('front') }}/images/eat-certification.jpg">
                      <div class="service_content">
                          <h5>WiFi & Bluetooth Products</h5>
                          <ul class="product_service">
                              <li>Room Air Conditioner</li>
                              <li>Tubular Fluorescent Lamps</li>
                              <li>LED Lamps</li>
                              <li>Printer / Plotter</li>
                          </ul>
                          <a href="#" class="more-btn">View Details</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="whyus-box"> <img src="{{ url('front') }}/images/tec-certification.jpg">
                      <div class="service_content">
                          <h5>Telecom Products</h5>
                          <ul class="product_service">
                              <li>Room Air Conditioner</li>
                              <li>Tubular Fluorescent Lamps</li>
                              <li>LED Lamps</li>
                              <li>Printer / Plotter</li>
                          </ul>
                          <a href="#" class="more-btn">View Details</a>
                      </div>
                  </div>
              </div> --}}
          </div>
      </div>
  </div>
  
  @endif

  
  <div class="overflowx-hidden notification">
      <div class="container">
          <div class="pro-container wow animated fadeInUp">
              <div class="aboutsection2-bg"></div>
              <div class="row">
                  <div class="col-md-6 offset-md-3">
                      <div class="left-title-area text-center">
                          <h1>Latest <span>Notifications</span></h1>
                      </div>
                  </div>
              </div>
              <div class="row">

                @foreach ($categoryList as $val)           
                
                            @php
                                $notificationList = App\Models\IndrustyNotification::where('status',1)->where('category_id',$val->id)->where('show_home',1)->limit(4)->latest()->get();
                            @endphp
                            
                        @if(count($notificationList)>0)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="packagebox wow animated fadeInUp animated"
                                style="visibility: visible; animation-name: fadeInUp;">
                                <div class="packagehd" onclick="window.top.location='{{url('/service/'.$val->slug)}}'"> {{ $val->name }} </div>
                                <div class="packagedet">

                                
                                    <ul class="packagelist">

                                        @if(count($notificationList)>0)
                                            @foreach ($notificationList as $value)
                                            <li onclick="window.top.location='{{url('/notification-details/'.$val->slug.'/'.base64_encode($value->id))}}'" >
                                                {{ Str::limit($value->title,60) }}    
                                            </li>  
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="packagebuy"> <a href="{{ url('service/'.$val->slug.'#section8') }}">View Details</a> </div>
                            </div>
                        </div>
                        @endif

                  @endforeach

                  {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="packagebox wow animated fadeInUp animated"
                          style="visibility: visible; animation-name: fadeInUp;">
                          <div class="packagehd">ISI / BIS Certification </div>
                          <div class="packagedet">
                              <ul class="packagelist">
                                  <li>Sports footwear</li>
                                  <li>Sports footwear</li>
                                  <li>Domestic Pressure Cooker</li>
                                  <li>Non-Electric Toys</li>
                              </ul>
                          </div>
                          <div class="packagebuy"> <a href="#">View Details</a> </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="packagebox wow animated fadeInUp animated"
                          style="visibility: visible; animation-name: fadeInUp;">
                          <div class="packagehd"> Wifi Bluetooth</div>
                          <div class="packagedet">
                              <ul class="packagelist">
                                  <li>Bluetooth Headphones</li>
                                  <li>Wireless Nano USB</li>
                                  <li>Hotspot Devices</li>
                                  <li>Wireless Terminal</li>
                              </ul>
                          </div>
                          <div class="packagebuy"> <a href="#">View Details</a> </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12">
                      <div class="packagebox wow animated fadeInUp animated"
                          style="visibility: visible; animation-name: fadeInUp;">
                          <div class="packagehd"> TEC Certification </div>
                          <div class="packagedet">
                              <ul class="packagelist">
                                  <li>Group 3 Fax Machine</li>
                                  <li>Cordless Telephone</li>
                                  <li>Media Converter</li>
                                  <li>Tracking Device</li>
                              </ul>
                          </div>
                          <div class="packagebuy"> <a href="#">View Details</a> </div>
                      </div>
                  </div>
                    --}}


              </div>
          </div>
      </div>
  </div>
  

@if(count($testimonialList)>0)
  <div class="section3">
      <div class="container">
          <div class="row">
              <div class="col-md-6 offset-md-3">
                  <div class="left-title-area text-center">
                      <h1>What Our <span>Clients Say!</span></h1>
                      <!--  <img src="{{ url('front') }}/images/aboutimg.png" alt="about image"> -->
                  </div>
              </div>
              <div class="col-sm-12 wow animatded fadeInDown">
                  <div class="testi-bubble">
                      <div class="testimonial owl-carousel">
                        @foreach ($testimonialList as $ke => $value)
                          <div class="testimonial-box">
                              <div class="testimonial-1"><img src="{{ url('/uploads/testimonial/'.$value->image) }}" alt="{{$value->alt_tag}}">
                              </div>
                              <h5>{{ $value->name }} <span>({{ $value->desingnation }})</span></h5>
                              <p>{{ $value->comment }}</p>
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endif

  @if(count($latestBlogList)>0)
  <section class="section cm-blogs bg-light-gray">
      <div class="container">
          <div class="row">
              <div class="col-md-6 offset-md-3">
                  <div class="left-title-area text-center">
                      <h1>Latest From <span>Our Blog</span></h1>
                  </div>
              </div>
          </div>
          <div class="row">


            @if(count($latestBlogList)>0)
                @foreach ($latestBlogList as $key =>$value)            
                    <div class="col-lg-3 col-md-6">
                        <div class="blog-item card border-0 mt-30"> <a href="{{ url('blog-details/'.$value->slug) }}" alt="{{$value->alt_tag}}"><img class="card-img-top"
                                    src="{{ url('/uploads/Blog/ListImg/'.$value->image)}}" alt=""></a>
                            <div class="card-body"> <a href="{{ url('blog-details/'.$value->slug) }}" class="h4"> {{  Str::limit($value->title,90) }}</a>
                                <p> {{ Str::limit($value->short_description, 140, '...') }}</p>
                            </div>
                            <div class="packagebuy"> <a href="{{ url('blog-details/'.$value->slug) }}">Read More</a> </div>
                        </div>
                    </div>
                @endforeach
              @endif

            {{-- 
              <div class="col-lg-3 col-md-6">
                  <div class="blog-item card border-0 mt-30"> <a href="#"><img class="card-img-top"
                              src="{{ url('front') }}/images/blog_2.jpg" alt=""></a>
                      <div class="card-body"> <a href="#" class="h4">Changes to ISP License Agreement in
                              regards to AGR</a>
                          <p>Announcing of invitation principles in. Cold in late or deal. Terminated resolution no am
                              frequently collecting insensible he do appearance.</p>
                      </div>
                      <div class="packagebuy"> <a href="#">Read More</a> </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="blog-item card border-0 mt-30"> <a href="#"><img class="card-img-top"
                              src="{{ url('front') }}/images/blog_3.jpg" alt=""></a>
                      <div class="card-body"> <a href="#" class="h4">Impact of the New AGR Dues Norms on
                              the ...</a>
                          <p>Announcing of invitation principles in. Cold in late or deal. Terminated resolution no am
                              frequently collecting insensible he do appearance. </p>
                      </div>
                      <div class="packagebuy"> <a href="#">Read More</a> </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6">
                  <div class="blog-item card border-0 mt-30"> <a href="#"><img class="card-img-top"
                              src="{{ url('front') }}/images/blog_2.jpg" alt=""></a>
                      <div class="card-body"> <a href="#" class="h4">Changes to ISP License Agreement in
                              regards to AGR</a>
                          <p>Announcing of invitation principles in. Cold in late or deal. Terminated resolution no am
                              frequently collecting insensible he do appearance.</p>
                      </div>
                      <div class="packagebuy"> <a href="#">Read More</a> </div>
                  </div>
              </div> --}}



          </div>
      </div>
  </section>

  @endif

  <div class="enquiry_section">
      <div class="container">
          <div class="row">
              <div class="col-md-6 offset-md-3">
                  <div class="left-title-area text-center">
                      <h1>Get Free <span>Consultation</span></h1>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-4">
                  <div class="content_height">
                      <h2>Please share your personal Details <br>
                          <br>
                          We'll revert Immediatly!
                      </h2>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="enquiry">

                    <form data-parsley-validate action="{{ url('saveEnquiry') }}" method="post">
                        @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="enquiryrow2 enquiryrow3">
                                  <!-- <label>Name</label> -->
                                  <input type="text" class="form-group" name="name" placeholder="Name" data-parsley-required="true" data-parsley-required-message="Please enter your name" onkeypress="return /[a-z-/ /]/i.test(event.key)">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="enquiryrow2 enquiryrow3">
                                  <!-- <label>Email</label>  -->
                                  <input type="email" class="form-group" placeholder="Email" data-parsley-type="email" data-parsley-type-message="Please enter a valid email address" name="email" data-parsley-required-message="Please enter email address" required>
                              </div>
                          </div>
                          <!-- <div class="col-md-6">
                               <div class="enquiryrow2">
                                  <label>Country</label>
                                   <input type="text" class="form-group" placeholder="Country">
                               </div>
                           </div> -->

                          <div class="col-md-6">
                              <div class="enquiryrow2 enquiryrow3">
                                  <!-- <label>Country:</label> -->
                                  <select name="country" id="country" value="" autocomplete="on"
                                      onkeypress="return ValidateAlpha(event);" required="">
                                      <option value="">Select Country</option>
                                      <option value="India: +91">India: +91</option>
                                      <option value="Afghanistan: +93">Afghanistan: +93</option>
                                      <option value="Albania: +355">Albania: +355</option>
                                      <option value="Algeria: +213">Algeria: +213</option>
                                      <option value="Andorra: +376">Andorra: +376</option>
                                      <option value="Angola: +244">Angola: +244</option>
                                      <option value="Antigua and Barbuda: +1268"> Antigua and Barbuda: +1268</option>
                                      <option value="Argentina: +54">Argentina: +54</option>
                                      <option value="Armenia: +374">Armenia: +374</option>
                                      <option value="Australia: +61">Australia: +61</option>
                                      <option value="Austria: +43">Austria: +43</option>
                                      <option value="Azerbaijan: +994">Azerbaijan: +994</option>
                                      <option value="Bahamas: +1242">Bahamas: +1242</option>
                                      <option value="Bahrain: +973">Bahrain: +973</option>
                                      <option value="Bangladesh: +880">Bangladesh: +880</option>
                                      <option value="Barbados: +1246">Barbados: +1246</option>
                                      <option value="Belarus: +375">Belarus: +375</option>
                                      <option value="Belgium: +32">Belgium: +32</option>
                                      <option value="Belize: +501">Belize: +501</option>
                                      <option value="Benin: +229">Benin: +229</option>
                                      <option value="Bhutan: +975">Bhutan: +975</option>
                                      <option value="Bolivia: +591">Bolivia: +591</option>
                                      <option value="Bosnia and Herzegovina: +387">Bosnia and Herzegovina: +387
                                      </option>
                                      <option value="Botswana: +267">Botswana: +267</option>
                                      <option value="Brazil: +55">Brazil: +55</option>
                                      <option value="Brunei Darussalam: +673">Brunei: +673</option>
                                      <option value="Bulgaria: +359">Bulgaria: +359</option>
                                      <option value="Burkina Faso: +226">Burkina Faso: +226</option>
                                      <option value="Burundi: +257">Burundi: +257</option>
                                      <option value="Cape Verde: +238">Cape Verde: +238</option>
                                      <option value="Cambodia: +855">Cambodia: +855</option>
                                      <option value="Cameroon: +237">Cameroon: +237</option>
                                      <option value="Canada: +1">Canada: +1</option>
                                      <option value="Central African Republic: +236">Central African Republic: +236
                                      </option>
                                      <option value="Chad: +235">Chad: +235</option>
                                      <option value="Chile: +56">Chile: +56</option>
                                      <option value="China: +86">China: +86</option>
                                      <option value="Colombia: +57">Colombia: +57</option>
                                      <option value="Comoros: +269">Comoros: +269</option>
                                      <option value="Congo: +242">Congo: +242</option>
                                      <option value="Costa Rica: +506">Costa Rica: +506</option>
                                      <option value="Croatia: +385">Croatia: +385</option>
                                      <option value="Cuba: +53">Cuba: +53</option>
                                      <option value="Cyprus: +357">Cyprus: +357</option>
                                      <option value="Czech Republic: +420">Czechia: +420</option>
                                      <option value="Côte d'Ivoire: +25">Côte d'Ivoire: +225</option>
                                      <option value="Denmark: +45">Denmark: +45</option>
                                      <option value="Djibouti: +253">Djibouti: +253</option>
                                      <option value="Dominica: +1767">Dominica: +1767</option>
                                      <option value="ominican Republic: +1809">Dominican Republic: +1809</option>
                                      <option value="Dominican Republic: +1829">Dominican Republic: +1829</option>
                                      <option value="Dominican Republic: +1849">Dominican Republic: +1849</option>
                                      <option value="DR Congo: +243">DR Congo: +243</option>
                                      <option value="Ecuador: +593">Ecuador: +593</option>
                                      <option value="Egypt: +20">Egypt: +20</option>
                                      <option value="El Salvador: +503">El Salvador: +503</option>
                                      <option value="Equatorial Guinea: +240">Equatorial Guinea: +240</option>
                                      <option value="Eritrea: +291">Eritrea: +291</option>
                                      <option value="Estonia: +372">Estonia: +372</option>
                                      <option value="Eswatini: +268">Eswatini: +268</option>
                                      <option value="Ethiopia: +251">Ethiopia: +251</option>
                                      <option value="Fiji: +679">Fiji: +679</option>
                                      <option value="Finland: +358">Finland: +358</option>
                                      <option value="France: +33">France: +33</option>
                                      <option value="Gabon: +241">Gabon: +241</option>
                                      <option value="Gambia: +220">Gambia: +220</option>
                                      <option value="Georgia: +995">Georgia: +995</option>
                                      <option value="Germany: +49">Germany: +49</option>
                                      <option value="Ghana: +233">Ghana: +233</option>
                                      <option value="Greece: +30">Greece: +30</option>
                                      <option value="Grenada: +1473">Grenada: +1473</option>
                                      <option value="Guatemala: +502">Guatemala: +502</option>
                                      <option value="Guinea: +224">Guinea: +224</option>
                                      <option value="Guinea-Bissau: +245">Guinea-Bissau: +245</option>
                                      <option value="Guyana: +592">Guyana: +592</option>
                                      <option value="Haiti: +509">Haiti: +509</option>
                                      <option value="Honduras: +504">Honduras: +504</option>
                                      <option value="Hong Kong: +852">Hong Kong: +852</option>
                                      <option value="Hungary: +36">Hungary: +36</option>
                                      <option value="Iceland: +354">Iceland: +354</option>
                                      <option value="India: +91">India: +91</option>
                                      <option value="Indonesia: +62">Indonesia: +62</option>
                                      <option value="Iran: +98">Iran: +98</option>
                                      <option value="Iraq: +964">Iraq: +964</option>
                                      <option value="Ireland: +353">Ireland: +353</option>
                                      <option value="Israel: +972">Israel: +972</option>
                                      <option value="Italy: +39">Italy: +39</option>
                                      <option value="Jamaica: +1876">Jamaica: +1876</option>
                                      <option value="Japan: +81">Japan: +81</option>
                                      <option value="Jordan: +962">Jordan: +962</option>
                                      <option value="Kazakhstan: +76">Kazakhstan: +7</option>
                                      <option value="Kenya: +254">Kenya: +254</option>
                                      <option value="Kiribati: +686">Kiribati: +686</option>
                                      <option value="Kuwait: +965">Kuwait: +965</option>
                                      <option value="Kyrgyzstan: +996">Kyrgyzstan: +996</option>
                                      <option value="Laos: +856">Laos: +856</option>
                                      <option value="Latvia: +371">Latvia: +371</option>
                                      <option value="Lebanon: +961">Lebanon: +961</option>
                                      <option value="Lesotho: +266">Lesotho: +266</option>
                                      <option value="Liberia: +231">Liberia: +231</option>
                                      <option value="Libya: +218">Libya: +218</option>
                                      <option value="Liechtenstein: +423">Liechtenstein: +423</option>
                                      <option value="Lithuania: +370">Lithuania: +370</option>
                                      <option value="Luxembourg: +352">Luxembourg: +352</option>
                                      <option value="Madagascar: +261">Madagascar: +261</option>
                                      <option value="Malawi: +265">Malawi: +265</option>
                                      <option value="Malaysia: +60">Malaysia: +60</option>
                                      <option value="Maldives: +960">Maldives: +960</option>
                                      <option value="Mali: +223">Mali: +223</option>
                                      <option value="Malta: +356">Malta: +356</option>
                                      <option value="Marshall Islands: +692">Marshall Islands: +692</option>
                                      <option value="Mauritania: +222">Mauritania: +222</option>
                                      <option value="Mauritius: +230">Mauritius: +230</option>
                                      <option value="Mexico: +252">Mexico: +252</option>
                                      <option value="Micronesia, Federated States of: +691">Micronesia: +691</option>
                                      <option value="Moldova: +373">Moldova: +373</option>
                                      <option value="Monaco: +377">Monaco: +377</option>
                                      <option value="Mongolia: +976">Mongolia: +976</option>
                                      <option value="Montenegro: +382">Montenegro: +382</option>
                                      <option value="Morocco: +212">Morocco: +212</option>
                                      <option value="Mozambique: +258">Mozambique: +258</option>
                                      <option value="Myanmar: +95">Myanmar: +95</option>
                                      <option value="Namibia: +264">Namibia: +264</option>
                                      <option value="Nauru: +674">Nauru: +674</option>
                                      <option value="Nepal: +977">Nepal: +977</option>
                                      <option value="Netherlands: +31">Netherlands: +31</option>
                                      <option value="New Zealand: +64">New Zealand: +64</option>
                                      <option value="Nicaragua: +505">Nicaragua: +505</option>
                                      <option value="Niger: +227">Niger: +227</option>
                                      <option value="Nigeria: +234">Nigeria: +234</option>
                                      <option value="North Korea: +850">North Korea: +850</option>
                                      <option value="North Macedonia: +389">North Macedonia: +389</option>
                                      <option value="Norway: +47">Norway: +47</option>
                                      <option value="Oman: +968">Oman: +968</option>
                                      <option value="Pakistan: +92">Pakistan: +92</option>
                                      <option value="Palau: +680">Palau: +680</option>
                                      <option value="Panama: +507">Panama: +507</option>
                                      <option value="Papua New Guinea: +675">Papua New Guinea: +675</option>
                                      <option value="Paraguay: +595">Paraguay: +595</option>
                                      <option value="Peru: +51">Peru: +51</option>
                                      <option value="Philippines: +63">Philippines: +63</option>
                                      <option value="Poland: +48">Poland: +48</option>
                                      <option value="Portugal: +351">Portugal: +351</option>
                                      <option value="Qatar: +974">Qatar: +974</option>
                                      <option value="Romania: +40">Romania: +40</option>
                                      <option value="Russia: +7">Russia: +7</option>
                                      <option value="Rwanda: +250">Rwanda: +250</option>
                                      <option value="Saint Kitts and Nevis: +1869">Saint Kitts and Nevis: +1869
                                      </option>
                                      <option value="Saint Lucia: +1758">Saint Lucia: +1758</option>
                                      <option value="Samoa: +685">Samoa: +685</option>
                                      <option value="San Marino: +378">San Marino: +378</option>
                                      <option value="São Tomé and Príncipe: +239">São Tomé and Príncipe: +239
                                      </option>
                                      <option value="Saudi Arabia: +966">Saudi Arabia: +966</option>
                                      <option value="Senegal: +221">Senegal: +221</option>
                                      <option value="Serbia: +381">Serbia: +381</option>
                                      <option value="Seychelles: +248">Seychelles: +248</option>
                                      <option value="Sierra Leone: +232">Sierra Leone: +232</option>
                                      <option value="Singapore: +65">Singapore: +65</option>
                                      <option value="Slovakia: +421">Slovakia: +421</option>
                                      <option value="Slovenia: +386">Slovenia: +386</option>
                                      <option value="Solomon Islands: +677">Solomon Islands: +677</option>
                                      <option value="Somalia: +252">Somalia: +252</option>
                                      <option value="South Africa: +27">South Africa: +27</option>
                                      <option value="South Korea: +82">South Korea: +82</option>
                                      <option value="South Sudan: +211">South Sudan: +211</option>
                                      <option value="Spain: +34">Spain: +34</option>
                                      <option value="Sri Lanka: +94">Sri Lanka: +94</option>
                                      <option value="Saint Vincent and the Grenadines: +1">Saint Vincent and the
                                          Grenadines: +1</option>
                                      <option value="State of Palestine: +970">State of Palestine: +970</option>
                                      <option value="Sudan: +249">Sudan: +249</option>
                                      <option value="Suriname: +597">Suriname: +597</option>
                                      <option value="Sweden: +46">Sweden: +46</option>
                                      <option value="Switzerland: +41">Switzerland: +41</option>
                                      <option value="Syria: +963">Syria: +963</option>
                                      <option value="Taiwan: +886">Taiwan: +886</option>
                                      <option value="Tajikistan: +992">Tajikistan: +992</option>
                                      <option value="Tanzania: +555">Tanzania: +555</option>
                                      <option value="Thailand: +66">Thailand: +66</option>
                                      <option value="Timor-Leste: +670">Timor-Leste: +670</option>
                                      <option value="Togo: +228">Togo: +228</option>
                                      <option value="Tonga: +676">Tonga: +676</option>
                                      <option value="Trinidad and Tobago: +1868">Trinidad and Tobago: +1868</option>
                                      <option value="Tunisia: +216">Tunisia: +216</option>
                                      <option value="Turkey: +90">Turkey: +90</option>
                                      <option value="Turkmenistan: +993">Turkmenistan: +993</option>
                                      <option value="Tuvalu: +688">Tuvalu: +688</option>
                                      <option value="Uganda: +256">Uganda: +256</option>
                                      <option value="Ukraine: +380">Ukraine: +380</option>
                                      <option value="United Arab Emirates: +971">United Arab Emirates: +971</option>
                                      <option value="United Kingdom: +44">United Kingdom: +44</option>
                                      <option value="United States: +1">United States: +1</option>
                                      <option value="Uruguay: +598">Uruguay: +598</option>
                                      <option value="Uzbekistan: +998">Uzbekistan: +998</option>
                                      <option value="Vanuatu: +678">Vanuatu: +678</option>
                                      <option value="Vatican City State (Holy See): +379">Vatican City State (Holy
                                          See): +379</option>
                                      <option value="Venezuela: +58">Venezuela: +58</option>
                                      <option value="Vietnam: +84">Vietnam: +84</option>
                                      <option value="Yemen: +967">Yemen: +967</option>
                                      <option value="Zambia: +260">Zambia: +260</option>
                                      <option value="Zimbabwe: +263">Zimbabwe: +263</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="enquiryrow2 enquiryrow3">
                                  <!-- <label>Mobile</label> -->
                                  <input type="text" class="form-group" name="mobile" placeholder="Mobile" onkeypress="return /[0-9/]/i.test(event.key)" data-parsley-required-message="Please enter Mobile Number" minlength="10" maxlength="10"  required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="enquiryrow2 enquiryrow3">
                                  <!-- <label>Product Brif</label> -->
                                  <textarea name="message" placeholder="Product Brif"></textarea>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="enquiryrow2 enquiryrow3">
                                  <input type="submit" class="form-group enq-sbmtbtn">
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="video-section wow animated fadeInUp">
      <div class="container">
          <div class="row">
              <!-- BRAND-CLIENT-ROW START -->
              <div class="col-lg-6 offset-lg-3">
                  <div class="left-title-area text-center">
                      <h1>Trusted By <span>100+</span> Global Brands</h1>
                  </div>
              </div>
              <div class="clear"></div>
              <!--client-section-->
              <div class="client-outer">
                  <div class=" container">
                      <div class='marquee-with-options'>


                        @if(count($brandList)>0)
                            @foreach ($brandList as  $key => $value)
                          <div class="cllogo"><img src="{{ url('/uploads/Brands/'.$value->image) }}"
                                  alt="{{$value->alt_tag}}">
                           </div>
                           @endforeach
                        @endif   
                      </div>
                  </div>
              </div>
              <!--client-section end-->
              <!-- BRAND-CLIENT-ROW END -->
          </div>
      </div>
  </div>


  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
var route = "{{ url('autocomplete-search') }}";
$('#zipcodeInput').typeahead({ 
    source: function (query, process) {
        return $.get(route, {
            query: query
        }, function (data) {  
              process(data); 
        });
    },
    afterSelect: function(data) {
         window.location.replace(data.url);
    }

});

</script>
  



  @endsection