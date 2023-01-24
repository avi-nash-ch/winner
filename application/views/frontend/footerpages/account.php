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
<div class="account-create">
    <div class="page-title">
        <h1>Create an Account</h1>
    </div>
                    <form action="<?= base_url('Home/UserRegistration')?>" method="post" id="form-validate">
        <div class="fieldset">
            <input type="hidden" name="success_url" value="" />
            <input type="hidden" name="error_url" value="" />
			<input type="hidden" name="form_key" value="SqP1WgWtgr6BdKvt" />
            <h2 class="legend">Personal Information</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="customer-name">
    <div class="field name-firstname">
        <label for="firstname" class="required"><em>*</em>First Name</label>
        <div class="input-box">
            <input  type="text" maxlength = "25"  id="firstname" name="firstname" value="" title="First Name" maxlength="255" class="input-text required-entry"  />
        </div>
    </div>
    <div class="field name-lastname">
        <label for="lastname" class="required"><em>*</em>Last Name</label>
        <div class="input-box">
            <input type="text"  maxlength = "25"   id="lastname" name="lastname" value="" title="Last Name" maxlength="255" class="input-text required-entry"  />
        </div>
    </div>
</div>
                </li>
                <li>
                    <label for="email_address" class="required"><em>*</em>Email Address</label>
                    <div class="input-box">
                        <input type="text" name="email" maxlength = "50"    id="email_address" value="" title="Email Address" class="input-text validate-email required-entry" />
                    </div>
                </li>
                                <li class="control">
                    <div class="input-box">
                        <input type="checkbox" name="is_subscribed" title="Sign Up for Newsletter" value="1" id="is_subscribed" class="checkbox" />
                    </div>
                    <label for="is_subscribed">Sign Up for Newsletter</label>
                                                        </li>
                                                                                                    </ul>
        </div>
            <div class="fieldset">
            <h2 class="legend">Login Information</h2>
            <ul class="form-list">
                <li class="fields">
                    <div class="field">
                        <label for="password" class="required"><em>*</em>Password</label>
                        <div class="input-box">
                            <input type="password" name="password" id="password" title="Password" class="input-text required-entry validate-password" />
                        </div>
                    </div>
                    <div class="field">
                        <label for="confirmation" class="required"><em>*</em>Confirm Password</label>
                        <div class="input-box">
                            <input type="password" name="confirmation" title="Confirm Password" id="confirmation" class="input-text required-entry validate-cpassword" />
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
        <div class="buttons-set">
            <!-- <p class="required">* Required Fields</p> -->
            <p class="back-link"><a href="#" class="back-link"><small>&laquo; </small>Back</a></p>
            <button type="submit" title="Submit" class="button"><span><span>Submit</span></span></button>
        </div>
    </form>
    <script type="text/javascript">
    //<![CDATA[
        var dataForm = new VarienForm('form-validate', true);
            //]]>
    </script>
</div>
                </div>
            </div>
        </div>
                
<!-- <div class="manual-footer">

<div class="footer-container">
    <div class="footer">
        
           <div class="">
                
        
</div>
        
        
          
        <div class="block block-subscribe">
    <div class="block-title">
        <strong><span>Newsletter</span></strong>
    </div>
    <form action="https://mybookshop.co.in/myshop/newsletter/subscriber/new/" method="post" id="newsletter-validate-detail">
        <div class="block-content">
            <div class="form-subscribe-header">
                <label for="newsletter">Sign Up for Our Newsletter:</label>
            </div>
            <div class="input-box">
               <input type="email" autocapitalize="off" autocorrect="off" spellcheck="false" name="email" id="newsletter" title="Sign up for our newsletter" class="input-text required-entry validate-email" />
            </div>
            <div class="actions">
                <button type="submit" title="Subscribe" class="button"><span><span>Subscribe</span></span></button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
    //<![CDATA[
        var newsletterSubscriberFormDetail = new VarienForm('newsletter-validate-detail');
    //]]>
    </script>
