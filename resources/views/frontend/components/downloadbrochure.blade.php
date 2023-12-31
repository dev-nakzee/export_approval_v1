
@if($agent->isMobile())
<section class="uk-box-shadow brochure-section uk-section uk-background-muted uk-padding-small uk-padding-remove-vertical" id="download-brochure">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
        <p class="section-heading uk-margin-remove-bottom">
            Download Brochure
        </p>
        <span class="section-tagline">Process &amp; Guidelines</span>
    </div>
    <form class="uk-margin-large-bottom" id="brochure-form" method="POST" action="{{route('frontend.site.brochure.store')}}">
        @csrf
        <div uk-grid>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="fullname" id="fullname" type="text" placeholder="Your Name">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="organisation" id="organisation" type="text" placeholder="Organisation name">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">

                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="email" id="email" type="email" placeholder="Email address">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">

                <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                    <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical form-inputs" id="country" name="country" style="font-size: 12px;">
                        <option value="">Select Country</option>

                            <option value="['AFGHANISTAN',93]">Afghanistan (+93)</option>
                                                <option value="['ALBANIA',355]">Albania (+355)</option>
                                                <option value="['ALGERIA',213]">Algeria (+213)</option>
                                                <option value="['AMERICAN SAMOA',1684]">American samoa (+1684)</option>
                                                <option value="['ANDORRA',376]">Andorra (+376)</option>
                                                <option value="['ANGOLA',244]">Angola (+244)</option>
                                                <option value="['ANGUILLA',1264]">Anguilla (+1264)</option>
                                                <option value="['ANTARCTICA',0]">Antarctica (+0)</option>
                                                <option value="['ANTIGUA AND BARBUDA',1268]">Antigua and barbuda (+1268)</option>
                                                <option value="['ARGENTINA',54]">Argentina (+54)</option>
                                                <option value="['ARMENIA',374]">Armenia (+374)</option>
                                                <option value="['ARUBA',297]">Aruba (+297)</option>
                                                <option value="['AUSTRALIA',61]">Australia (+61)</option>
                                                <option value="['AUSTRIA',43]">Austria (+43)</option>
                                                <option value="['AZERBAIJAN',994]">Azerbaijan (+994)</option>
                                                <option value="['BAHAMAS',1242]">Bahamas (+1242)</option>
                                                <option value="['BAHRAIN',973]">Bahrain (+973)</option>
                                                <option value="['BANGLADESH',880]">Bangladesh (+880)</option>
                                                <option value="['BARBADOS',1246]">Barbados (+1246)</option>
                                                <option value="['BELARUS',375]">Belarus (+375)</option>
                                                <option value="['BELGIUM',32]">Belgium (+32)</option>
                                                <option value="['BELIZE',501]">Belize (+501)</option>
                                                <option value="['BENIN',229]">Benin (+229)</option>
                                                <option value="['BERMUDA',1441]">Bermuda (+1441)</option>
                                                <option value="['BHUTAN',975]">Bhutan (+975)</option>
                                                <option value="['BOLIVIA',591]">Bolivia (+591)</option>
                                                <option value="['BOSNIA AND HERZEGOVINA',387]">Bosnia and herzegovina (+387)</option>
                                                <option value="['BOTSWANA',267]">Botswana (+267)</option>
                                                <option value="['BOUVET ISLAND',0]">Bouvet island (+0)</option>
                                                <option value="['BRAZIL',55]">Brazil (+55)</option>
                                                <option value="['BRITISH INDIAN OCEAN TERRITORY',246]">British indian ocean territory (+246)</option>
                                                <option value="['BRUNEI DARUSSALAM',673]">Brunei darussalam (+673)</option>
                                                <option value="['BULGARIA',359]">Bulgaria (+359)</option>
                                                <option value="['BURKINA FASO',226]">Burkina faso (+226)</option>
                                                <option value="['BURUNDI',257]">Burundi (+257)</option>
                                                <option value="['CAMBODIA',855]">Cambodia (+855)</option>
                                                <option value="['CAMEROON',237]">Cameroon (+237)</option>
                                                <option value="['CANADA',1]">Canada (+1)</option>
                                                <option value="['CAPE VERDE',238]">Cape verde (+238)</option>
                                                <option value="['CAYMAN ISLANDS',1345]">Cayman islands (+1345)</option>
                                                <option value="['CENTRAL AFRICAN REPUBLIC',236]">Central african republic (+236)</option>
                                                <option value="['CHAD',235]">Chad (+235)</option>
                                                <option value="['CHILE',56]">Chile (+56)</option>
                                                <option value="['CHINA',86]">China (+86)</option>
                                                <option value="['CHRISTMAS ISLAND',61]">Christmas island (+61)</option>
                                                <option value="['COCOS (KEELING) ISLANDS',672]">Cocos (keeling) islands (+672)</option>
                                                <option value="['COLOMBIA',57]">Colombia (+57)</option>
                                                <option value="['COMOROS',269]">Comoros (+269)</option>
                                                <option value="['CONGO',242]">Congo (+242)</option>
                                                <option value="['CONGO, THE DEMOCRATIC REPUBLIC OF THE',242]">Congo, the democratic republic of the (+242)</option>
                                                <option value="['COOK ISLANDS',682]">Cook islands (+682)</option>
                                                <option value="['COSTA RICA',506]">Costa rica (+506)</option>
                                                <option value="['COTE D'IVOIRE',225]">Cote d'ivoire (+225)</option>
                                                <option value="['CROATIA',385]">Croatia (+385)</option>
                                                <option value="['CUBA',53]">Cuba (+53)</option>
                                                <option value="['CYPRUS',357]">Cyprus (+357)</option>
                                                <option value="['CZECH REPUBLIC',420]">Czech republic (+420)</option>
                                                <option value="['DENMARK',45]">Denmark (+45)</option>
                                                <option value="['DJIBOUTI',253]">Djibouti (+253)</option>
                                                <option value="['DOMINICA',1767]">Dominica (+1767)</option>
                                                <option value="['DOMINICAN REPUBLIC',1809]">Dominican republic (+1809)</option>
                                                <option value="['ECUADOR',593]">Ecuador (+593)</option>
                                                <option value="['EGYPT',20]">Egypt (+20)</option>
                                                <option value="['EL SALVADOR',503]">El salvador (+503)</option>
                                                <option value="['EQUATORIAL GUINEA',240]">Equatorial guinea (+240)</option>
                                                <option value="['ERITREA',291]">Eritrea (+291)</option>
                                                <option value="['ESTONIA',372]">Estonia (+372)</option>
                                                <option value="['ETHIOPIA',251]">Ethiopia (+251)</option>
                                                <option value="['FALKLAND ISLANDS (MALVINAS)',500]">Falkland islands (malvinas) (+500)</option>
                                                <option value="['FAROE ISLANDS',298]">Faroe islands (+298)</option>
                                                <option value="['FIJI',679]">Fiji (+679)</option>
                                                <option value="['FINLAND',358]">Finland (+358)</option>
                                                <option value="['FRANCE',33]">France (+33)</option>
                                                <option value="['FRENCH GUIANA',594]">French guiana (+594)</option>
                                                <option value="['FRENCH POLYNESIA',689]">French polynesia (+689)</option>
                                                <option value="['FRENCH SOUTHERN TERRITORIES',0]">French southern territories (+0)</option>
                                                <option value="['GABON',241]">Gabon (+241)</option>
                                                <option value="['GAMBIA',220]">Gambia (+220)</option>
                                                <option value="['GEORGIA',995]">Georgia (+995)</option>
                                                <option value="['GERMANY',49]">Germany (+49)</option>
                                                <option value="['GHANA',233]">Ghana (+233)</option>
                                                <option value="['GIBRALTAR',350]">Gibraltar (+350)</option>
                                                <option value="['GREECE',30]">Greece (+30)</option>
                                                <option value="['GREENLAND',299]">Greenland (+299)</option>
                                                <option value="['GRENADA',1473]">Grenada (+1473)</option>
                                                <option value="['GUADELOUPE',590]">Guadeloupe (+590)</option>
                                                <option value="['GUAM',1671]">Guam (+1671)</option>
                                                <option value="['GUATEMALA',502]">Guatemala (+502)</option>
                                                <option value="['GUINEA',224]">Guinea (+224)</option>
                                                <option value="['GUINEA-BISSAU',245]">Guinea-bissau (+245)</option>
                                                <option value="['GUYANA',592]">Guyana (+592)</option>
                                                <option value="['HAITI',509]">Haiti (+509)</option>
                                                <option value="['HEARD ISLAND AND MCDONALD ISLANDS',0]">Heard island and mcdonald islands (+0)</option>
                                                <option value="['HOLY SEE (VATICAN CITY STATE)',39]">Holy see (vatican city state) (+39)</option>
                                                <option value="['HONDURAS',504]">Honduras (+504)</option>
                                                <option value="['HONG KONG',852]">Hong kong (+852)</option>
                                                <option value="['HUNGARY',36]">Hungary (+36)</option>
                                                <option value="['ICELAND',354]">Iceland (+354)</option>
                                                <option value="['INDIA',91]">India (+91)</option>
                                                <option value="['INDONESIA',62]">Indonesia (+62)</option>
                                                <option value="['IRAN, ISLAMIC REPUBLIC OF',98]">Iran, islamic republic of (+98)</option>
                                                <option value="['IRAQ',964]">Iraq (+964)</option>
                                                <option value="['IRELAND',353]">Ireland (+353)</option>
                                                <option value="['ISRAEL',972]">Israel (+972)</option>
                                                <option value="['ITALY',39]">Italy (+39)</option>
                                                <option value="['JAMAICA',1876]">Jamaica (+1876)</option>
                                                <option value="['JAPAN',81]">Japan (+81)</option>
                                                <option value="['JORDAN',962]">Jordan (+962)</option>
                                                <option value="['KAZAKHSTAN',7]">Kazakhstan (+7)</option>
                                                <option value="['KENYA',254]">Kenya (+254)</option>
                                                <option value="['KIRIBATI',686]">Kiribati (+686)</option>
                                                <option value="['KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF',850]">Korea, democratic people's republic of (+850)</option>
                                                <option value="['KOREA, REPUBLIC OF',82]">Korea, republic of (+82)</option>
                                                <option value="['KUWAIT',965]">Kuwait (+965)</option>
                                                <option value="['KYRGYZSTAN',996]">Kyrgyzstan (+996)</option>
                                                <option value="['LAO PEOPLE'S DEMOCRATIC REPUBLIC',856]">Lao people's democratic republic (+856)</option>
                                                <option value="['LATVIA',371]">Latvia (+371)</option>
                                                <option value="['LEBANON',961]">Lebanon (+961)</option>
                                                <option value="['LESOTHO',266]">Lesotho (+266)</option>
                                                <option value="['LIBERIA',231]">Liberia (+231)</option>
                                                <option value="['LIBYAN ARAB JAMAHIRIYA',218]">Libyan arab jamahiriya (+218)</option>
                                                <option value="['LIECHTENSTEIN',423]">Liechtenstein (+423)</option>
                                                <option value="['LITHUANIA',370]">Lithuania (+370)</option>
                                                <option value="['LUXEMBOURG',352]">Luxembourg (+352)</option>
                                                <option value="['MACAO',853]">Macao (+853)</option>
                                                <option value="['MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',389]">Macedonia, the former yugoslav republic of (+389)</option>
                                                <option value="['MADAGASCAR',261]">Madagascar (+261)</option>
                                                <option value="['MALAWI',265]">Malawi (+265)</option>
                                                <option value="['MALAYSIA',60]">Malaysia (+60)</option>
                                                <option value="['MALDIVES',960]">Maldives (+960)</option>
                                                <option value="['MALI',223]">Mali (+223)</option>
                                                <option value="['MALTA',356]">Malta (+356)</option>
                                                <option value="['MARSHALL ISLANDS',692]">Marshall islands (+692)</option>
                                                <option value="['MARTINIQUE',596]">Martinique (+596)</option>
                                                <option value="['MAURITANIA',222]">Mauritania (+222)</option>
                                                <option value="['MAURITIUS',230]">Mauritius (+230)</option>
                                                <option value="['MAYOTTE',269]">Mayotte (+269)</option>
                                                <option value="['MEXICO',52]">Mexico (+52)</option>
                                                <option value="['MICRONESIA, FEDERATED STATES OF',691]">Micronesia, federated states of (+691)</option>
                                                <option value="['MOLDOVA, REPUBLIC OF',373]">Moldova, republic of (+373)</option>
                                                <option value="['MONACO',377]">Monaco (+377)</option>
                                                <option value="['MONGOLIA',976]">Mongolia (+976)</option>
                                                <option value="['MONTSERRAT',1664]">Montserrat (+1664)</option>
                                                <option value="['MOROCCO',212]">Morocco (+212)</option>
                                                <option value="['MOZAMBIQUE',258]">Mozambique (+258)</option>
                                                <option value="['MYANMAR',95]">Myanmar (+95)</option>
                                                <option value="['NAMIBIA',264]">Namibia (+264)</option>
                                                <option value="['NAURU',674]">Nauru (+674)</option>
                                                <option value="['NEPAL',977]">Nepal (+977)</option>
                                                <option value="['NETHERLANDS',31]">Netherlands (+31)</option>
                                                <option value="['NETHERLANDS ANTILLES',599]">Netherlands antilles (+599)</option>
                                                <option value="['NEW CALEDONIA',687]">New caledonia (+687)</option>
                                                <option value="['NEW ZEALAND',64]">New zealand (+64)</option>
                                                <option value="['NICARAGUA',505]">Nicaragua (+505)</option>
                                                <option value="['NIGER',227]">Niger (+227)</option>
                                                <option value="['NIGERIA',234]">Nigeria (+234)</option>
                                                <option value="['NIUE',683]">Niue (+683)</option>
                                                <option value="['NORFOLK ISLAND',672]">Norfolk island (+672)</option>
                                                <option value="['NORTHERN MARIANA ISLANDS',1670]">Northern mariana islands (+1670)</option>
                                                <option value="['NORWAY',47]">Norway (+47)</option>
                                                <option value="['OMAN',968]">Oman (+968)</option>
                                                <option value="['PAKISTAN',92]">Pakistan (+92)</option>
                                                <option value="['PALAU',680]">Palau (+680)</option>
                                                <option value="['PALESTINIAN TERRITORY, OCCUPIED',970]">Palestinian territory, occupied (+970)</option>
                                                <option value="['PANAMA',507]">Panama (+507)</option>
                                                <option value="['PAPUA NEW GUINEA',675]">Papua new guinea (+675)</option>
                                                <option value="['PARAGUAY',595]">Paraguay (+595)</option>
                                                <option value="['PERU',51]">Peru (+51)</option>
                                                <option value="['PHILIPPINES',63]">Philippines (+63)</option>
                                                <option value="['PITCAIRN',0]">Pitcairn (+0)</option>
                                                <option value="['POLAND',48]">Poland (+48)</option>
                                                <option value="['PORTUGAL',351]">Portugal (+351)</option>
                                                <option value="['PUERTO RICO',1787]">Puerto rico (+1787)</option>
                                                <option value="['QATAR',974]">Qatar (+974)</option>
                                                <option value="['REUNION',262]">Reunion (+262)</option>
                                                <option value="['ROMANIA',40]">Romania (+40)</option>
                                                <option value="['RUSSIAN FEDERATION',70]">Russian federation (+70)</option>
                                                <option value="['RWANDA',250]">Rwanda (+250)</option>
                                                <option value="['SAINT HELENA',290]">Saint helena (+290)</option>
                                                <option value="['SAINT KITTS AND NEVIS',1869]">Saint kitts and nevis (+1869)</option>
                                                <option value="['SAINT LUCIA',1758]">Saint lucia (+1758)</option>
                                                <option value="['SAINT PIERRE AND MIQUELON',508]">Saint pierre and miquelon (+508)</option>
                                                <option value="['SAINT VINCENT AND THE GRENADINES',1784]">Saint vincent and the grenadines (+1784)</option>
                                                <option value="['SAMOA',684]">Samoa (+684)</option>
                                                <option value="['SAN MARINO',378]">San marino (+378)</option>
                                                <option value="['SAO TOME AND PRINCIPE',239]">Sao tome and principe (+239)</option>
                                                <option value="['SAUDI ARABIA',966]">Saudi arabia (+966)</option>
                                                <option value="['SENEGAL',221]">Senegal (+221)</option>
                                                <option value="['SERBIA AND MONTENEGRO',381]">Serbia and montenegro (+381)</option>
                                                <option value="['SEYCHELLES',248]">Seychelles (+248)</option>
                                                <option value="['SIERRA LEONE',232]">Sierra leone (+232)</option>
                                                <option value="['SINGAPORE',65]">Singapore (+65)</option>
                                                <option value="['SLOVAKIA',421]">Slovakia (+421)</option>
                                                <option value="['SLOVENIA',386]">Slovenia (+386)</option>
                                                <option value="['SOLOMON ISLANDS',677]">Solomon islands (+677)</option>
                                                <option value="['SOMALIA',252]">Somalia (+252)</option>
                                                <option value="['SOUTH AFRICA',27]">South africa (+27)</option>
                                                <option value="['SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',0]">South georgia and the south sandwich islands (+0)</option>
                                                <option value="['SPAIN',34]">Spain (+34)</option>
                                                <option value="['SRI LANKA',94]">Sri lanka (+94)</option>
                                                <option value="['SUDAN',249]">Sudan (+249)</option>
                                                <option value="['SURINAME',597]">Suriname (+597)</option>
                                                <option value="['SVALBARD AND JAN MAYEN',47]">Svalbard and jan mayen (+47)</option>
                                                <option value="['SWAZILAND',268]">Swaziland (+268)</option>
                                                <option value="['SWEDEN',46]">Sweden (+46)</option>
                                                <option value="['SWITZERLAND',41]">Switzerland (+41)</option>
                                                <option value="['SYRIAN ARAB REPUBLIC',963]">Syrian arab republic (+963)</option>
                                                <option value="['TAIWAN, PROVINCE OF CHINA',886]">Taiwan, province of china (+886)</option>
                                                <option value="['TAJIKISTAN',992]">Tajikistan (+992)</option>
                                                <option value="['TANZANIA, UNITED REPUBLIC OF',255]">Tanzania, united republic of (+255)</option>
                                                <option value="['THAILAND',66]">Thailand (+66)</option>
                                                <option value="['TIMOR-LESTE',670]">Timor-leste (+670)</option>
                                                <option value="['TOGO',228]">Togo (+228)</option>
                                                <option value="['TOKELAU',690]">Tokelau (+690)</option>
                                                <option value="['TONGA',676]">Tonga (+676)</option>
                                                <option value="['TRINIDAD AND TOBAGO',1868]">Trinidad and tobago (+1868)</option>
                                                <option value="['TUNISIA',216]">Tunisia (+216)</option>
                                                <option value="['TURKEY',90]">Turkey (+90)</option>
                                                <option value="['TURKMENISTAN',7370]">Turkmenistan (+7370)</option>
                                                <option value="['TURKS AND CAICOS ISLANDS',1649]">Turks and caicos islands (+1649)</option>
                                                <option value="['TUVALU',688]">Tuvalu (+688)</option>
                                                <option value="['UGANDA',256]">Uganda (+256)</option>
                                                <option value="['UKRAINE',380]">Ukraine (+380)</option>
                                                <option value="['UNITED ARAB EMIRATES',971]">United arab emirates (+971)</option>
                                                <option value="['UNITED KINGDOM',44]">United kingdom (+44)</option>
                                                <option value="['UNITED STATES',1]">United states (+1)</option>
                                                <option value="['UNITED STATES MINOR OUTLYING ISLANDS',1]">United states minor outlying islands (+1)</option>
                                                <option value="['URUGUAY',598]">Uruguay (+598)</option>
                                                <option value="['UZBEKISTAN',998]">Uzbekistan (+998)</option>
                                                <option value="['VANUATU',678]">Vanuatu (+678)</option>
                                                <option value="['VENEZUELA',58]">Venezuela (+58)</option>
                                                <option value="['VIET NAM',84]">Viet nam (+84)</option>
                                                <option value="['VIRGIN ISLANDS, BRITISH',1284]">Virgin islands, british (+1284)</option>
                                                <option value="['VIRGIN ISLANDS, U.S.',1340]">Virgin islands, u.s. (+1340)</option>
                                                <option value="['WALLIS AND FUTUNA',681]">Wallis and futuna (+681)</option>
                                                <option value="['WESTERN SAHARA',212]">Western sahara (+212)</option>
                                                <option value="['YEMEN',967]">Yemen (+967)</option>
                                                <option value="['ZAMBIA',260]">Zambia (+260)</option>
                                                <option value="['ZIMBABWE',263]">Zimbabwe (+263)</option>
                    </select>
                    <input class="uk-input form-inputs uk-width-3-5 uk-padding-small uk-padding-remove-vertical" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="mobile" type="text" placeholder="mobile number">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <select class="uk-select form-inputs" id="service" name="service">
                        <option value="">Select Service</option>
                        @if($services)
                        @foreach($services as $service)
                        <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <select class="uk-select form-inputs" id="source" name="source">
                        <option value="">How did you find us?</option>
                        <option value="Website">Website</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Referral">Referral</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="uk-width-1-1@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <textarea name="message" class="uk-textarea" placeholder="Enter you query along with product details"></textarea>
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                    <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                    <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="80" height="25"></canvas>
                    <button type="button" class="uk-button uk-padding-remove uk-width-1-5 uk-button-small" id="reload_captcha" uk-icon="refresh"></button>
                    <input class="uk-input uk-width-2-5 uk-margin-small-top form-inputs uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top  uk-text-center">
                <button class="uk-border-rounded uk-button uk-button-primary brochure-form-submit" id="form-submit" type="submit">Submit</button>
                <div uk-spinner class="uk-margin-left uk-hidden loading" style="color: #052faa;"></div>
            </div>
        </div>
    </form>
