
<section class="product-grids section">
    <div class=container>
      <div class=row>
        <div class="col-lg-3 col-12">

          <div class=product-sidebar>

            <div class="single-widget search">
              <h3>Search Product</h3>
              <form action="#">
                <input type=text placeholder="Search Here...">
                <button type=submit><i class="lni lni-search-alt"></i></button>
              </form>
            </div>


            <div class=single-widget>
              <h3>All Categories</h3>
              <ul class=list>
              <?php foreach ($Category as $key => $value) { ?>
                <li>
                  <a href=product-grids.html><?= $value->name ?> </a><span>(1138)</span>
                </li>
            <?php } ?>
               
              </ul>
            </div>

            <div class="single-widget condition">
              <h3>Filter by Price</h3>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault1>
                <label class=form-check-label for=flexCheckDefault1>
                  $50 - $100L (208)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault2>
                <label class=form-check-label for=flexCheckDefault2>
                  $100L - $500 (311)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault3>
                <label class=form-check-label for=flexCheckDefault3>
                  $500 - $1,000 (485)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault4>
                <label class=form-check-label for=flexCheckDefault4>
                  $1,000 - $5,000 (213)
                </label>
              </div>
            </div>


            <div class="single-widget condition">
              <h3>Filter by Brand</h3>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault11>
                <label class=form-check-label for=flexCheckDefault11>
                  Apple (254)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault22>
                <label class=form-check-label for=flexCheckDefault22>
                  Bosh (39)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault33>
                <label class=form-check-label for=flexCheckDefault33>
                  Canon Inc. (128)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault44>
                <label class=form-check-label for=flexCheckDefault44>
                  Dell (310)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault55>
                <label class=form-check-label for=flexCheckDefault55>
                  Hewlett-Packard (42)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault66>
                <label class=form-check-label for=flexCheckDefault66>
                  Hitachi (217)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault77>
                <label class=form-check-label for=flexCheckDefault77>
                  LG Electronics (310)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault88>
                <label class=form-check-label for=flexCheckDefault88>
                  Panasonic (74)
                </label>
              </div>
            </div>

          </div>

        </div>
        <div class="col-lg-9 col-12">
          <div class=product-grids-head>
            <div class=product-grid-topbar>
              <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 col-12">
                  <div class=product-sorting>
                    <label for=sorting>Sort by:</label>
                    <select class=form-control id=sorting>
                      <option>Popularity</option>
                      <option>Low - High Price</option>
                      <option>High - Low Price</option>
                      <option>Average Rating</option>
                      <option>A - Z Order</option>
                      <option>Z - A Order</option>
                    </select>
                    <h3 class=total-show-product>Showing: <span>1 - 12 items</span></h3>
                  </div>
                </div>
               
              </div>
            </div>
            <div class=tab-content id=nav-tabContent>
              <div class="tab-pane fade show active" id=nav-grid role=tabpanel aria-labelledby=nav-grid-tab>
                <div class=row>
                <?php foreach ($AllProducts as $key => $value) { ?>
                <div class="col-lg-3 col-md-6 col-12" >

                    <div class=single-product >
                        <div class=product-image>
                            <img  src="<?= base_url('uploads/images/'.$value->image)?>" alt="#">
                            <?php if(!empty($value->offer)){ ?>
                            <span class=sale-tag>-<?= $value->offer ?>%</span>
                            <?php } ?>
                            <div class=button>
                                <a href=product-details.html class=btn><i class="lni lni-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                        <div class=product-info>
                            <span class=category>Cloth</span>
                            <h4 class=title>
                                <a href="<?= base_url('Home/productDeatils/'.$this->url_encrypt->encode($value->id))?>"><?= $value->name ?></a>
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
                                <span>$<?= number_format($value->price_sale-($value->price_sale/100)*$value->offer,2) ?></span>
                            </div>
                        </div>
                    </div>

                </div>
<?php } ?>
                
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
