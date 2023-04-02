
  <!-- main content start -->

  <style>
    .product-image img{
      height: 200px;
    }
  </style>
  <div class=breadcrumbs>
    <div class=container>
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class=breadcrumbs-content>
            <h1 class=page-title>Find Worker</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class=breadcrumb-nav>
            <li><a href=index-2.html><i class="lni lni-home"></i> Home</a></li>
            <li><a href="javascript:void(0)">Shop</a></li>
            <li>Find Worker</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>

  <section class="product-grids section">
    <div class=container>
      <div class=row>
        <div class="col-lg-3 col-12">

          <div class=product-sidebar>

            <div class="single-widget search">
              <h3>Search Worker</h3>
              <form action="<?= base_url('Home/filter')?>" method="get">
                <input type=text name="b" placeholder="Search Here..." value="<?= $this->input->get('b')?>">
                <button type=submit><i class="lni lni-search-alt"></i></button>
              </form>
            </div>


            <div class="single-widget condition">
              <h3>All Categories</h3>
              <form action="<?= base_url('Home/filter')?>" method="get" name="form_category">
              <?php foreach ($AllCategory as $key => $value) { ?>
                
              <div class=form-check>
                <input class=form-check-input name="a[]" <?= !empty($this->input->get('a'))?in_array($value->id,$this->input->get('a'))?'checked':'':''?> type=checkbox onclick="form_category.submit()" value="<?= $value->id?>" id=flexCheckDefault1>
                <label class=form-check-label for=flexCheckDefault1>
                  <?= $value->name ?>
                </label>
              </div>
            <?php } ?>
             
              
            </div>


          </div>

        </div>
        <div class="col-lg-9 col-12">
          <div class=product-grids-head>
            <div class=product-grid-topbar>
              <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 col-12">
                  <div class=product-sorting>
                    <label >Location:</label>
                    <select class=form-control id=sorting name="location[]" onchange="form_category.submit()">
                      <option value="">Select Location</option>
                      <?php foreach ($Allcity as $key => $city) { ?>
                        <option value="<?= $city->id ?>" <?= !empty($this->input->get('location'))?in_array($city->id,$this->input->get('location'))?'selected':'':''?>><?= $city->name ?></option>
              <?php } ?>
                    </select>
                  </div>
                </div>
                </form>
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
                <?php foreach ($AllWorkers as $key => $value) { ?>
                  <div class="col-lg-4 col-md-6 col-12">

                    <div class=single-product>
                      <div class=product-image>
                        <img src="<?= base_url('uploads/images/'.$value->image)?>" class="common-img " alt="#">

                      </div>
                      <div class=product-info>

                        <div class=price>
                          <div class="mb-5">
                            <p><b>Shop Name:</b><?= $value->shop_name?> </p>
                            <hr>
                            <p><b> Name:</b> <?= $value->name?></p>


                          </div>
                          <hr>
                          <div>

                            <!-- Button trigger modal -->
                          <?php if($this->session->admin_id){ ?>
                            <button type="button" class="btn btn-primary" onclick="contact_worker('<?= $this->url_encrypt->encode($value->id)?>')" data-bs-toggle="modal"
                              data-bs-target="#exampleModal<?= $key?>">Contact-us</button>
<?php }else{ ?>
  <a href="<?= base_url('Home/Login')?>"  class="btn btn-primary">Contact-us</a>
  <?php } ?>
                            <div class="modal fade" id="exampleModal<?= $key?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Service Provider Details:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div>
                                      <form>
                                        <!-- slider -->
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                          <div class="carousel-inner" style="border-radius: 5px;    border: 9px double gainsboro;">
                                            <!-- class="d-block w-100"  -->
                                            <div class="carousel-item active">
                                              <img src="<?= base_url('uploads/images/'.$value->image2)?>"  class="d-block w-100"  alt="img is not upload">
                                            </div>
                                            <div class="carousel-item">
                                              <img src="<?= base_url('uploads/images/'.$value->image3)?>"   class="d-block w-100"  alt="img is not upload">
                                            </div>
                                            <div class="carousel-item">
                                              <img src="<?= base_url('uploads/images/'.$value->image4)?>"  class="d-block w-100" alt="img is not upload.">
                                            </div>
                                          </div>
                                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                          </button>
                                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                          </button>
                                        </div>

                                        <hr>

                                        <!-- slider -->
                                        <div class="mt-3 mb-3">
                                          <label> <b>Name:</b> </label>
                                          <input type="text" class="form-control" value="<?= $value->name?>" readonly >
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>location:</b> </label>
                                          <input type="text" value="<?= $value->location ?>" readonly class="form-control" >
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Whatsapp / Contact No:</b></label>
                                          <input type="number" class="form-control" readonly value="<?= $value->whatsapp_no ?>" style="width:60%;"><span><a href="https://api.whatsapp.com/send?phone=<?= $value->whatsapp_no ?>">
<img
                                            src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="30px"
                                            style="margin-left:20px; position: relative;  left: 217px;  bottom: 35px;"></a> </span>
                                           

                                        </div>


                                        <div class="mt-3 mb-3">
                                          <label>Address:</label>
                                          <div class="form-floating">
                                            <textarea class="form-control" readonly 
                                              id="floatingTextarea2" style="height: 100px"><?= $value->address ?></textarea>

                                          </div>
                                        </div>

                                        <div class="mt-3 mb-3">
                                          <label><b>Service Provider:</b> </label>
                                          <input type="text" value="<?= $value->service_provider?>" readonly class="form-control" >
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
                            <img src="<?= base_url()?>web_assets/images/findworker/img5.jpg" class="common-img " alt="#">
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
                                <p><b>Shop Name:</b>Royal Painting </p>
                                <hr>
                                <p><b> Name:</b> Rajesh kudake</p>
    
    
                              </div>
                              <hr>
                              <div>
    
                                <!-- Button trigger modal -->
    
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal1">Contact-us</button>
    
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                                  aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Service Provider Details:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div>
                                          <form>
                                            <!-- slider -->
                                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                              <div class="carousel-inner" style="border-radius: 5px;     border: 9px double gainsboro;">
                                                <!-- class="d-block w-100"  -->
                                                <div class="carousel-item active">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"   class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100" alt="img is not upload.">
                                                </div>
                                              </div>
                                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                            </div>
    
                                            <hr>
    
                                            <!-- slider -->
                                            <div class="mt-3 mb-3">
                                              <label> <b>Name:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>location:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>Whatsapp / Contact No:</b></label>
                                              <input type="number" class="form-control" style="width:60%;"><span><a href="#"><img
                                                src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="30px"
                                                style="margin-left:20px; position: relative;  left: 217px;  bottom: 35px;"></a> </span>
                                               
    
                                            </div>
    
    
                                            <div class="mt-3 mb-3">
                                              <label>Address:</label>
                                              <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                  id="floatingTextarea2" style="height: 100px"></textarea>
    
                                              </div>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Service Provider:</b> </label>
                                              <input type="text" class="form-control" >
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
                    </div>

                  </div>
                  <div class="col-lg-12 col-md-12 col-12">

                    <div class=single-product>
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class=product-image>
                            <img src="<?= base_url()?>web_assets/images/findworker/img7.jpg" class="common-img " alt="#">
                            <!-- <span class=sale-tag>-25%</span> -->
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
                                <p><b>Shop Name:</b>Royal Painting </p>
                                <hr>
                                <p><b> Name:</b> Rajesh kudake</p>
    
    
                              </div>
                              <hr>
                              <div>
    
                                <!-- Button trigger modal -->
    
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal1">Contact-us</button>
    
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                                  aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Service Provider Details:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div>
                                          <form>
                                            <!-- slider -->
                                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                              <div class="carousel-inner" style="border-radius: 5px;     border: 9px double gainsboro;">
                                                <!-- class="d-block w-100"  -->
                                                <div class="carousel-item active">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"   class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100" alt="img is not upload.">
                                                </div>
                                              </div>
                                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                            </div>
    
                                            <hr>
    
                                            <!-- slider -->
                                            <div class="mt-3 mb-3">
                                              <label> <b>Name:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>location:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>Whatsapp / Contact No:</b></label>
                                              <input type="number" class="form-control" style="width:60%;"><span><a href="#"><img
                                                src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="30px"
                                                style="margin-left:20px; position: relative;  left: 217px;  bottom: 35px;"></a> </span>
                                               
    
                                            </div>
    
    
                                            <div class="mt-3 mb-3">
                                              <label>Address:</label>
                                              <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                  id="floatingTextarea2" style="height: 100px"></textarea>
    
                                              </div>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Service Provider:</b> </label>
                                              <input type="text" class="form-control" >
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
                    </div>

                  </div>
                  <div class="col-lg-12 col-md-12 col-12">

                    <div class=single-product>
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class=product-image>
                            <img src="<?= base_url()?>web_assets/images/findworker/img8.jpg" class="common-img " alt="#">
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
                                <p><b>Shop Name:</b>Royal Painting </p>
                                <hr>
                                <p><b> Name:</b> Rajesh kudake</p>
    
    
                              </div>
                              <hr>
                              <div>
    
                                <!-- Button trigger modal -->
    
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal1">Contact-us</button>
    
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                                  aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Service Provider Details:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div>
                                          <form>
                                            <!-- slider -->
                                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                              <div class="carousel-inner" style="border-radius: 5px;     border: 9px double gainsboro;">
                                                <!-- class="d-block w-100"  -->
                                                <div class="carousel-item active">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"   class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100" alt="img is not upload.">
                                                </div>
                                              </div>
                                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                            </div>
    
                                            <hr>
    
                                            <!-- slider -->
                                            <div class="mt-3 mb-3">
                                              <label> <b>Name:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>location:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>Whatsapp / Contact No:</b></label>
                                              <input type="number" class="form-control" style="width:60%;"><span><a href="#"><img
                                                src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="30px"
                                                style="margin-left:20px; position: relative;  left: 217px;  bottom: 35px;"></a> </span>
                                               
    
                                            </div>
    
    
                                            <div class="mt-3 mb-3">
                                              <label>Address:</label>
                                              <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                  id="floatingTextarea2" style="height: 100px"></textarea>
    
                                              </div>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Service Provider:</b> </label>
                                              <input type="text" class="form-control" >
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
                    </div>

                  </div>
                  <div class="col-lg-12 col-md-12 col-12">

                    <div class=single-product>
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class=product-image>
                            <!-- <img
                              data-pagespeed-lazy-src="<?= base_url()?>web_assets/images/products/xproduct-4.jpg.pagespeed.ic.mT1a0Z15AC.jpg"
                              alt="#" src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                              onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                              onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"> -->
                            <!-- <span class=new-tag>New</span> -->
                            <img src="<?= base_url()?>web_assets/images/findworker/img9.jpg" class="common-img " alt="#">
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
                                <p><b>Shop Name:</b>Royal Painting </p>
                                <hr>
                                <p><b> Name:</b> Rajesh kudake</p>
    
    
                              </div>
                              <hr>
                              <div>
    
                                <!-- Button trigger modal -->
    
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal1">Contact-us</button>
    
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                                  aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Service Provider Details:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div>
                                          <form>
                                            <!-- slider -->
                                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                              <div class="carousel-inner" style="border-radius: 5px;     border: 9px double gainsboro;">
                                                <!-- class="d-block w-100"  -->
                                                <div class="carousel-item active">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"   class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100" alt="img is not upload.">
                                                </div>
                                              </div>
                                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                            </div>
    
                                            <hr>
    
                                            <!-- slider -->
                                            <div class="mt-3 mb-3">
                                              <label> <b>Name:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>location:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>Whatsapp / Contact No:</b></label>
                                              <input type="number" class="form-control" style="width:60%;"><span><a href="#"><img
                                                src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="30px"
                                                style="margin-left:20px; position: relative;  left: 217px;  bottom: 35px;"></a> </span>
                                               
    
                                            </div>
    
    
                                            <div class="mt-3 mb-3">
                                              <label>Address:</label>
                                              <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                  id="floatingTextarea2" style="height: 100px"></textarea>
    
                                              </div>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Service Provider:</b> </label>
                                              <input type="text" class="form-control" >
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
                    </div>

                  </div>
                  <div class="col-lg-12 col-md-12 col-12">

                    <div class=single-product>
                      <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class=product-image>
                            <!-- <img
                              data-pagespeed-lazy-src="<?= base_url()?>web_assets/images/products/xproduct-7.jpg.pagespeed.ic.rRlKB_-37i.jpg"
                              alt="#" src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                              onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                              onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"> -->
                            <img src="<?= base_url()?>web_assets/images/findworker/img10.jpg" class="common-img " alt="#">
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
                                <p><b>Shop Name:</b>Royal Painting </p>
                                <hr>
                                <p><b> Name:</b> Rajesh kudake</p>
    
    
                              </div>
                              <hr>
                              <div>
    
                                <!-- Button trigger modal -->
    
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                  data-bs-target="#exampleModal1">Contact-us</button>
    
                                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                                  aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Service Provider Details:</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div>
                                          <form>
                                            <!-- slider -->
                                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                              <div class="carousel-inner" style="border-radius: 5px;    border: 9px double gainsboro;">
                                                <!-- class="d-block w-100"  -->
                                                <div class="carousel-item active">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"   class="d-block w-100"  alt="img is not upload">
                                                </div>
                                                <div class="carousel-item">
                                                  <img src="<?= base_url()?>web_assets/images/buy-sell/Creta2.jpg"  class="d-block w-100" alt="img is not upload.">
                                                </div>
                                              </div>
                                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                              </button>
                                            </div>
    
                                            <hr>
    
                                            <!-- slider -->
                                            <div class="mt-3 mb-3">
                                              <label> <b>Name:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>location:</b> </label>
                                              <input type="text" class="form-control" >
                                            </div>
    
                                            <div class="mt-3 mb-3">
                                              <label><b>Whatsapp / Contact No:</b></label>
                                              <input type="number" class="form-control" style="width:60%;"><span><a href="#"><img
                                                src="<?= base_url()?>web_assets/images/findworker/whatsappicon.jpg" alt="" width="30px"
                                                style="margin-left:20px; position: relative;  left: 217px;  bottom: 35px;"></a> </span>
                                               
    
                                            </div>
    
    
                                            <div class="mt-3 mb-3">
                                              <label>Address:</label>
                                              <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                  id="floatingTextarea2" style="height: 100px"></textarea>
    
                                              </div>
                                            </div>

                                            <div class="mt-3 mb-3">
                                              <label><b>Service Provider:</b> </label>
                                              <input type="text" class="form-control" >
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


<script>
  function contact_worker(worker_id) {
    $.ajax({
  url: "<?= base_url('Home/Contact')?>",
  type: "GET",
  data: {id : worker_id},
  // cache: false,
  success: function(html){
  }
});
    
  }
</script>