</div>
<div class="footerlinks-container" style="height: 100px; width: 100%;">
<div class="links">
<div class="block-title"><strong><span>Company</span></strong></div>
<ul style="float: left; font-size: 15px;">
<li><a href="https://mybookshop.co.in/myshop/about-mybookshop">About Us</a></li>
<li><a href="https://mybookshop.co.in/myshop/our-policies/#delivery-policy">Delivery Policy</a></li>
<li><a href="https://mybookshop.co.in/myshop/our-policies/#cancellation-policy">Cancellation Policy</a></li>
<li><a href="https://mybookshop.co.in/myshop/our-policies/#return-policy">Return &amp; Exchange Policy</a></li>
<li><a href="https://mybookshop.co.in/myshop/our-policies/#refund-policy">Refund Policy</a></li>
<li><a href="https://mybookshop.co.in/myshop/priv-pol">Privacy Policy</a></li>
<li><a href="https://mybookshop.co.in/myshop/our-policies">Our Policy</a></li>
<li><a href="https://mybookshop.co.in/myshop/terms-conditions">Terms of Use</a></li>
<li><a href="https://mybookshop.co.in/myshop/sitemap" title="Sitemap" target="_self">Sitemap</a></li>
</ul>
</div>
<div class="links">
<div class="block-title"><strong><span>Contact Us</span></strong></div>
<ul style="float: left; font-size: 15px;">
<li><a href="https://mybookshop.co.in/myshop/contact-mybookshop" title="Contact us"><span>Contact Us</span></a></li>
<li><span><a href="https://mybookshop.co.in/myshop/wholesale-bulkorder" title="Contact us">Contact Us for Bulk Enquiries</a></span></li>
<li><a href="https://mybookshop.co.in/myshop/help-support" title="Help &amp; Support"><span>Help &amp; Support</span></a></li>
<li><a href="https://mybookshop.co.in/myshop/ordertracking/index/"><span>Track your order</span></a></li>
<li><a href="https://mybookshop.co.in/myshop/feedback-form" title="Customer Feedback" target="_self"><span>Customer Feedback</span></a></li>
<li><a href="https://mybookshop.co.in/myshop/international-orders" title="International Orders" target="_blank"><span>International Orders</span></a></li>
</ul>
</div>
<div class="links">
<div class="block-title"><strong><span>Working Info </span></strong></div>
<ul style="float: left; font-size: 15px;">
<li><span style="color: #ffffff;">Mon - Sat<br />9:30 AM - 6:30 PM</span></li>
</ul>
</div>
<div class="links">
<div class="block-title"><a href="https://mybookshop.co.in/myshop/blogs/" title="Mybookshop Blogs" target="_self"><strong><span>Latest Blogs </span></strong></a></div>
</div>
<div class="links" style="text-align: left;">
<div class="block-title"><strong><span>Connect Us </span></strong></div>
&nbsp; &nbsp;&nbsp;<a href="https://www.facebook.com/mybookshop.co.in/" title="fb page" target="_blank"><img alt="fb like" height="25" src="https://mybookshop.co.in/myshop/media/wysiwyg/homepage/footer/fbicon.png" style="display: inline-block; margin-right: 20px; margin-left: 5px;" width="26" /></a>&nbsp;&nbsp;&nbsp;<a href="https://plus.google.com/117510953770320097156" title="g+ page" target="_blank"><img alt="g+ like" height="25" src="https://mybookshop.co.in/myshop/media/wysiwyg/homepage/footer/gplusicon.png" style="display: inline-block;" width="26" /></a>&nbsp; &nbsp;&nbsp;<br /><hr /><br /> &nbsp; &nbsp;<img alt="pay through paytm, payumoney, net banking, credit card, debit card" src="https://mybookshop.co.in/myshop/media/wysiwyg/payumoney.jpg" width="190px" /></div>
</div>
<p><div class="widget widget-static-block"><div class="linksforcustom">
<p>Books/Publishers:&nbsp;<a href="https://mybookshop.co.in/myshop/publishers-books/full-marks" title="Full Marks">Full Marks&nbsp;Pvt. Ltd</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/oxford-books" title="Oxford University Press">Oxford&nbsp;University Press</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/viva-education-books" title="Viva Education">Viva&nbsp;Education</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/schand-books" title="S chand Publishing">S Chand&nbsp;Publishing</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/dhanpat-rai-books" title="Dhanpat Rai">Dhanpat Rai</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/prachi-books" title="Prachi Publication">Prachi India Pvt. Ltd.</a>&nbsp;|<a href="https://mybookshop.co.in/myshop/publishers-books/radison-books" title="Radison Books">Radison&nbsp;Books</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/bharati-bhawan-books">Bharati Bhawan</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/new-saraswati-house-books">New Saraswati House</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/inspiration-books" title="Inspiration Publication">Inspiration Publication</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/premier-publications-books">Premier Publications</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/mtg-learning-media" title="MTG Learning">MTG Learning Media</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/kangaroo-books">Kangaroo Books</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/sapphire-books" title="Sapphire Publishers">Sapphire&nbsp;Publishers</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/mbd-books">MBD</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/britannica-books" title="Britannica">Britannica India Pvt. Ltd.</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/survi-books-international">Survi Books International</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/mascot-education-books">Mascot Education</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/cordova-publications-books">Cordova Publications</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/rachna-sagar-books">Rachna Sagar</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/ncert-books">NCERT</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/orient-blackswan-books">Orient Blackswan</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/arya-publishing-books">Arya Publishing</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/pearson-education-books">Pearson Education</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/publishers-books/dreamland-publications">Dreamland Publications</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/best-book-publishing-house" title="Best Book Publishing House" target="_self">Best Book Publishing House</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/the-world-book" title="The World Book" target="_self">The world book</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/eupheus-learning" title="Eupheus Learning" target="_self">Eupheus Learning</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/madhubun-educational-books" title="Madhubun Educational Books" target="_self">Madhubun Educational Books</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/frank-educational-aids" title="Frank Educational Books" target="_self">Frank Eductional Aids</a>|<a href="https://mybookshop.co.in/myshop/publishers-books/acevision-publisher-books" title="Acevision Publisher" target="_self">Acevision Publisher</a></p>
<p>General Books:&nbsp;<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/history-politics">History &amp; Politics</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/literature-fiction">Literature &amp; Fiction</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/biographies">Biographies</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/religion-spirituality">Religion &amp; Spirituality</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/children-books">Children</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/self-help">Self Help</a>|<a class="level1 " href="https://mybookshop.co.in/myshop/other-books/travel-tourism">Travel &amp; Tourism</a></p>
</div></div>
</p>      
        <address class="copyright"></address>
        
          
       <div class="linksforcustom">
                
        
