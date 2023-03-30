<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

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
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- icon cdn link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- jquery cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



  <script data-pagespeed-no-defer>(function () {
      function f(a, b, d) { if (a.addEventListener) a.addEventListener(b, d, !1); else if (a.attachEvent) a.attachEvent("on" + b, d); else { var c = a["on" + b]; a["on" + b] = function () { d.call(this); c && c.call(this) } } }; window.pagespeed = window.pagespeed || {}; var g = window.pagespeed; function k(a) { this.g = []; this.f = 0; this.h = !1; this.j = a; this.i = null; this.l = 0; this.b = !1; this.a = 0 } function l(a, b) { var d = b.getAttribute("data-pagespeed-lazy-position"); if (d) return parseInt(d, 0); var d = b.offsetTop, c = b.offsetParent; c && (d += l(a, c)); d = Math.max(d, 0); b.setAttribute("data-pagespeed-lazy-position", d); return d }
      function m(a, b) {
        var d, c, e; if (!a.b && (0 == b.offsetHeight || 0 == b.offsetWidth)) return !1; a: if (b.currentStyle) c = b.currentStyle.position; else { if (document.defaultView && document.defaultView.getComputedStyle && (c = document.defaultView.getComputedStyle(b, null))) { c = c.getPropertyValue("position"); break a } c = b.style && b.style.position ? b.style.position : "" } if ("relative" == c) return !0; e = 0; "number" == typeof window.pageYOffset ? e = window.pageYOffset : document.body && document.body.scrollTop ? e = document.body.scrollTop : document.documentElement &&
          document.documentElement.scrollTop && (e = document.documentElement.scrollTop); d = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight; c = e; e += d; var h = b.getBoundingClientRect(); h ? (e = h.top - d, c = h.bottom) : (h = l(a, b), d = h + b.offsetHeight, e = h - e, c = d - c); return e <= a.f && 0 <= c + a.f
      }
      k.prototype.m = function (a) {
        p(a); var b = this; window.setTimeout(function () {
          var d = a.getAttribute("data-pagespeed-lazy-src"); if (d) if ((b.h || m(b, a)) && -1 != a.src.indexOf(b.j)) {
            var c = a.parentNode, e = a.nextSibling; c && c.removeChild(a); a.c && (a.getAttribute = a.c); a.removeAttribute("onload"); a.tagName && "IMG" == a.tagName && g.CriticalImages && f(a, "load", function () { g.CriticalImages.checkImageForCriticality(this); b.b && (b.a--, b.a || g.CriticalImages.checkCriticalImages()) }); a.removeAttribute("data-pagespeed-lazy-src"); a.removeAttribute("data-pagespeed-lazy-replaced-functions");
            c && c.insertBefore(a, e); if (c = a.getAttribute("data-pagespeed-lazy-srcset")) a.srcset = c, a.removeAttribute("data-pagespeed-lazy-srcset"); a.src = d
          } else b.g.push(a)
        }, 0)
      }; k.prototype.loadIfVisibleAndMaybeBeacon = k.prototype.m; k.prototype.s = function () { this.h = !0; q(this) }; k.prototype.loadAllImages = k.prototype.s; function q(a) { var b = a.g, d = b.length; a.g = []; for (var c = 0; c < d; ++c)a.m(b[c]) } function t(a, b) { return a.a ? null != a.a(b) : null != a.getAttribute(b) }
      k.prototype.u = function () { for (var a = document.getElementsByTagName("img"), b = 0, d; d = a[b]; b++)t(d, "data-pagespeed-lazy-src") && p(d) }; k.prototype.overrideAttributeFunctions = k.prototype.u; function p(a) { t(a, "data-pagespeed-lazy-replaced-functions") || (a.c = a.getAttribute, a.getAttribute = function (a) { "src" == a.toLowerCase() && t(this, "data-pagespeed-lazy-src") && (a = "data-pagespeed-lazy-src"); return this.c(a) }, a.setAttribute("data-pagespeed-lazy-replaced-functions", "1")) }
      g.o = function (a, b) {
        function d() { if (!(c.b && a || c.i)) { var b = 200; 200 < (new Date).getTime() - c.l && (b = 0); c.i = window.setTimeout(function () { c.l = (new Date).getTime(); q(c); c.i = null }, b) } } var c = new k(b); g.lazyLoadImages = c; f(window, "load", function () { c.b = !0; c.h = a; c.f = 200; if (g.CriticalImages) { for (var b = 0, d = document.getElementsByTagName("img"), r = 0, n; n = d[r]; r++)-1 != n.src.indexOf(c.j) && t(n, "data-pagespeed-lazy-src") && b++; c.a = b; c.a || g.CriticalImages.checkCriticalImages() } q(c) }); b.indexOf("data") && ((new Image).src = b); f(window,
          "scroll", d); f(window, "resize", d)
      }; g.lazyLoadInit = g.o;
    })();

    pagespeed.lazyLoadInit(true, "../../pagespeed_static/1.JiBnMqyl6S.gif");


    //  new search list
    function myFunction() {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("list");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }

