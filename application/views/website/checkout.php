<section class="checkout-wrapper section">
  <div class=container>
    <div class="row justify-content-center">
      <div class=col-lg-8>
        <div class=checkout-steps-form-style-1>
          <ul id=accordionExample>
            <li>
              <h6 class=title>Delivery Details </h6>
              <section class="checkout-steps-form-content">
                <form method="post" action="<?= base_url('Cart/placeOrder') ?>">
                  <div class=row>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>First Name</label>
                        <div class="form-input form">
                          <input type=text name="first_name" value="<?= $user->first_name ?>" placeholder="First Name" required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Last Name</label>
                        <div class="form-input form">
                          <input type=text name="last_name" value="<?= $user->last_name ?>" placeholder="Last Name" required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Email Address</label>
                        <div class="form-input form">
                          <input type=text name="email" value="<?= $user->email ?>" placeholder="Email Address" required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Phone Number</label>
                        <div class="form-input form">
                          <input type=text name="phone" value="<?= $user->phone ?>" id="phone_number" placeholder="Phone Number" required>
                        </div>
                      </div>
                    </div>
                    <!-- <div class=col-md-3>
                      <div class="single-form button">
                        <button type="button" onclick="sendOTP()" style="margin-top: 30px;" class="btn">Send OTP</button>
                      </div>
                    </div> -->
                    <div class=col-md-12>
                      <div class="single-form form-default">
                        <label>Delivery Address</label>
                        <div class="form-input form">
                          <input type=text name="address" placeholder="Delivery Address" required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>City</label>
                        <div class="form-input form">
                          <input type=text name="city" placeholder=City required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Post Code</label>
                        <div class="form-input form">
                          <input type=text name="postal_code" placeholder="Post Code" required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Country</label>
                        <div class="form-input form">
                          <input type=text name="country" placeholder=Country required>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Region/State</label>
                        <div class=select-items>
                          <select class=form-control name="state_id" required>
                            <option value="">select</option>
                            <?php
                            foreach (getStates() as $state) { ?>
                              <option value="<?= $state->id ?>"><?= $state->name ?></option>
                            <?php }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Payment Mode</label>
                        <div class=select-items>
                          <select class=form-control name="payment_mode" required>
                            <option value="">select</option>
                            <option value="Cash On Delivery">Cash On Delivery</option>
                            <option value="Online" disabled>Online</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class=col-md-12>
                      <div class="single-checkbox checkbox-style-3">
                        <input type=checkbox id=checkbox-3>
                        <label for=checkbox-3><span></span></label>
                        <p>My delivery and mailing addresses are the same.</p>
                      </div>
                    </div> -->

                    <input type="hidden" id="is_otp_verified" value="">

                    <div class=col-md-12>
                      <div class="single-form button">
                        <button class=btn data-bs-toggle=collapse data-bs-target="#collapseFour" aria-expanded=false aria-controls=collapseFour>Place Order</button>
                      </div>
                    </div>
                  </div>
                </form>
              </section>
            </li>
            <!-- <li>
                <h6 class="title collapsed" data-bs-toggle=collapse data-bs-target="#collapseFour" aria-expanded=false
                  aria-controls=collapseFour>Shipping Address</h6>
                <section class="checkout-steps-form-content collapse" id=collapseFour aria-labelledby=headingFour
                  data-bs-parent="#accordionExample">
                  <div class=row>
                    <div class=col-md-12>
                      <div class="single-form form-default">
                        <label>User Name</label>
                        <div class=row>
                          <div class="col-md-6 form-input form">
                            <input type=text placeholder="First Name">
                          </div>
                          <div class="col-md-6 form-input form">
                            <input type=text placeholder="Last Name">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Email Address</label>
                        <div class="form-input form">
                          <input type=text placeholder="Email Address">
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Phone Number</label>
                        <div class="form-input form">
                          <input type=text placeholder="Phone Number">
                        </div>
                      </div>
                    </div>
                    <div class=col-md-12>
                      <div class="single-form form-default">
                        <label>Mailing Address</label>
                        <div class="form-input form">
                          <input type=text placeholder="Mailing Address">
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>City</label>
                        <div class="form-input form">
                          <input type=text placeholder=City>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Post Code</label>
                        <div class="form-input form">
                          <input type=text placeholder="Post Code">
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Country</label>
                        <div class="form-input form">
                          <input type=text placeholder=Country>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-6>
                      <div class="single-form form-default">
                        <label>Region/State</label>
                        <div class=select-items>
                          <select class=form-control>
                            <option value=0>select</option>
                            <option value=1>select option 01</option>
                            <option value=2>select option 02</option>
                            <option value=3>select option 03</option>
                            <option value=4>select option 04</option>
                            <option value=5>select option 05</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-12>
                      <div class=checkout-payment-option>
                        <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                          Option</h6>
                        <div class=payment-option-wrapper>
                          <div class=single-payment-option>
                            <input type=radio name=shipping checked id=shipping-1>
                            <label for=shipping-1>
                              <img data-pagespeed-lazy-src="assets/images/shipping/shipping-1.png" alt=Sipping
                                src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                              <p>Standerd Shipping</p>
                              <span class=price>$10.50</span>
                            </label>
                          </div>
                          <div class=single-payment-option>
                            <input type=radio name=shipping id=shipping-2>
                            <label for=shipping-2>
                              <img data-pagespeed-lazy-src="assets/images/shipping/shipping-2.png" alt=Sipping
                                src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                              <p>Standerd Shipping</p>
                              <span class=price>$10.50</span>
                            </label>
                          </div>
                          <div class=single-payment-option>
                            <input type=radio name=shipping id=shipping-3>
                            <label for=shipping-3>
                              <img data-pagespeed-lazy-src="assets/images/shipping/shipping-3.png" alt=Sipping
                                src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                              <p>Standerd Shipping</p>
                              <span class=price>$10.50</span>
                            </label>
                          </div>
                          <div class=single-payment-option>
                            <input type=radio name=shipping id=shipping-4>
                            <label for=shipping-4>
                              <img data-pagespeed-lazy-src="assets/images/shipping/shipping-4.png" alt=Sipping
                                src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                              <p>Standerd Shipping</p>
                              <span class=price>$10.50</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class=col-md-12>
                      <div class="steps-form-btn button">
                        <button class=btn data-bs-toggle=collapse data-bs-target="#collapseThree" aria-expanded=false
                          aria-controls=collapseThree>previous</button>
                        <a href="javascript:void(0)" class="btn btn-alt">Save & Continue</a>
                      </div>
                    </div>
                  </div>
                </section>
              </li> -->
            <!-- <li>
                <h6 class="title collapsed" data-bs-toggle=collapse data-bs-target="#collapsefive" aria-expanded=false
                  aria-controls=collapsefive>Payment Info</h6>
                <section class="checkout-steps-form-content collapse" id=collapsefive aria-labelledby=headingFive
                  data-bs-parent="#accordionExample">
                  <div class=row>
                    <div class=col-12>
                      <div class=checkout-payment-form>
                        <div class="single-form form-default">
                          <label>Cardholder Name</label>
                          <div class="form-input form">
                            <input type=text placeholder="Cardholder Name">
                          </div>
                        </div>
                        <div class="single-form form-default">
                          <label>Card Number</label>
                          <div class="form-input form">
                            <input id=credit-input type=text placeholder="0000 0000 0000 0000">
                            <img data-pagespeed-lazy-src="assets/images/payment/card.png" alt=card
                              src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                              onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                              onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                          </div>
                        </div>
                        <div class=payment-card-info>
                          <div class="single-form form-default mm-yy">
                            <label>Expiration</label>
                            <div class="expiration d-flex">
                              <div class="form-input form">
                                <input type=text placeholder=MM>
                              </div>
                              <div class="form-input form">
                                <input type=text placeholder=YYYY>
                              </div>
                            </div>
                          </div>
                          <div class="single-form form-default">
                            <label>CVC/CVV <span><i class="mdi mdi-alert-circle"></i></span></label>
                            <div class="form-input form">
                              <input type=text placeholder="***">
                            </div>
                          </div>
                        </div>
                        <div class="single-form form-default button">
                          <button class=btn>pay now</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </li> -->
          </ul>
        </div>
      </div>
      <div class=col-lg-4>
        <div class=checkout-sidebar>
          <!-- <div class=checkout-sidebar-coupon>
              <p>Appy Coupon to get discount!</p>
              <form action="#">
                <div class="single-form form-default">
                  <div class="form-input form">
                    <input type=text placeholder="Coupon Code">
                  </div>
                  <div class=button>
                    <button class=btn>apply</button>
                  </div>
                </div>
              </form>
            </div> -->
          <div class="checkout-sidebar-price-table mt-30">
            <h5 class=title>Pricing Table</h5>
            <div class=sub-total-price>
              <?php
              $totalAmount = 0;
              foreach ($carts as $cart) { ?>
                <div class=total-price>
                  <p class=value><?= $cart->product_name ?>:</p>
                  <p class=price>₹<?= $cart->cost * $cart->quantity ?></p>
                </div>
              <?php
                $totalAmount += ($cart->cost * $cart->quantity);
              }
              ?>
            </div>
            <div class=total-payable>
              <div class=payable-price>
                <p class=value>Subotal Price:</p>
                <p class=price>₹<?= $totalAmount ?></p>
              </div>
            </div>
            <!-- <div class="price-table-btn button">
                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
              </div> -->
          </div>
          <!-- <div class="checkout-sidebar-banner mt-30">
              <a href=product-grids.html>
                <img data-pagespeed-lazy-src="assets/images/banner/xbanner.jpg.pagespeed.ic.DwfKKdyUMh.jpg" alt="#"
                  src="../../pagespeed_static/1.JiBnMqyl6S.gif"
                  onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                  onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
              </a>
            </div> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="verifyOTPModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verify OTP:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div>
            <div class="mt-3 mb-3">
              <label> <b>OTP:</b> </label>
              <input type="text" id="product_otp" class="form-control" value="">
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="verifyOTP()">Verify</button>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  // $(document).ready(function() {
  function sendOTP() {
    const mobile = $("#phone_number").val();
    if(!mobile) {
      alert("Enter Mobile first");
      return
    }
    $.ajax({
      type: 'POST',
      url: baseurl + "Home/PlaceOrderOTP",
      data: {
        mobile
      },
      // processData: false,
      // contentType: false,
      success: function(data) {
        const response = JSON.parse(data);
        console.log(response)
        if (response.result) {
          $("#verifyOTPModal").modal('show')
        } else {
          alert("woops something went wrong while sent otp !!")
        }
      }
    });
  }

  function verifyOTP() {
    const mobile = $("#phone_number").val();
    const otp = $("#product_otp").val();
    if(!otp) {
      alert("Enter OTP");
      return
    }
    $.ajax({
      type: 'POST',
      url: baseurl + "Home/ProductOrderVerifyOtp",
      data: {
        mobile,
        otp
      },
      // processData: false,
      // contentType: false,
      success: function(data) {
        const response = JSON.parse(data);
        if (response.result) {
          $("#verifyOTPModal").modal('hide');
          $("#is_otp_verified").val('yes');
        } else {
          alert(response.message)
        }
      }
    });
  }

  function validateForm() {
    const isVerified = $("#is_otp_verified").val();
    if (isVerified == "yes")
    {
      return true
    }
    else {
      alert("Verify Mobile No")
      return false
    }
  }
</script>