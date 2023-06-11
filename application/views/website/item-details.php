
<script src="<?= base_url()?>assets/website/js/jquery-3.4.1.min.js" type="text/javascript"></script>
  <section class="item-details section">
    <div class=container>
      <div class=top-area>
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12 col-12">
            <div class=product-images>
              <main id=gallery>
                <div class=main-img>
                  <img src="<?= base_url('uploads/sellitems/').$data['image1'] ?>" id=current alt="#">
                </div>
                <div class=images>
                 
                  <img 
                    src="<?= base_url('uploads/sellitems/').$data['image1'] ?>" onclick="set_img('<?= $data['image1']?>')">
                  <img  src="<?= base_url('uploads/sellitems/').$data['image2'] ?>" onclick="set_img('<?= $data['image2']?>')"
                    >
                  <img  src="<?= base_url('uploads/sellitems/').$data['image3'] ?>" onclick="set_img('<?= $data['image3'] ?>')"
                   >
                </div>
              </main>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-12">
            <div class=product-info>
              <h2 class=title><?= $data['title'] ?></h2>
              <h3 class=price>$<?= number_format($data['price']) ?></span></h3>
              <p>Category :- <?= $data['cat_name']?></p>
              <p>Sub Category :- <?= $data['sub_cat_name']?></p>
              <p class=info-text><?= $data['description'] ?></p>
              <!-- <div class=row>
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="form-group color-option">
                    <label class=title-label for=size>Category</label>
                    <span><?= $data['cat_name']?></span>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                  <div class=form-group>
                    <label for=color>Size</label>
                    <select class=form-control id=color name="color" required>
                  
                        <?php foreach ($size as $key => $s) { ?>
                          <option value="<?= $s ?>"><?php if($s==1){echo "L";}elseif($s==2){echo "XL";}elseif($s==3){echo "M";}elseif($s==4){echo "S";} ?></option>
                        <?php } ?>
                      
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="form-group quantity">
                    <label for=color>Quantity</label>
                    <select class="form-control" name="qty">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
              </div> -->
              <div class=bottom-content>
                <div class="row align-items-end">
                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="button cart-button">
                      <button class=btn style="width: 100%;">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=product-details-info>
        <div class=single-block>
          <div class=row>
            <div class="col-lg-6 col-12">
              <div class="info-body custom-responsive-margin">
                <h4>Details</h4>
                <p><?= $data['description']?></p>
                <h4>Additional Information</h4>
                <ul class=features>
                  <?php foreach ($data['fields'] as $key => $value) { ?>
                    <li><?= $value['field_name'] .' :- '. $value['field_value'] ?></li>
                <?php  } ?>
                </ul>
              </div>
            </div>
           
          </div>
        </div>
        
      </div>
    </div>
  </section>


  <div class="modal fade review-modal" id=exampleModal tabindex=-1 aria-labelledby=exampleModalLabel aria-hidden=true>
    <div class=modal-dialog>
      <div class=modal-content>
        <div class=modal-header>
          <h5 class=modal-title id=exampleModalLabel>Leave a Review</h5>
          <button type=button class=btn-close data-bs-dismiss=modal aria-label=Close></button>
        </div>
        <div class=modal-body>
          <div class=row>
            <div class=col-sm-6>
              <div class=form-group>
                <label for=review-name>Your Name</label>
                <input class=form-control type=text id=review-name required>
              </div>
            </div>
            <div class=col-sm-6>
              <div class=form-group>
                <label for=review-email>Your Email</label>
                <input class=form-control type=email id=review-email required>
              </div>
            </div>
          </div>
          <div class=row>
            <div class=col-sm-6>
              <div class=form-group>
                <label for=review-subject>Subject</label>
                <input class=form-control type=text id=review-subject required>
              </div>
            </div>
            <div class=col-sm-6>
              <div class=form-group>
                <label for=review-rating>Rating</label>
                <select class=form-control id=review-rating>
                  <option>5 Stars</option>
                  <option>4 Stars</option>
                  <option>3 Stars</option>
                  <option>2 Stars</option>
                  <option>1 Star</option>
                </select>
              </div>
            </div>
          </div>
          <div class=form-group>
            <label for=review-message>Review</label>
            <textarea class=form-control id=review-message rows=8 required></textarea>
          </div>
        </div>
        <div class="modal-footer button">
          <button type=button class=btn>Submit Review</button>
        </div>
      </div>
    </div>
  </div>



  <!-- dynamic footer and header create -->
  <div id="footer"></div>
  <script>
    // $(document).ready(function () {
      function set_img(img) {
        $("#current").attr("src","<?= base_url('uploads/sellitems/')?>"+img);
      }
     
    // });
  </script>
  <!-- dynamic footer and header end-->

</body>

</html>