// search list end

  </script>


  <!-- style -->
  <style>
    .single-product .product-info .price span {
      font-size: 17px;
      font-weight: 700;
      color: #0167f3;
      display: inline-block;
      margin-left: 130px;
    }

    .common-img {
      width: 139px !important;
      margin-left: 25px;
    }

    .common-img2 {
      width: 108px !important;
      margin: auto;
      margin-left: 30px !important;
    }

    .single-product {
      height: 92%;
    }

    .breadcrumbs {
      z-index: auto !important;
    }

    .form-control,
    .select-form {
      -webkit-appearance: menulist !important;
      -moz-appearance: menulist !important;
      -ms-appearance: menulist !important;
      -o-appearance: menulist !important;
      appearance: menulist !important;

    }

    /* sort input */
    #sorting {
      width: 162px;
      height: 37px;
      border-radius: 5px;
      margin-right: 10px;
    }

    .b1 {
      border-radius: 6px;
      background-color: #53dbdf;
      border: none;
      padding: 5px;
    }

    .transport {
      margin-bottom: 34px;
    }

    .VIpgJd-ZVi9od-l4eHX-hSRGPd,
    .VIpgJd-ZVi9od-l4eHX-hSRGPd:link,
    .VIpgJd-ZVi9od-l4eHX-hSRGPd:visited,
    .VIpgJd-ZVi9od-l4eHX-hSRGPd:hover,
    .VIpgJd-ZVi9od-l4eHX-hSRGPd:active {
      font-size: 12px;
      font-weight: bold;
      color: #444;
      text-decoration: none;
      display: none;
    }

    /* responsive mobile with tablet */
    @media screen and (min-width:320px) and (max-width:900px) {
      .single-product .product-image {
        overflow: hidden;
        position: relative;
        left: 25%;

      }

      .mb-5 {
        text-align: center;
      }


      .product-sidebar {
        text-align: center;
      }

      .product-grids .product-grid-topbar .nav {
        float: right !important;
        text-align: left;
        margin-top: 20px;
      }

      .Contact-us {
        display: flex !important;
        margin: auto !important;

      }

      .product-sidebar .single-widget.condition .form-check-input {
        cursor: pointer;
        margin-top: 4px;
        margin-left: 49px;
      }

      .product-sidebar .single-widget.condition .form-check-label {
        cursor: pointer;
        margin-right: 35px;
      }

    }

    /* responsive mobile with tablet */

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
  <!-- style -->

</head>

