<!DOCTYPE html>
<html class=no-js lang=zxx>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Jan 2023 04:07:24 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset=utf-8 />
    <meta http-equiv=x-ua-compatible content="ie=edge" />
    <title>pratap multiservices</title>
    <meta name=description content="" />
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>web_assets/images/favicon.svg" />

    <link rel=stylesheet
        href="<?= base_url()?>web_assets/css/A.bootstrap.min.css%2bLineIcons.3.0.css%2btiny-slider.css%2bglightbox.min.css%2cMcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel=stylesheet href="<?= base_url()?>web_assets/css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />

    <!-- javascript cdn link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>


    <style>
        .form-select.is-valid:not([multiple]):not([size]),
        .form-select.is-valid:not([multiple])[size="1"],
        .was-validated .form-select:valid:not([multiple]):not([size]),
        .was-validated .form-select:valid:not([multiple])[size="1"] {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
        }
       

        .header .mega-category-menu {
            position: relative;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border-right: 1px solid #eee;
            /* margin-right: 11px !important;
            padding-right: 36px !important; */
            margin-right: 19px !important;
            padding-right: 26px !important;
            cursor: pointer;
        }

    /* google translate start*/
        .goog-logo-link,
        .goog-logo-link:link,
        .goog-logo-link:visited,
        .goog-logo-link:hover,
        .goog-logo-link:active {
            font-size: 12px;
            font-weight: bold;
            color: #444;
            text-decoration: none;
            display: none;
        }

        .goog-te-gadget {
    font-family: arial;
    font-size: 0px;
    color: #666;
    white-space: nowrap;
        }

         /* google translate end */
    </style>


</head>

