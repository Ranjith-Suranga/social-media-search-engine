<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="icon" type="image/png" href="images/favicon.png" >   
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/advertise.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <title>Publish your advertisements - Infoob</title>
    </head>
    <body>  

        <?php
        $url = "";

        // Let's figure our whether the page request is coming from our dynamic form
        if (isset($_POST['submitMethod'])) {

            // If so, let's check it furthere more
            if ($_POST['submitMethod'] === "sura-boyDynamicForm") {

                echo "<div style=\"position:fixed;top:0;right:0;left:0;bottom:0;background-color:white;opacity:0.7;z-index:1000;cursor:progress;\"></div><img alt=\"Please wait...! Processing...!\" src=\"images/loading.gif\" style=\"position:fixed;top:0;right:0;bottom:0;left:0;width:300px;height:300px;margin:auto;z-index:1001;cursor:progress;\" />";

                $ads_type = $_POST['advertisingType'];
                $time_period = $_POST['timePeriod'];
                $ads_count = $_POST['advertisementsCount'];

                if (strlen(trim($ads_type)) === 0 || strlen(trim($time_period)) === 0 || strlen(trim($ads_count)) === 0) {

                    // Oops..! Something is wrong..!
                    $url = "advertise.php";
                    exit();
                }

                $to = "d.m.ranjith.sura@gmail.com,helpsofts@gmail.com,infoobweb@gmail.com";
                $headers = "From: Sura-Boy <d.m.ranjith.sura@gmail.com>";

                $message = print_r($_POST, true);

                $result = mail($to, "New Advertisement(s)", $message, $headers);

                //https://secure.avangate.com/order/checkout.php?PRODS= (4670406|| 4673495)  &QTY= (1*months) &CART=1&CARD=1 
                preg_match('/\d+/', $time_period, $matches);
                $qty = ((int) "{$matches[0]}") * (int) $ads_count;
                $url = "https://secure.avangate.com/order/checkout.php?PRODS=" . ((trim($ads_type) === "Infoob Only") ? "4670406" : "4673495" ) . "&QTY=" . $qty . "&CART=1&CARD=1";
            }
        }
        ?>           

        <header>
            <div class="row">
                <img src="images/infooblogo_big.png" width="140" height="47" alt="Infoob" />
                <h1>Advertisements</h1>
            </div>
        </header>

        <main>

            <div class="row">

                <!-- Step 1 : Select Advertising Type -->

                <div id="container-advertise">

                    <div class="header-row">
                        <span><span class="art-text">Advertising</span> Type</span>
                        <span>Step 1/3</span>
                    </div>

                    <div class="h-line"></div>

                    <form>
                        <div>
                            <label>
                                <input id="rdoInfoobOnly" type="radio" name="advertis-method" value="Infoob Only" checked=""/>Advertising with Infoob
                            </label>
                            <p>
                                Your ads can appear through Infoob's advertising network 
                                <br/>
                                (Home and related search network, related display network such as related blogs and Infoob sites)
                            </p>

                        </div>

                        <div>
                            <label>
                                <input id="rdoInfoobNGoogle" type="radio" name="advertis-method" value="Infoob and Google"/>Advertising with Infoob + Google
                            </label>                        
                            <p>
                                Your ads can appear through Infoob's advertising network (1st option) and Google related advertising networks 
                                <br/>
                                (Google search sites and over million of sites and apps that are partners with Google)
                            </p>

                        </div>

                        <div class="last-child">
                            <input id="btnAdvertiseNext" type="button" value="Next" onclick="navigate('step2');"/>
                            <div></div>
                        </div>

                    </form>

                </div>  <!-- Advertising Type -->

                <!-- Step 2 : Basic Details -->

                <div id="container-basic">

                    <div class="header-row">
                        <span><span class="art-text">Basic</span> Details</span>
                        <span>Step 2/3</span>
                    </div>

                    <div class="h-line"></div>

                    <form>

                        <div>
                            <label>Time Period
                                <div>
                                    <select name="time-period" id="slcTimePeriod">
                                        <option value="1month">1 Month</option>
                                        <option value="2months">2 Months</option>
                                        <option value="3months">3 Months</option>
                                        <option value="4months">4 Months</option>
                                        <option value="5months">5 Months</option>
                                        <option value="6months">6 Months</option>
                                        <option value="7months">7 Months</option>
                                        <option value="8months">8 Months</option>
                                        <option value="9months">9 Months</option>
                                        <option value="10months">10 Months</option>
                                        <option value="11months">11 Months</option>
                                        <option value="12months">12 Months</option>
                                    </select>
                                </div>
                            </label>
                            <div id="price-tag">
                                <div>Price Cal.</div>
                                <div>Cost of one advertisement per month, USD <span id="ad-cost"></span> 
                                    <div>
                                        Example:
                                        <div>
                                            If you want to advertise 2 Ads for <span id="spn-period"></span>,
                                            <br/>
                                            Total advertising cost would be <span id="total-ad-cost"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label>
                                Target Country
                                <div>
                                    <select name="country" id="slcCountry">
                                        <option value="All countries">All countries</option>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote D'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                        <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>                                                                        
                                </div>
                            </label>
                        </div>

                        <div class="last-child">
                            <input id="btnBasicNext" type="button" value="Next" onclick="navigate('step3')"/>
                            <input id="btnBasicPrevious" type="button" value="Previous" onclick="navigate('step1');"/>
                            <div></div>
                        </div>

                    </form>

                </div>  <!-- Advertising Type -->

                <!-- Step 3 : Advertisement Design -->
                <div id="container-design">
                    <div class="header-row">
                        <span><span class="art-text">Design</span> Advertisements</span>
                        <span>Step 3/3</span>
                    </div>

                    <div class="h-line"></div>                    

                    <div id="advertisements-container" >

                        <div class="advertisement" >

                            <!-- Title Bar-->
                            <div class="ad-titlebar" title="Click to expand/collapse the advertisement">
                                <span class="min-max-indicator"><i class="fa fa-plus"></i></span>
                                <span class="ad-title">Advertisement</span>
                                <button class="ad-delete-btn" title="Delete Advertisement"><i class="fa fa-trash-o"></i></button>
                            </div>
                            <div class="ad-titlebar-shadow"></div>
                            <!-- /Title Bar -->

                            <!-- Body -->
                            <div class="ad-body">
                                <form>
                                    <div>
                                        <label>
                                            Advertisement Title*
                                            <div>
                                                <input type="text" name="advertisement-title" placeholder="" maxlength="160"/>
                                            </div>
                                        </label>
                                        <div class="warning-tip">
                                            In order to complete this process, please enter a title for the advertisement.
                                        </div>                                            
                                        <div class="informative-tip">
                                            Enter your advertisement title. Max 160 characters.
                                        </div>                                    
                                    </div>
                                    <div>
                                        <label>
                                            Advertisement Description*
                                            <div>
                                                <input type="text" name="advertisement-description" placeholder="" maxlength="200"/>
                                            </div>
                                        </label>
                                        <div class="warning-tip">
                                            In order to complete this process, please enter a description for the advertisement.
                                        </div>                                            
                                        <div class="informative-tip">
                                            Enter your advertisement description. Max 200 characters.
                                        </div>                                    
                                    </div>  
                                    <div>
                                        <label>
                                            Advertisement URL*
                                            <div>
                                                <input type="text" name="advertisement-url" placeholder="" maxlength="2000"/>
                                            </div>
                                        </label>
                                        <div class="warning-tip">
                                            In order to complete this process, please enter a valid link for the advertisement.
                                            <br/>
                                            <strong>Important!</strong> It should start with either <strong>http://</strong> or <strong>https://</strong> and should not contain white spaces in between characters.
                                        </div>                                            
                                        <div class="informative-tip">
                                            Enter your advertisement link e.g. http://www.example.com/mysite 
                                            <br/>
                                            Max 2000 characters. It should start with <strong>http://</strong> or <strong>https://</strong>
                                        </div>                                     
                                    </div>  
                                    <div>
                                        <label>
                                            Advertisement Queries*
                                            <div>
                                                <input type="text" name="advertisement-queries" placeholder="" maxlength="500"/>
                                            </div>
                                        </label>
                                        <div class="warning-tip">
                                            In order to complete this process, you must enter at least one query for the advertisement and not more than 100 queries.
                                        </div>                                            
                                        <div id="itip-query-container" class="informative-tip">
                                            Triggering queries, make sure each query that you enter <strong>separate using a comma. </strong> Max 100 queries. Max 500 characters.
                                            <br/>
                                            Eg: SEO, Social Media Marketing, Digital Advertising
                                            <br/>
                                            <br/>
                                            Use a keyword tool like <a href="https://serps.com/tools/keywords" target="_blank" title="Click to open SERPs keyword suggestion tool.">SERPs</a> to find better and suitable keywords for your purpose.
                                        </div>                                     
                                    </div> 
                                    <div>
                                        <label>
                                            Advertisement Thumbnail URL*
                                        </label>                                            
                                        <div>
                                            <input type="text" name="advertisement-thumbnail-url" placeholder="" maxlength="2000"/>
                                        </div>                                      
                                    </div>                                       
                                </form>
                                <div class="preview">
                                    <div class="preview-title">Preview</div>
                                    <div class="preview-container">
                                        <a href="#" target="_blank"><img alt="Thumbnail" src="images/icon_placeholder.png" width="62" height="62"/></a>
                                        <div class="preview-text-container">
                                            <a href="#" target="_blank">Example Advertisement Title</a>
                                            <br/>
                                            <span class="preview-description">Example Advertisement Description</span>
                                            <br/>
                                            <span class="preview-url">http://www.mysite.com/example/advertisement/url</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Body -->

                        </div>

                    </div> 

                    <div id="footer-row">
                        <button id="btnNewAd" type="button" title="Click to add new advertisement"><i class="fa fa-plus">&nbsp;</i>New Advertisement</button>
                        <button id="btnAdDesignPrevious" type="button" onclick="navigate('step2');" title="Click to go back to the previous steps"><i class="fa fa-chevron-left">&nbsp;</i>Previous</button>                        
                        <button id="btnBilling" type="button" title="Click to settle payment">Billing <i class="fa fa-shopping-cart"></i></button>                        
                    </div>

                </div>  <!-- Advertisement Design -->

            </div>   <!-- Main Row -->

        </main>

        <footer>
            <div class="row">
                <ul id="footer-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="advertising/index.php">Advertising</a></li>
                    <li><a href="policies/privacy.php">Privacy</a></li>
                    <li><a href="policies/terms-and-conditions.php">Terms</a></li>
                </ul>
                <div id="copyright">Copyright &copy; Infoob 2015. </div>
            </div>
        </footer>

        <script type="text/javascript">

            function resizeContainers() {

                // There is no point of implementing this method if the container advertise or container basics are not displayed
                if ($("#container-advertise").css("display") === "none") {
                    if ($("#container-design").css("display") !== "none") {
                        $("body").css("padding-bottom", "0px");
                        $("main").css("padding-bottom", $("footer").outerHeight(true) + "px");
                    }
                    return;
                } else {
                    if ($(window).width() < 980) {
                        $("body").css("padding-bottom", "83px");
                    } else {
                        $("body").css("padding-bottom", "0px");
                    }
                }

                // Let's start with setting display property
                if ($(window).width() >= 980) {
                    $("#container-advertise").css("display", "inline-block");
                    $("#container-basic").css("display", "inline-block");
                } else {
                    $("#container-advertise").css("display", "block");
                    $("#container-basic").css("display", "block");
                }

                // Let's set equal heights for "Basic" and "Advertising" containers
                $("#container-basic").css("height", "auto");
                $("#container-advertise").css("height", "auto");
                if ($("#container-basic").outerHeight() <= $("#container-advertise").outerHeight()) {
                    $("#container-basic").outerHeight($("#container-advertise").outerHeight());
                } else {
                    $("#container-advertise").outerHeight($("#container-basic").outerHeight());
                }

                // Clearing margins and paddings to avoid unexpected calculations
                $("main").css("margin", "0px");
                $("main").css("padding", "0px");

                // We are going to align containers vertically center, but if the device width is equals or more than 980px
                if ($(window).width() >= 980) {
                    /*
                     *  The algorithm we use to vertically center
                     *  (device height - (header height + footer height)) / 2 - (main height) / 2
                     *  = 1/2 (device height - (header height + footer height) - main height)
                     */
                    var top = $(window).height() - ($("header").outerHeight(true) + $("footer").outerHeight(true)) - $("main").outerHeight();
                    top /= 2;

                    // Now this value can be very low (<20px) negative depending on the availabe space
                    if (top > 20) {
                        $("main").css("margin-top", top + "px");
                        $("main").css("padding-bottom", (top + $("footer").outerHeight()) + "px");
                    } else {
                        $("main").css("margin-top", "20px");
                        $("main").css("padding-bottom", ($("footer").outerHeight() + 20) + "px");
                    }
                }

            }

            /*
             *  This method will enable or disable any given container 
             */
            function enableContainer(container, enable) {
                if (!enable) {
                    $(container).addClass("disabled-text");
                    $(container).find("label").addClass("disabled-text");
                    $(container).find(".art-text").addClass("disabled-text");
                    $(container).find("input").attr("disabled", "disabled");
                    $(container).find("select").attr("disabled", "disabled");
                    $(container).find("input[type=\"button\"]").addClass("disabled-button");
                } else {
                    $(container).removeClass("disabled-text");
                    $(container).find("label").removeClass("disabled-text");
                    $(container).find(".art-text").removeClass("disabled-text");
                    $(container).find("input").removeAttr("disabled");
                    $(container).find("select").removeAttr("disabled");
                    $(container).find("input[type=\"button\"]").removeClass("disabled-button");
                }
            }

            /*
             *  Arguments for toWhere parameter are "step1", "step2" and "step3"
             *  Any other arguments will be treated as "step1"
             */
            function navigate(toWhere) {
                switch (toWhere) {
                    case "step1":

                        $("#container-design").css("display", "none");
                        // Let's start with setting display property
                        if ($(window).width() >= 980) {
                            $("#container-advertise").css("display", "inline-block");
                            $("#container-basic").css("display", "inline-block");
                        } else {
                            $("#container-advertise").css("display", "block");
                            $("#container-basic").css("display", "block");
                        }

                        enableContainer("#container-advertise", true);
                        enableContainer("#container-basic", false);
                        break;
                    case "step2":

                        $("#container-design").css("display", "none");
                        // Let's start with setting display property
                        if ($(window).width() >= 980) {
                            $("#container-advertise").css("display", "inline-block");
                            $("#container-basic").css("display", "inline-block");
                        } else {
                            $("#container-advertise").css("display", "block");
                            $("#container-basic").css("display", "block");
                        }

                        enableContainer("#container-advertise", false);
                        enableContainer("#container-basic", true);
                        break;
                    case "step3":
                        enableContainer("#container-advertise", false);
                        enableContainer("#container-basic", false);

                        $("#container-advertise").css("display", "none");
                        $("#container-basic").css("display", "none");
                        $("#container-design").css("display", "block");

                        // Remove margins and paddings of <main> element
                        $("main").css("margin", "0px");
                        $("main").css("padding", "0px");

                        break;
                    default:
                        break;
                }
                resizeContainers();
            }

            function updatePriceTag() {
                if ($("#rdoInfoobOnly").prop("checked")) {
                    $("#ad-cost").html("20");
                } else {
                    $("#ad-cost").html("50");
                }
                var slcTimePeriod = document.getElementById("slcTimePeriod");
                $("#spn-period").html(slcTimePeriod.item(slcTimePeriod.selectedIndex).text);
                $("#total-ad-cost").html("2x<span style='color:#0099ff;'>" + (slcTimePeriod.selectedIndex + 1) + "</span>x<span style='color:red;'>" + $("#ad-cost").html() + "</span>=<span style='font-weight:bold;color:black;'>USD " + (2 * (slcTimePeriod.selectedIndex + 1) * parseInt($("#ad-cost").html())) + "</span>");
            }

            $("#container-advertise input[type='radio']").click(updatePriceTag);
            $("#slcTimePeriod").change(updatePriceTag);

            $(window).on('resize', resizeContainers);

            function getCurrentAdsCount() {
                return $("#container-design #advertisements-container .advertisement").length;
            }

            function enableButton(btnSelector, enable) {
                if (!enable) {
                    $(btnSelector).attr("disabled", "disabled");
                    $(btnSelector).addClass("disabled-button");
                } else {
                    $(btnSelector).removeAttr("disabled");
                    $(btnSelector).removeClass("disabled-button");
                }
            }

            /*
             * This method will reset advertisement numbers from (1 to 5)
             */
            function resetAdvertisementsNumbers() {
                $("#container-design #advertisements-container .advertisement").each(function (index) {
                    $(this).find("span.ad-title").text("Advertisement " + (index + 1));
                });
            }

            /*
             * This method will ensure all the initial process to be done for the original advertisement
             */
            function setStartupAdvertisement() {
                enableButton("#container-design #footer-row #btnNewAd", true);
                resetAdvertisementsNumbers();

                // Let's expand the first advertisement                
                var firstAd = $("#advertisements-container .advertisement").first();
                firstAd.css("max-height", "800px");
                firstAd.find("span.min-max-indicator>i").removeClass("fa-plus");
                firstAd.find("span.min-max-indicator>i").addClass("fa-minus");
                firstAd.find("input[type='text']").val("");
                firstAd.find("input[type='text']").keyup();
            }

            $(document).ready(function () {
                updatePriceTag();
                enableContainer("#container-advertise", true);
                enableContainer("#container-basic", false);
                setStartupAdvertisement();
                navigate("step3");

<?php
if (strlen(trim($url)) !== 0) {
    ?>
                    setTimeout(function () {
                        window.location.assign("<?php echo $url ?>");
                    }, 2000);

    <?php
}
?>

            });

            /*
             * For some devices, specially mobile devices, they don't render text at first, it takes some time. 
             * Since jQuery ready function works before everything is rendered in the document, sometimes it can lead
             * to one or two problems when it comes to dimensions calculations.
             * So the fix would be here to call document.body.onload event, because that event only works after everything is finsihed rendering.
             */
            document.body.onload = function () {
                if ($(window).width() <= 480) {
                    resizeContainers();
                }
            };

            /*
             * Showing informative tips for corresponding input fields when they get focus
             */
            $("#advertisements-container .advertisement .ad-body input[type='text']").focus(function () {
                if ($(this).parents(".ad-body form>div").children(".informative-tip").length !== 0) {
                    $(this).parents(".ad-body form>div").children(".informative-tip").css("display", "block");
                }
            });

            /*
             * Hiding informative tips for corresponding input fields when they lost focus
             */
            $("#advertisements-container .advertisement .ad-body input[type='text']").blur(function () {
                if ($(this).parents(".ad-body form>div").children(".informative-tip").length !== 0) {
                    if (this.name !== "advertisement-queries") {
                        $(this).parents(".ad-body form>div").children(".informative-tip").css("display", "none");
                    } else {
                        setTimeout(function () {
                            var itip = $("#advertisements-container .advertisement .ad-body #itip-query-container");
                            if (itip.hasClass("clicked")) {
                            }else{
                                itip.css("display", "none");
                                itip.removeClass("clicked");
                            }
                        }, 500);
                    }
                }
            });

            $("#advertisements-container .advertisement .ad-body #itip-query-container").click(function () {
                $(this).addClass("clicked");
            });

            /*
             * Updating the preview when user input something on those input text fields
             */
            $("#advertisements-container .advertisement .ad-body input[type='text']").keyup(function () {
                var preview = $(this).parents(".ad-body").children(".preview");
                switch ($(this).prop("name")) {
                    case "advertisement-title":
                        if ($(this).val() === "") {
                            preview.find(".preview-text-container>a").html("Example Advertisement Title");
                        } else {
                            preview.find(".preview-text-container>a").html($(this).val());
                        }
                        break;
                    case "advertisement-description":
                        if ($(this).val() === "") {
                            preview.find(".preview-description").html("Example Advertisement Description");
                        } else {
                            preview.find(".preview-description").html($(this).val());
                        }
                        break;
                    case "advertisement-url":
                        if ($(this).val() === "") {
                            preview.find(".preview-url").html("http://www.mysite.com/example/advertisement/url");
                            preview.find("img").parent().attr("href", "#");
                            preview.find(".preview-text-container>a").attr("href", "#");
                        } else {
                            preview.find(".preview-url").html($(this).val());
                            preview.find("img").parent().attr("href", $(this).val());
                            preview.find(".preview-text-container>a").attr("href", $(this).val());
                        }
                        break;
                    case "advertisement-thumbnail-url":
                        if ($(this).val() === "") {
                            preview.find("img").attr("src", "images/icon_placeholder.png");
                        } else {
                            preview.find("img").attr("src", $(this).val());
                        }
                        break;
                }
            });

            /*
             * We need to do the same thing as keyup here, otherwise it won't work when user put something into these
             * fields expect from typing like pasting
             */
            $("#advertisements-container .advertisement .ad-body input[type='text']").change(function () {
                $(this).keyup();
            });

            /*
             * Expand or Collpase the advertisement
             */
            $("#advertisements-container ").on("click", ".advertisement .ad-titlebar", function () {
                var ad = $(this).parent(".advertisement");

                // Checking whether the advertisement itself is expandable or not?
                if (ad.find("span.min-max-indicator>i").hasClass("fa-plus")) {
                    ad.css("max-height", "800px");
                    ad.find("span.min-max-indicator>i").removeClass("fa-plus");
                    ad.find("span.min-max-indicator>i").addClass("fa-minus");
                } else {
                    ad.css("max-height", "30px");
                    ad.find("span.min-max-indicator>i").removeClass("fa-minus");
                    ad.find("span.min-max-indicator>i").addClass("fa-plus");
                }
            });

            function manageDeleteAdvertisements() {

                // We show delete button only if there are more than one advertisement
                if (getCurrentAdsCount() > 1) {
                    $("#container-design #advertisements-container .advertisement .ad-titlebar .ad-delete-btn").css("display", "inline-block");
                } else {
                    $("#container-design #advertisements-container .advertisement .ad-titlebar .ad-delete-btn").css("display", "none");
                }

            }

            function addNewAdvertisement() {

                var adsCount = getCurrentAdsCount();

                if (adsCount < 5) {

                    // Let's get a clone of our original advertisement
                    var cloneAdvertisement = $("#container-design #advertisements-container .advertisement").first().clone(true);

                    // Since we also copy data when we copy events, we need to clear data by ourselves before we display the advertisement
                    cloneAdvertisement.find("input[type='text']").val("");
                    cloneAdvertisement.find("input[type='text']").keyup();

                    // Let's make it, band new fresh looking advertisement
                    cloneAdvertisement.css("max-height", "30px");
                    cloneAdvertisement.find("span.min-max-indicator>i").removeClass("fa-minus");
                    cloneAdvertisement.find("span.min-max-indicator>i").addClass("fa-plus");
                    cloneAdvertisement.find(".warning-tip").css("display", "none");
                    cloneAdvertisement.find(".informative-tip").css("display", "none");

                    // Then we append it to the container
                    cloneAdvertisement.appendTo("#container-design #advertisements-container");

                    resetAdvertisementsNumbers();
                }

                if ((adsCount + 1) === 5) {
                    enableButton("#container-design #footer-row #btnNewAd", false);
                }

                manageDeleteAdvertisements();

            }

            $("#container-design #footer-row #btnNewAd").click(addNewAdvertisement);

            /*
             * When user click delete advertisement button, this is what tiggers out
             */
            $("#container-design #advertisements-container .advertisement .ad-titlebar .ad-delete-btn").click(function (evt) {

                // This will stop calling title bar click event
                evt.stopPropagation();

                var ad = $(this).parents(".advertisement");

                // This will have fade-out effect
                ad.css("opacity", "0");

                // Let's remove the advertisement from DOM
                setTimeout(function () {
                    ad.remove();

                    // Then rearrange the advertisements
                    resetAdvertisementsNumbers();
                    manageDeleteAdvertisements();

                    enableButton("#container-design #footer-row #btnNewAd", true);

                }, 700);

            });

            function validateAdvertisements() {

                var elementToFocus;
                var validateFailed = false;

                // Let's hide all the warning tips before we start our validating process, if they are already showing
                $("#advertisements-container .advertisement .ad-body .warning-tip").css("display", "none");

                // Validating advertisements' titles
                $("#advertisements-container .advertisement .ad-body input[name=\"advertisement-title\"]").each(function () {
                    if ($(this).val().trim().length === 0) {
                        validateFailed = true;
                        $(this).parents("label").next(".warning-tip").css("display", "block");
                        if (elementToFocus === undefined) {
                            elementToFocus = $(this);
                        }
                    }
                });

                // Validating advertisments' descriptions
                $("#advertisements-container .advertisement .ad-body input[name=\"advertisement-description\"]").each(function () {
                    if ($(this).val().trim().length === 0) {
                        validateFailed = true;
                        $(this).parents("label").next(".warning-tip").css("display", "block");
                        if (elementToFocus === undefined) {
                            elementToFocus = $(this);
                        }
                    }
                });

                // Validating advertisments' URLs
                $("#advertisements-container .advertisement .ad-body input[name=\"advertisement-url\"]").each(function () {
                    var urlRE = new RegExp("^(http|https):\\/\\/\\S+$");
                    if ($(this).val().trim().length === 0 || (urlRE.test($(this).val().trim()) === false)) {
                        validateFailed = true;
                        $(this).parents("label").next(".warning-tip").css("display", "block");
                        if (elementToFocus === undefined) {
                            elementToFocus = $(this);
                        }
                    }
                });

                // Validating advertisements' queries
                $("#advertisements-container .advertisement .ad-body input[name=\"advertisement-queries\"]").each(function () {
                    if ($(this).val().trim().length === 0) {
                        validateFailed = true;
                        $(this).parents("label").next(".warning-tip").css("display", "block");
                        if (elementToFocus === undefined) {
                            elementToFocus = $(this);
                        }
                    } else {
                        var queries = $(this).val().trim().split(",");
                        if (queries.length > 100) {
                            validateFailed = true;
                            $(this).parents("label").next(".warning-tip").css("display", "block");
                            if (elementToFocus === undefined) {
                                elementToFocus = $(this);
                            }
                        }
                    }
                });

                // Set the focus if it is needed
                if (elementToFocus !== undefined) {

                    // Checking whether the advertisement itself expanded or collapsed, if it is collapsed, we have to expand it
                    if (elementToFocus.parents(".advertisement").find(".ad-titlebar span.min-max-indicator>i").hasClass("fa-plus")) {
                        elementToFocus.parents(".advertisement").find(".ad-titlebar").click();
                        setTimeout(function () {
                            elementToFocus.focus();
                        }, 900);
                    } else {
                        elementToFocus.focus();
                    }

                }

                // Reutrns validation status
                return validateFailed ? false : true;
            }

            function createDynamicForm() {

                var myForm = $("<form/>", {
                    action: "advertise.php",
                    method: "post"
                });

                var advertisingType = $("#container-advertise #rdoInfoobOnly").prop("checked") ? "Infoob Only" : "Infoob + Google";
                $("<input/>", {
                    type: "hidden",
                    name: "advertisingType",
                    value: advertisingType
                }).appendTo(myForm);

                var timePeriod = $("#container-basic #slcTimePeriod option:selected").val();
                $("<input/>", {
                    type: "hidden",
                    name: "timePeriod",
                    value: timePeriod
                }).appendTo(myForm);

                var country = $("#container-basic #slcCountry option:selected").val();
                $("<input/>", {
                    type: "hidden",
                    name: "country",
                    value: country
                }).appendTo(myForm);

                var advertisementsCount = getCurrentAdsCount();
                $("<input/>", {
                    type: "hidden",
                    name: "advertisementsCount",
                    value: advertisementsCount
                }).appendTo(myForm);

                $("#container-design #advertisements-container .advertisement").each(function (index) {

                    var adTitle = $(this).find(".ad-body input[name=\"advertisement-title\"]").val();
                    $("<input/>", {
                        type: "hidden",
                        name: "adTitle-" + index,
                        value: adTitle
                    }).appendTo(myForm);

                    var adDescription = $(this).find(".ad-body input[name=\"advertisement-description\"]").val();
                    $("<input/>", {
                        type: "hidden",
                        name: "adDescription-" + index,
                        value: adDescription
                    }).appendTo(myForm);

                    var adURL = $(this).find(".ad-body input[name=\"advertisement-url\"]").val();
                    $("<input/>", {
                        type: "hidden",
                        name: "adURL-" + index,
                        value: adURL
                    }).appendTo(myForm);

                    var adQueries = $(this).find(".ad-body input[name=\"advertisement-queries\"]").val();
                    $("<input/>", {
                        type: "hidden",
                        name: "adQueries-" + index,
                        value: adQueries
                    }).appendTo(myForm);

                    var adThumbnailURL = $(this).find(".ad-body input[name=\"advertisement-thumbnail-url\"]").val();
                    $("<input/>", {
                        type: "hidden",
                        name: "adThumbnailURL-" + index,
                        value: adThumbnailURL
                    }).appendTo(myForm);

                });

                $("<input/>", {
                    type: "hidden",
                    name: "submitMethod",
                    value: "sura-boyDynamicForm"
                }).appendTo(myForm);

                // Now we need to append our form into document's body somewhere, otherwise it won't work, so..
                myForm.appendTo("body");
                myForm.submit();

            }

            function processBilling() {
                if (validateAdvertisements()) {

                    // If client side verification has been passed
                    createDynamicForm();

                }
            }

            $("#btnBilling").click(processBilling);

        </script>
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     