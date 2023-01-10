
<?php $this->load->view('frontend/partial/header')?>
        <div class="main-container col2-left-layout">
            <div class="main">
                                                                <div class="col-main">
 
    <div class="form-list">
        <form name="track_order" id="track_order" action="#" method="post" onsubmit="sendAjax('track_order','track/index.html'); return false;">  
        <div class="fieldset"> 
		
<p align="left" class="">

	<p align="left">Order tracking information may not appear in the tracking system until shipment. Please wait 24 hours after receiving your shipping confirmation email/SMS to track your shipment. Questions about your order?<a href="../../contact-mybookshop.html"> <strong> Contact us </strong> </a></p>
	 
         <h2 class="legend">Track Your Order </h2>  
            <ul class="form-list">
                <li>
                    <label for="order_id" class="required"><em>*</em>Order Id</label>
                    <div class="input-box">
                        <input type="text" name="order_id" id="order_id" value="" title="" class="input-text required-entry" />
                    </div>    
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>Email Address</label>
                    <div class="input-box" >
                        <input type="text" name="email" id="email_address" autocapitalize="off" value="" title="Email Address" class="input-text validate-email required-entry" />
                    </div>    
                </li>
            </ul>
            <div class="buttons-set">
                <button type="submit" class="button" title="Track Order" name="track" id="track"><span><span>Track Order</span></span></button>
            </div>

        </form>
    </div>
        <div id="loading" class="loading" style="display:none">
            <div id="loading-track" >
                <p class="loader" id="loading_track_loader"><img src="../../skin/frontend/base/default/ordertracking/images/ajax-loader-tr.gif" alt="Loading..."/><br/>Please wait...</p>
            </div>
        </div>
    </div> 



    <div id="oderinfo" class="order-info-message"></div>



    <script type="text/javascript">
        var validateForm = new VarienForm('track_order', true);
    </script>           
    <script type="text/javascript">

        function sendAjax(frmId,url){
            if (!validateForm.validator.validate()) {
                return;
            }
            var data = $(frmId).serialize(this);
            $("loading").show();
            new Ajax.Updater(
                {
                    success:"oderinfo"
                }, 
                url,
                {
                    asynchronous:true,
                    evalScripts:false,
                    onComplete:function(request, json){
                        $("loading").hide();
                        return false;
                    }, 
                    onLoading:function(request, json){},
                    parameters:data
                }
            ); 
            return false;
        }

    </script>
     
                </div>
                <div class="col-left sidebar"><div class="block block-blog">
    <div class="block-title">
        <strong><span>Blog</span></strong>
    </div>
    <div class="block-content">
                    <div class="menu-recent">
                <h5>Recent Posts</h5>
                <ul>
                                            <li><a href="" >Blog Article-1</a></li>
                                            <li><a href="" >Blog Article-2</a></li>
                                    </ul>
            </div>
        
                    <div class="menu-categories">
                <h5>Categories</h5>
                <ul>
                                                                <li><a href="" >Blogs</a></li>
                                    </ul>
            </div>
        
            </div>
</div></div>
            </div>
        </div>
                

        <?php $this->load->view('frontend/partial/footer') ?>      
    