</section>
@else
<section class="uk-box-shadow-medium brochure-section uk-section uk-background-muted uk-padding-large uk-padding-remove-vertical" id="download-brochure">
    <div class="section-two-heading uk-text-center uk-padding uk-padding-remove-bottom">
        <p class="section-heading uk-margin-remove-bottom">
            Download Brochure
        </p>
        <span class="section-tagline">Process &amp; Guidelines</span>
    </div>
    <form class="uk-form-stacked uk-padding" id="brochure-form" method="POST" action="{{route('frontend.site.brochure.store')}}">
        @csrf
        <div uk-grid>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="fullname" id="fullname" type="text" placeholder="Your Name">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="organisation" id="organisation" type="text" placeholder="Organisation name">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">

                <div class="uk-form-controls">
                    <input class="uk-input form-inputs" name="email" id="email" type="email" placeholder="Email address">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">

                <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                    <select class="uk-select uk-width-2-5 uk-padding-small uk-padding-remove-vertical form-inputs" id="country" name="country" style="font-size: 12px;">
                        <option value="">Select Country</option>
                        @if($countries)
                        @foreach($countries as $country)
                        <option value="{{json_encode([$country->name, $country->phonecode])}}">{{ucfirst(strtolower($country->name))." (+".$country->phonecode.")"}}</option>
                        @endforeach
                        @endif
                    </select>
                    <input class="uk-input form-inputs uk-width-3-5 uk-padding-small uk-padding-remove-vertical" name="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id="mobile" type="text" placeholder="mobile number">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <select class="uk-select form-inputs" id="service" name="service">
                        <option value="">Select Service</option>
                        @if($services)
                        @foreach($services as $service)
                        <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">    
                <div class="uk-form-controls">
                    <select class="uk-select form-inputs" id="source" name="source">
                        <option value="">How did you find us?</option>
                        <option value="Website">Website</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Referral">Referral</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="uk-width-1-1@m uk-margin-small-top">    

                <div class="uk-form-controls">
                    <textarea name="message" class="uk-textarea" placeholder="Enter you query along with product details"></textarea>
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <div class="uk-form-controls uk-padding uk-padding-remove-vertical uk-padding-remove-right" uk-grid>
                    <input id="captcha_answer" name="captcha_answer" class="uk-input uk-padding-small uk-width-2-5 uk-padding-remove-vertical" hidden>
                    <canvas id="captcha_image" class="uk-padding-small uk-width-2-5 uk-padding-remove-vertical" width="120" height="25"></canvas>
                    <button type="button" class="uk-button uk-padding-remove uk-button-small" style="width: 36px; height: 36px;" id="reload_captcha" uk-icon="refresh"></button>
                    <input class="uk-input uk-width-expand form-inputs uk-padding-small uk-padding-remove-vertical" name="captcha" id="captcha" type="text" placeholder="Enter captcha value">
                </div>
            </div>
            <div class="uk-width-1-2@m uk-margin-small-top">
                <button class="uk-border-rounded uk-button uk-button-primary brochure-form-submit" id="form-submit" type="submit">Submit</button>
                <div uk-spinner class="uk-margin-left uk-hidden loading" style="color: #052faa;"></div>
            </div>
        </div>
    </form>
