

@extends('front/layout/master')
@section('main-contant')


<div class="inerheader2 inerheader4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="servicehead servicehead2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center registration_outer">
                                <div class="registration_logo">
                                    <img src="{{ url('/uploads/logo/'.$serviceData->logo) }}" alt="{{$serviceData->alt_tag}}">
                                </div>
                                <h1>{{$serviceData->name}}</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div>
                <ul class="breadcum inerheader3">
                    <li><a href="{{ url('/') }}">Home</a> <i class="fa fa-caret-right"></i></li>
                    <li><a href="#">Services</a> <i class="fa fa-caret-right"></i></li>
                    <li>{{$serviceData->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="contact-page-section">
    <div class="container unicont-outer">
        <div class="row">
            <div class="col-md-4 col-lg-3" id="myScrollspy">
                <div class="sticky-top unileftmenu">
                    <div class="sidebar">
                        <div class="sidebar-widget category-widget sidebar-widget2">
                            <h4 class="">{{$serviceData->name}}</h4>
                            <div class="inner-box inner-box2">
                                <nav2>
                                    <ul class="product-category-list nav nav-pills nav-stacked sticky-sm-top"
                                        data-spy="affix" data-offset-top="205">


                                        @if(count($subcategoryList)>0)
                                            @foreach ($subcategoryList as $key => $value)
                                            
                                            @if($key == 0)
                                            <li><a href="#sectiondynamic_{{ $value->id }}" class="targetlink">{{ $value->name }}</a></li>           
                                             @break
                                            @endif
                                            
                                            @endforeach
                                        @endif
                                        
                                        @php
                                            $mandatoryProduct = explode(',',$serviceData->product_category_id);
                                        @endphp

                                        @if(count($mandatoryProduct)>0)
                                        <li><a href="#section2" class="targetlink">Mandatory Product List</a></li>
                                        @endif
                                        
                                        
                                        
                                         @if(count($subcategoryList)>0)
                                            @foreach ($subcategoryList as $key => $value)
                                            
                                            @if($key == 0)
                                            @else
                                            <li><a href="#sectiondynamic_{{ $value->id }}" class="targetlink">{{ $value->name }}</a></li>           
                                            
                                            @endif
                                            
                                            @endforeach
                                        @endif

                                        {{-- <li><a href="#section1" class="targetlink">Introduction</a></li>
                                        <li><a href="#section3" class="targetlink">Required Documents</a></li>
                                        <li><a href="#section4" class="targetlink">Standard Costing and Timeline</a></li>
                                        <li><a href="#section5" class="targetlink">Registration Process</a></li> --}}
                                        


                                        @if(count($dowonloadAndGuidelineList)>0)
                                        
                                        
                                        <li><a href="#section7" class="targetlink">Download Info & Guidelines</a></li>
                                        @endif

                                        @if(count($industryNotificationList)>0)
                                        
                                        
                                        <li><a href="#section8" class="targetlink">Industry Notification</a></li>
                                        @endif

                                        @if(count($faqList)>0)
                                        <li><a href="#section9" class="targetlink">FAQ</a></li>
                                        @endif

                                        <li><a href="#section10" class="targetlink">Download Brochures</a></li>
                                    </ul>
                                    </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-widget category-widget sidebar-widget2">
                            <h4 class="packagebuy2"> <a href="{{url('contact-us')}}"> 
                            <div class="registration_logo">
                                        <img src="https://getmyapproval.akslearning.in/front/images/contact_us_icon.png" alt="">
                                    </div>
                            Send a Query</a></h4>
                        </div>
                    </div>
                </div>


            </div>
            <!-- end -->


            <div class="col-md-8 col-lg-9">
                @if(count($subcategoryList)>0)
                @foreach ($subcategoryList as $key => $value)
                
                                            @if($key == 0)
                                            <!--<li><a href="#sectiondynamic_{{ $value->id }}" class="targetlink">{{ $value->name }}</a></li>           -->
                                            

                @php
                    $serviceContent = App\Models\Service::where('category_id',$value->category_id)->where('subcategory_id',$value->id)->where('status',1)->first();
                @endphp

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="sectiondynamic_{{ $value->id }}"></div>
                    <div class="cirs_heading">
                        <h3>{{ $value->name }}</h3>
                    </div>
                    {!! !empty($serviceContent) ? $serviceContent->content : '' !!}
                </div>
                
                 @break
                                            @endif

                @endforeach
                @endif
                
                
                @if(count($productCategoryList)>0)
                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section2"></div>
                    <h3>Mandatory Product List</h3>

                    <form method="get" action="{{ url('service/'.$serviceData->slug.'#section2') }}" class="electroni-form electroni-form2">

                        <div class="input-group full-input-box mb-3">
                            <input type="text" name="search" value="{{ Request::get('type') == 'mandatory_product' ? Request::get('search') : '' }}" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username"  >
                                <input type="hidden" name="type" value="mandatory_product">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>

                    <div class="gridtable table-responsive">
                        <table id="productTable1" class="table table-bordered table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead>
                                <tr>
                                    <th width="60" style="width:60px;">S.No.</th>
                                    <th width="595" style="width: 595px;">Product Name</th>
                                    <th width="280">Indian Standard</th>
                                    <!-- <th width="210">Applicable Products</th> -->
                                </tr>
                            </thead>
                    
                            <tbody class="mobile-table">

                                @php
                                    $noRecordFound = true;
                                @endphp

                                @foreach ($productCategoryList as $key => $val)

                                @if(Request::get('type') == 'mandatory_product')

                                @else
                                    <tr>
                                        <td colspan="4"><strong style="color: #f39323;">{{ $val->name }}</strong></td>
                                    </tr>

                                @endif
                    
                                    @php
                                    
                                    if(Request::get('type') == 'mandatory_product'){
                                        $productList = App\Models\Product::where('product_category_id',$val->id)
                                        ->where('name', 'LIKE', '%' . Request::get('search') . '%')
                                        ->orWhere('indian_standard','LIKE', '%' . Request::get('search') . '%')
                                        ->get();
                                    }
                                    else {
                                        $productList = App\Models\Product::where('product_category_id',$val->id)->get();
                                    }
                                    
                                    @endphp
                    
                                    @if(count($productList)>0)
                                        @foreach ($productList as $kk => $vv)

                                        @php
                                        $noRecordFound = false; // Records were found, so set the variable to false
                                        @endphp
                                            <tr class="mandatory-product">
                                                <td class="serial-number" style="width:61px;"><strong>{{ $kk+1 }}</strong></td>
                                                <td style="width: 595px;"><a href="{{ url('product/'.$vv->slug) }}">{{ $vv->name }}</a> </td>
                                                <td width="270">{{ $vv->indian_standard }}</td>
                                                
                                            </tr>
                                        @endforeach
                            
                                    @endif

                                @endforeach
                                @if ($noRecordFound)
                                <tr>
                                    <td colspan="4">No Record Found !!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    

                </div>
                @endif
                
                
                
                @if(count($subcategoryList)>0)
                @foreach ($subcategoryList as $key => $value)
                
                                            @if($key == 0)
                                            
                                            
                                            @else

                                        @php
                                            $serviceContent = App\Models\Service::where('category_id',$value->category_id)->where('subcategory_id',$value->id)->where('status',1)->first();
                                            
                                         
                                        @endphp
                        
                                        <div class="unisection section_bg" style="position: relative;">
                                            <div class="gotoSection" id="sectiondynamic_{{ $value->id }}"></div>
                                            <div class="cirs_heading">
                                                <h3>{{ $value->name }}</h3>
                                            </div>
                                            {!! !empty($serviceContent) ? $serviceContent->content : '' !!}
                                        </div>
                                        
                                         
                                            @endif

                @endforeach
                @endif
                
                

                {{-- 
                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section3"></div>
                    <h3>Required Documents </h3>
                    <div class="impo-cont scroll1">
                        <p>Required Document List for BIS Registration&nbsp;is divided into following steps: </p>
                        <p>Firstly, you need to provide <strong>sample(s) along with the Technical Information of
                                Product</strong> for lab test. It’s all about construction / structural details of the
                            product like –</p>
                        <ul>
                            <li>PCB Layout</li>
                            <li>Schematic Diagram</li>
                            <li>User Manual</li>
                            <li>Critical Component List (CCL) - <a href="#">Download the CCL Format</a></li>
                        </ul>
                        <p>Secondly, you need to provide the <strong>Factory Documents &amp; Information</strong> to
                            complete the BIS Application Form &amp; Process. It’s all about basic information about the
                            manufacturing unit like –</p>
                        <ul>
                            <li>Legal Address Proof of Factory (Manufacturing License Copy)</li>
                            <li>Trade Mark Registration Copy (Brand Name Registration)</li>
                            <li>Documents of Authorized Indian Representative (AIR), in case of foreign manufacturer
                            </li>
                        </ul>
                        <p><a href="{{url('contact-us')}}">Please contact us for quick &amp; smooth BIS Registration
                                Services. </a></p>
                    </div>

                </div>

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section4"></div>
                    <h3>Standard Costing and Timeline</h3>
                    <div class="impo-cont scroll1">
                        <div>
                            <p><strong><u>Costing&nbsp;</u></strong></p>

                            <p>For a customized and attractive quotation, please contact us with your product details at
                                +91- 0000000000</p>

                            <p><strong><u>Timeline</u></strong></p>

                            <div>
                                <p>For first lead model :</p>
                            </div>

                            <div>
                                <p>20-30&nbsp;working days</p>
                            </div>

                            <div>
                                <p>For subsequent lead model :<br>
                                    (Inclusion)</p>
                            </div>

                            <div>
                                <p>15-20&nbsp;working days</p>
                            </div>

                            <ul>
                                <li>This duration can be reduced if all the required information and documents are
                                    submitted promptly by the applicant.</li>
                            </ul>

                            <p><a href="{{url('contact-us')}}">Please contact us for quick &amp; smooth BIS Registration
                                    Services. </a></p>
                        </div>
                    </div>
                </div>
                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section5"></div>
                    <h3>Registration Process</h3>

                    <div class="impo-cont scroll1">

                        <p><strong>Process of BIS Registration</strong> is divided into <b>7</b>steps:</p>


                        <p><strong>Step-1:</strong> Register on BIS Portal and obtain Login Credentials</p>

                        <p><strong>Step-2:</strong> Select a Test Lab and Generate Test Request</p>

                        <p><strong>Step-3:</strong> Submit Sample(s) to the Lab</p>

                        <p><strong>Step-4:</strong> Receive Notification of Lab after Testing along with Test Report
                            Number</p>

                        <p><strong>Step-5:</strong> Login Using Existing Credentials and select Test Request reference
                            to Upload Test Report</p>

                        <p><strong>Step-6:</strong> Online Submission of Documents and other Details &amp; Payment of
                            Fee</p>

                        <p><strong>Step-7:</strong> Submit Affidavit to BIS by Post</p>

                        <!-- <p>&nbsp;</p> -->

                        <p><a href="{{url('contact-us')}}">Please contact us for quick &amp; smooth BIS Registration
                                Services. </a></p>
                    </div>

                </div> --}}

                
                
                
                {{-- @if(count($dowonloadAndGuidelineList)>0) --}}
                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section7"></div>
                    <h3>Download Info & Guidelines</h3>

                    <form method="get" action="{{ url('service/'.$serviceData->slug.'#section7') }}" class="electroni-form electroni-form2">

                        <div class="input-group full-input-box mb-3">

                            
                            <input type="text" name="search" value="{{ Request::get('type') == 'download_guideline' ? Request::get('search') : '' }}" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username"  >
                                <input type="hidden" name="type" value="download_guideline">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>
                    <div class="gridtable table-responsive">
                        <table id="downloadGuideline1" class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead>
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 495px;">Particular Description</th>
                                    <th class="down-bis" width="210">List of Required <br> Information </th>
                                    <th class="down-bis" width="210">Series Guideline</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($dowonloadAndGuidelineList)>0)
                                    @foreach ($dowonloadAndGuidelineList as $key =>$value)
                                    <tr>
                                        <td data-title="S.No." width="60"><strong>{{ $key+1 }}</strong></td>
                                        <td data-title="Product Name" style="width: 495px;">
                                            {{ $value->title }}
                                        </td>
                                        <td data-title="Product Name" width="210">
                                            <a class="flview" target="_blank"
                                                href="{{ url('uploads/required_information/'.$value->required_information) }}">View</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="{{ url('uploads/required_information/'.$value->required_information) }}"
                                                class="red rhov" download="">Download</a>
                                        </td>
                                        <td data-title="Product Name" width="210">
                                            <a class="flview" target="_blank"
                                                href="{{ url('uploads/series_guideline/'.$value->series_guideline) }}">View</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="{{ url('uploads/series_guideline/'.$value->series_guideline) }}"
                                                class="red rhov" download="">Download</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else

                                    <tr>
                                        <td colspan="4"> No Record Found !</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
                {{-- @endif --}}


                
                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section8"></div>
                    <h3>Industry Notification</h3>

                    <form method="get" action="{{ url('service/'.$serviceData->slug.'#section8') }}" class="electroni-form electroni-form2">

                        <div class="input-group full-input-box mb-3">

                            
                            <input type="text" name="search" value="{{ Request::get('type') == 'indrustry_notification' ? Request::get('search') : '' }}" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username"  >
                                <input type="hidden" name="type" value="indrustry_notification">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>


                    <div class="gridtable table-responsive">
                        <table id="IndrustryNotification1" class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 620px;">Notifications</th>
                                    <th class="down-bis" width="180">Date</th>
                                    <!--<th width="200">Applicable Products</th>-->
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($industryNotificationList)>0)
                                    @foreach ($industryNotificationList as $key =>$value)
                                    <tr>
                                        <td style="width:60px;">{{ $key+1 }}.</td>
                                        <td style="width: 645px;"><a href="{{ url('notification-details/'.$serviceData->slug.'/'.base64_encode($value->id)) }}">{{ $value->title }}</a> </td>
                                        <td width="180">{{ $value->subtitle }}</td>
                                        <!--<td width="200">&nbsp; {!! $value->description !!}</td>-->
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4">No Record Found !!</td>
                                    </tr>
                                @endif
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <!-- <div class="unisection section_bg" style="position: relative;">
          <div class="gotoSection" id="section9"></div> -->



                @if(count($faqList)>0)
                <div class="accordion2 unisection section_bg" style="position:relative;">
                    <div class="gotoSection" id="section9"></div>

                    <h3>Frequently Asked Questions (FAQ)</h3>
                    <div class="clear"></div>

                    @if(count($faqList)>0)
                        @foreach ($faqList as $key => $value)
                        <div class="accordion-item2">
                            <h2 id="accordion-button-1" aria-expanded="false"><span class="accordion-title">{{ $value->question }} </span><span
                                    class="icon" aria-hidden="true"></span></h2>
                            <div class="accordion-content">
                                {!! $value->answer !!}
                            </div>
                        </div>
                            
                        @endforeach
                    @endif


                    

                    
                </div>
                @endif

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section10"></div>
                    <h3 class="">Download Brochures</h3>

                    <div class="quick-from">
                        <!-- <h3 class="text-center prop prop2">Download Brochure</h3> -->
                        <form data-parsley-validate method="post"  action="{{ url('saveBroucherEnquiry') }}" class="form-horizontal" >

                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Your organization name"
                                         name="organization_name" required
                                            data-parsley-required-message="Please enter your organization name.">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notif">
                                            <input class="form-control" type="text" value="" placeholder="Your Name" name="name" data-parsley-required-message="Please enter your  name." required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notifd">
                                            <select class="" name="service" id="servc" required="">
                                                <option value="">Required Certification</option>
                                                <option value="BIS Registration - Foreign Manufacturer">BIS Registration - Foreign Manufacturer</option>
                                                <option value="BIS Registration - Indian Manufacturer">BIS
                                                    Registration - Indian Manufacturer</option>
                                                <option value="WPC Approval - Foreign Manufacturer">WPC Approval -
                                                    Foreign Manufacturer</option>
                                                <option value="WPC Approval - Indian Manufacturer">WPC Approval -
                                                    Indian Manufacturer</option>
                                                <option value="Trademark">Trademark</option>
                                                <option value="Copyright">Copyright</option>
                                                <option value="Patent">Patent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notif">
                                            <input class="form-control" type="email" value=""
                                        placeholder="Your Email" name="email" required
                                        data-parsley-trigger="change" data-parsley-type="email"
                                        data-parsley-required-message="Please enter your email address."
                                        data-parsley-type-message="Please enter a valid email address.">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notifd">
                                            <select name="country" required="" id="servc">
                                                <option value="">Country</option>
                                                <!-- <option value="">-- Select --</option>  -->
                                                <option value="India: +91">India: +91</option>
                                                <option value="Afghanistan: +93">Afghanistan: +93</option>
                                                <option value="Albania: +355">Albania: +355</option>
                                                <option value="Algeria: +213">Algeria: +213</option>
                                                <option value="Andorra: +376">Andorra: +376</option>
                                                <option value="Angola: +244">Angola: +244</option>
                                                <option value="Antigua and Barbuda: +1268"> Antigua and Barbuda: +1268
                                                </option>
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
                                                <option value="Bosnia and Herzegovina: +387">Bosnia and Herzegovina:
                                                    +387</option>
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
                                                <option value="Central African Republic: +236">Central African
                                                    Republic: +236</option>
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
                                                <option value="ominican Republic: +1809">Dominican Republic: +1809
                                                </option>
                                                <option value="Dominican Republic: +1829">Dominican Republic: +1829
                                                </option>
                                                <option value="Dominican Republic: +1849">Dominican Republic: +1849
                                                </option>
                                                <option value="DR Congo: +243">DR Congo: +243</option>
                                                <option value="Ecuador: +593">Ecuador: +593</option>
                                                <option value="Egypt: +20">Egypt: +20</option>
                                                <option value="El Salvador: +503">El Salvador: +503</option>
                                                <option value="Equatorial Guinea: +240">Equatorial Guinea: +240
                                                </option>
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
                                                <option value="Micronesia, Federated States of: +691">Micronesia: +691
                                                </option>
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
                                                <option value="Saint Kitts and Nevis: +1869">Saint Kitts and Nevis:
                                                    +1869</option>
                                                <option value="Saint Lucia: +1758">Saint Lucia: +1758</option>
                                                <option value="Samoa: +685">Samoa: +685</option>
                                                <option value="San Marino: +378">San Marino: +378</option>
                                                <option value="São Tomé and Príncipe: +239">São Tomé and Príncipe:
                                                    +239</option>
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
                                                <option value="Saint Vincent and the Grenadines: +1">Saint Vincent and
                                                    the Grenadines: +1</option>
                                                <option value="State of Palestine: +970">State of Palestine: +970
                                                </option>
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
                                                <option value="Trinidad and Tobago: +1868">Trinidad and Tobago: +1868
                                                </option>
                                                <option value="Tunisia: +216">Tunisia: +216</option>
                                                <option value="Turkey: +90">Turkey: +90</option>
                                                <option value="Turkmenistan: +993">Turkmenistan: +993</option>
                                                <option value="Tuvalu: +688">Tuvalu: +688</option>
                                                <option value="Uganda: +256">Uganda: +256</option>
                                                <option value="Ukraine: +380">Ukraine: +380</option>
                                                <option value="United Arab Emirates: +971">United Arab Emirates: +971
                                                </option>
                                                <option value="United Kingdom: +44">United Kingdom: +44</option>
                                                <option value="United States: +1">United States: +1</option>
                                                <option value="Uruguay: +598">Uruguay: +598</option>
                                                <option value="Uzbekistan: +998">Uzbekistan: +998</option>
                                                <option value="Vanuatu: +678">Vanuatu: +678</option>
                                                <option value="Vatican City State (Holy See): +379">Vatican City State
                                                    (Holy See): +379</option>
                                                <option value="Venezuela: +58">Venezuela: +58</option>
                                                <option value="Vietnam: +84">Vietnam: +84</option>
                                                <option value="Yemen: +967">Yemen: +967</option>
                                                <option value="Zambia: +260">Zambia: +260</option>
                                                <option value="Zimbabwe: +263">Zimbabwe: +263</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notif">
                                            <input type="text" class="form-group" name="mobile" placeholder="Mobile" onkeypress="return /[0-9/]/i.test(event.key)" data-parsley-required-message="Please enter Mobile Number" minlength="10" maxlength="10"  required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="control-group">
                                        <div class="form-group notifm">
                                            <textarea class="form-control" id="message" rows="3" placeholder="Your Query" name="message"
                                                onkeypress="" autocomplete="on" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-4">
                                    <div class=" number1 form-control form-control5 captcha-cls"> 
                                        
                                        {{-- <span class="captha1">9 + 7 =
                                        </span> --}}

                                        <span id="captcha">
                                        </span>

                                        <button class="captcha-refresh" onclick="return createCaptcha()"><i class="fa fa-refresh"></i>
                                        </button>
                                     
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-5">
                                    {{-- <input type="hidden" name="no1" value="9" required="">
                                    <input type="hidden" name="no2" value="7" required="">
                                    <input type="hidden" name="noo2" id="password" value="16"
                                        required="">
                                    <input type="text" name="test" id="cnf_password"
                                        class="form-control popup-input2" autocomplete="off" maxlength="2"
                                        onkeypress="validate(event)" required=""
                                        placeholder="Enter captcha value here"> --}}



                                        <input type="hidden"  name="maincaptha" id="maincaptha">
                                        <input type="text"  class="form-control popup-input2" data-parsley-trigger="focusout" data-parsley-equalto="#maincaptha" name="captha" placeholder="Captcha" autocomplete="new-password" required>

                                </div>
                            </div>

                            <!--<input type="submit" name="submit_register" id="submit_register" value="Submit" class="register-submit-top" onclick="gifbisproduct()" autocomplete="off">-->
                            <button type="submit" name="view" id="action">View </button>

                            <button type="submit" name="submit" id="auction">Download </button>
                            <!-- Image loader -->
                            <div class="response"></div>
                        </form>
                    </div>

                    <div class="clear"></div>
                </div>

            </div>

        </div>
    </div>
