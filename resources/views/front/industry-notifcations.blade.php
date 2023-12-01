



@extends('front/layout/master')
@section('main-contant')


<div class="inerheader2 inerheader4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="servicehead">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- <h1>Industry Notifications</h1> -->
                            <div class="text-center registration_outer">
                                <div class="registration_logo">
                                    <img src="{{ url('front') }}/images/notification_icon.png" alt="">
                                </div>
                                <h1>Industry Notifications</h1>
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
                    <!-- <li><a href="#">Services</a> <i class="fa fa-caret-right"></i></li> -->
                    <li>Industry Notifications</li>
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
                            <h4>Industry Notifications</h4>
                            <div class="inner-box inner-box2">
                                <nav2>
                                    <ul class="product-category-list nav nav-pills nav-stacked sticky-sm-top"
                                        data-spy="affix" data-offset-top="205">

                                        @if(count($categoryList) > 0)
                                        @foreach ($categoryList as $key => $val)
                                        <li><a href="#section{{ $val->id }}" class="targetlink">{{ $val->name }}</a></li>    
                                        @endforeach
                                        @endif
                                        {{--                                         
                                        <li><a href="#section1" class="targetlink">BIS / CRS Registration</a></li>
                                        <li><a href="#section2" class="targetlink">ISI / BIS Certification</a>
                                        </li>
                                        <li><a href="#section3" class="targetlink">WPC / ETA Approval</a></li>
                                        <li><a href="#section4" class="targetlink">EPR Authorization</a></li>
                                        <li><a href="#section5" class="targetlink">BEE Registration</a></li>
                                        <li><a href="#section6" class="targetlink">TEC Certification</a></li>
                                        <li><a href="#section7" class="targetlink">Download Brochures</a></li> --}}
                                        
                                    </ul>
                                    </nav>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar">
                        <div class="sidebar-widget category-widget sidebar-widget2">
                            <h4 class="packagebuy2"> 
                      
                            <a href="{{ url('contact-us') }}">      <div class="registration_logo">
                                        <img src="https://getmyapproval.akslearning.in/front/images/contact_us_icon.png" alt="">
                                    </div> Send a Query</a></h4>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->
            <div class="col-md-8 col-lg-9">

                @if(count($categoryList) > 0)
                @foreach ($categoryList as $key => $val)

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section{{ $val->id }}"></div>
                    <h3>{{ $val->name }}</h3>
                    <form method="get" action="{{ url('industry-notifcations#section'.$val->id) }}" class="electroni-form electroni-form2">
                        <div class="input-group full-input-box mb-3">

                            

                                <input type="text" name="search" value="{{ (Request::get('id') ==  $val->id) ? Request::get('search') : '' }}" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username">
                                <input type="hidden" name="id" value="{{ $val->id }}" id="">

                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" style="height:34px;"><i class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>
                
                    <div class="gridtable table-responsive">
                        <table id="yourTableId1111" class="table table-bordered table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 665px;">Notifications</th>
                                    <th class="down-bis" width="220">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                if(Request::get('id') ==  $val->id){
                                    $industryNotificationList = App\Models\IndrustyNotification::where('category_id',$val->id)
                                    ->where('title', 'LIKE', '%' . Request::get('search') . '%')
                                    ->where('subtitle', 'LIKE', '%' . Request::get('search') . '%')
                                    ->get();
                                }
                                else{
                                    $industryNotificationList = App\Models\IndrustyNotification::where('category_id',$val->id)->where('status',1)->get();
                                }

                                @endphp
                
                                @if(count($industryNotificationList)>0)
                                @foreach ($industryNotificationList as $key => $value)
                                <tr>
                                    <td style="width:60px;">{{ $key+1 }}</td>
                                    <td style="width: 655px;"><a href="{{ url('notification-details/'.$val->slug.'/'.base64_encode($value->id)) }}">{{ $value->title }}</a> </td>
                                    <td width="200">{{ $value->subtitle }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                <td colspan="9">No Record Found !!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                

                @endforeach
                @endif


                {{-- <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section2"></div>
                    <h3>ISI / BIS Certification</h3>
                    <form method="get" class="electroni-form electroni-form2">
                        <div class="input-group full-input-box mb-3">
                            <input type="text" name="search" value="" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>


                    <div class="gridtable table-responsive">
                        <table class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 695px;">Notifications</th>
                                    <th class="down-bis" width="220">Date</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td style="width:60px;">1</td>
                                    <td style="width: 695px;"><a href="#">Extention in BIS Certification for
                                            Medical
                                            Textile ,Gazette Notification of July,2023</a>
                                    </td>
                                    <td width="200">17.07.2023</td>
                                </tr>


                                <tr>
                                    <td>2</td>
                                    <td><a href="#">BIS Certification Quality Control Order (QCO) for
                                            Insulated
                                            Flask Bottles and Container for Domestic Use</a>
                                    </td>
                                    <td>14.07.2023</td>
                                </tr>


                                <tr>
                                    <td>3</td>
                                    <td><a href="#">Implementation of Quality Control Orders (QCO) on
                                            Footwear
                                            Products</a>
                                    </td>
                                    <td>12.06.2023</td>
                                </tr>


                                <tr>
                                    <td>4</td>
                                    <td><a href="#">Acrylonitrile-Butadiene Styrene and Polyurethanes
                                            Amendment
                                            Order 2022</a>
                                    </td>
                                    <td>10.01.2022</td>
                                </tr>


                                <tr>
                                    <td>5</td>
                                    <td><a href="#">Environment (Protection) 115 Amendment Rules 2021</a>
                                    </td>
                                    <td>06.10.2021</td>
                                </tr>


                                <tr>
                                    <td>6</td>
                                    <td><a href="#">Quality Control Order for various Petrochemicals 2021</a>
                                    </td>
                                    <td>14.09.2021</td>
                                </tr>


                                <tr>
                                    <td>7</td>
                                    <td><a href="#">Chemical product (Quality Control) Order, 2021</a>
                                    </td>
                                    <td>13.09.2021</td>
                                </tr>


                                <tr>
                                    <td>8</td>
                                    <td><a href="#">Personal Protective Equipment-Footwear Quality Control
                                            Order
                                            Amendment, 2021</a>
                                    </td>
                                    <td>01.07.2021</td>
                                </tr>


                                <tr>
                                    <td>9</td>
                                    <td><a href="#">Footwear made from All-Rubber and All Polymeric Material
                                            and its
                                            Components Quality Control Order Amendment, 2021</a>
                                    </td>
                                    <td>01.07.2021</td>
                                </tr>


                                <tr>
                                    <td>10</td>
                                    <td><a href="#">Footwear made from Leather and other materials QCO
                                            Amendment,
                                            2021</a>
                                    </td>
                                    <td>01.07.2021</td>
                                </tr>


                                <tr>
                                    <td>11</td>
                                    <td><a href="#">Order of extension in the enforcement date for Steel
                                            Products
                                            for IS 17404</a>
                                    </td>
                                    <td>30.06.2021</td>
                                </tr>


                                <tr>
                                    <td>12</td>
                                    <td><a href="#">Ether Quality Control Amendment Order, 2021</a>
                                    </td>
                                    <td>25.06.2021</td>
                                </tr>


                                <tr>
                                    <td>13</td>
                                    <td><a href="#">Ortho Phosphoric Acid QCO, 2021</a>
                                    </td>
                                    <td>16.06.2021</td>
                                </tr>


                                <tr>
                                    <td>14</td>
                                    <td><a href="#">Plugs and Socket-Outlets and AC DC Connected Static
                                            Prepayment
                                            Meters for Active Energy QCO 2021</a>
                                    </td>
                                    <td>08.06.2021</td>
                                </tr>


                                <tr>
                                    <td>15</td>
                                    <td><a href="#">Automobile Wheel Rim Component QCO Amendment 2021</a>
                                    </td>
                                    <td>31.05.2021</td>
                                </tr>


                                <tr>
                                    <td>16</td>
                                    <td><a href="#">Order of extension for Ferrosilicon-Specification and
                                            Specification for Ferronickel</a>
                                    </td>
                                    <td>27.04.2021</td>
                                </tr>


                                <tr>
                                    <td>17</td>
                                    <td><a href="#">Amendment in the QCOs for Several Chemical Products
                                            2020</a>
                                    </td>
                                    <td>27.04.2021</td>
                                </tr>


                                <tr>
                                    <td>18</td>
                                    <td><a href="#">Amendment in the Aniline QCO 2019</a>
                                    </td>
                                    <td>20.04.2021</td>
                                </tr>


                                <tr>
                                    <td>19</td>
                                    <td><a href="#">Amendment in the Hydrogen Peroxide QCO 2020</a>
                                    </td>
                                    <td>20.04.2021</td>
                                </tr>


                                <tr>
                                    <td>20</td>
                                    <td><a href="#">Amendment in the Gamma Picoline QCO 2020</a>
                                    </td>
                                    <td>20.04.2021</td>
                                </tr>


                                <tr>
                                    <td>21</td>
                                    <td><a href="#">Amendment in the Sodium Tripolyphosphate QCO 2020</a>
                                    </td>
                                    <td>20.04.2021</td>
                                </tr>


                                <tr>
                                    <td>22</td>
                                    <td><a href="#">Amendment in the Pyridine QCO 2020</a>
                                    </td>
                                    <td>20.04.2021</td>
                                </tr>


                                <tr>
                                    <td>23</td>
                                    <td><a href="#">Amendment in the Methanol QCO 2019</a>
                                    </td>
                                    <td>20.04.2021</td>
                                </tr>


                                <tr>
                                    <td>24</td>
                                    <td><a href="#">Ministry of Chemicals and Fertilizers released QCO April
                                            2021</a>
                                    </td>
                                    <td>16.04.2021</td>
                                </tr>


                                <tr>
                                    <td>25</td>
                                    <td><a href="#">Ethylene Vinyl Acetate Copolymers QCO April 2021</a>
                                    </td>
                                    <td>16.04.2021</td>
                                </tr>


                                <tr>
                                    <td>26</td>
                                    <td><a href="#">Linear Alkyl Benzene QCO April 2021</a>
                                    </td>
                                    <td>16.04.2021</td>
                                </tr>


                                <tr>
                                    <td>27</td>
                                    <td><a href="#">Notification for Extension in Timelines for the Order on
                                            Stampings, Laminations or Cores of Transformers</a>
                                    </td>
                                    <td>08.04.2021</td>
                                </tr>


                                <tr>
                                    <td>28</td>
                                    <td><a href="#">Lead Stabilizer in Polyvinyl Chloride (PVC) Pipes and
                                            Fittings
                                            Rules-2021</a>
                                    </td>
                                    <td>31.03.2021</td>
                                </tr>


                                <tr>
                                    <td>29</td>
                                    <td><a href="#">BIS Guidelines for Certification of Press
                                            Tool-Punches</a>
                                    </td>
                                    <td>24.03.2021</td>
                                </tr>


                                <tr>
                                    <td>30</td>
                                    <td><a href="#">Procedure for application for Grant of Certificate of
                                            Conformity
                                            ( as per Scheme IV ) for Stamping / Laminations / Cores of
                                            Transformers</a>
                                    </td>
                                    <td>24.03.2021</td>
                                </tr>


                                <tr>
                                    <td>31</td>
                                    <td><a href="#">Sewing Machines ( Quality Control ) Order 2021</a>
                                    </td>
                                    <td>16.03.2021</td>
                                </tr>


                                <tr>
                                    <td>32</td>
                                    <td><a href="#">Flux Cored ( Tubular ) Electrodes ( Quality Control Order
                                            )
                                            2021</a>
                                    </td>
                                    <td>15.03.2021</td>
                                </tr>


                                <tr>
                                    <td>33</td>
                                    <td><a href="#">Order of extension in the enforcement date for Steel
                                            Products
                                            for IS 6526, 4454 (Part-4), 11946, 11947 and 12045</a>
                                    </td>
                                    <td>09.03.2021</td>
                                </tr>


                                <tr>
                                    <td>34</td>
                                    <td><a href="#">Amendment in the Acetone ( Quality Control Order )
                                            2020</a>
                                    </td>
                                    <td>09.03.2021</td>
                                </tr>


                                <tr>
                                    <td>35</td>
                                    <td><a href="#">Notification of FAQs on Marking on Wheel Rims</a>
                                    </td>
                                    <td>01.03.2021</td>
                                </tr>


                                <tr>
                                    <td>36</td>
                                    <td><a href="#">Guidelines on BIS Certification for Footwear
                                            Manufacturers</a>
                                    </td>
                                    <td>26.02.2021</td>
                                </tr>


                                <tr>
                                    <td>37</td>
                                    <td><a href="#">Guideline on Plugs and Socket-outlets-IS 1293</a>
                                    </td>
                                    <td>26.02.2021</td>
                                </tr>


                                <tr>
                                    <td>38</td>
                                    <td><a href="#">Order of extension in the enforcement date for Steel
                                            Products
                                            for IS 3748, IS 7291 and IS 12146</a>
                                    </td>
                                    <td>28.01.2021</td>
                                </tr>


                                <tr>
                                    <td>39</td>
                                    <td><a href="#">Centrifugally Cast (Spun) Iron Pipes Quality Control
                                            Order,
                                            January 2021</a>
                                    </td>
                                    <td>14.01.2021</td>
                                </tr>


                                <tr>
                                    <td>40</td>
                                    <td><a href="#">Air Conditioner and its related parts, Hermetic
                                            Compressor and
                                            Temperature Sensing Controls Second Amendment Order, 2020</a>
                                    </td>
                                    <td>24.12.2020</td>
                                </tr>


                                <tr>
                                    <td>41</td>
                                    <td><a href="#">Steel and Steel Products Quality Control Order, December
                                            2020</a>
                                    </td>
                                    <td>23.12.2020</td>
                                </tr>


                                <tr>
                                    <td>42</td>
                                    <td><a href="#">Special Provisions For Testing Facilities In Micro Scale
                                            Units
                                            In Certification Of Safety Of Toys</a>
                                    </td>
                                    <td>18.12.2020</td>
                                </tr>


                                <tr>
                                    <td>43</td>
                                    <td><a href="#">Few Refrigerating Appliances are added to ISI
                                            Certification
                                            Mandatory List</a>
                                    </td>
                                    <td>11.12.2020</td>
                                </tr>


                                <tr>
                                    <td>44</td>
                                    <td><a href="#">Personal Protective Equipment-Footwear Quality Control
                                            Order
                                            Amendment, December 2020</a>
                                    </td>
                                    <td>07.12.2020</td>
                                </tr>


                                <tr>
                                    <td>45</td>
                                    <td><a href="#">Beta Picoline Quality Control Order Amendment, December
                                            2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>46</td>
                                    <td><a href="#">Gamma Picoline Quality Control Order Amendment, December
                                            2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>47</td>
                                    <td><a href="#">Hydrogen Peroxide Quality Control Order Amendment,
                                            December
                                            2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>48</td>
                                    <td><a href="#">Potassium Carbonate Quality Control Order Amendment,
                                            December
                                            2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>49</td>
                                    <td><a href="#">Pyridine Quality Control Order Amendment, December
                                            2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>50</td>
                                    <td><a href="#">Sodium Tripolyphosphate Quality Control Order Amendment,
                                            December 2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>51</td>
                                    <td><a href="#">Footwear made from All-Rubber and All Polymeric Material
                                            and its
                                            Components Quality Control Order Amendment, December 2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>52</td>
                                    <td><a href="#">Footwear made from Leather and other materials Quality
                                            Control
                                            Order Amendment, December 2020</a>
                                    </td>
                                    <td>04.12.2020</td>
                                </tr>


                                <tr>
                                    <td>53</td>
                                    <td><a href="#">Helmet Quality Control Order, November 2020</a>
                                    </td>
                                    <td>27.11.2020</td>
                                </tr>


                                <tr>
                                    <td>54</td>
                                    <td><a href="#">Steel and Steel Products Quality Control Order, November
                                            2020</a>
                                    </td>
                                    <td>16.11.2020</td>
                                </tr>


                                <tr>
                                    <td>55</td>
                                    <td><a href="#">Acrylates Quality Control Order, November 2020</a>
                                    </td>
                                    <td>06.11.2020</td>
                                </tr>


                                <tr>
                                    <td>56</td>
                                    <td><a href="#">Acrylonitrile Quality Control Order, November 2020</a>
                                    </td>
                                    <td>06.11.2020</td>
                                </tr>


                                <tr>
                                    <td>57</td>
                                    <td><a href="#">Styrene (Vinyl Benzene) Quality Control Order, November
                                            2020</a>
                                    </td>
                                    <td>06.11.2020</td>
                                </tr>


                                <tr>
                                    <td>58</td>
                                    <td><a href="#">Vinyl Acetate Monomer Quality Control Order, November
                                            2020</a>
                                    </td>
                                    <td>06.11.2020</td>
                                </tr>


                                <tr>
                                    <td>59</td>
                                    <td><a href="#">Maleic Anhydride, Technical Quality Control Order,
                                            November
                                            2020</a>
                                    </td>
                                    <td>06.11.2020</td>
                                </tr>


                                <tr>
                                    <td>60</td>
                                    <td><a href="#">Press Tool-Punches Quality Control Order, November
                                            2020</a>
                                    </td>
                                    <td>06.11.2020</td>
                                </tr>


                                <tr>
                                    <td>61</td>
                                    <td><a href="#">Personal Protective Equipment-Footwear Quality Control
                                            Order,
                                            2020</a>
                                    </td>
                                    <td>29.10.2020</td>
                                </tr>


                                <tr>
                                    <td>62</td>
                                    <td><a href="#">Footwear made from Rubber and Polymeric Material Quality
                                            Control
                                            Order, 2020</a>
                                    </td>
                                    <td>29.10.2020</td>
                                </tr>


                                <tr>
                                    <td>63</td>
                                    <td><a href="#">Footwear made from Leather and other materials Quality
                                            Control
                                            Order, 2020</a>
                                    </td>
                                    <td>29.10.2020</td>
                                </tr>


                                <tr>
                                    <td>64</td>
                                    <td><a href="#">Custom office may go for random testing for ISI-marked
                                            products</a>
                                    </td>
                                    <td>23.10.2020</td>
                                </tr>


                                <tr>
                                    <td>65</td>
                                    <td><a href="#">Ministry of Commerce and Industry prohibited the Import
                                            of Air
                                            Conditioners with refrigerants</a>
                                    </td>
                                    <td>16.10.2020</td>
                                </tr>


                                <tr>
                                    <td>66</td>
                                    <td><a href="#">Extension in date of implementation of revised IS
                                            1293:2019
                                            superseding IS 1293:2005</a>
                                    </td>
                                    <td>16.10.2020</td>
                                </tr>


                                <tr>
                                    <td>67</td>
                                    <td><a href="#">Automobile Wheel Rim Component (Quality Control) Order,
                                            2020</a>
                                    </td>
                                    <td>22.09.2020</td>
                                </tr>


                                <tr>
                                    <td>68</td>
                                    <td><a href="#">Toys certification got exempted till 2020</a>
                                    </td>
                                    <td>16.09.2020</td>
                                </tr>


                                <tr>
                                    <td>69</td>
                                    <td><a href="#">Malleable Iron Shots and Grits (Quality Control) Order,
                                            2020</a>
                                    </td>
                                    <td>14.08.2020</td>
                                </tr>


                                <tr>
                                    <td>70</td>
                                    <td><a href="#">Few Steel and Steel Products have got extension for
                                            another 3
                                            months for ISI Certification</a>
                                    </td>
                                    <td>23.07.2020</td>
                                </tr>


                                <tr>
                                    <td>71</td>
                                    <td><a href="#">Ministry of Steel released Quality Control Order July
                                            2020</a>
                                    </td>
                                    <td>22.07.2020</td>
                                </tr>


                                <tr>
                                    <td>72</td>
                                    <td><a href="#">Bicycles Retro Reflective Devices (Quality Control)
                                            Order,
                                            2020</a>
                                    </td>
                                    <td>09.07.2020</td>
                                </tr>


                                <tr>
                                    <td>73</td>
                                    <td><a href="#">Aniline (Quality Control) Order Amendment</a>
                                    </td>
                                    <td>02.07.2020</td>
                                </tr>


                                <tr>
                                    <td>74</td>
                                    <td><a href="#">Acetic Acid (Quality Control) Order Amendment</a>
                                    </td>
                                    <td>02.07.2020</td>
                                </tr>


                                <tr>
                                    <td>75</td>
                                    <td><a href="#">Methanol (Quality Control) Order Amendment</a>
                                    </td>
                                    <td>02.07.2020</td>
                                </tr>


                                <tr>
                                    <td>76</td>
                                    <td><a href="#">Toluene (Quality Control) Order, 2020 and mandatory ISI
                                            Certification</a>
                                    </td>
                                    <td>30.06.2020</td>
                                </tr>


                                <tr>
                                    <td>77</td>
                                    <td><a href="#">Terephthalic Acid (Quality Control) Order, 2020 and
                                            mandatory
                                            ISI Certification</a>
                                    </td>
                                    <td>30.06.2020</td>
                                </tr>


                                <tr>
                                    <td>78</td>
                                    <td><a href="#">n-Butyl-Acrylate (Quality Control) Order, 2020 and
                                            mandatory ISI
                                            Certification</a>
                                    </td>
                                    <td>30.06.2020</td>
                                </tr>


                                <tr>
                                    <td>79</td>
                                    <td><a href="#">Ether (Quality Control) Order, 2020 and mandatory ISI
                                            Certification</a>
                                    </td>
                                    <td>30.06.2020</td>
                                </tr>


                                <tr>
                                    <td>80</td>
                                    <td><a href="#">Ethylene Glycol (Quality Control) Order, 2020 and
                                            mandatory ISI
                                            Certification</a>
                                    </td>
                                    <td>30.06.2020</td>
                                </tr>


                                <tr>
                                    <td>81</td>
                                    <td><a href="#">Mandatory ISI Certification and (Quality Control) Order
                                            released
                                            for various products, 2020</a>
                                    </td>
                                    <td>17.06.2020</td>
                                </tr>


                                <tr>
                                    <td>82</td>
                                    <td><a href="#">Plain Copier Paper (Quality Control) Order, 2020 and
                                            mandatory
                                            ISI Certification</a>
                                    </td>
                                    <td>08.06.2020</td>
                                </tr>


                                <tr>
                                    <td>83</td>
                                    <td><a href="#">Ministry of Steel released Quality Control Order May
                                            2020</a>
                                    </td>
                                    <td>29.05.2020</td>
                                </tr>


                                <tr>
                                    <td>84</td>
                                    <td><a href="#">Air Conditioner and its related Parts (Quality Control)
                                            Extension Order</a>
                                    </td>
                                    <td>20.05.2020</td>
                                </tr>


                                <tr>
                                    <td>85</td>
                                    <td><a href="#">ISI implementation date for Plug and Socket has been
                                            extended
                                            for six months</a>
                                    </td>
                                    <td>19.05.2020</td>
                                </tr>


                                <tr>
                                    <td>86</td>
                                    <td><a href="#">Phthalic Anhydride (Quality Control) Order, 2020 and
                                            mandatory
                                            ISI Certification</a>
                                    </td>
                                    <td>24.04.2020</td>
                                </tr>


                                <tr>
                                    <td>87</td>
                                    <td><a href="#">Steel and Steel Products have got extension for 3 months
                                            for ISI
                                            Certification</a>
                                    </td>
                                    <td>22.04.2020</td>
                                </tr>


                                <tr>
                                    <td>88</td>
                                    <td><a href="#">Steel and Steel Products (Quality Control) Order,
                                            2020</a>
                                    </td>
                                    <td>27.02.2020</td>
                                </tr>


                                <tr>
                                    <td>89</td>
                                    <td><a href="#">Air Conditioner and its related parts, Hermetic
                                            Compressor and
                                            Temperature Sensing Controls (Quality Control) Order, 2019</a>
                                    </td>
                                    <td>18.12.2019</td>
                                </tr>


                                <tr>
                                    <td>90</td>
                                    <td><a href="#">Plugs and Socket-Outlets and Alternating Current Direct
                                            Connected Static Prepayment Meters for Active Energy (Quality Control)
                                            Order, 2019</a>
                                    </td>
                                    <td>18.12.2019</td>
                                </tr>


                                <tr>
                                    <td>91</td>
                                    <td><a href="#">Ministry of Steel informs that some grades shall remain
                                            outside
                                            the purview of the Steel and Steel Products (Quality Control) order,
                                            2019</a>
                                    </td>
                                    <td>30.08.2019</td>
                                </tr>


                                <tr>
                                    <td>92</td>
                                    <td><a href="#">Steel and Steel Products (Quality Control) Order,
                                            2019</a>
                                    </td>
                                    <td>30.07.2019</td>
                                </tr>


                                <tr>
                                    <td>93</td>
                                    <td><a href="#">MoS urging manufacturers for acquiring licenses under the
                                            BIS
                                            ACT, 2016 whether standard is covered under QCO or not</a>
                                    </td>
                                    <td>03.06.2019</td>
                                </tr>


                                <tr>
                                    <td>94</td>
                                    <td><a href="#">Exemption to Indian Standards IS 4454 (Part II), IS 11169
                                            (Part
                                            I), IS 6603, IS 6527 and IS 6528</a>
                                    </td>
                                    <td>20.05.2019</td>
                                </tr>


                                <tr>
                                    <td>95</td>
                                    <td><a href="#">List of Imported Grades of high volume/held to be outside
                                            the
                                            purview of the Steel Quality Control Order (13th August, 2018)</a>
                                    </td>
                                    <td>08.05.2019</td>
                                </tr>


                                <tr>
                                    <td>96</td>
                                    <td><a href="#">Few more steel products are going to be mandatory for ISI
                                            Certification</a>
                                    </td>
                                    <td>18.04.2019</td>
                                </tr>


                                <tr>
                                    <td>97</td>
                                    <td><a href="#">Air Conditioner will need mandatory ISI Certification
                                            soon</a>
                                    </td>
                                    <td>05.04.2018</td>
                                </tr>


                                <tr>
                                    <td>98</td>
                                    <td><a href="#">BIS published easy and elementary procedure for ISI
                                            Certification</a>
                                    </td>
                                    <td>24.07.2017</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section3"></div>
                    <h3>WPC Approval</h3>
                    <form method="get" class="electroni-form electroni-form2">
                        <div class="input-group full-input-box mb-3">
                            <input type="text" name="search" value="" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>


                    <div class="gridtable table-responsive">
                        <table class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 695px;">Notifications</th>
                                    <th class="down-bis" width="220">Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td style="width:60px;">1</td>
                                    <td style="width: 695px;"><a href="#">Bluetooth devices are now exempted
                                            for WPC
                                            (ETA) Approval and
                                            Import License</a>
                                    </td>
                                    <td width="200">05.03.2019</td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section4"></div>
                    <h3>EPR Authorization</h3>
                    <form method="get" class="electroni-form electroni-form2">
                        <div class="input-group full-input-box mb-3">
                            <input type="text" name="search" value="" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>


                    <div class="gridtable table-responsive">
                        <table class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 695px;">Notifications</th>
                                    <th class="down-bis" width="220">Date</th>
                                </tr>
                            </thead>
                            <tbody>



                                <tr>
                                    <td style="width:60px;">1</td>
                                    <td style="width: 695px;"><a href="#">E-Waste Management Rules 2022 (
                                            New
                                            product list )</a>
                                    </td>
                                    <td width="200">02.11.2022</td>
                                </tr>


                                <tr>
                                    <td>2</td>
                                    <td><a href="#">CPCB Clarification for EPR Authorization</a>
                                    </td>
                                    <td>05.08.2019</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section5"></div>
                    <h3>BEE Registration</h3>
                    <form method="get" class="electroni-form electroni-form2">
                        <div class="input-group full-input-box mb-3">
                            <input type="text" name="search" value="" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>


                    <div class="gridtable table-responsive">
                        <table class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 695px;">Notifications</th>
                                    <th class="down-bis" width="220">Date</th>
                                </tr>
                            </thead>
                            <tbody>




                                <tr>
                                    <td style="width:60px;">1</td>
                                    <td style="width: 695px;"><a href="#">Important instructions for all
                                            Agricultural Pump set manufacturers regarding extension of
                                            implementation date</a>
                                    </td>
                                    <td width="200">02.01.2020</td>
                                </tr>


                                <tr>
                                    <td>2</td>
                                    <td><a href="#">Solar Water Heaters have been included for star labelling
                                            on
                                            voluntary basis</a>
                                    </td>
                                    <td>02.01.2020</td>
                                </tr>


                                <tr>
                                    <td>3</td>
                                    <td><a href="#">Important instructions for all Agricultural Pump set
                                            manufacturers regarding revised Indian Standards</a>
                                    </td>
                                    <td>13.12.2019</td>
                                </tr>


                                <tr>
                                    <td>4</td>
                                    <td><a href="#">Amendments in the notification for air conditioners for
                                            default
                                            temperature setting</a>
                                    </td>
                                    <td>11.11.2019</td>
                                </tr>


                                <tr>
                                    <td>5</td>
                                    <td><a href="#">Notification of FAQs for air conditioners for default
                                            temperature setting</a>
                                    </td>
                                    <td>11.11.2019</td>
                                </tr>


                                <tr>
                                    <td>6</td>
                                    <td><a href="#">Important instructions for all LED lamp manufacturers</a>
                                    </td>
                                    <td>11.10.2019</td>
                                </tr>


                                <tr>
                                    <td>7</td>
                                    <td><a href="#">BEE makes further amendments in the Gazette notification
                                            for
                                            energy consumption of LED lamps</a>
                                    </td>
                                    <td>11.10.2019</td>
                                </tr>


                                <tr>
                                    <td>8</td>
                                    <td><a href="#">Important instructions for all DCR and FFR
                                            manufacturers</a>
                                    </td>
                                    <td>26.08.2019</td>
                                </tr>


                                <tr>
                                    <td>9</td>
                                    <td><a href="#">Important instructions for all Agricultural Pump set
                                            manufacturers</a>
                                    </td>
                                    <td>19.08.2019</td>
                                </tr>


                                <tr>
                                    <td>10</td>
                                    <td><a href="#">Important instructions for all LPG stove
                                            manufacturers</a>
                                    </td>
                                    <td>14.06.2019</td>
                                </tr>


                                <tr>
                                    <td>11</td>
                                    <td><a href="#">Amendment for Particulars and Manner of Display on Labels
                                            of
                                            Self Ballasted LED Lamps</a>
                                    </td>
                                    <td>07.05.2019</td>
                                </tr>


                                <tr>
                                    <td>12</td>
                                    <td><a href="#">Chillers have been included for star labelling on
                                            voluntary
                                            basis</a>
                                    </td>
                                    <td>07.05.2019</td>
                                </tr>


                                <tr>
                                    <td>13</td>
                                    <td><a href="#">Washing Machines have been included for star labelling on
                                            voluntary basis</a>
                                    </td>
                                    <td>07.05.2019</td>
                                </tr>


                                <tr>
                                    <td>14</td>
                                    <td><a href="#">Microwave Ovens have been included for star labelling on
                                            voluntary basis</a>
                                    </td>
                                    <td>07.05.2019</td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section6"></div>
                    <h3>TEC Certification</h3>
                    <form method="get" class="electroni-form electroni-form2">
                        <div class="input-group full-input-box mb-3">
                            <input type="text" name="search" value="" class="form-control input-box"
                                placeholder="Enter Your Product Name" aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button ype="submit" class="input-group-text" style="height:34px;"><i
                                        class="fa fa-search"></i><span>Search</span></button>
                            </div>
                        </div>
                    </form>


                    <div class="gridtable table-responsive">
                        <table class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                            <thead style="width: 100%;">
                                <tr>
                                    <th class="down-bis1" width="60">S.No.</th>
                                    <th class="down-bis" style="width: 695px;">Notifications</th>
                                    <th class="down-bis" width="220">Date</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td style="width:60px;">1</td>
                                    <td style="width: 695px;"><a href="#">Notification for testing of Phase
                                            III and
                                            IV products</a>
                                    </td>
                                    <td width="200">31.01.2022</td>
                                </tr>


                                <tr>
                                    <td>2</td>
                                    <td><a href="#">Notification for ILAC Test Report Relaxation</a>
                                    </td>
                                    <td>22.09.2021</td>
                                </tr>


                                <tr>
                                    <td>3</td>
                                    <td><a href="#">RF Testing and TR Testing are valid from any ILAC
                                            accredited lab
                                            till 30th June 2021 for TEC Certification</a>
                                    </td>
                                    <td>16.11.2020</td>
                                </tr>


                                <tr>
                                    <td>4</td>
                                    <td><a href="#">Only TEC designated lab will be valid after 30, September
                                            2020</a>
                                    </td>
                                    <td>26.06.2020</td>
                                </tr>


                                <tr>
                                    <td>5</td>
                                    <td><a href="#">Phase 2 notification for Testing and Certification of 3
                                            products</a>
                                    </td>
                                    <td>25.06.2020</td>
                                </tr>


                                <tr>
                                    <td>6</td>
                                    <td><a href="#">TEC has exempted product labeling for initial 6
                                            months</a>
                                    </td>
                                    <td>19.06.2020</td>
                                </tr>


                                <tr>
                                    <td>7</td>
                                    <td><a href="#">MTCTE Implementation Readiness Status</a>
                                    </td>
                                    <td>24.02.2020</td>
                                </tr>


                                <tr>
                                    <td>8</td>
                                    <td><a href="#">Registration of all Indian OEMs / Indian Authorised
                                            Representatives on MTCTE portal</a>
                                    </td>
                                    <td>04.11.2019</td>
                                </tr>


                                <tr>
                                    <td>9</td>
                                    <td><a href="#">Date of Dispatch from foreign port as Date of Import</a>
                                    </td>
                                    <td>02.10.2019</td>
                                </tr>


                                <tr>
                                    <td>10</td>
                                    <td><a href="#">Phase I of MTCTE roll out</a>
                                    </td>
                                    <td>08.07.2019</td>
                                </tr>


                                <tr>
                                    <td>11</td>
                                    <td><a href="#">Acceptance of ILAC lab reports by TEC</a>
                                    </td>
                                    <td>08.07.2019</td>
                                </tr>


                                <tr>
                                    <td>12</td>
                                    <td><a href="#">Provisional Certification by TEC for exemption from a few
                                            test
                                            reports</a>
                                    </td>
                                    <td>08.07.2019</td>
                                </tr>


                                <tr>
                                    <td>13</td>
                                    <td><a href="#">TEC Certification will be mandatory from August 1,
                                            2019</a>
                                    </td>
                                    <td>12.03.2019</td>
                                </tr>




                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="unisection section_bg" style="position: relative;">
                    <div class="gotoSection" id="section7"></div>
                    <h3 class="mb-4">Download Brochures</h3>
                    <div class="clear"></div>
                    <div class="quick-from">
                        <!-- <h3 class="text-center prop prop2">Download Brochure</h3> -->
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group  ">
                                            <input class="form-control" value="" type="text"
                                                placeholder="Your organization name" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notif">
                                            <input class="form-control" type="text" value=""
                                                placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="control-group">
                                        <div class="form-group notifd">
                                            <select class="" name="servc" id="servc"
                                                onkeypress="return ValidateAlpha(event);" required="">
                                                <option value="">Required Certification</option>
                                                <option value="BIS Registration - Foreign Manufacturer">BIS
                                                    Registration - Foreign Manufacturer</option>
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
                                                placeholder="Your Email" name="email" required="">
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
                                                <option value="Antigua and Barbuda: +1268"> Antigua and Barbuda:
                                                    +1268</option>
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
                                                <option value="Bosnia and Herzegovina: +387">Bosnia and
                                                    Herzegovina: +387</option>
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
                                                <option value="Marshall Islands: +692">Marshall Islands: +692
                                                </option>
                                                <option value="Mauritania: +222">Mauritania: +222</option>
                                                <option value="Mauritius: +230">Mauritius: +230</option>
                                                <option value="Mexico: +252">Mexico: +252</option>
                                                <option value="Micronesia, Federated States of: +691">Micronesia:
                                                    +691</option>
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
                                                <option value="North Macedonia: +389">North Macedonia: +389
                                                </option>
                                                <option value="Norway: +47">Norway: +47</option>
                                                <option value="Oman: +968">Oman: +968</option>
                                                <option value="Pakistan: +92">Pakistan: +92</option>
                                                <option value="Palau: +680">Palau: +680</option>
                                                <option value="Panama: +507">Panama: +507</option>
                                                <option value="Papua New Guinea: +675">Papua New Guinea: +675
                                                </option>
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
                                                <option value="Solomon Islands: +677">Solomon Islands: +677
                                                </option>
                                                <option value="Somalia: +252">Somalia: +252</option>
                                                <option value="South Africa: +27">South Africa: +27</option>
                                                <option value="South Korea: +82">South Korea: +82</option>
                                                <option value="South Sudan: +211">South Sudan: +211</option>
                                                <option value="Spain: +34">Spain: +34</option>
                                                <option value="Sri Lanka: +94">Sri Lanka: +94</option>
                                                <option value="Saint Vincent and the Grenadines: +1">Saint Vincent
                                                    and the Grenadines: +1</option>
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
                                                <option value="Trinidad and Tobago: +1868">Trinidad and Tobago:
                                                    +1868</option>
                                                <option value="Tunisia: +216">Tunisia: +216</option>
                                                <option value="Turkey: +90">Turkey: +90</option>
                                                <option value="Turkmenistan: +993">Turkmenistan: +993</option>
                                                <option value="Tuvalu: +688">Tuvalu: +688</option>
                                                <option value="Uganda: +256">Uganda: +256</option>
                                                <option value="Ukraine: +380">Ukraine: +380</option>
                                                <option value="United Arab Emirates: +971">United Arab Emirates:
                                                    +971</option>
                                                <option value="United Kingdom: +44">United Kingdom: +44</option>
                                                <option value="United States: +1">United States: +1</option>
                                                <option value="Uruguay: +598">Uruguay: +598</option>
                                                <option value="Uzbekistan: +998">Uzbekistan: +998</option>
                                                <option value="Vanuatu: +678">Vanuatu: +678</option>
                                                <option value="Vatican City State (Holy See): +379">Vatican City
                                                    State (Holy See): +379</option>
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
                                            <input class="form-control" type="tel" placeholder="Your Number"
                                                minlength="5" name="phone" required="">
                                        </div>
                                    </div>
                                </div>
                                <!--<input class="form-control" id="remarkk" type="hidden" name="remarkk" autocomplete="on">-->


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
                                    <div class=" number1 form-control form-control5"> <span class="captha1">9 + 7
                                            = </span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-5">
                                    <input type="hidden" name="no1" value="9" required="">
                                    <input type="hidden" name="no2" value="7" required="">
                                    <input type="hidden" name="noo2" id="password" value="16"
                                        required="">
                                    <input type="text" name="test" id="cnf_password"
                                        class="form-control popup-input2" autocomplete="off" maxlength="2"
                                        onkeypress="validate(event)" required=""
                                        placeholder="Enter captcha value here">

                                </div>
                            </div>

                            <!--<input type="submit" name="submit_register" id="submit_register" value="Submit" class="register-submit-top" onclick="gifbisproduct()" autocomplete="off">-->
                            <button type="submit" name="view" id="action">View </button>

                            <button type="submit" name="submit" id="auction">Download </button>
                            <!-- Image loader -->
                            <div class="response"></div>
                        </form>
                    </div>
                </div> --}}

            </div>

        </div>
    </div>
</section>

@section('js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#yourTableId11').DataTable({
            paging: false,
            ordering: false
        }); // Replace 'yourTableId' with the actual ID of your table.
        
         $('.targetlink').click(function() {
            $('.targetlink').removeClass("active"); // Remove "active" class from all elements
            $(this).addClass("active"); // Add "active" class to the clicked element
        });

        
        
    });
    
    
</script>

@endsection

@endsection