<body>



    <header class="header navbar-area">

        <div class=topbar>
            <div class=container>
                <div class="row align-items-center">
                    <!-- <div class="col-lg-4 col-md-4 col-12"> -->
                    <div class="col-lg-2 col-md-4 col-12">
                        <div class=top-left>
                            <ul class=menu-top-link>
                                <li>
                                    <div class=select-position>
                                        <select id=select4>
                                            <option value=3>₹ INR</option>
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <!-- <div class=select-position>
                                        <select id=select5>
                                            <option value=0 selected>English</option>
                                            <option value=1>Español</option>
                                            <option value=2>Filipino</option>
                                            <option value=3>Français</option>
                                            <option value=4>العربية</option>
                                            <option value=5>हिन्दी</option>
                                            <option value=6>বাংলা</option>
                                        </select>
                                    </div> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-4 col-12"> -->
                    <div class="col-lg-7 col-md-6 col-12">
                        <div class=top-middle>
                            <ul class=useful-links>
                                <li><a href=<?= base_url('Home')?>>Home</a></li>
                                <li><a href=about-us.html>About Us</a></li>
                                <li><a href=contact.html>Contact Us</a></li>
                                <li><a href=<?= base_url('Home/FindWorkers')?>>Find worker</a></li>
                                <li><a href=Buy-items.html>Buy Items</a></li>

                                <li> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                        <a>Sell Items</a>
                                    </button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class=top-end>
                            <div class=user>
                                <!-- <i class="lni lni-user"></i> -->
                              <ul>
                                <li>
                                    <a href="transportservice.html" style="color: aliceblue;">Transports</a>
                                </li>
                              </ul>
                            </div>
                            <ul class=user-login>
                                <li>
                                    <!-- <?php if($this->session->admin_id){ ?> -->
                                        <a href="<?= base_url('Home/LogOut') ?>">Log Out</a>
                                   <!-- <?php }else{ ?> -->
                                    <a href="<?= base_url('Home/Login') ?>">Sign In</a>
                                    <!-- <?php } ?> -->
                                  
                                </li>
                                <?php if(!$this->session->admin_id){ ?>
                                <li>
                                    <a href="<?= base_url('Home/Registration') ?>">Register</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class=header-middle>
            <div class=container>
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">

                        <a class=navbar-brand href=index.html>
                            <img src="<?= base_url()?>web_assets/images/logo/logo2.jpg" alt=Logo>
                        </a>

                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">

                        <div class=main-menu-search>

                            <div class="navbar-search search-style-5">
                                <div class=search-select>
                                    <div class=select-position>
                                        <select id=select1>
                                            <option selected>All</option>
                                            <option value=1>option 01</option>
                                            <option value=2>option 02</option>
                                            <option value=3>option 03</option>
                                            <option value=4>option 04</option>
                                            <option value=5>option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=search-input>
                                    <input type=text placeholder=Search>
                                </div>
                                <div class=search-btn>
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class=middle-right-area>
                            <div class=nav-hotline>
                                <i class="lni lni-phone"></i>
                                <h3>Phone No:
                                    <span>96043 66262</span>
                                </h3>
                            </div>
                            <div class=navbar-cart>
                                <div class=wishlist>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class=total-items>0</span>
                                    </a>
                                </div>
                                <div class=cart-items>
                                    <a href="javascript:void(0)" class=main-btn>
                                        <i class="lni lni-cart"></i>
                                        <span class=total-items>2</span>
                                    </a>

                                    <div class=shopping-item>
                                        <div class=dropdown-cart-header>
                                            <span>2 Items</span>
                                            <a href=cart.html>View Cart</a>
                                        </div>
                                        <ul class=shopping-list>
                                            <li>
                                                <a href="javascript:void(0)" class=remove title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class=cart-img-head>
                                                    <a class=cart-img href=product-details.html><img
                                                            src="<?= base_url()?>web_assets/images/header/cart-items/item1.jpg" alt="#"></a>
                                                </div>
                                                <div class=content>
                                                    <h4><a href=product-details.html>
                                                            Apple Watch Series 6</a></h4>
                                                    <p class=quantity>1x - <span class=amount>$99.00</span></p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class=remove title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class=cart-img-head>
                                                    <a class=cart-img href=product-details.html><img
                                                            src="<?= base_url()?>web_assets/images/header/cart-items/item2.jpg" alt="#"></a>
                                                </div>
                                                <div class=content>
                                                    <h4><a href=product-details.html>Wi-Fi Smart Camera</a></h4>
                                                    <p class=quantity>1x - <span class=amount>$35.00</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class=bottom>
                                            <div class=total>
                                                <span>Total</span>
                                                <span class=total-amount>$134.00</span>
                                            </div>
                                            <div class=button>
                                                <a href=checkout.html class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class=container>
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class=nav-inner>

                        <div class=mega-category-menu>
                            <span class=cat-button><i class="lni lni-menu"></i>All Categories</span>
                            <ul class=sub-category>
                                <li><a href=product-grids.html>Electronics <i class="lni lni-chevron-right"></i></a>
                                    <ul class=inner-sub-category>
                                        <li><a href=product-grids.html>Digital Cameras</a></li>
                                        <li><a href=product-grids.html>Camcorders</a></li>
                                        <li><a href=product-grids.html>Camera Drones</a></li>
                                        <li><a href=product-grids.html>Smart Watches</a></li>
                                        <li><a href=product-grids.html>Headphones</a></li>
                                        <li><a href=product-grids.html>MP3 Players</a></li>
                                        <li><a href=product-grids.html>Microphones</a></li>
                                        <li><a href=product-grids.html>Chargers</a></li>
                                        <li><a href=product-grids.html>Batteries</a></li>
                                        <li><a href=product-grids.html>Cables & Adapters</a></li>
                                    </ul>
                                </li>
                                <li><a href=product-grids.html>accessories</a></li>
                                <li><a href=product-grids.html>Televisions</a></li>
                                <li><a href=product-grids.html>best selling</a></li>
                                <li><a href=product-grids.html>top 100 offer</a></li>
                                <li><a href=product-grids.html>sunglass</a></li>
                                <li><a href=product-grids.html>watch</a></li>
                                <li><a href=product-grids.html>man’s product</a></li>
                                <li><a href=product-grids.html>Home Audio & Theater</a></li>
                                <li><a href=product-grids.html>Computers & Tablets </a></li>
                                <li><a href=product-grids.html>Video Games </a></li>
                                <li><a href=product-grids.html>Home Appliances </a></li>
                            </ul>
                        </div>


                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type=button data-bs-toggle=collapse
                                data-bs-target="#navbarSupportedContent" aria-controls=navbarSupportedContent
                                aria-expanded=false aria-label="Toggle navigation">
                                <span class=toggler-icon></span>
                                <span class=toggler-icon></span>
                                <span class=toggler-icon></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id=navbarSupportedContent>
                                <ul id=nav class="navbar-nav ms-auto">
                                    <li class=nav-item>
                                        <a href=index.html class=active aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class=nav-item>
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle=collapse
                                            data-bs-target="#submenu-1-2" aria-controls=navbarSupportedContent
                                            aria-expanded=false aria-label="Toggle navigation">Info</a>
                                        <ul class="sub-menu collapse" id=submenu-1-2>
                                            <li class=nav-item><a href=about-us.html>About Us</a></li>
                                            <li class=nav-item><a href=contact.html>Contact Us</a></li>
                                            <li class=nav-item><a href=faq.html>Faq</a></li>
                                            <li class=nav-item><a href=login.html>Login</a></li>
                                            <li class=nav-item><a href=register.html>Register</a></li>
                                            <!-- <li class=nav-item><a href=mail-success.html>Mail Success</a></li> -->
                                            <li class=nav-item><a href=404.html>404 Error</a></li>
                                        </ul>
                                    </li>
                                    <li class=nav-item>
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle=collapse
                                            data-bs-target="#submenu-1-3" aria-controls=navbarSupportedContent
                                            aria-expanded=false aria-label="Toggle navigation">more services</a>
                                        <ul class="sub-menu collapse" id=submenu-1-3>
                                            <li class=nav-item><a href="transportservice.html">Transport services</a></li>
                                            <li class=nav-item><a href=product-grids.html>Shop Grid</a></li>
                                            <li class=nav-item><a href=product-list.html>Shop List</a></li>
                                            <li class=nav-item><a href=product-details.html>shop Single</a></li>
                                            <li class=nav-item><a href=cart.html>Cart</a></li>
                                            <li class=nav-item><a href=checkout.html>Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class=nav-item>
                                        <!-- <a href="findworker2.html" href="javascript:void(0)" data-bs-toggle=collapse
                                            data-bs-target="#submenu-1-4" aria-controls=navbarSupportedContent
                                            aria-expanded=false aria-label="Toggle navigation"><a
                                                href="findworker2.html">Find worker</a></a> -->
                                        <!-- <ul class="sub-menu collapse" id=submenu-1-4>
                                            <li class=nav-item><a href=blog-grid-sidebar.html>Blog Grid Sidebar</a>
                                            </li>
                                            <li class=nav-item><a href=blog-single.html>Blog Single</a></li>
                                            <li class=nav-item><a href=blog-single-sidebar.html>Blog Single
                                                    Sibebar</a></li>
                                        </ul> -->

                                        <a href="<?= base_url('Home/FindWorkers')?>">Find worker</a>
                                    </li>
                                    <li class=nav-item>
                                        <a href=Buy-items.html>Buy Items</a>
                                    </li>


                                    <li class=nav-item>
                                        <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#myModal">
                                            <a data-bs-toggle="modal"
                                            data-bs-target="#myModal">Sell Items</a>
                                        </button> -->
                                        <a data-bs-toggle="modal" data-bs-target="#myModal"
                                            style="cursor: pointer;">Sell Items</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">

                    <div class=nav-social>
                        <h5 class=title>Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <!-- <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li> -->
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </header>


    <!-- The Modal  start-->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title ">Post Your Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form action="/action_page.php" class="was-validated">

                        <!-- <div class="mb-4 mt-4">
                            <h5>SELECTED CATEGORY </h5>
                        </div> -->


                        <div>
                            <h6 class="mb-4 mt-4">INCLUDE SOME DETAILS</h6>
                            <hr>

                            <div class="mb-4 mt-4">
                                <!-- <label>Select Type*</label>
                                <select class="form-select"  >
                                    <option>Two Wheeler</option>
                                </select> -->
                                <label>Select Type*</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option value="Two Wheeler">Select Type</option>
                                    <option value="Two Wheeler">Two Wheeler</option>
                                    <option value="Four Wheeler">Four Wheeler</option>
                                    <option value="Animmal">Animal</option>
                                </select>


                            </div>


                            <div>
                                <label> Select Brand *</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Select Brand</option>
                                    <option value="maruti-suzuki">Maruti Suzuki</option>
                                    <option value="hyundai">Hyundai</option>
                                    <option value="tata">Tata</option>
                                    <option value="mahindra">Mahindra</option>
                                    <option value="toyota">Toyota</option>
                                    <option value="cars-honda">Honda</option>
                                    <optgroup label="All Brand"></optgroup>
                                    <option value="byd">BYD</option>
                                    <option value="audi-1">Audi</option>
                                    <option value="ambassador-1">Ambassador</option>
                                    <option value="ashok-1">Ashok</option>
                                    <option value="ashok-leyland-1">Ashok Leyland</option>
                                    <option value="aston-1">Aston</option>
                                    <option value="aston-martin-1">Aston Martin</option>
                                    <option value="bajaj">Bajaj</option>
                                    <option value="bentley-1">Bentley</option>
                                    <option value="citroen-1">Citroen</option>
                                    <option value="bmw">BMW</option>
                                    <option value="bugatti">Bugatti</option>
                                    <option value="cadillac">Cadillac</option>
                                    <option value="caterham">Caterham</option>
                                    <option value="chevrolet">Chevrolet</option>
                                    <option value="chrysler">Chrysler</option>
                                    <option value="conquest">Conquest</option>
                                    <option value="daewoo">Daewoo</option>
                                    <option value="datsun">Datsun</option>
                                    <option value="dc">Dc</option>
                                    <option value="dodge">Dodge</option>
                                    <option value="eicher-polaris">Eicher Polaris</option>
                                    <option value="ferrari">Ferrari</option>
                                    <option value="fiat">Fiat</option>
                                    <option value="force-motors">Force Motors</option>
                                    <option value="ford">Ford</option>
                                    <option value="cars-honda">Honda</option>
                                    <option value="hummer">Hummer</option>
                                    <option value="hyundai">Hyundai</option>
                                    <option value="icml">ICML</option>
                                    <option value="infiniti">Infiniti</option>
                                    <option value="isuzu">Isuzu</option>
                                    <option value="jaguar">Jaguar</option>
                                    <option value="jeep">Jeep</option>
                                    <option value="kia">Kia</option>
                                    <option value="lamborghini">Lamborghini</option>
                                    <option value="land-rover">Land Rover</option>
                                    <option value="lexus">Lexus</option>
                                    <option value="mahindra">Mahindra</option>
                                    <option value="mahindra-renault">Mahindra Renault</option>
                                    <option value="maruti-suzuki">Maruti Suzuki</option>
                                    <option value="maserati">Maserati</option>
                                    <option value="maybach">Maybach</option>
                                    <option value="mazda">Mazda</option>
                                    <option value="mercedes-benz">Mercedes-Benz</option>
                                    <option value="mg">MG</option>
                                    <option value="mini">Mini</option>
                                    <option value="mitsubishi">Mitsubishi</option>
                                    <option value="nissan">Nissan</option>
                                    <option value="opel">Opel</option>
                                    <option value="peugeot">Peugeot</option>
                                    <option value="porsche">Porsche</option>
                                    <option value="premier">Premier</option>
                                    <option value="renault">Renault</option>
                                    <option value="rolls-royce">Rolls-Royce</option>
                                    <option value="san">San</option>
                                    <option value="sipani">Sipani</option>
                                    <option value="skoda">Skoda</option>
                                    <option value="smart">Smart</option>
                                    <option value="ssangyong">Ssangyong</option>
                                    <option value="subaru">Subaru</option>
                                    <option value="tata">Tata</option>
                                    <option value="toyota">Toyota</option>
                                    <option value="volkswagen">Volkswagen</option>
                                    <option value="volvo">Volvo</option>
                                </select>

                            </div>


                        </div>

                        <!-- year select -->

                        <div class="mb-4 mt-4">
                            <label for="uname" class="form-label">Select Year *</label>
                            <input type="text" class="form-control" id="uname" name="uname"
                                placeholder="please enter year" required>

                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <!-- fuel section  -->
                        <div class="mb-4 mt-4">
                            <label>Select Fuel *</label> <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Diesel</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Electric</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">LPG</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Petrol</label>
                            </div>

                        </div>

                        <!-- fuel section end -->
                        <div class="mb-4 mt-4">
                            <label>Select Transmission *</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Automatic</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Manual</label>
                            </div>
                        </div>

                        <!-- km driven -->
                        <div class="mb-4 mt-4">
                            <label for="uname" class="form-label">KM driven *</label> <br>
                            <input type="number" class="form-control" id="uname" name="uname" required>

                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <!-- km driven -->

                        <!-- No. of Owners -->
                        <div class="mb-4 mt-4">
                            <label>No. of Owners *</label> <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">1st</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">2nd</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">3rd</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">4th</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">4 +</label>
                            </div>

                        </div>
                        <!-- No. of Owners -->



                        <!-- Add Title -->
                        <div class="mb-4 mt-4">
                            <label for="uname" class="form-label">Add Title *</label> <br>
                            <input type="text" class="form-control" id="uname" name="uname" required>

                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <!--Add Title  -->

                        <!-- description -->
                        <div class="mb-4 mt-4">
                            <label>Description *</label>
                            <textarea name="name " id="name" cols="60" rows="10"></textarea>

                        </div>
                        <hr>

                        <!-- description -->
                        <div class="mb-4 mt-4">
                            <div>
                                <h6>SET A PRICE :</h6>
                            </div>
                            <div class="mt-4 mb-4">
                                <label>price*</label>
                                <input type="number" name="number" id="number" class="form-control" placeholder="₹"
                                    required>

                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <hr>
                        <!-- description -->

                        <!-- upload photo -->
                        <div>
                            <div>
                                <h6 class="mb-4 mt-4">UPLOAD UP TO PHOTOS :</h6>
                            </div>
                            <!-- <div class="_1t3S3 _1xheB">
                                <div class="_2-TkM">
                                    <button type="button" class="rui-1rYgw rui-82PI3" role="button" tabindex="0"
                                        data-aut-id="" title=""> <input type="file" src="cutom-file" alt=""></button>
                                    <div class="_2LfUG"><span>Add photo</span></div>
                                </div>
                            </div> -->

                            <!--  -->
                            <div>
                                <input type="file" src="cutom-file" alt=" img is not upload">
                                <div class="_2LfUG" style="margin-bottom: 10px;"><span>Add photo</span></div>
                                <input type="file" src="cutom-file" alt=" img is not upload">
                                <div class="_2LfUG"><span>Add photo</span></div>
                                <input type="file" src="cutom-file" alt=" img is not upload">
                                <div class="_2LfUG"><span>Add photo</span></div>
                            </div>

                        </div>
                        <!-- upload photo end -->
                        <hr>


                        <!--  YOUR DETAILS -->
                        <div>
                            <h6 class="mt-4 mb-4">YOUR DETAILS :</h6>

                            <div>
                                <label>NAME:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="please enter your name" required>

                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <hr>

                            <div>
                                <label> PHONE NUMBER:</label>
                                <input type="number" name="tel" id="tel" class="form-control"
                                    placeholder="please enter phone number" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="mt-4 mb-4">
                                <label>Select State *</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>select state</option>
                                    <option value="2007598">Andaman &amp; Nicobar Islands</option>
                                    <option value="2001145">Andhra Pradesh</option>
                                    <option value="2001146">Arunachal Pradesh</option>
                                    <option value="2001147">Assam</option>
                                    <option value="2001148">Bihar</option>
                                    <option value="2001149">Chandigarh</option>
                                    <option value="2001178">Chhattisgarh</option>
                                    <option value="2001150">Dadra &amp; Nagar Haveli</option>
                                    <option value="2001151">Daman &amp; Diu</option>
                                    <option value="2001152">Delhi</option>
                                    <option value="2001153">Goa</option>
                                    <option value="2001154">Gujarat</option>
                                    <option value="2001155">Haryana</option>
                                    <option value="2001156">Himachal Pradesh</option>
                                    <option value="2001157">Jammu &amp; Kashmir</option>
                                    <option value="2001158">Jharkhand</option>
                                    <option value="2001159">Karnataka</option>
                                    <option value="2001160">Kerala</option>
                                    <option value="2001161">Lakshadweep</option>
                                    <option value="2001162">Madhya Pradesh</option>
                                    <option value="2001163">Maharashtra</option>
                                    <option value="2001164">Manipur</option>
                                    <option value="2001165">Meghalaya</option>
                                    <option value="2001166">Mizoram</option>
                                    <option value="2001167">Nagaland</option>
                                    <option value="2001168">Odisha</option>
                                    <option value="2001169">Pondicherry</option>
                                    <option value="2001170">Punjab</option>
                                    <option value="2001171">Rajasthan</option>
                                    <option value="2001172">Sikkim</option>
                                    <option value="2001173">Tamil Nadu</option>
                                    <option value="2007599">Telangana</option>
                                    <option value="2001174">Tripura</option>
                                    <option value="2001176">Uttar Pradesh</option>
                                    <option value="2001175">Uttaranchal</option>
                                    <option value="2001177">West Bengal</option>
                                </select>

                            </div>

                            <div>
                                <label>VILLAGE:</label>
                                <input type="text" name="text" id="text" class="form-control"
                                    placeholder="please enter your village" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div>
                                <label>TALUKA:</label>
                                <input type="text" name="text" id="text" class="form-control"
                                    placeholder="please enter your taluka" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div>
                                <label>DIST:</label>
                                <input type="text" name="text" id="text" class="form-control"
                                    placeholder="please enter your dist" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div>
                                <label>PINCODE:</label>
                                <input type="number" name="tel" id="tel" class="form-control"
                                    placeholder="please enter your pincode" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                        </div>


                        <!-- YOUR DETAILS -->







                        <!-- <button type="submit" class="btn btn-primary mt-5 mb-3">Submit</button> -->
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary mt-5 mb-3">Post Now</button>
                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                </div>

            </div>
        </div>
    </div>

    <!-- google translate -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6 md-6 col-12">

                <div id="google_translate_element"></div>

                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL }, 'google_translate_element');
                    }
                </script>

                <script type="text/javascript"
                    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



            </div>
        </div>
    </div>
    <!-- google tranlate -->
