@extends('front/layout/master')
@section('main-contant')
    <div class="inerheader2 inerheader4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="servicehead">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- <h1>Contact Us</h1> -->
                                <div class="text-center registration_outer">
                                    <div class="registration_logo">
                                        <img src="{{ url('front') }}/images/contact_us_icon.png" alt="">
                                    </div>
                                    <h1>Contact Us</h1>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                             <ul class="breadcum">
                                  <li><a href="index.html">Home</a> <i class="fa fa-caret-right"></i></li>
                                  <li>Contact Us</li>
                             </ul>
                         </div> -->
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
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-page-section mb-70">
        <div class="container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box">
                            <h4>Contact Details</h4>
                        </div>
                        <div class="lower-box">
                            <ul class="info-list">
                                <li> <span class="icon fa fa-map-marker"></span>110, Sharma Complex
                                    A-2, Guru Nanak Pura, Laxmi Nagar
                                    Delhi - 110092, India</li>
                                <li> <span class="icon fa fa-phone"></span> <a href="tel:+911142686678">+91-11-42686678</a>
                                </li>
                                <li> <span class="icon fa fa-envelope-o"></span>
                                    <a href="mailto:info@exportapproval.com">info@exportapproval.com</a><br>
                                    <!--  <a href="">www.getmyapproval.com</a>  -->
                                </li>
                            </ul>


                            <!-- Social Box -->
                            <ul class="social-box" style="margin-top: 20px;">
                                <li class="facebook"><a href="#" class="fa fa-facebook-f"></a></li>
                                <li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
                                <li class="linkedin"><a href="#" class="fa fa-linkedin"></a></li>
                                <li class="pinterest"><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Map Column -->
                <div class="map-column col-lg-4 col-md-6 col-sm-12">
                    <!-- Contact Form Box -->
                    <div class="contact-form-box">
                        <!-- Form Title Box -->
                        <div class="form-title-box">
                            <h3>Send a Message</h3>
                        </div>
                        
                        <!-- Contact Form -->
                        <div class="contact-form contact-form3">
                            <form data-parsley-validate  action="{{ url('saveEnquiry') }}" method="post"  id=""   enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="enquiryrow2">
                                            <!-- <label>Name</label> -->
                                            <input type="text" class="form-group" name="name" placeholder="Name" data-parsley-required="true" data-parsley-required-message="Please enter your name" onkeypress="return /[a-z-/ /]/i.test(event.key)">
                                            <input type="hidden" name="enquiry_from" value="Contact us form" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="enquiryrow2">
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
                                    <div class="col-md-12">
                                        <div class="enquiryrow2">
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
                                                <option value="Central African Republic: +236">Central African Republic:
                                                    +236</option>
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
                                                <option value="Dominican Republic: +1829">Dominican Republic: +1829
                                                </option>
                                                <option value="Dominican Republic: +1849">Dominican Republic: +1849
                                                </option>
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
                                    <div class="col-md-12">
                                        <div class="enquiryrow2">
                                            <!-- <label>Mobile</label> -->
                                            <input type="text" class="form-group" name="mobile" placeholder="Mobile" onkeypress="return /[0-9/]/i.test(event.key)" data-parsley-required-message="Please enter Mobile Number" minlength="10" maxlength="10"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="enquiryrow2">
                                            <!-- <label>Product Brif</label> -->
                                            <textarea name="message" placeholder="Product Brif"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="enquiryrow2">
                                            <input type="submit" class="form-group enq-sbmtbtn">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Contact Form Box -->
                </div>


                <div class="col-lg-4 col-md-12 col-sm-12">
                    <iframe class="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.770042020447!2d77.28305121445678!3d28.636653390646508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfca9ee9d65df%3A0x993a638ba380a2a8!2sBrand+Liaison+-+BIS+Registration+Service%2C+WPC+License%2C+ISI+Mark+Certification+Consultant+India!5e0!3m2!1sen!2sin!4v1546508268206"
                        allowfullscreen style="width: 100%;height: 458px;"></iframe>
                </div>


            </div>






        </div>
    </section>
@endsection