</section>
@endif
</section>
<script>
 function captcha(){
    var x = Math.floor((Math.random() * 9) + 1);
    var y = Math.floor((Math.random() * 9) + 1);
    var canvas = document.getElementById("captcha_image");
    var ctx=canvas.getContext("2d");
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.fillStyle = "Blue";
    ctx.textAlign = "center";
    ctx.font = "12px Arial";
    ctx.strokeText(x+" + "+y+"   =",60,20);
    var answer = document.getElementById("captcha_answer");
    answer.value = x + y;
}
$(document).on("click", "#reload_captcha", function(){
    captcha();
});
$(document).ready(function(){
    captcha();
});
$(document).on("submit", "#brochure-form", function(e) {
    e.preventDefault();
    formData = $('#brochure-form').serialize();
    var inputs = Array.from(document.getElementsByClassName('form-inputs'));
    inputs.forEach(field => {
        field.classList.remove('form-error');
    });
    $('#form-submit').addClass('uk-hidden');
    $('.loading').removeClass('uk-hidden');
    $error = 0;
    if($('#fullname').val() === '') {
        $('#fullname').addClass('form-error');
        $('#fullname').attr("placeholder", "Please enter full name");
        $error = 1;
    }
    if($('#organisation').val() === '') {
        $('#organisation').addClass('form-error');
        $('#organisation').attr("placeholder", "Please enter an organisation name");
        $error = 1;
    }
    if($('#email').val() === '') {
        $('#email').addClass('form-error');
        $('#email').attr("placeholder", "Please enter email address");
        $error = 1;
    }
    if($('#country').val() === '') {
        $('#country').addClass('form-error');
        $('#country').attr("placeholder", "Select country");
        $error = 1;
    }
    if($('#mobile').val() === '') {
        $('#mobile').addClass('form-error');
        $('#mobile').attr("placeholder", "Please enter phone number");
        $error = 1;
    }
    if($('#service').val() === '') {
        $('#service').addClass('form-error');
        $('#service').attr("placeholder", "Please select a service");
        $error = 1;
    }
    if($('#source').val() === '') {
        $('#source').addClass('form-error');
        $('#source').attr("placeholder", "Please select a source");
        $error = 1;
    }
    if($('#captcha').val() === '') {
        $('#captcha').addClass('form-error');
        $('#captcha').attr("placeholder", "Please enter a captcha");
        $error = 1;
    }
    if($('#captcha').val() != $('#captcha_answer').val()) {
        $('#captcha').addClass('form-error');
        $('#captcha').val('');
        captcha();
        $('#captcha').attr("placeholder", "Incorrect captcha");
        $error = 1;
    }
    if($error === 0) {
        e.currentTarget.submit();
        fetch(e.currentTarget.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            UIkit.notification({
                message: "<h3 class='uk-text-success'><span uk-icon='icon: check; ratio: 2;'></span> Form successfully submitted. Find information in Downloads!</h3>",
                status: 'primary',
                pos: 'bottom-center',
                timeout: 10000
            });
            setTimeout(function () { location.reload(1); }, 10500);
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    } else {
        $('#form-submit').removeClass('uk-hidden');
        $('.loading').addClass('uk-hidden');
    }
    
});
</script>