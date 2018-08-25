<div class="cst row">
    <div class="col col-2">
        <h1 class="cst">Start with any budget</h1>
        <div class="cst-text-cell">
            <h3>Flexible budgeting </h3>
            <p>
                You don't need to spend plenty of money to advertise in Infoob.  
                It doesn't matter what is your current budget is, 
                you can always start with whatever you have got right now. 
                You can use our price calculator below to determine exactly how much you should spend to advertising in Infoob.            
            </p>
        </div>
        <div class="cst-text-cell">
            <h3>Simple payment options </h3>
            <p>
                There are plenty of payment options you can select depending your preference and your payment is fully secured with our partner, Avangate.            
            </p>
        </div>
        <div>
            <a href="../advertise.php" class="button primary-btn">Start Now!</a> 
            <span id="discount-text">40% Off Now! *</span>  
            <div class="contact-us">[<a href="./index.php?page=contact-us" title="Click to contact us">contact us</a> any time]</div> 
            <div id="discount-text-description">* Limited offer</div>            
        </div>
    </div>
    <div class="col col-2">
        <div id="cst-cal-wrapper">   <!-- Temp Wrapper-->
            <div>
                <div class="labels">Advertisements' Type</div>
                <div id="cst-cal-ad-type-wrapper">
                    <div>
                        <label>
                            <input id="rdo-ad-type" type="radio" name="rdo-ad-type" value="infoob-only" checked=""/>
                            Advertising with Infoob 
                        </label>
                        <p>
                            Ads can appear through Infoob's advertising network
                            (Home and related search network, related display network such as related blogs and Infoob sites)                         
                        </p>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="rdo-ad-type" value="infoob-and-google"/>
                            Advertising with Infoob + Google 
                        </label>
                        <p>
                            Ads can appear through Infoob's advertising network (1st option) and Google related advertising networks
                            (Google search sites and over million of sites and apps that are partners with Google) 
                        </p>                        
                    </div>                    
                </div>
            </div>
            <div>
                <div class="labels">Time Period</div>
                <div>
                    <select id="slcTimePeriod">
                        <option value="1" selected="">1 Month</option>
                        <option value="2">2 Months</option>
                        <option value="3">3 Months</option>
                        <option value="4">4 Months</option>
                        <option value="5">5 Months</option>
                        <option value="6">6 Months</option>
                        <option value="7">7 Months</option>
                        <option value="8">8 Months</option>
                        <option value="9">9 Months</option>
                        <option value="10">10 Months</option>
                        <option value="11">11 Months</option>
                        <option value="12">12 Months</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="labels">Number of Ads</div>
                <div>
                    <select id="slcAdsCount">
                        <option value="1" selected="">1 Advertisement</option>
                        <option value="2">2 Advertisements</option>
                        <option value="3">3 Advertisements</option>
                        <option value="4">4 Advertisements</option>
                        <option value="5">5 Advertisements</option>
                    </select>
                </div>                
            </div>
            <div id="cst-cal-output">
                Total Cost: 
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    function calculateCost(){
       
        var cost = (($("#rdo-ad-type").prop("checked"))?20:50) * $("#slcTimePeriod").val() * $("#slcAdsCount").val();
        $("#cst-cal-output").html("Total Cost: USD $" + cost);
        
    }
    
    $(document).ready(function(){
       calculateCost(); 
       $("input,select").change(calculateCost);
    });
    
</script>

