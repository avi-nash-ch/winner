

    <section class=hero-area>
        <div class=container>
            <div class=row>
                <div class="col-lg-12 col-12 custom-padding-right">
                    <div class=slider-head>

                        <div class=hero-slider>
                        <?php foreach ($AllBanner as $key => $value) { ?>
                            <div class=single-slider
                                style="background-image:url(<?= base_url('uploads/images/'.$value->icon)?>)">
                                <!-- <div class=content>
                                    <h2><span>No restocking fee (3500 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p><?= $value->description?></p>
                                    <h3><span>Now Only</span>INR 3500.99</h3>
                                    <div class=button>
                                        <a href=product-grids.html class=btn>Shop Now</a>
                                    </div>
                                </div> -->
                            </div>
                            <?php } ?>

                        </div>

                    </div>
                </div>
              
            </div>
        </div>
    </section>


    <section class="featured-categories section">
        <div class=container>
            <div class=row>
                <div class=col-12>
                    <div class=section-title>
                        <h2>Featured Categories</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class=row>
                <?php foreach ($Category as $key => $value) { ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class=single-category>
                        <h3 class=heading><?= $value->name ?></h3>
                        <ul>
                        <?php $SubCategory=getSubcategory($value->id); foreach ($SubCategory as $key => $sub_cat) { ?>
                            <li><a href="<?= base_url('Home/Products/').$this->url_encrypt->encode($sub_cat->id)?>"><?= $sub_cat->name ?></a></li>
                            <?php } ?>
                            <!-- <li><a href=<?= base_url('Home/Products/')?>>View All</a></li> -->
                        </ul>
                        <div class=images>
                            <img src="<?= base_url('uploads/images/'.$value->icon)?>" alt="#">
                        </div>
                    </div>

                </div>
            <?php } ?>
               
            </div>
        </div>
    </section>


    <section class="trending-product section">
        <div class=container>
            <div class=row>
                <div class=col-12>
                    <div class=section-title>
                        <h2>Trending Product</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class=row>
            <?php foreach ($AllProducts as $key => $value) { ?>
                <div class="col-lg-3 col-md-6 col-12" >

                    <div class=single-product >
                        <div class=product-image>
                            <img style="height: 243px;" src="<?= base_url('uploads/images/'.$value->image)?>" alt="#">
                            <?php if(!empty($value->offer)){ ?>
                            <span class=sale-tag>-<?= $value->offer ?>%</span>
                            <?php } ?>
                            <div class=button>
                                <a href="<?= base_url('Home/productDeatils/').$this->url_encrypt->encode($value->id)?>" class=btn><i class="lni lni-eye"></i> View</a>
                            </div>
                        </div>
                        <div class=product-info>
                            <span class=category>Cloth</span>
                            <h4 class=title>
                                <a href=<?= base_url('Home/productDeatils/').$this->url_encrypt->encode($value->id)?>><?= $value->name ?></a>
                            </h4>
                            <ul class=review>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class=price>
                                <span>INR <?= number_format($value->price_sale-($value->price_sale/100)*$value->offer,2) ?></span>
                            </div>
                        </div>
                    </div>

                </div>
<?php } ?>
             
            </div>
        </div>
    </section>

    <!-- <section class="home-product-list section">
        <div class=container>
            <div class=row>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class=list-title>Top Selling Products</h4>

                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x01.jpg.pagespeed.ic.aFGrpkZ-YS.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>GoPro Hero4 Silver</a>
                            </h3>
                            <span>INR 287.99</span>
                        </div>
                    </div>


                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x02.jpg.pagespeed.ic.evnaIOAaSH.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>Puro Sound Labs BT2200</a>
                            </h3>
                            <span>INR 95.00</span>
                        </div>
                    </div>


                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x03.jpg.pagespeed.ic.9cMfTBVtlQ.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>HP OfficeJet Pro 8710</a>
                            </h3>
                            <span>INR 120.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class=list-title>New Arrivals</h4>

                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x04.jpg.pagespeed.ic.F7KQPplcrb.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>INR 1150.00</span>
                        </div>
                    </div>


                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x05.jpg.pagespeed.ic.CtDfEoUd8D.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>Canon EOS M50 Mirrorless Camera</a>
                            </h3>
                            <span>INR 950.00</span>
                        </div>
                    </div>


                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x06.jpg.pagespeed.ic.V0fUUC8Z5C.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>Microsoft Xbox One S</a>
                            </h3>
                            <span>INR 298.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class=list-title>Top Rated</h4>

                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x07.jpg.pagespeed.ic.LRQsjgfm_s.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>INR 68.00</span>
                        </div>
                    </div>


                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x08.jpg.pagespeed.ic.HuloKYFnZS.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>Samsung Galaxy S9+ 64 GB</a>
                            </h3>
                            <span>INR 840.00</span>
                        </div>
                    </div>


                    <div class=single-list>
                        <div class=list-image>
                            <a href=product-grids.html><img
                                    src="<?= base_url()?>web_assets/images/home-product-list/x09.jpg.pagespeed.ic.wWVNAXGYMB.jpg"
                                    alt="#"></a>
                        </div>
                        <div class=list-info>
                            <h3>
                                <a href=product-grids.html>Zeus Bluetooth Headphones</a>
                            </h3>
                            <span>INR 28.00</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> -->


    <div class=brands>
        <div class=container>
            <div class=row>
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class=title>Popular Brands</h2>
                </div>
            </div>
            <div class=brands-logo-wrapper>
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                <?php foreach ($Brands as $key => $value) { ?>
                    <div class=brand-logo>
                        <img src="<?= base_url()?>uploads/images/<?= $value->logo ?>" alt="#">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <section class=shipping-info>
        <div class=container>
            <ul>

                <li>
                    <div class=media-icon>
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class=media-body>
                        <h5>Free Shipping</h5>
                        <span>On order over INR 99</span>
                    </div>
                </li>

                <li>
                    <div class=media-icon>
                        <i class="lni lni-support"></i>
                    </div>
                    <div class=media-body>
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>

                <li>
                    <div class=media-icon>
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class=media-body>
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>

                <li>
                    <div class=media-icon>
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class=media-body>
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
        <?php
        // $this->load->view('website/order_success');
        if($this->session->flashdata('order_placed_id')) {
            $this->load->view('website/order_success');
            $this->session->unset_userdata('order_placed_id');
        }
        ?>
    </section>