</section>



<script type="text/javascript">
    window.onload = function () {
        $('.gotoSection').addClass('gotoSection2');
    }
     
    // targetlink
      var i = 1;
      $(document).ready(function() {
            $('.targetlink').click(function() {
                if(i>1){
                    $('.gotoSection').removeClass('gotoSection2');   
                }
                ++i;
            });
        });
 </script>   

<script>
    const items = document.querySelectorAll(".accordion-item2 h2");
 
 function toggleAccordion() {
   const itemToggle = this.getAttribute('aria-expanded');
   
   for (i = 0; i < items.length; i++) {
     items[i].setAttribute('aria-expanded', 'false');
   }
   
   if (itemToggle == 'false') {
     this.setAttribute('aria-expanded', 'true');
   }
 }
 
 items.forEach(item => item.addEventListener('click', toggleAccordion));
 
 </script>
 


 
@section('js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        // $('#productTable').DataTable({
        //     paging: false
        // }); 
        

        $('#downloadGuideline').DataTable({
            paging: false
        }); 

        $('#IndrustryNotification').DataTable({
            paging: false
        }); 
        


        // $('#productTable').DataTable({
        //     columnDefs: [
        //         { targets: [0], orderable: false }, // Disable sorting for the first column (S.No.)
        //         { targets: [2], visible: false }   // Hide the third column (Indian Standard)
        //     ]
        // });


    });
</script>


<script>
    var code;
function createCaptcha() {
//clear the contents of captcha div first 
document.getElementById('captcha').innerHTML = "";
var charsArray =
"0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
var lengthOtp = 6;
var captcha = [];
for (var i = 0; i < lengthOtp; i++) {
  //below code will not allow Repetition of Characters
  var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
  if (captcha.indexOf(charsArray[index]) == -1)
    captcha.push(charsArray[index]);
  else i--;
}
var canv = document.createElement("canvas");
canv.id = "captcha";
canv.width = 100;
canv.height = 50;
var ctx = canv.getContext("2d");
ctx.font = "25px Georgia";
ctx.strokeText(captcha.join(""), 0, 30);
//storing captcha so that can validate you can save it somewhere else according to your specific requirements
code = captcha.join("");
document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
// setting main captha value to hidden field 
$("#maincaptha").val(code);

}

</script>


<script>
    $( document ).ready(function() {
        createCaptcha();
        
        $('.targetlink').click(function() {
            $('.targetlink').removeClass("active"); // Remove "active" class from all elements
            $(this).addClass("active"); // Add "active" class to the clicked element
        });

    });
    
</script>



@endsection

@endsection