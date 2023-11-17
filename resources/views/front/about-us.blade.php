

@extends('front/layout/master')
@section('main-contant')

    <div class="inerheader2 inerheader4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="servicehead">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- <h1>About Us</h1> -->

                                <div class="text-center registration_outer">
                                    <div class="registration_logo">
                                        <img src="{{ url('front') }}/images/about_us_icon.png" alt="">
                                    </div>
                                    <h1>About Us</h1>
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
                        <li><a href="index.html">Home</a> <i class="fa fa-caret-right"></i></li>
                        <li>About Us</li>
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
                                <h4>About Menu</h4>
                                <div class="inner-box inner-box2">
                                    <nav2>
                                        <ul class="product-category-list nav nav-pills nav-stacked sticky-sm-top"
                                            data-spy="affix" data-offset-top="205">
                                            <li><a href="#section1" class="targetlink">Organization</a></li>
                                            <li><a href="#section2" class="targetlink">Vision</a></li>
                                            <li><a href="#section3" class="targetlink">Team</a></li>
                                            <li><a href="#section4" class="targetlink">Industry Rating </a></li>
                                            <!-- <li><a href="#section5">Gallery </a></li> -->
                                            <li><a href="#section6" class="targetlink">Client Testimonial </a></li>
                                            <li><a href="#section7" class="targetlink">KYC</a></li>
                                            <!-- <li><a href="#section8">Holiday List</a></li> -->
                                            <li><a href="#section9" class="targetlink">Download Profile</a></li>
                                        </ul>
                                        </nav>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar">
                            <div class="sidebar-widget category-widget sidebar-widget2">
                                
                                <h4 class="packagebuy2">
                                    <a href="{{url('contact-us')}}">
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

                    <div class="unisection section_bg" style="position: relative;">
                        <div class="gotoSection" id="section1"></div>
                        <h3>Organization</h3>
                        <p>Export Approval is a leading platform in the field of export approval services, designed specifically for foreign manufacturers eager to tap into the vast potential of the Indian market. With this platform, we provide comprehensive assistance and support in getting certifications and approvals for foreign manufacturers who want to export their products in India. Export Approval is powered by Brand Liaison India Pvt Ltd, a compliance consulting company founded in 2014 and registered with the ROC (Registrar of Companies), Ministry of Corporate Affairs, Government of India. Brand Liaison delivers vital compliance services to both Indian and international manufacturers, ensuring they meet the necessary requirements for products designated for import or sale in India. By merging expertise and effective leadership, Brand Liaison has established its position as one of the most reputable entities in the realm of compliance management services.</p>
                        <p>Through the Export Approval platform, we specialize in assisting foreign manufacturers in their journey to export their products to the dynamic market of India. With this platform, our core mission is to simplify the challenging process of exporting products in India by ensuring foreign manufacturers receive the necessary certifications and approvals. We take pride in offering various services customized to meet your unique export needs, including BIS/CRS Registration, ISI/BIS Certification, WPC-ETA Approval and TEC Certification. The company assists clients in fulfilling their legal and regulatory obligations efficiently and effectively. Brand Liaison is well-known for its swift and cost-effective services, with a steadily growing clientele of over 150 leading brands who are satisfied with our services.</p>
                    </div>

                    <div class="unisection section_bg" style="position: relative;">
                        <div class="gotoSection" id="section2"></div>


                        <h3>Vision & Mission</h3>
                        <p>Through Export Approval, our vision is to be the guiding force for foreign manufacturers seeking to export their products to India. We envision a future where seamless and compliant entry into the Indian market is within the reach of every foreign manufacturer. By providing tailored certification and approval solutions, we aim to set new standards of efficiency and excellence, facilitating global trade and fostering lasting partnerships between international businesses and the thriving Indian marketplace.</p>
                        <p>With the Export Approval platform, we are committed to streamline the process of exporting products to India by delivering expert guidance and support for essential product certifications and approvals. Our goal is to ensure that our clients' products meet the stringent regulatory standards and quality benchmarks required to enter in the Indian market. Through our mission, we want to empower international businesses with the tools and expertise they need to seamlessly navigate India's dynamic regulatory landscape, making their journey into this burgeoning market as efficient and fruitful as possible.</p>
                    </div>

                    <div class="unisection section_bg section_bg2" style="position: relative;">
                        <div class="gotoSection" id="section3"></div>
                        <h3>Our Team</h3>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="team"><img src="{{ url('front') }}/images/rajesh_kumar.jpg"></div>
                            </div>
                            <div class="col-sm-10">
                                <p class="name">Rajesh Kumar<br>
                                    <span>Founder Director</span>
                                </p>
                                <p>Rajesh Kumar is the Founder Director of Brand Liaison India Pvt. Ltd., India’s
                                    leading compliance management company. Brand Liaison is focused on generating
                                    awareness and helping industry stakeholders with compliance management at a PAN
                                    India level.</p>
                                <p>He is the Chairman of Capacity Building Commiittee of <a
                                        href="https://www.servicesepc.org/home/cgcMembers#cgg_member"
                                        target="_blank">Service Export Promotion Council (SEPC)</a>, setup by Ministry
                                    of Commerce & Industry, Government of India. </p>
                            </div>
                        </div>
                        <p>He is also a member of Central Governing Council (CGC) of SEPC and representing the
                            Consultancy Sector (Management Services).</p>
                        <p>A visionary and a professional with over two decades of hands-on experience in business
                            management and social services, he has extensively worked as a brand management consultant
                            with several companies across various industries including hospitality, F&B, paints, and
                            sports.</p>
                        <p>Rajesh is a part of the brilliant alumni of the Banaras Hindu University (BHU). He graduated
                            with a Bachelor’s in Economics from BHU and then went on to obtain a PG Diploma in Marketing
                            Management from Delhi. He has a deep interest in social enterprising intending to promote
                            Indian trade and industry, especially the new entrants in the business domain.</p>
                        <p>During his professional journey, Rajesh has travelled to:</p>
                        <ul>
                            <li>WTO / WIPO – Geneva</li>
                            <li>UNO – New York, Geneva, Vienna & Nairobi</li>
                            <li>UNIDO – Vienna (Austria)</li>
                            <li>Bill Gates Foundation – Seattle (USA)</li>
                            <li>Visited major countries worldwide for participation in several Expos & Seminars</li>
                        </ul>
                        <h3>Our Team of Experts - Your Source of Solutions</h3>
                        <p>Our team is the driving force behind our mission to facilitate and support foreign manufacturers in their journey to export products to India. Comprising a diverse group of dedicated professionals, our team holds deep expertise in Indian regulations and compliance requirements. From certification specialists to approval process experts, each member is committed to ensuring that every client's products meet the stringent standards of the Indian market. Their unwavering dedication, profound knowledge and professional and customer-centric approach are the pillars of our success. With a passion for delivering exemplary service, our team is focused on making the export process to India as efficient and hassle-free as possible, ensuring the success of our clients in this thriving market.</p>
                    </div>


                    <div class="unisection section_bg" style="position: relative;">
                        <div class="gotoSection" id="section4"></div>

                        <h3>Industry Rating </h3>
                        <p>Brand Liaison is rated Good for its fair business practice.</p>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <a
                                    href="{{ url('front') }}/images/CRISIL-Certificate-Brand-Liaison.jpg" target="_blank">
                                    <div class="feature-item">
                                        <div class="icon_img_box"> <img
                                                src="{{ url('front') }}/images/CRISIL-Certificate-Brand-Liaison.jpg"> </div>
                                        <h5>CRISIL SME Rating</h5>
                                    </div>
                                </a> </div>
                        </div>
                    </div>


                    @if(count($testimonialList)>0)

                    <div class="unisection section_bg section_bg2" style="position: relative;">
                        <div class="gotoSection" id="section6"></div>

                        <h3>Client Testimonial </h3>
                        <div class="scroll_gallery" id="style-6">

                            @foreach ($testimonialList as $val)
                            <div class="feed-back">
                                <div class="row">
                                    <div class="col-lg-2 col-12">
                                        <div class="profile-pic"><img src="{{ url('/uploads/testimonial/'.$val->image) }}"></div>
                                    </div>
                                    <div class="col-lg-10 col-12">
                                        <p>{{ $val->comment }}</p>
                                        <p class="feeder-name"><span>{{ $val->name }} ({{ $val->desingnation }})</span> </p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            @endforeach

                            {{-- <div class="feed-back">
                                <div class="row">
                                    <div class="col-lg-2 col-12">
                                        <div class="profile-pic"><img src="{{ url('front') }}/images/testimonial1.jpg"></div>
                                    </div>
                                    <div class="col-lg-10 col-12">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries,</p>
                                        <p class="feeder-name"><span>Ravi (New Delhi)</span> </p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="feed-back">
                                <div class="row">
                                    <div class="col-lg-2 col-12">
                                        <div class="profile-pic"><img src="{{ url('front') }}/images/testimonial1.jpg"></div>
                                    </div>
                                    <div class="col-lg-10 col-12">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries,</p>
                                        <p class="feeder-name"><span>Ravi (New Delhi)</span> </p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div> --}}
                        </div>
                    </div>
                    @endif


                    <div class="unisection section_bg section_bg2" style="position: relative;">
                        <div class="gotoSection" id="section7"></div>

                        <h3>Company Details - KYC</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered   table-striped" style="border: 1px solid #e9b6b68a;">
                                <tbody>
                                    <tr>
                                        <td class="padl30">PAN No</td>
                                        <td>AAFCB7720A</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/pan-card.jpg"
                                                onClick="window.open('{{ url('front') }}/files/pan-card.jpg','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank" href="{{ url('front') }}/files/pan-card.jpg"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">GST Registration No</td>
                                        <td>07AAFCB7720A1Z5</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/gst-registration-certificate.pdf"
                                                onClick="window.open('{{ url('front') }}/files/gst-registration-certificate.pdf','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank"
                                                href="{{ url('front') }}/files/gst-registration-certificate.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">TAN No</td>
                                        <td>DELB14438E</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/tan-number.jpg"
                                                onClick="window.open('{{ url('front') }}/files/tan-number.jpg','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank" href="{{ url('front') }}/files/tan-number.jpg"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">IEC Registration</td>
                                        <td>0514013168</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/iec-registration.pdf"
                                                onClick="window.open('{{ url('front') }}/files/iec-registration.pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank" href="{{ url('front') }}/files/iec-registration.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">HSN / SAC Code</td>
                                        <td>998311</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/HSN-SAC-Code.jpg"
                                                onClick="window.open('{{ url('front') }}/files/HSN-SAC-Code.jpg','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank" href="{{ url('front') }}/files/HSN-SAC-Code.jpg"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">LUT Letter</td>
                                        <td>2023-24</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/LUT-Brand-Liaison.pdf"
                                                onClick="window.open('{{ url('front') }}/files/LUT-Brand-Liaison.pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank" href="{{ url('front') }}/files/LUT-Brand-Liaison.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">Incorporation Certificate</td>
                                        <td>U74900DL2014PTC263016</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/Incorporation-Certificate-Brand-Liaison.pdf"
                                                onClick="window.open('{{ url('front') }}/files/Incorporation-Certificate-Brand-Liaison.pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank"
                                                href="{{ url('front') }}/files/Incorporation-Certificate-Brand-Liaison.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">MSME / Udyam Certificate</td>
                                        <td>UDYAM-DL-02-0013478</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/Udyam Registration - Brand Liaison.pdf"
                                                onClick="window.open('{{ url('front') }}/files/Udyam Registration - Brand Liaison.pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank"
                                                href="{{ url('front') }}/files/Udyam Registration - Brand Liaison.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">ISO Certificate</td>
                                        <td>20DQGQ06</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/ISO-Certificate-Brand-Liaison.pdf"
                                                onClick="window.open('{{ url('front') }}/files/ISO-Certificate-Brand-Liaison.pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank"
                                                href="{{ url('front') }}/files/ISO-Certificate-Brand-Liaison.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                    <tr>
                                        <td class="padl30">Bank AD Code</td>
                                        <td>0302056 - 2900009</td>
                                        <td><a class="flview" href="{{ url('front') }}/files/Bank-AD-Code.pdf"
                                                onClick="window.open('{{ url('front') }}/files/Bank-AD-Code.pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;">View</a>
                                        </td>
                                        <td><a class="red rhov" target="_blank" href="{{ url('front') }}/files/Bank-AD-Code.pdf"
                                                download="">Download</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--   <div class="unisection" id="section8">
          
               
                <h3>Holiday List</h3>
              
          
        </div> -->

                    <div class="unisection section_bg section_bg2" style="position: relative;">
                        <div class="gotoSection" id="section9"></div>

                        <h3>Download Profile</h3>
                        <div class="clear"></div>
                        <div class="row">
                            <div class="col-sm-6"> <a href="{{ url('front') }}/files/company-profile-bl-india.pdf" target="_blank">
                                    <div class="download"> <img src="{{ url('front') }}/images/download-icon.png"> Company Profile - PDF
                                    </div>
                                </a> </div>
                            <div class="col-sm-6"> <a href="{{ url('front') }}/files/Company-Profile-Brand-Liaison.mp4" target="_blank">
                                    <div class="download"> <img src="{{ url('front') }}/images/download-icon.png"> Company Profile -
                                        Video</div>
                                </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    @section('js')
    
    <script>
    $( document ).ready(function() {
        
        $('.targetlink').click(function() {
            $('.targetlink').removeClass("active"); // Remove "active" class from all elements
            $(this).addClass("active"); // Add "active" class to the clicked element
        });

    });
    
</script>
    
    @endsection

  @endsection