<body style="color: black;">
  <!-- Dynmic create and header  -->
  <div id="header"></div>
  <!--Dynmic create and header end -->




  <!-- main content start -->

  <div class=breadcrumbs>
    <div class=container>
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">

          <!-- model transport services -->
          <div class=breadcrumbs-content>
            <h1 class="page-title ">Transport services</h1>
            <!-- <button class="b1 " data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
              <h1 class="page-title text-white ">Transport Service Request</h1>
            </button> -->

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
              tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel1">Transport Services Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div>
                      <form action="<?= base_url('Home/store_transport')?>" enctype="multipart/form-data" method ="post">
                        <div class="mt-3 mb-3">
                          <label> <b>Driver Name/ Owner Name:</b> </label>
                          <input type="text" name="driver_name" class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>Mobile No/ WhatApp No:</b> </label>
                          <input type="text" name="mobile_no" class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>Vehicle No:</b> </label>
                          <input type="text" name="veh_no" class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>vehicle type:</b> </label>
                          <select class="form-control form-select form-select-sm" name="veh_type" required aria-label=".form-select-sm example">
                            <option value=""> select vehicle type</option>
                            <option value="1">Two-wheelar</option>
                            <option value="2">Three-wheelar</option>
                            <option value="3">Four-wheelar</option>
                          </select>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>Vehicle Name:</b> </label>
                          <input type="text" name="veh_name" class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>From City:</b> </label>
                          <select class="form-control form-select form-select-sm" required name="from_city" aria-label=".form-select-sm example">
                          <option value=""> select city</option>
                          <?php foreach ($Allcity as $key => $value) { ?>
                            
                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                            <?php } ?>
                          </select>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>To city:</b> </label>
                          <input type="text" name="to_city" class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>From Where By Root To:</b> </label>
                          <input type="text" name="by_root" class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>Date:</b> </label>
                          <input type="date" name="date"  class="form-control" required>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>Time:</b> </label>
                          <input type="time" name="time" class="form-control" required>
                        </div>


                        <div class="mt-3 mb-3">
                          <label>Comment:</label>
                          <div class="form-floating">
                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2"
                              style="height: 100px"></textarea>

                          </div>
                        </div>

                        <div class="mt-3 mb-3">
                          <label><b>Vehicle Photo:</b> </label>
                          <input type="file" name="veh_img" class="form-control" required>
                        </div>


                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
                
                </form>
              </div>
            </div>

          </div>
        </div>
        <!-- model transport services -->
        <div class="col-lg-6 col-md-6 col-12">
          <ul class=breadcrumb-nav>
            <li><a href=index.html><i class="lni lni-home"></i> Home</a></li>
            <li><a href="javascript:void(0)">Shop</a></li>
            <li>Transport Services</li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <section class="product-grids section">
    <div class=container>
      <div class=row>
        <div class="col-lg-3 col-12">

          <div class=product-sidebar>

            <div class="single-widget search">
              <button class="btn btn-outline-info  transport" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                Transport Request</button>

              <h3>Search Transport Services</h3>
              <form action="<?= base_url('Home/s')?>" method="get">
                <!-- search filter -->
                <input type=text id="myInput" name="s" placeholder="Search Here...">
                <button type=submit><i class="lni lni-search-alt"></i></button>
                <!-- search filter -->
              </form>
            </div>


            <div class=single-widget>
              <h3>All City Name</h3>
              <form action="<?= base_url('Home/t')?>" method="get" name="form_category">
              <?php foreach ($Allcity as $key => $value) { ?>
                
              <div class=form-check>
                <input class=form-check-input name="a[]" <?= !empty($this->input->get('a'))?in_array($value->id,$this->input->get('a'))?'checked':'':''?> type=checkbox onclick="form_category.submit()" value="<?= $value->id?>" id=flexCheckDefault1>
                <label class=form-check-label for=flexCheckDefault1>
                  <?= $value->name ?>
                </label>
              </div>
            <?php } ?>
             
              
            </div>

            <div class="single-widget condition">
              <h3>Filter by Type</h3>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="1" <?= !empty($this->input->get('b'))?in_array(1,$this->input->get('b'))?'checked':'':''?> name="b[]" onclick="form_category.submit()" id=flexCheckDefault1>
                <label class=form-check-label for=flexCheckDefault1>
                  Two-wheelar
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="2" <?= !empty($this->input->get('b'))?in_array(2,$this->input->get('b'))?'checked':'':''?>  name="b[]" onclick="form_category.submit()" id=flexCheckDefault2>
                <label class=form-check-label for=flexCheckDefault2>
                  Four-wheelar
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="3" <?= !empty($this->input->get('b'))?in_array(3,$this->input->get('b'))?'checked':'':''?>  name="b[]" onclick="form_category.submit()" id=flexCheckDefault3>
                <label class=form-check-label for=flexCheckDefault3>
                  Three-wheelar
                </label>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="col-lg-9 col-12">
          <div class=product-grids-head>
            <div class=product-grid-topbar>
              <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 col-12">
                  <div class=product-sorting>
                    <label for=sorting>Sort by:</label>
                    <select class="" id="sorting">
                      <option>Popularity</option>
                      <option>Low - High Price</option>
                      <option>High - Low Price</option>
                      <option>Average Rating</option>
                      <option>A - Z Order</option>
                      <option>Z - A Order</option>
                    </select>
                    <!-- <h3 class=total-show-product>Showing: <span>1 - 12 items</span></h3> -->
                  </div>
                </div>
                <div class="col-lg-5 col-md-4 col-12">
                  <nav>
                    <div class="nav nav-tabs" id=nav-tab role=tablist>
                      <button class="nav-link active" id=nav-grid-tab data-bs-toggle=tab data-bs-target="#nav-grid"
                        type=button role=tab aria-controls=nav-grid aria-selected=true><i
                          class="lni lni-grid-alt"></i></button>

                      <button class=nav-link id=nav-list-tab data-bs-toggle=tab data-bs-target="#nav-list" type=button
                        role=tab aria-controls=nav-list aria-selected=false><i class="lni lni-list"></i></button>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
            <div class=tab-content id=nav-tabContent>
              <div class="tab-pane fade show active" id=nav-grid role=tabpanel aria-labelledby=nav-grid-tab>
                <div class=row>

                <?php foreach ($AllTransport as $key => $value) {
                  
                  if($value->veh_type==1){
                    $type='Two-wheelar';
                   }else if($value->veh_type==2){
                    $type='Three-wheelar';
                   }else{
                    $type='Four-wheelar';
                   }
                  ?>
                  <div class="col-lg-4 col-md-6 col-12">

                    <div class=single-product>
                      <div class=product-image>
                        <img src="<?= base_url('uploads/images/'.$value->image)?>" class="common-img " alt="#">

                      </div>
                      <div class=product-info>

                        <div class=price>
                          <div class="mb-5">
                            <p><b>from where by root to: </b></p>
                            <p><?= $value->city ?> To <?= $value->to_city ?></p>
                            <hr>
                            <p><b> vehicle No:</b> <?= $value->veh_no?> </p>
                            <p><b>vehicle type:</b> <?= $type ?></p>


                          </div>
                          <hr>
                          <div>

                            <!-- Button trigger modal -->
                            <?php if($this->session->admin_id){ ?>
                            <button type="button" class="btn btn-primary Contact-us" onclick="contact_worker('<?= $this->url_encrypt->encode($value->id)?>')" data-bs-toggle="modal"
                              data-bs-target="#exampleModal<?= $key?>">Contact-us</button>
<?php }else{ ?>
  <a href="<?= base_url('Home/Login')?>"  class="btn btn-primary">Contact-us</a>
  <?php } ?>
                    

                            <div class="modal fade" id="exampleModal<?= $key?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $key?>"
                              aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transport Services:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div>
                                      <form>
                                        <div class="mt-3 mb-3">
                                          <label> <b>Driver Name/ Owner Name:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->name?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Mobile No/ WhatApp No:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->name?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Vehicle No:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->name?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>vehicle type:</b> </label>
                                          <select class="form-control form-select form-select-sm"
                                            aria-label=".form-select-sm example" disabled>
                                            <option selected> select vehicle type</option>
                                            <option value="1" <?= (1==$value->veh_type)?'selected':'' ?>>Two-wheelar</option>
                                            <option value="2" <?= (2==$value->veh_type)?'selected':'' ?>>Three-wheelar</option>
                                            <option value="3" <?= (3==$value->veh_type)?'selected':'' ?>>Four-wheelar</option>
                                          </select>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Vehicle Name:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->name?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>From City:</b> </label>
                                          <select class="form-control form-select form-select-sm" disabled
                                            aria-label=".form-select-sm example">
                                            <?php foreach ($Allcity as $key => $city) { ?>
                            
                            <option value="<?= $city->id ?>" <?= ($city->id==$value->from_city)?'selected':'' ?>><?= $city->name ?></option>
                            <?php } ?>
                                          </select>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>To city:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->to_city?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>From Where By Root To:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->by_root?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Date:</b> </label>
                                          <input type="date" class="form-control" value="<?= $value->date?>" disabled>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Time:</b> </label>
                                          <input type="time" class="form-control" value="<?= $value->time?>" disabled>
                                        </div>


                                        <div class="mt-3 mb-3">
                                          <label>Comment:</label>
                                          <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                              id="floatingTextarea2" style="height: 100px" disabled><?= $value->comment?></textarea>

                                          </div>
                                        </div>



                                      </form>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button> -->
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- <a href="#"><img
                                src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="20px"
                                style="margin-left:20px ;"></a> -->
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>

                  <?php } ?>
                 
                </div>
               
              </div>



              <!-- secound section start -->

              <div class="tab-pane fade" id=nav-list role=tabpanel aria-labelledby=nav-list-tab>
                <div class=row>
                  <div class="col-lg-12 col-md-12 col-12">

                    <div class=single-product>
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class=product-image>
                            <img src="<?= base_url()?>web_assets/images/transport/tata_407.jpg" class="common-img " alt="#">
                            <!-- <div class=button>
                              <a href=product-details.html class=btn><i class="lni lni-cart"></i> Add to
                                Cart</a>
                            </div> -->
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                          <div class=product-info>

                            <div class="mb-5">
                              <p><b>from where by root to: </b></p>
                              <p>Pune To Mumbai</p>
                              <hr>
                              <p><b> vehicle No:</b> MH-23 <b> B</b> 5555</p>
                              <p><b>vehicle type:</b> Four-wheelar</p>


                            </div>
                            <hr>
                            <div>

                              <!-- Button trigger modal -->

                              <button type="button" class="btn btn-primary Contact-us" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">Contact-us</button>

                              <div class="modal fade" id="exampleModal1" tabindex="-1"
                                aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel1">Transport Services:</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div>
                                        <form>
                                          <div class="mt-3 mb-3">
                                            <label> <b>Driver Name/ Owner Name:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Mobile No/ WhatApp No:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Vehicle No:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>vehicle type:</b> </label>
                                            <select class="form-control form-select form-select-lg mb-3"
                                              aria-label=".form-select-lg example">
                                              <option selected> select vehicle type</option>
                                              <option value="1">Two-wheelar</option>
                                              <option value="2">Three-wheelar</option>
                                              <option value="3">Four-wheelar</option>
                                            </select>
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Vehicle Name:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>From City:</b> </label>
                                            <select class="form-control form-select form-select-lg mb-3"
                                              aria-label=".form-select-lg example">
                                              <option selected>Open this select menu</option>
                                              <option value="pune">pune</option>
                                              <option value="Beed">Beed</option>
                                              <option value="3"></option>
                                            </select>
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>To city:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>From Where By Root To:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Date:</b> </label>
                                            <input type="date" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Time:</b> </label>
                                            <input type="time" class="form-control">
                                          </div>


                                          <div class="mt-3 mb-3">
                                            <label>Comment:</label>
                                            <div class="form-floating">
                                              <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"></textarea>

                                            </div>
                                          </div>



                                        </form>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <!-- <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Close</button> -->
                                      <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Close</button>
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

                </div>
                <div class="col-lg-12 col-md-12 col-12">

                  <div class=single-product>
                    <div class="row align-items-center">
                      <div class="col-lg-4 col-md-4 col-12">
                        <div class=product-image>
                          <img src="<?= base_url()?>web_assets/images/transport/pickup_8ft.jpg" class="common-img " alt="#">
                          <!-- <span class=sale-tag>-25%</span> -->
                          <!-- <div class=button>
                              <a href=product-details.html class=btn><i class="lni lni-cart"></i> Add to
                                Cart</a>
                            </div> -->
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-12">
                        <div class=product-info>

                          <div class="mb-5">
                            <p><b>from where by root to: </b></p>
                            <p>Pune To Mumbai</p>
                            <hr>
                            <p><b> vehicle No:</b> MH-23 <b> B</b> 5555</p>
                            <p><b>vehicle type:</b> Four-wheelar</p>


                          </div>
                          <hr>
                          <div>

                            <!-- Button trigger modal -->

                            <button type="button" class="btn btn-primary Contact-us" data-bs-toggle="modal"
                              data-bs-target="#exampleModal1">Contact-us</button>

                            <div class="modal fade" id="exampleModal1" tabindex="-1"
                              aria-labelledby="exampleModalLabel1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Transport Services:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div>
                                      <form>
                                        <div class="mt-3 mb-3">
                                          <label> <b>Driver Name/ Owner Name:</b> </label>
                                          <input type="text" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Mobile No/ WhatApp No:</b> </label>
                                          <input type="text" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Vehicle No:</b> </label>
                                          <input type="text" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>vehicle type:</b> </label>
                                          <select class="form-control form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example">
                                            <option selected> select vehicle type</option>
                                            <option value="1">Two-wheelar</option>
                                            <option value="2">Three-wheelar</option>
                                            <option value="3">Four-wheelar</option>
                                          </select>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Vehicle Name:</b> </label>
                                          <input type="text" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>From City:</b> </label>
                                          <select class="form-control form-select form-select-lg mb-3"
                                            aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="pune">pune</option>
                                            <option value="Beed">Beed</option>
                                            <option value="3"></option>
                                          </select>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>To city:</b> </label>
                                          <input type="text" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>From Where By Root To:</b> </label>
                                          <input type="text" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Date:</b> </label>
                                          <input type="date" class="form-control">
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Time:</b> </label>
                                          <input type="time" class="form-control">
                                        </div>


                                        <div class="mt-3 mb-3">
                                          <label>Comment:</label>
                                          <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                              id="floatingTextarea2" style="height: 100px"></textarea>

                                          </div>
                                        </div>



                                      </form>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Close</button> -->
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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
                <div class="col-lg-12 col-md-12 col-12">

                  <div class=single-product>
                    <div class="row align-items-center">
                      <div class="col-lg-4 col-md-4 col-12">
                        <div class=product-image>
                          <img src="<?= base_url()?>web_assets/images/transport/ace_helper.jpg" class="common-img " alt="#">
                          <!-- <div class=button>
                              <a href=product-details.html class=btn><i class="lni lni-cart"></i> Add to
                                Cart</a>
                            </div> -->
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-12">
                        <div class=product-info>

                          <div class=price>
                            <div class="mb-5">
                              <p><b>from where by root to: </b></p>
                              <p>Pune To Mumbai</p>
                              <hr>
                              <p><b> vehicle No:</b> MH-23 <b> B</b> 5555</p>
                              <p><b>vehicle type:</b> Four-wheelar</p>


                            </div>
                            <hr>
                            <div>

                              <!-- Button trigger modal -->

                              <button type="button" class="btn btn-primary Contact-us" data-bs-toggle="modal"
                                data-bs-target="#exampleModal1">Contact-us</button>

                              <div class="modal fade" id="exampleModal1" tabindex="-1"
                                aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel1">Transport Services:</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div>
                                        <form>
                                          <div class="mt-3 mb-3">
                                            <label> <b>Driver Name/ Owner Name:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Mobile No/ WhatApp No:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Vehicle No:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>vehicle type:</b> </label>
                                            <select class="form-control form-select form-select-lg mb-3"
                                              aria-label=".form-select-lg example">
                                              <option selected> select vehicle type</option>
                                              <option value="1">Two-wheelar</option>
                                              <option value="2">Three-wheelar</option>
                                              <option value="3">Four-wheelar</option>
                                            </select>
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Vehicle Name:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>From City:</b> </label>
                                            <select class="form-control form-select form-select-lg mb-3"
                                              aria-label=".form-select-lg example">
                                              <option selected>Open this select menu</option>
                                              <option value="pune">pune</option>
                                              <option value="Beed">Beed</option>
                                              <option value="3"></option>
                                            </select>
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>To city:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>From Where By Root To:</b> </label>
                                            <input type="text" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Date:</b> </label>
                                            <input type="date" class="form-control">
                                          </div>

                                          <div class="mt-3 mb-3">
                                            <label><b>Time:</b> </label>
                                            <input type="time" class="form-control">
                                          </div>


                                          <div class="mt-3 mb-3">
                                            <label>Comment:</label>
                                            <div class="form-floating">
                                              <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"></textarea>

                                            </div>
                                          </div>



                                        </form>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <!-- <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Close</button> -->
                                      <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Close</button>
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
                  <div class="col-lg-12 col-md-12 col-12">

                    <div class=single-product>
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class=product-image>

                            <img src="<?= base_url()?>web_assets/images/transport/3_wheeler_helper.jpg" class="common-img " alt="#">
                            <!-- <div class=button>
                              <a href=product-details.html class=btn><i class="lni lni-cart"></i> Add to
                                Cart</a>
                            </div> -->
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                          <div class=product-info>

                            <div class=price>
                              <div class="mb-5">
                                <p><b>from where by root to: </b></p>
                                <p>Pune To Mumbai</p>
                                <hr>
                                <p><b> vehicle No:</b> MH-23 <b> B</b> 5555</p>
                                <p><b>vehicle type:</b> Four-wheelar</p>


                              </div>
                              <hr>
                              <div>

                                <!-- Button trigger modal -->

                                <button type="button" class="btn btn-primary Contact-us" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal1">Contact-us</button>

                                <div class="modal fade" id="exampleModal1" tabindex="-1"
                                  aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Transport Services:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div>
                                          <form>
                                            <div class="mt-3 mb-3">
                                              <label> <b>Driver Name/ Owner Name:</b> </label>
                                              <input type="text" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Mobile No/ WhatApp No:</b> </label>
                                              <input type="text" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Vehicle No:</b> </label>
                                              <input type="text" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>vehicle type:</b> </label>
                                              <select class="form-control form-select form-select-lg mb-3"
                                                aria-label=".form-select-lg example">
                                                <option selected> select vehicle type</option>
                                                <option value="1">Two-wheelar</option>
                                                <option value="2">Three-wheelar</option>
                                                <option value="3">Four-wheelar</option>
                                              </select>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Vehicle Name:</b> </label>
                                              <input type="text" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>From City:</b> </label>
                                              <select class="form-control form-select form-select-lg mb-3"
                                                aria-label=".form-select-lg example">
                                                <option selected>Open this select menu</option>
                                                <option value="pune">pune</option>
                                                <option value="Beed">Beed</option>
                                                <option value="3"></option>
                                              </select>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>To city:</b> </label>
                                              <input type="text" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>From Where By Root To:</b> </label>
                                              <input type="text" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Date:</b> </label>
                                              <input type="date" class="form-control">
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Time:</b> </label>
                                              <input type="time" class="form-control">
                                            </div>


                                            <div class="mt-3 mb-3">
                                              <label>Comment:</label>
                                              <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                  id="floatingTextarea2" style="height: 100px"></textarea>

                                              </div>
                                            </div>



                                          </form>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Close</button> -->
                                        <button type="button" class="btn btn-primary"
                                          data-bs-dismiss="modal">Close</button>
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
                    <div class="col-lg-12 col-md-12 col-12">

                      <div class=single-product>
                        <div class="row align-items-center">
                          <div class="col-lg-4 col-md-4 col-12">
                            <div class=product-image>
                              <img src="<?= base_url()?>web_assets/images/transport/2_wheeler.jpg" class="common-img " alt="#">
                              <!-- <span class=sale-tag>-50%</span> -->
                              <!-- <div class=button>
                              <a href=product-details.html class=btn><i class="lni lni-cart"></i> Add to
                                Cart</a>
                            </div> -->
                            </div>
                          </div>
                          <div class="col-lg-8 col-md-8 col-12">
                            <div class=product-info>

                              <div class=price>
                                <div class="mb-5">
                                  <p><b>from where by root to: </b></p>
                                  <p>Pune To Mumbai</p>
                                  <hr>
                                  <p><b> vehicle No:</b> MH-23 <b> B</b> 5555</p>
                                  <p><b>vehicle type:</b> Four-wheelar</p>


                                </div>
                                <hr>
                                <div>

                                  <!-- Button trigger modal -->

                                  <button type="button" class="btn btn-primary Contact-us" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1">Contact-us</button>

                                  <div class="modal fade" id="exampleModal1" tabindex="-1"
                                    aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel1">Transport Services: </h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div>
                                            <form>
                                              <div class="mt-3 mb-3">
                                                <label> <b>Driver Name/ Owner Name:</b> </label>
                                                <input type="text" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>Mobile No/ WhatApp No:</b> </label>
                                                <input type="text" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>Vehicle No:</b> </label>
                                                <input type="text" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>vehicle type:</b> </label>
                                                <select class="form-control form-select form-select-lg mb-3"
                                                  aria-label=".form-select-lg example">
                                                  <option selected> select vehicle type</option>
                                                  <option value="1">Two-wheelar</option>
                                                  <option value="2">Three-wheelar</option>
                                                  <option value="3">Four-wheelar</option>
                                                </select>
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>Vehicle Name:</b> </label>
                                                <input type="text" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>From City:</b> </label>
                                                <select class="form-control form-select form-select-lg mb-3"
                                                  aria-label=".form-select-lg example">
                                                  <option selected>Open this select menu</option>
                                                  <option value="pune">pune</option>
                                                  <option value="Beed">Beed</option>
                                                  <option value="3"></option>
                                                </select>
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>To city:</b> </label>
                                                <input type="text" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>From Where By Root To:</b> </label>
                                                <input type="text" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>Date:</b> </label>
                                                <input type="date" class="form-control">
                                              </div>

                                              <div class="mt-3 mb-3">
                                                <label><b>Time:</b> </label>
                                                <input type="time" class="form-control">
                                              </div>


                                              <div class="mt-3 mb-3">
                                                <label>Comment:</label>
                                                <div class="form-floating">
                                                  <textarea class="form-control" placeholder="Leave a comment here"
                                                    id="floatingTextarea2" style="height: 100px"></textarea>

                                                </div>
                                              </div>



                                            </form>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <!-- <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Close</button> -->
                                          <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Close</button>
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
                    </div>
                    <div class=row>
                      <div class=col-12>

                        <div class="pagination left">
                          <ul class=pagination-list>
                            <li class=active><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>

  <!-- main content end -->

  <!-- dynamic footer and header create -->
  <div id="footer"></div>
  <script>
    $(document).ready(function () {
      $('#header').load("common-header.html");
      $('#footer').load("common-footer.html");
    });



  </script>
  <!-- dynamic footer and header end-->

</body>

</html>


<script>
  function contact_worker(worker_id) {
    $.ajax({
  url: "<?= base_url('Home/TransportContact')?>",
  type: "GET",
  data: {id : worker_id},
  // cache: false,
  success: function(html){
  }
});
    
  }
</script>