</div>

<address class="copyright">&copy; 2016-2022 Mybookshop. All Rights Reserved.</address>
     
     
     
    </div>
</div>

</div>                 -->
<?php $this->load->view('frontend/partial/footer')?>

<div id="location-selector-wrapper" style="display: none;">
<div id="location-selector-overlay"></div>
<div id="location-selector">
<script type="text/javascript">countryRegions = {"config":{"show_all_regions":true,"regions_required":["IN"]},"IN":{"485":{"code":"ANDRA","name":"Andra Pradesh"},"487":{"code":"ASSAM","name":"Assam"},"488":{"code":"BIHAR","name":"Bihar"},"489":{"code":"CHAND","name":"Chandigarh"},"490":{"code":"CHHAT","name":"Chhattisgarh"},"493":{"code":"DELHI","name":"Delhi"},"494":{"code":"GOA","name":"Goa"},"495":{"code":"GUJAR","name":"Gujarat"},"496":{"code":"HARYA","name":"Haryana"},"497":{"code":"HP","name":"Himachal Pradesh"},"498":{"code":"JK","name":"Jammu and Kashmir"},"499":{"code":"JHARK","name":"Jharkhand"},"500":{"code":"KARNA","name":"Karnataka"},"501":{"code":"KERAL","name":"Kerala"},"503":{"code":"MP","name":"Madya Pradesh"},"504":{"code":"MAHAR","name":"Maharashtra"},"509":{"code":"ORISS","name":"Orissa"},"511":{"code":"PUNJA","name":"Punjab"},"512":{"code":"RAJAS","name":"Rajasthan"},"514":{"code":"TAMIL","name":"Tamil Nadu"},"516":{"code":"UP","name":"Uttar Pradesh"},"518":{"code":"WB","name":"West Bengal"},"519":{"code":"AN","name":"Andaman & Nicobar"},"520":{"code":"AR","name":"Arunachal Pradesh"},"521":{"code":"DD","name":"Daman & Diu"},"524":{"code":"ML","name":"Meghalaya"},"525":{"code":"MZ","name":"Mizoram"},"526":{"code":"NL","name":"Nagaland"},"523":{"code":"PU","name":"Pondicherry"},"522":{"code":"TS","name":"Telangana"},"527":{"code":"TR","name":"Tripura"},"517":{"code":"UTTAR","name":"Uttarakhand"}}}</script>
<div class="group-select"><form id="shippingzone-form" method="post" action="https://mybookshop.co.in/myshop/deliveryzone/index/index/uenc/aHR0cHM6Ly9teWJvb2tzaG9wLmNvLmluL215c2hvcC9jdXN0b21lci9hY2NvdW50L2NyZWF0ZS8,/">
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
                <link itemprop="url" href="https://mybookshop.co.in/myshop/"/>
        <meta itemprop="sameAs" content="https://www.facebook.com/mybookshop.co.in/"/><meta itemprop="sameAs" content="https://plus.google.com/+Mybookshopcoin"/><meta itemprop="sameAs" content="https://www.linkedin.com/company/mybookshop/"/>        <meta itemprop="logo" content="https://mybookshop.co.in/myshop/skin/frontend/rwd/mytheme/images/logo_mbs.png"/>

    </div>
</div>

<script src="./js/common-snippets.js"></script>
<script> 
    commonSnippet("./skin/frontend/rwd/mytheme", "./media/wysiwyg");
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f788a3b6787f45"></script> --> 
</body>
</html>