<div id="location-selector-wrapper" style="display: none;">
<div id="location-selector-overlay"></div>
<div id="location-selector">
<script type="text/javascript">countryRegions = {"config":{"show_all_regions":true,"regions_required":["IN"]},"IN":{"485":{"code":"ANDRA","name":"Andra Pradesh"},"487":{"code":"ASSAM","name":"Assam"},"488":{"code":"BIHAR","name":"Bihar"},"489":{"code":"CHAND","name":"Chandigarh"},"490":{"code":"CHHAT","name":"Chhattisgarh"},"493":{"code":"DELHI","name":"Delhi"},"494":{"code":"GOA","name":"Goa"},"495":{"code":"GUJAR","name":"Gujarat"},"496":{"code":"HARYA","name":"Haryana"},"497":{"code":"HP","name":"Himachal Pradesh"},"498":{"code":"JK","name":"Jammu and Kashmir"},"499":{"code":"JHARK","name":"Jharkhand"},"500":{"code":"KARNA","name":"Karnataka"},"501":{"code":"KERAL","name":"Kerala"},"503":{"code":"MP","name":"Madya Pradesh"},"504":{"code":"MAHAR","name":"Maharashtra"},"509":{"code":"ORISS","name":"Orissa"},"511":{"code":"PUNJA","name":"Punjab"},"512":{"code":"RAJAS","name":"Rajasthan"},"514":{"code":"TAMIL","name":"Tamil Nadu"},"516":{"code":"UP","name":"Uttar Pradesh"},"518":{"code":"WB","name":"West Bengal"},"519":{"code":"AN","name":"Andaman & Nicobar"},"520":{"code":"AR","name":"Arunachal Pradesh"},"521":{"code":"DD","name":"Daman & Diu"},"524":{"code":"ML","name":"Meghalaya"},"525":{"code":"MZ","name":"Mizoram"},"526":{"code":"NL","name":"Nagaland"},"523":{"code":"PU","name":"Pondicherry"},"522":{"code":"TS","name":"Telangana"},"527":{"code":"TR","name":"Tripura"},"517":{"code":"UTTAR","name":"Uttarakhand"}}}</script>
<div class="group-select"><form id="shippingzone-form" method="post" action="https://mybookshop.co.in/myshop/deliveryzone/index/index/uenc/aHR0cHM6Ly9teWJvb2tzaG9wLmNvLmluL215c2hvcC9vcmRlcnRyYWNraW5nL2luZGV4Lw,,/">
    <h3 class="a-center">Please select your shipping location to start shopping</h3>
    <div class="col2-alt-set">
    	<div class="col-1 a-center">
    	    <span class="notice">Changing your shipping location may affect your shopping cart.</span>    	</div>
    	<div class="col-2 a-left input-box">
            <ul class="list">
                <li>
                    <div class="input-box">
                    <div style="width:200px; float:left" ><label style="width:200px;" for="shippingzone:country_id">Country</label></div>
                    <select name="shippingzone[country_id]" id="shippingzone:country_id" class="validate-select" title="Country" ><option value="" > </option><option value="IN" selected="selected" >India</option></select></div>
                </li>
                <li>
                    <div class="input-box">
                        <div style="width:200px; float:left" ><label>State/Province</label></div>
                        <select id="shippingzone:region_id" name="shippingzone[region_id]" title="State/Province" class="validate-select" style="display:none">
                            <option value="">Please select region, state or province</option>
                        </select>
                        <script type="text/javascript">
                            $('shippingzone:region_id').setAttribute('defaultValue',  "");
                        </script>
                        <input type="text" id="shippingzone:region" name="shippingzone[region]" value="" title="State/Province" class="input-text" style="display:none" />
                    </div>
                </li>
            </ul>
    	</div>
    </div>
    <div class="button-set buttons actions">
                <button class="block-poll button" onclick="$('location-selector-wrapper').hide(); return false;">
            <span class="span" style="/* background:none !important; color:#000; */">Cancel</span>
        </button> 
        <button class="button" type="submit">
            <span>Submit</span>
        </button>
    </div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	var shippingzoneRegionUpdater = new RegionUpdater('shippingzone:country_id', 'shippingzone:region', 'shippingzone:region_id', countryRegions);
	var shippingzoneForm = new VarienForm('shippingzone-form');
</script>    <div itemscope itemtype="http://schema.org/Organization">
        <meta itemprop="name" content="MyBookShop.co.in - Online School Books Store"/>        <meta itemprop="telephone" content="011 - 42750442, 9205412939"/>                <meta itemprop="email" content="info@mybookshop.co.in"/>                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <meta itemprop="addressCountry" content="India"/>                    <meta itemprop="addressLocality" content="E-119, Vishwakarma Colony"/>                    <meta itemprop="postalCode" content="110044"/>                                </div>
                <link itemprop="url" href="../../index.html"/>
        <meta itemprop="sameAs" content="https://www.facebook.com/mybookshop.co.in/"/><meta itemprop="sameAs" content="https://plus.google.com/+Mybookshopcoin"/><meta itemprop="sameAs" content="https://www.linkedin.com/company/mybookshop/"/>        <meta itemprop="logo" content="https://mybookshop.co.in/myshop/skin/frontend/rwd/mytheme/images/logo_mbs.png"/>

    </div>
</div>

</body>

<!-- Mirrored from mybookshop.co.in/myshop/ordertracking/index/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Dec 2022 17:34:47 GMT -->
</html>
