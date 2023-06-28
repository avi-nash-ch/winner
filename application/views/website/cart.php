<div class="shopping-cart section">
    <div class=container>
        <div class=cart-list-head>

            <div class=cart-list-title>
                <div class=row>
                    <div class="col-lg-1 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    <!-- <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div> -->
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>

            <?php
            foreach ($carts as $cart) { ?>
                <div class=cart-single-list>
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="<?= base_url('Home/productDeatils/'.$this->url_encrypt->encode($cart->product_id))?>"><img src="<?= base_url('uploads/images/') . $cart->image ?>" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class=product-name><a href="<?= base_url('Home/productDeatils/'.$this->url_encrypt->encode($cart->product_id))?>">
                                    <?= $cart->product_name ?></a></h5>
                            <p class=product-des>
                                <span><em>Size:</em> <?= $cart->size ?></span>
                                <span><em>Color:</em> <?= $cart->color ?></span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class=count-input>
                                <select class=form-control>
                                    <option value="1" <?= $cart->quantity == 1 ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= $cart->quantity == 2 ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= $cart->quantity == 3 ? 'selected' : '' ?>>3</option>
                                    <option value="4" <?= $cart->quantity == 4 ? 'selected' : '' ?>>4</option>
                                    <option value="5" <?= $cart->quantity == 5 ? 'selected' : '' ?>>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>₹<?= $cart->cost * $cart->quantity ?></p>
                        </div>
                        <!-- <div class="col-lg-2 col-md-2 col-12">
                            <p>$29.00</p>
                        </div> -->
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class=remove-item href="javascript:void(0)" onclick="removeProduct('<?= $cart->id ?>', this)"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class=row>
            <div class=col-12>

                <div class=total-amount>
                    <!-- <div class=row>
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class=left>
                                <div class=coupon>
                                    <form action="#" target=_blank>
                                        <input name=Coupon placeholder="Enter Your Coupon">
                                        <div class=button>
                                            <button class=btn>Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class=right>
                            <ul>
                                <li>Cart Subtotal<span>₹<?= $cart->cost * $cart->quantity ?></span></li>
                                <li>Shipping<span>Free</span></li>
                                <!-- <li>You Save<span>$29.00</span></li>
                                    <li class=last>You Pay<span>$2531.00</span></li> -->
                            </ul>
                            <div class=button>
                                <a href="<?= base_url('Cart/checkout')?>" class=btn>Checkout</a>
                                <a href="<?= base_url('Home')?>" class="btn btn-alt">Continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    const removeProduct = (cartId, currentObj) => {
        $.ajax({
            type: 'POST',
            data: {
                cart_id: cartId
            },
            url: '<?= base_url('Cart/removeProduct') ?>',
            dataType: 'json',
            beforeSend: function() {},
            success: function(data) {
                if (data.status == true) {
                    const $target = $(currentObj).closest('.cart-single-list')
                    $target.hide('slow', function(){ $target.remove(); });
                }
            },
            error: function(e) {},
        });
    }
</script>