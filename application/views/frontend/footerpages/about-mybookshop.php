<?php $this->load->view('frontend/partial/header')?>

<body class=" cms-page-view cms-about-mybookshop">
    <div class="wrapper">
        <noscript>
            <div class="global-site-notice noscript">
                <div class="notice-inner">
                    <p>
                        <strong>JavaScript seems to be disabled in your browser.</strong><br />
                        You must have JavaScript enabled in your browser to utilize the functionality of this website.
                    </p>
                </div>
            </div>
        </noscript>



        <!-- <h3 style="text-align: center;"><strong style="color: #0000ff; font-size: 1em;">Limited time Extra Discount offer available- COUPON CODE -&nbsp;MBSDEC</strong></h3> -->
        <p></p>
        <p></p>



    


            <header id="header" class="page-header">

            </header>


            <div class="main-container col1-layout">
                <div class="main">
                    <div class="breadcrumbs">
                        <ul>
                            <li typeof="v:Breadcrumb" class="home">
                                <a rel="v:url" property="v:title" href="index.html" title="Go to Home Page">Home</a>
                                <span>/ </span>
                            </li>
                            <li class="cms_page">
                                <strong>About Us - Ruchibooks.com</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-main">

                        <div class="std">
                            <div class="content-space">
                                <h1 class="page-title">ABOUT Ruchibooks.com</h1>
                                <div class="col3-set">
                                    <div class="col-1">
                                        <p style="line-height: 1.2em;"><small>Welcome to RuchiBooks.com</small></p>
                                        <p style="color: #888; font: 1.2em/1.4em georgia, serif;">RuchiBooks is one of
                                            the biggest distributor of school books from Maharashtra, with years of
                                            experience, dedication and hardwork, we have build it into one of the
                                            biggest name in the industry in Beed and &nbsp;Ruchibooks.com is just
                                            &nbsp;the first step in creating a brand whose main aim is to serve the
                                            populous.</p>
                                    </div>
                                    <div class="col-2">
                                        <p><strong style="color: #de036f;">OUR TARGET</strong></p>
                                        <p style="text-align: justify;">The main aim of creating the website
                                            Ruchibooks.com is to serve the people and making their lives easier and
                                            provide a hassle free shopping experience of buying school books.</p>
                                    </div>
                                    <div class="col-3">
                                        <p style="text-align: justify;">There are hundreds if not thousands of
                                            publishers and every school has different books from different publishers
                                            and sometimes it becomes very hard to find a particular book or books from
                                            that particular publisher. Our aim is to provide a faster easier and
                                            convient way to find those books and get it without even leaving your
                                            house.&nbsp;</p>
                                        <p>With Ruchibooks.com you can just order it from home and we will deliver it to
                                            you at your home.</p>
                                        <p>You can find almost any book in our huge and constantly updating books
                                            database that you will not be able to find on local shops.</p>
                                        <div class="divider">&nbsp;</div>
                                        <p>We will always try our best to provide you with the best service and
                                            experience</p>
                                        <p style="line-height: 1.2em;"><strong
                                                style="font: italic 2em Georgia, serif;">Ruchibooks Team</strong><br />
                                            <small>Thank you</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('frontend/partial/footer') ?>
            <div id="location-selector-wrapper" style="display: none;">
                <div id="location-selector-overlay"></div>
                <div id="location-selector">
                   
                    <div class="group-select">
                        <form id="shippingzone-form" method="post"
                            action="https://mybookshop.co.in/myshop/deliveryzone/index/index/uenc/aHR0cHM6Ly9teWJvb2tzaG9wLmNvLmluL215c2hvcC9hYm91dC1teWJvb2tzaG9w/">
                            <h3 class="a-center">Please select your shipping location to start shopping</h3>
                            <div class="col2-alt-set">
                                <div class="col-1 a-center">
                                    <span class="notice">Changing your shipping location may affect your shopping
                                        cart.</span>
                                </div>
                                <div class="col-2 a-left input-box">
                                    <ul class="list">
                                        <li>
                                            <div class="input-box">
                                                <div style="width:200px; float:left"><label style="width:200px;"
                                                        for="shippingzone:country_id">Country</label></div>
                                                <select name="shippingzone[country_id]" id="shippingzone:country_id"
                                                    class="validate-select" title="Country">
                                                    <option value=""> </option>
                                                    <option value="IN" selected="selected">India</option>
                                                </select>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="input-box">
                                                <div style="width:200px; float:left"><label>State/Province</label></div>
                                                <select id="shippingzone:region_id" name="shippingzone[region_id]"
                                                    title="State/Province" class="validate-select" style="display:none">
                                                    <option value="">Please select region, state or province</option>
                                                </select>
                                                
                                                <input type="text" id="shippingzone:region" name="shippingzone[region]"
                                                    value="" title="State/Province" class="input-text"
                                                    style="display:none" />
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="button-set buttons actions">
                                <button class="block-poll button"
                                    onclick="$('location-selector-wrapper').hide(); return false;">
                                    <span class="span"
                                        style="/* background:none !important; color:#000; */">Cancel</span>
                                </button>
                                <button class="button" type="submit">
                                    <span>Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
            <div itemscope itemtype="http://schema.org/Organization">
                <meta itemprop="name" content="MyBookShop.co.in - Online School Books Store" />
                <meta itemprop="telephone" content="011 - 42750442, 9205412939" />
                <meta itemprop="email" content="info@mybookshop.co.in" />
                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <meta itemprop="addressCountry" content="India" />
                    <meta itemprop="addressLocality" content="E-119, Vishwakarma Colony" />
                    <meta itemprop="postalCode" content="110044" />
                </div>
                <link itemprop="url" href="index.html" />
                <meta itemprop="sameAs" content="https://www.facebook.com/mybookshop.co.in/" />
                <meta itemprop="sameAs" content="https://plus.google.com/+Mybookshopcoin" />
                <meta itemprop="sameAs" content="https://www.linkedin.com/company/mybookshop/" />
                <meta itemprop="logo"
                    content="https://mybookshop.co.in/myshop/skin/frontend/rwd/mytheme/images/logo_mb2.png" />

            </div>
        </div>
        <!-- <script src="./js/common-snippets.js"></script> -->
       
        <!-- Go to www.addthis.com/dashboard to customize your tools <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58f788a3b6787f45"></script> -->
</body>

<!-- Mirrored from mybookshop.co.in/myshop/about-mybookshop by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Dec 2022 17:37:35 GMT -->

</html>