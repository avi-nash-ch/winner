<script src="<?= base_url() ?>assets/website/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<section class="item-details section">
  <div class=container>
    <div class=top-area>
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-12 col-12">
          <div class=product-images>
            <main id=gallery>
              <div class=main-img>
                <img src="<?= base_url('uploads/images/') . $data->image ?>" id=current alt="#">
              </div>
              <div class=images>

                <img src="<?= base_url('uploads/images/') . $data->image ?>" onclick="set_img('<?= $data->image ?>')">
                <img src="<?= base_url('uploads/images/') . $data->image2 ?>" onclick="set_img('<?= $data->image2 ?>')">
                <img src="<?= base_url('uploads/images/') . $data->image3 ?>" onclick="set_img('<?= $data->image3 ?>')">
                <img src="<?= base_url('uploads/images/') . $data->image4 ?>" onclick="set_img('<?= $data->image4 ?>')">
              </div>
            </main>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12">
          <div class=product-info>
            <?php
            $offerPrice = number_format($data->price_sale - ($data->price_sale / 100) * $data->offer, 2);
            ?>
            <h2 pid="<?= $data->id ?>" class=title><?= $data->name ?></h2>
            <h3 price="<?= $offerPrice ?>" class=price><?= $offerPrice ?><span>₹<?= number_format($data->price_sale, 2) ?></span></h3>
            <p class=info-text><?= $data->description ?></p>
            <?php $color = explode(",", $data->color);
            $size = explode(",", $data->size);  ?>
            <div class=row>
              <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group color-option">
                  <label class=title-label for=size>Choose color</label>
                  <?php foreach ($color as $key => $c) {
                    switch ($c) {
                      case '1': ?>
                        <div class="single-checkbox checkbox-style-white">
                          <input type=checkbox id=checkbox-white name="color" value="1">
                          <label for=checkbox-white><span></span></label>
                        </div>

                      <?php break;

                      case '2': ?>
                        <div class="single-checkbox checkbox-style-3">
                          <input type=checkbox id=checkbox-3 name="color" value="2">
                          <label for=checkbox-3><span></span></label>
                        </div>
                      <?php break;
                      case '3': ?>
                        <div class="single-checkbox checkbox-style-2">
                          <input type=checkbox id=checkbox-2 name="color" value="3">
                          <label for=checkbox-2><span></span></label>
                        </div>

                      <?php break;
                      case '4': ?>
                        <div class="single-checkbox checkbox-style-4">
                          <input type=checkbox id=checkbox-4 name="color" value="4">
                          <label for=checkbox-4><span></span></label>
                        </div>
                      <?php break;
                      case '5': ?>
                        <div class="single-checkbox checkbox-style-yellow">
                          <input type=checkbox id=checkbox-yellow name="color" value="5">
                          <label for=checkbox-yellow><span></span></label>
                        </div>
                      <?php break;
                      case '6': ?>
                        <div class="single-checkbox checkbox-style-pink">
                          <input type=checkbox id=checkbox-pink name="color" value="6">
                          <label for=checkbox-pink><span></span></label>
                        </div>
                      <?php break;
                      case '7': ?>
                        <div class="single-checkbox checkbox-style-1">
                          <input type=checkbox id=checkbox-1 name="color" value="7">
                          <label for=checkbox-1><span></span></label>
                        </div>
                      <?php break;
                      case '8': ?>
                        <div class="single-checkbox checkbox-style-brown">
                          <input type=checkbox id=checkbox-brown name="color" value="8">
                          <label for=checkbox-brown><span></span></label>
                        </div>
                    <?php break;

                      default:
                        # code...
                        break;
                    }
                    ?>

                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                <div class=form-group>
                  <label for=size>Size</label>
                  <select class=form-control id=size name="size" required>

                    <?php foreach ($size as $key => $s) { ?>
                      <option value="<?= $s ?>"><?php if ($s == 1) {
                                                  echo "L";
                                                } elseif ($s == 2) {
                                                  echo "XL";
                                                } elseif ($s == 3) {
                                                  echo "M";
                                                } elseif ($s == 4) {
                                                  echo "S";
                                                } ?></option>
                    <?php } ?>

                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group quantity">
                  <label for=qty>Quantity</label>
                  <select class="form-control" id="qty" name="qty">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
            <div class=bottom-content>
              <div class="row align-items-end">
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="button cart-button">
                    <button class=btn style="width: 100%;" id="add_to_cart">Add to Cart</button>
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
              <p><?= $data->description ?></p>
              <h4>Features</h4>
              <ul class=features>
                <?php foreach ($features as $key => $value) { ?>
                  <li><?= $value->feature ?></li>
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
    $("#current").attr("src", "<?= base_url('uploads/images/') ?>" + img);
  }

  $('input[name="color"]').on("click", function() {
    var $box = $(this);
    if ($box.is(":checked")) {
      var group = "input:checkbox[name='color']";
      $(group).prop("checked", false);
      $box.prop("checked", true);
    } else {
      $box.prop("checked", false);
    }
  })

  $("#add_to_cart").on("click", function() {
    const adminId = "<?= $this->session->userdata('admin_id') ?>";
    if (!adminId) {
      location.href = ("<?= base_url('Home/Login') ?>")
    } else {
      const color = $('input[name="color"]:checked').val();
      const size = $('#size').val();
      const qty = $("#qty").val();
      const product_id = $(".product-info").find('.title').attr('pid');
      const cost = $(".product-info").find('.price').attr('price');
      if(!color) {
        alert("Select color");return;
      }
      if(!size) {
        alert("Select size");return;
      }
      if(!qty) {
        alert("Select quantity");return;
      }
      $.ajax({
        type: 'POST',
        data: {
          color,
          size,
          qty,
          cost,
          product_id
        },
        url: '<?= base_url('Home/productAddToCart') ?>',
        dataType: 'json',
        beforeSend: function() {},
        success: function(data) {
          if (data.status == true) {
            alert('Added to cart');
            location.reload();
          }
        },
        error: function(e) {},
      });
    }
  })

  // });
</script>
<!-- dynamic footer and header end-->

</body>

</html>