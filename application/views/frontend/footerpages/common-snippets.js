//skin/frontend/rwd/mytheme
// media/wysiwyg
const commonSnippet = (headerPath, footerPath) => {
const header = document.querySelector('#header');
header.innerHTML = `<div class="page-header-container">
<div class="page">
        
<div class="header-language-background">
    <div class="header-language-container">
        <div class="store-language-container">
                   </div>

        		
<span class="ccnumber" >	
    <p>Customer Care&nbsp;020-XX XX XX XX / +91 902 8060 396 / SHOP@RUCHIBOOKS.COM</p>

</span>


	 <p class="welcome-msg">Online School Bookstore! Ruchibooks.com 		
	        
		</p>
    </div>
</div>
<a class="logo" href="index.html">
    <img src="${headerPath}/images/logo_mbs2.png" alt="Mybookshop" class="large" />
    <img src="${headerPath}/images/logo_mbs2.png" alt="Mybookshop" class="small" />
</a>

<div class="store-language-container"></div>

<!-- Skip Links -->

<div class="skip-links">
    <a href="#header-nav" class="skip-link skip-nav">
        <span class="icon"></span>
        <span class="label">Menu</span>
    </a>

    <a href="#header-search" class="skip-link skip-search">
        <span class="icon"></span>
        <span class="label">Search</span>
    </a>

    <div class="account-cart-wrapper">
        <a href="customer/account/index.html" data-target-element="#header-account" class="skip-link skip-account">
            <span class="icon"></span>
            <span class="label">Account</span>
        </a>

        <!-- Cart -->

        <div class="header-minicart">


            <a href="checkout/cart/index.html" data-target-element="#header-cart"
                class="skip-link skip-cart  no-count">
                <span class="icon"></span>
                <span class="label">Cart</span>
                <span class="count">0</span>
            </a>

            <div id="header-cart" class="block block-cart skip-content">

                <div id="minicart-error-message" class="minicart-message"></div>
                <div id="minicart-success-message" class="minicart-message"></div>

                <div class="minicart-wrapper">

                    <p class="block-subtitle">
                        Recently added item(s) <a class="close skip-link-close" href="#" title="Close">&times;</a>
                    </p>

                    <p class="empty">You have no items in your shopping cart.</p>

                </div>
            </div>
        </div>
    </div>


</div>

<!-- Navigation -->

<div id="header-nav" class="skip-content">

    <nav id="nav">
        <ol class="nav-primary">
            <li class="level0 nav-1 first parent"><a href="subjects.html" class="level0 has-children">Subjects</a>
                <ul class="level0">
                    <li class="level1 nav-1-1 first"><a href="subjects/physical-education-books.html"
                            class="level1 ">Physical Education</a></li>
                    <li class="level1 nav-1-2"><a href="subjects/mathematics-books.html"
                            class="level1 ">Mathematics</a></li>
                    <li class="level1 nav-1-3"><a href="subjects/english-books.html" class="level1 ">English</a>
                    </li>
                    <li class="level1 nav-1-4"><a href="subjects/hindi-books.html" class="level1 ">Hindi</a></li>
                    <li class="level1 nav-1-5"><a href="subjects/sanskrit-books.html" class="level1 ">Sanskrit</a>
                    </li>
                    <li class="level1 nav-1-6"><a href="subjects/science-books.html" class="level1 ">Science</a>
                    </li>
                    <li class="level1 nav-1-7"><a href="subjects/socialscience.html" class="level1 ">Social
                            Science</a></li>
                    <li class="level1 nav-1-8"><a href="subjects/biology-books.html" class="level1 ">Biology</a>
                    </li>
                    <li class="level1 nav-1-9"><a href="subjects/businessstudies.html" class="level1 ">Business
                            Studies</a></li>
                    <li class="level1 nav-1-10"><a href="subjects/chemistry-books.html"
                            class="level1 ">Chemistry</a></li>
                    <li class="level1 nav-1-11"><a href="subjects/geography.html" class="level1 ">Geography</a></li>
                    <li class="level1 nav-1-12"><a href="subjects/history-books.html" class="level1 ">History</a>
                    </li>
                    <li class="level1 nav-1-13"><a href="subjects/physics-books.html" class="level1 ">Physics</a>
                    </li>
                    <li class="level1 nav-1-14"><a href="subjects/politicalscience-books.html"
                            class="level1 ">Political Science</a></li>
                    <li class="level1 nav-1-15"><a href="subjects/psychology-books.html"
                            class="level1 ">Psychology</a></li>
                    <li class="level1 nav-1-16"><a href="subjects/sociology-books.html"
                            class="level1 ">Sociology</a></li>
                    <li class="level1 nav-1-17"><a href="subjects/environmental-studies-books.html"
                            class="level1 ">Environmental Studies</a></li>
                    <li class="level1 nav-1-18"><a href="subjects/computer-books.html" class="level1 ">Computer</a>
                    </li>
                    <li class="level1 nav-1-19"><a href="subjects/moral-value.html" class="level1 ">Moral Value</a>
                    </li>
                    <li class="level1 nav-1-20"><a href="subjects/general-knowledge-books.html"
                            class="level1 ">General Knowledge</a></li>
                    <li class="level1 nav-1-21"><a href="subjects/drawing-books.html" class="level1 ">Drawing</a>
                    </li>
                    <li class="level1 nav-1-22"><a href="subjects/french-books.html" class="level1 ">French</a></li>
                    <li class="level1 nav-1-23"><a href="subjects/economics-books.html"
                            class="level1 ">Economics</a></li>
                    <li class="level1 nav-1-24"><a href="subjects/english-grammar-books.html"
                            class="level1 ">English Grammar</a></li>
                    <li class="level1 nav-1-25 last"><a href="subjects/accountancy-books.html"
                            class="level1 ">Accountancy</a></li>
                </ul>
            </li>
            <li class="level0 nav-2 parent"><a href="publishers-books.html"
                    class="level0 has-children">Publishers</a>
                <ul class="level0">
                    <li class="level1 nav-2-1 first"><a href="publishers-books/arihant-publications.html"
                            class="level1 ">Arihant Publications</a></li>
                    <li class="level1 nav-2-2"><a href="publishers-books/full-marks.html" class="level1 ">Full
                            Marks</a></li>
                    <li class="level1 nav-2-3"><a href="publishers-books/oxford-books.html"
                            class="level1 ">Oxford</a></li>
                    <li class="level1 nav-2-4"><a href="publishers-books/viva-education-books.html"
                            class="level1 ">Viva Education</a></li>
                    <li class="level1 nav-2-5"><a href="publishers-books/schand-books.html" class="level1 ">S
                            Chand</a></li>
                    <li class="level1 nav-2-6"><a href="publishers-books/dhanpat-rai-books.html"
                            class="level1 ">Dhanpat Rai</a></li>
                    <li class="level1 nav-2-7"><a href="publishers-books/prachi-books.html"
                            class="level1 ">Prachi</a></li>
                    <li class="level1 nav-2-8"><a href="publishers-books/pradeep-books.html"
                            class="level1 ">Pradeep</a></li>
                    <li class="level1 nav-2-9"><a href="publishers-books/radison-books.html"
                            class="level1 ">Radison</a></li>
                    <li class="level1 nav-2-10"><a href="publishers-books/bharati-bhawan-books.html"
                            class="level1 ">Bharati Bhawan</a></li>
                    <li class="level1 nav-2-11"><a href="publishers-books/new-saraswati-house-books.html"
                            class="level1 ">New Saraswati House</a></li>
                    <li class="level1 nav-2-12"><a href="publishers-books/inspiration-books.html"
                            class="level1 ">Inspiration</a></li>
                    <li class="level1 nav-2-13"><a href="publishers-books/premier-publications-books.html"
                            class="level1 ">Premier Publications</a></li>
                    <li class="level1 nav-2-14"><a href="publishers-books/mtg-learning-media.html"
                            class="level1 ">MTG Learning Media</a></li>
                    <li class="level1 nav-2-15"><a href="publishers-books/kangaroo-books.html"
                            class="level1 ">Kangaroo Books</a></li>
                    <li class="level1 nav-2-16"><a href="publishers-books/sapphire-books.html"
                            class="level1 ">Sapphire</a></li>
                    <li class="level1 nav-2-17"><a href="publishers-books/mbd-books.html" class="level1 ">MBD</a>
                    </li>
                    <li class="level1 nav-2-18"><a href="publishers-books/britannica-books.html"
                            class="level1 ">Britannica</a></li>
                    <li class="level1 nav-2-19"><a href="publishers-books/survi-books-international.html"
                            class="level1 ">Survi Books International</a></li>
                    <li class="level1 nav-2-20"><a href="publishers-books/holy-faith-international.html"
                            class="level1 ">Holy Faith International</a></li>
                    <li class="level1 nav-2-21"><a href="publishers-books/mascot-education-books.html"
                            class="level1 ">Mascot Education</a></li>
                    <li class="level1 nav-2-22"><a href="publishers-books/cordova-publications-books.html"
                            class="level1 ">Cordova Publications</a></li>
                    <li class="level1 nav-2-23"><a href="publishers-books/rachna-sagar-books.html"
                            class="level1 ">Rachna Sagar</a></li>
                    <li class="level1 nav-2-24"><a href="publishers-books/ncert-books.html"
                            class="level1 ">NCERT</a></li>
                    <li class="level1 nav-2-25"><a href="publishers-books/orient-blackswan-books.html"
                            class="level1 ">Orient Blackswan</a></li>
                    <li class="level1 nav-2-26"><a href="publishers-books/arya-publishing-books.html"
                            class="level1 ">Arya Publishing</a></li>
                    <li class="level1 nav-2-27"><a href="publishers-books/pearson-education-books.html"
                            class="level1 ">Pearson Education</a></li>
                    <li class="level1 nav-2-28"><a href="publishers-books/dreamland-publications.html"
                            class="level1 ">Dreamland Publications</a></li>
                    <li class="level1 nav-2-29"><a href="publishers-books/best-book-publishing-house.html"
                            class="level1 ">Best Book Publishing House</a></li>
                    <li class="level1 nav-2-30"><a href="publishers-books/the-world-book.html" class="level1 ">The
                            World Book</a></li>
                    <li class="level1 nav-2-31"><a href="publishers-books/eupheus-learning.html"
                            class="level1 ">Eupheus Learning</a></li>
                    <li class="level1 nav-2-32"><a href="publishers-books/madhubun-educational-books.html"
                            class="level1 ">Madhubun Educational Books</a></li>
                    <li class="level1 nav-2-33"><a href="publishers-books/frank-educational-aids.html"
                            class="level1 ">Frank Educational Aids</a></li>
                    <li class="level1 nav-2-34"><a href="publishers-books/acevision-publisher-books.html"
                            class="level1 ">Acevision Publisher</a></li>
                    <li class="level1 nav-2-35"><a href="publishers-books/jeevandeep-prakashan-books.html"
                            class="level1 ">Jeevandeep Prakashan</a></li>
                    <li class="level1 nav-2-36"><a href="publishers-books/collins-india-books.html"
                            class="level1 ">Collins India</a></li>
                    <li class="level1 nav-2-37"><a href="publishers-books/penguin-random-house-books.html"
                            class="level1 ">Penguin Random House</a></li>
                    <li class="level1 nav-2-38"><a href="publishers-books/macmillan-education.html"
                            class="level1 ">Macmillan Education</a></li>
                    <li class="level1 nav-2-39"><a href="publishers-books/indiannica-learning.html"
                            class="level1 ">Indiannica Learning</a></li>
                    <li class="level1 nav-2-40"><a href="publishers-books/grafalco-books.html"
                            class="level1 ">Grafalco Books</a></li>
                    <li class="level1 nav-2-41"><a href="publishers-books/harbour-press-international.html"
                            class="level1 ">Harbour Press International</a></li>
                    <li class="level1 nav-2-42"><a href="publishers-books/nexrise-publications-pvt-ltd.html"
                            class="level1 ">Nexrise Publications</a></li>
                    <li class="level1 nav-2-43"><a href="publishers-books/usborne-books.html"
                            class="level1 ">Usborne</a></li>
                    <li class="level1 nav-2-44"><a href="publishers-books/harpercollins-books.html"
                            class="level1 ">HarperCollins</a></li>
                    <li class="level1 nav-2-45"><a href="publishers-books/cambridge-university-press.html"
                            class="level1 ">Cambridge University Press</a></li>
                    <li class="level1 nav-2-46"><a href="publishers-books/dorling-kindersley-books.html"
                            class="level1 ">Dorling Kindersley</a></li>
                    <li class="level1 nav-2-47"><a href="publishers-books/orange-education.html"
                            class="level1 ">Orange Education</a></li>
                    <li class="level1 nav-2-48"><a href="publishers-books/pp-publications.html" class="level1 ">P.P.
                            Publications</a></li>
                    <li class="level1 nav-2-49"><a href="publishers-books/amity-university-press-books.html"
                            class="level1 ">Amity University Press</a></li>
                    <li class="level1 nav-2-50"><a href="publishers-books/hodder-education-books.html"
                            class="level1 ">Hodder Education</a></li>
                    <li class="level1 nav-2-51"><a href="publishers-books/hinkler-books.html"
                            class="level1 ">Hinkler Books</a></li>
                    <li class="level1 nav-2-52 last"><a href="publishers-books/frank-brothers.html"
                            class="level1 ">Frank Brothers</a></li>
                </ul>
            </li>
            <li class="level0 nav-3 parent"><a href="classes.html" class="level0 has-children">Classes</a>
                <ul class="level0">
                    <li class="level1 nav-3-1 first"><a href="classes/pre-primary-class-books.html"
                            class="level1 ">Pre-Primary</a></li>
                    <li class="level1 nav-3-2"><a href="classes/class1.html" class="level1 ">Class 1 Books</a></li>
                    <li class="level1 nav-3-3"><a href="classes/class-2-books.html" class="level1 ">Class 2
                            Books</a></li>
                    <li class="level1 nav-3-4"><a href="classes/class-3-books.html" class="level1 ">Class 3
                            Books</a></li>
                    <li class="level1 nav-3-5"><a href="classes/class-4-books.html" class="level1 ">Class 4
                            Books</a></li>
                    <li class="level1 nav-3-6"><a href="classes/class-5-books.html" class="level1 ">Class 5
                            Books</a></li>
                    <li class="level1 nav-3-7"><a href="classes/class-6-books.html" class="level1 ">Class 6
                            Books</a></li>
                    <li class="level1 nav-3-8"><a href="classes/class-7-books.html" class="level1 ">Class 7
                            Books</a></li>
                    <li class="level1 nav-3-9"><a href="classes/class-8-books.html" class="level1 ">Class 8
                            Books</a></li>
                    <li class="level1 nav-3-10"><a href="classes/class-9-books.html" class="level1 ">Class 9
                            Books</a></li>
                    <li class="level1 nav-3-11"><a href="classes/class-10-books.html" class="level1 ">Class 10
                            Books</a></li>
                    <li class="level1 nav-3-12"><a href="classes/class-11-books.html" class="level1 ">Class 11
                            Books</a></li>
                    <li class="level1 nav-3-13 last"><a href="classes/class-12-books.html" class="level1 ">Class 12
                            Books</a></li>
                </ul>
            </li>
            <li class="level0 nav-4"><a href="atlas.html" class="level0 ">Atlas</a></li>
            <li class="level0 nav-5 parent"><a href="activity-books.html" class="level0 has-children">Activity
                    Books</a>
                <ul class="level0">
                    <li class="level1 nav-5-1 first"><a href="activity-books/activitybooks-nursery-to-kg-class.html"
                            class="level1 ">Nursery to KG Class</a></li>
                    <li class="level1 nav-5-2"><a href="activity-books/activitybooks-class1-to-class5.html"
                            class="level1 ">I to V Class</a></li>
                    <li class="level1 nav-5-3 last"><a href="activity-books/activity-vi-to-viii-class.html"
                            class="level1 ">VI to VIII Class</a></li>
                </ul>
            </li>
            <li class="level0 nav-6 parent"><a href="drawings-books.html" class="level0 has-children">Drawings</a>
                <ul class="level0">
                    <li class="level1 nav-6-1 first"><a href="drawings-books/drawing-nursery-to-kg-class.html"
                            class="level1 ">Nursery to KG Class</a></li>
                    <li class="level1 nav-6-2"><a href="drawings-books/drawing-class1-to-class5.html"
                            class="level1 ">I to V Class</a></li>
                    <li class="level1 nav-6-3 last"><a href="drawings-books/drawing-vi-to-viii-class.html"
                            class="level1 ">VI to VIII Class</a></li>
                </ul>
            </li>
            <li class="level0 nav-7"><a href="story-books.html" class="level0 ">Story Books</a></li>
            <li class="level0 nav-8"><a href="dictionary.html" class="level0 ">Dictionary</a></li>
            <li class="level0 nav-9"><a href="encyclopedia-books.html" class="level0 ">Encyclopedia Books</a></li>
            <li class="level0 nav-10 last"><a href="competitive-exam-books.html" class="level0 ">Competitive Exam
                    Books</a></li>
        </ol>
    </nav>
</div>

<!-- Search -->

<div id="header-search" class="skip-content">

    <form id="search_mini_form" action="https://mybookshop.co.in/myshop/catalogsearch/result/" method="get">
        <div class="input-box">
            <label for="search">Search:</label>
            <input id="search" type="search" name="q" value="" class="input-text required-entry mysearch"
                maxlength="128" placeholder="Search ISBN, Title, Publishers, Authors..." />
            <button type="submit" title="Search"
                class="button search-button"><span><span>Search</span></span></button>
        </div>

        <div id="search_autocomplete" class="search-autocomplete"></div>
        <script type="text/javascript">
            //<![CDATA[
            var searchForm = new Varien.searchForm('search_mini_form', 'search', '');
            searchForm.initAutocomplete('catalogsearch/ajax/suggest/index.html', 'search_autocomplete');
//]]>
        </script>
    </form>
</div>

<!-- Account -->

<div id="header-account" class="skip-content">
    <div class="links">
        <ul>
            <li class="first"><a href="customer/account/index.html" title="My Account">My Account</a></li>
            <li><a href="ordertracking/index/index.html" title="Track Order">Track Order</a></li>
            <li><a href="checkout/cart/index.html" title="My Cart" class="top-link-cart">My Cart</a></li>
            <li><a href="checkout/index.html" title="Checkout" class="top-link-checkout">Checkout</a></li>
            <li><a href="customer/account/create/index.html" title="Register">Register</a></li>
            <li><a href="customer/account/login/index.html" title="Log In">Log In</a></li>
            <li class=" last"><a href="blogs/index.html" title="Blog">Blog</a></li>
        </ul>
    </div>
</div>
</div>`;

const footer = document.querySelector('.manual-footer');
footer.innerHTML = ` <div class="footer-container">
<div class="footer">
    <div class="">
    </div>
    <div class="block block-subscribe">
        <div class="block-title">
            <strong><span>Newsletter</span></strong>
        </div>
        <form action="" method="post" id="newsletter-validate-detail">
            <div class="block-content">
                <div class="form-subscribe-header">
                    <label for="newsletter">Sign Up for Our Newsletter:</label>
                </div>
                <div class="input-box">
                    <input type="email" autocapitalize="off" autocorrect="off" spellcheck="false"
                        name="email" id="newsletter" title="Sign up for our newsletter"
                        class="input-text required-entry validate-email" />
                </div>
                <div class="actions">
                    <button type="submit" title="Subscribe"
                        class="button"><span><span>Subscribe</span></span></button>
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
                <li><a href="about-mybookshop.html">About Us</a></li>
                <li><a href="our-policies/index.html#delivery-policy">Delivery Policy</a></li>
                <li><a href="our-policies/index.html#cancellation-policy">Cancellation Policy</a>
                </li>
                <li><a href="our-policies/index.html#return-policy">Return &amp; Exchange Policy</a>
                </li>
                <li><a href="our-policies/index.html#refund-policy">Refund Policy</a></li>
                <li><a href="priv-pol.html">Privacy Policy</a></li>
                <li><a href="our-policies.html">Our Policy</a></li>
                <li><a href="terms-conditions.html">Terms of Use</a></li>
                <li><a href="sitemap.html" title="Sitemap" target="_self">Sitemap</a></li>
            </ul>
        </div>
        <div class="links">
            <div class="block-title"><strong><span>Contact Us</span></strong></div>
            <ul style="float: left; font-size: 15px;">
                <li><a href="contact-mybookshop.html" title="Contact us"><span>Contact Us</span></a>
                </li>
                <li><span><a href="wholesale-bulkorder.html" title="Contact us">Contact Us for Bulk
                            Enquiries</a></span></li>
                <li><a href="help-support.html" title="Help &amp; Support"><span>Help &amp;
                            Support</span></a></li>
                <li><a href="ordertracking/index/index.html"><span>Track your order</span></a></li>
                <li><a href="feedback-form.html" title="Customer Feedback"
                        target="_self"><span>Customer Feedback</span></a></li>
                <li><a href="international-orders.html" title="International Orders"
                        target="_blank"><span>International Orders</span></a></li>
            </ul>
        </div>
        <div class="links">
            <div class="block-title"><strong><span>Working Info </span></strong></div>
            <ul style="float: left; font-size: 15px;">
                <li><span style="color: #ffffff;">Sun - Sun<br />9:30 AM - 9:30 PM</span></li>
            </ul>
        </div>
        <div class="links">
            <div class="block-title"><a href="blogs/index.html" title="Mybookshop Blogs"
                    target="_self"><strong><span>Latest Blogs </span></strong></a></div>
        </div>
        <div class="links" style="text-align: left;">
            <div class="block-title"><strong><span>Connect Us </span></strong></div>
            &nbsp; &nbsp;&nbsp;<a href="https://www.facebook.com/ruchibookpalacebeed"
                title="fb page" target="_blank"><img alt="fb like" height="25"
                    src="${footerPath}/homepage/footer/fbicon.png"
                    style="display: inline-block; margin-right: 20px; margin-left: 5px;"
                    width="26" /></a>&nbsp;&nbsp;&nbsp;<a
                href="https://instagram.com/ruchibookpalace?igshid=YmMyMTA2M2Y=" title="Insta Page"
                target="_blank"><img alt="g+ like" height="25"
                    src="${footerPath}/homepage/footer/instaicon.png" style="display: inline-block;"
                    width="26" /></a>&nbsp; &nbsp;&nbsp;<br />
            <hr /><br /> &nbsp; &nbsp;<img
                alt="pay through paytm, payumoney, net banking, credit card, debit card"
                src="${footerPath}/payumoney.jpg" width="190px" />
        </div>
    </div>
    <!-- <p><div class="widget widget-static-block"><div class="linksforcustom">
 <p>Books/Publishers:&nbsp;<a href="publishers-books/full-marks.html" title="Full Marks">Full Marks&nbsp;Pvt. Ltd</a>|<a href="publishers-books/oxford-books.html" title="Oxford University Press">Oxford&nbsp;University Press</a>|<a href="publishers-books/viva-education-books.html" title="Viva Education">Viva&nbsp;Education</a>|<a href="publishers-books/schand-books.html" title="S chand Publishing">S Chand&nbsp;Publishing</a>|<a class="level1 " href="publishers-books/dhanpat-rai-books.html" title="Dhanpat Rai">Dhanpat Rai</a>|<a href="publishers-books/prachi-books.html" title="Prachi Publication">Prachi India Pvt. Ltd.</a>&nbsp;|<a href="publishers-books/radison-books.html" title="Radison Books">Radison&nbsp;Books</a>|<a class="level1 " href="publishers-books/bharati-bhawan-books.html">Bharati Bhawan</a>|<a class="level1 " href="publishers-books/new-saraswati-house-books.html">New Saraswati House</a>|<a href="publishers-books/inspiration-books.html" title="Inspiration Publication">Inspiration Publication</a>|<a class="level1 " href="publishers-books/premier-publications-books.html">Premier Publications</a>|<a class="level1 " href="publishers-books/mtg-learning-media.html" title="MTG Learning">MTG Learning Media</a>|<a class="level1 " href="publishers-books/kangaroo-books.html">Kangaroo Books</a>|<a href="publishers-books/sapphire-books.html" title="Sapphire Publishers">Sapphire&nbsp;Publishers</a>|<a class="level1 " href="publishers-books/mbd-books.html">MBD</a>|<a href="publishers-books/britannica-books.html" title="Britannica">Britannica India Pvt. Ltd.</a>|<a class="level1 " href="publishers-books/survi-books-international.html">Survi Books International</a>|<a class="level1 " href="publishers-books/mascot-education-books.html">Mascot Education</a>|<a class="level1 " href="publishers-books/cordova-publications-books.html">Cordova Publications</a>|<a class="level1 " href="publishers-books/rachna-sagar-books.html">Rachna Sagar</a>|<a class="level1 " href="publishers-books/ncert-books.html">NCERT</a>|<a class="level1 " href="publishers-books/orient-blackswan-books.html">Orient Blackswan</a>|<a class="level1 " href="publishers-books/arya-publishing-books.html">Arya Publishing</a>|<a class="level1 " href="publishers-books/pearson-education-books.html">Pearson Education</a>|<a class="level1 " href="publishers-books/dreamland-publications.html">Dreamland Publications</a>|<a href="publishers-books/best-book-publishing-house.html" title="Best Book Publishing House" target="_self">Best Book Publishing House</a>|<a href="publishers-books/the-world-book.html" title="The World Book" target="_self">The world book</a>|<a href="publishers-books/eupheus-learning.html" title="Eupheus Learning" target="_self">Eupheus Learning</a>|<a href="publishers-books/madhubun-educational-books.html" title="Madhubun Educational Books" target="_self">Madhubun Educational Books</a>|<a href="publishers-books/frank-educational-aids.html" title="Frank Educational Books" target="_self">Frank Eductional Aids</a>|<a href="publishers-books/acevision-publisher-books.html" title="Acevision Publisher" target="_self">Acevision Publisher</a></p>
 <p>General Books:&nbsp;<a class="level1 " href="index.html">History &amp; Politics</a>|<a class="level1 " href="index.html">Literature &amp; Fiction</a>|<a class="level1 " href="index.html">Biographies</a>|<a class="level1 " href="index.html">Religion &amp; Spirituality</a>|<a class="level1 " href="index.html">Children</a>|<a class="level1 " href="index.html">Self Help</a>|<a class="level1 " href="index.html">Travel &amp; Tourism</a></p>
 </div></div>
</p>       -->
    <address class="copyright"></address>


    <div class="linksforcustom">


    </div>

    <address class="copyright">&copy; 2016-2022 Ruchibooks. All Rights Reserved.</address>



</div>
</div>
`;
}