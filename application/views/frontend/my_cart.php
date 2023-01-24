<?php $this->load->view('frontend/partial/header')?>

        <div class="main-container col1-layout">
            <div class="main">
                                <div class="col-main">
                                        
<script type="text/javascript">
//<![CDATA[
enUS = {"m":{"wide":["January","February","March","April","May","June","July","August","September","October","November","December"],"abbr":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]}}; // en_US locale reference
Calendar._DN = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; // full day names
Calendar._SDN = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]; // short day names
Calendar._FD = 0; // First day of the week. "0" means display Sunday first, "1" means display Monday first, etc.
Calendar._MN = ["January","February","March","April","May","June","July","August","September","October","November","December"]; // full month names
Calendar._SMN = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; // short month names
Calendar._am = "AM"; // am/pm
Calendar._pm = "PM";

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = 'About the calendar';

Calendar._TT["ABOUT"] =
'DHTML Date/Time Selector\n' +
"(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
'For latest version visit: http://www.dynarch.com/projects/calendar/\n' +
'Distributed under GNU LGPL. See http://gnu.org/licenses/lgpl.html for details.' +
'\n\n' +
'Date selection:\n' +
'- Use the \xab, \xbb buttons to select year\n' +
'- Use the \u2039 buttons to select month\n' +
'- Hold mouse button on any of the above buttons for faster selection.';
Calendar._TT["ABOUT_TIME"] = '\n\n' +
'Time selection:\n' +
'- Click on any of the time parts to increase it\n' +
'- or Shift-click to decrease it\n' +
'- or click and drag for faster selection.';

Calendar._TT["PREV_YEAR"] = 'Prev. year (hold for menu)';
Calendar._TT["PREV_MONTH"] = 'Prev. month (hold for menu)';
Calendar._TT["GO_TODAY"] = 'Go Today';
Calendar._TT["NEXT_MONTH"] = 'Next month (hold for menu)';
Calendar._TT["NEXT_YEAR"] = 'Next year (hold for menu)';
Calendar._TT["SEL_DATE"] = 'Select date';
Calendar._TT["DRAG_TO_MOVE"] = 'Drag to move';
Calendar._TT["PART_TODAY"] = ' (' + "today" + ')';

// the following is to inform that "%s" is to be the first day of week
Calendar._TT["DAY_FIRST"] = 'Display %s first';

// This may be locale-dependent. It specifies the week-end days, as an array
// of comma-separated numbers. The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = 'Close';
Calendar._TT["TODAY"] = "today";
Calendar._TT["TIME_PART"] = '(Shift-)Click or drag to change value';

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%b %e, %Y";
Calendar._TT["TT_DATE_FORMAT"] = "%B %e, %Y";

Calendar._TT["WK"] = "Week";
Calendar._TT["TIME"] = 'Time:';
//]]>
</script>
<div class="page-title">
    <h1>Shopping Cart is Empty</h1>
</div>
<div class="cart-empty">
            <p>You have no items in your shopping cart.</p>
    <p>Click <a href="<?= base_url('Home') ?>">here</a> to continue shopping.</p>
    </div>
                </div>
            </div>
        </div>
                
        <?php $this->load->view('frontend/partial/footer')?>            

<div id="location-selector-wrapper" style="display: none;">
<div id="location-selector-overlay"></div>
<div id="location-selector">
<script type="text/javascript">countryRegions = {"config":{"show_all_regions":true,"regions_required":["IN"]},"IN":{"485":{"code":"ANDRA","name":"Andra Pradesh"},"487":{"code":"ASSAM","name":"Assam"},"488":{"code":"BIHAR","name":"Bihar"},"489":{"code":"CHAND","name":"Chandigarh"},"490":{"code":"CHHAT","name":"Chhattisgarh"},"493":{"code":"DELHI","name":"Delhi"},"494":{"code":"GOA","name":"Goa"},"495":{"code":"GUJAR","name":"Gujarat"},"496":{"code":"HARYA","name":"Haryana"},"497":{"code":"HP","name":"Himachal Pradesh"},"498":{"code":"JK","name":"Jammu and Kashmir"},"499":{"code":"JHARK","name":"Jharkhand"},"500":{"code":"KARNA","name":"Karnataka"},"501":{"code":"KERAL","name":"Kerala"},"503":{"code":"MP","name":"Madya Pradesh"},"504":{"code":"MAHAR","name":"Maharashtra"},"509":{"code":"ORISS","name":"Orissa"},"511":{"code":"PUNJA","name":"Punjab"},"512":{"code":"RAJAS","name":"Rajasthan"},"514":{"code":"TAMIL","name":"Tamil Nadu"},"516":{"code":"UP","name":"Uttar Pradesh"},"518":{"code":"WB","name":"West Bengal"},"519":{"code":"AN","name":"Andaman & Nicobar"},"520":{"code":"AR","name":"Arunachal Pradesh"},"521":{"code":"DD","name":"Daman & Diu"},"524":{"code":"ML","name":"Meghalaya"},"525":{"code":"MZ","name":"Mizoram"},"526":{"code":"NL","name":"Nagaland"},"523":{"code":"PU","name":"Pondicherry"},"522":{"code":"TS","name":"Telangana"},"527":{"code":"TR","name":"Tripura"},"517":{"code":"UTTAR","name":"Uttarakhand"}}}</script>
<div class="group-select"><form id="shippingzone-form" method="post" action="#">
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

<script src="../../js/common-snippets.js"></script>
<script> 
    commonSnippet("../../skin/frontend/rwd/mytheme", "../../media/wysiwyg");
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f788a3b6787f45"></script> --> 
</body>

<!-- Mirrored from mybookshop.co.in/myshop/checkout/cart/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Dec 2022 13:26:24 GMT -->
</html>

