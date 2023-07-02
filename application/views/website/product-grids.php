
<section class="product-grids section">
    <div class=container>
      <div class=row>
        <div class="col-lg-3 col-12">

          <div class=product-sidebar>

            <div class="single-widget search">
              <h3>Search Product</h3>
              <form method="get" action="<?= base_url('Home/p')?>" name="form">
                <input type=text placeholder="Search Here...">
                <button type=submit><i class="lni lni-search-alt"></i></button>
             
            </div>


            <div class=single-widget>
              <h3>All Categories</h3>
              <ul class=list>
              <?php foreach ($Category as $key => $value) { ?>
                <div class=form-check>
                <input class=form-check-input type="checkbox" onclick="form.submit()" name="c[]" <?= !empty($this->input->get('c')) && in_array($value->id,$this->input->get('c'))?'checked':'' ?> value="<?= $value->id?>" id=flexCheckDefault<?=$key?>>
                <label class=form-check-label for=flexCheckDefault<?=$key?>>
                 <?= $value->name ?>
                </label>
              </div>
            <?php } ?>
               
              </ul>
            </div>

            <div class="single-widget condition">
              <h3>Filter by Price</h3>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault1>
                <label class=form-check-label for=flexCheckDefault1>
                  ₹50 - ₹100L (208)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault2>
                <label class=form-check-label for=flexCheckDefault2>
                  ₹100L - ₹500 (311)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault3>
                <label class=form-check-label for=flexCheckDefault3>
                  ₹500 - ₹1,000 (485)
                </label>
              </div>
              <div class=form-check>
                <input class=form-check-input type=checkbox value="" id=flexCheckDefault4>
                <label class=form-check-label for=flexCheckDefault4>
                  ₹1,000 - ₹5,000 (213)
                </label>
              </div>
            </div>

            <div class="single-widget condition">
              <h3>Filter by Brand</h3>
              <?php foreach ($Brand as $key => $value) { ?>
                <div class=form-check>
                <input class=form-check-input type=checkbox onclick="form.submit()" name="b[]" <?= !empty($this->input->get('b')) && in_array($value->id,$this->input->get('b'))?'checked':'' ?> value="<?= $value->id?>" id=flexCheckDefault1<?=$key?>>
                <label class=form-check-label for=flexCheckDefault1<?=$key?>>
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
                    <label for=sorting>Sort by Shop:</label>
                    <select class=form-control id=sorting name="s" onchange="form.submit()">
                      <option value="">Select Shop</option>
                      <?php foreach ($Shop as $key => $value) { ?>
                        <option value="<?= $value->id?>" <?= !empty($this->input->get('s')) && $this->input->get('s')==$value->id?'selected':'' ?>><?= $value->first_name ?></option>
            <?php } ?>
                    </select>
                    <h3 class=total-show-product>Showing: <span>1 - 12 items</span></h3>
                  </div>
                </div>
               
              </div>
            </div>
            </form>
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
                                <span>INR <?= number_format($value->price_sale-($value->price_sale/100)*$value->offer,2) ?></span>
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
