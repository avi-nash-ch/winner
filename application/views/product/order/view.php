<style>
    .holder {
        height: 120px;
        width: 120px;
        border: 2px solid black;
    }

    img {
        max-width: 120px;
        max-height: 120px;
        min-width: 120px;
        min-height: 120px;
    }

    input[type="file"] {
        margin-top: 5px;
    }

    .heading {
        font-family: Montserrat;
        font-size: 45px;
        color: green;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('', 
                ['autocomplete' => false, 'id' => 'edit_product', 'method' => 'post'],
                [
                    'type' => $this->url_encrypt->encode('tbl_product'),
                    'id' => $product->id
                ]);
                ?>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="name">User Name</label>
                        <input class="form-control" type="text" name="first_name" value="<?= $product->first_name . ' '. $product->last_name ?>" id="name" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="<?= $product->email ?>" id="email" readonly>
                    </div>
                       <div class="col-md-3">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" name="phone" value="<?= $product->phone ?>" id="phone" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="name">Country</label>
                        <input class="form-control" type="text" name="country" value="<?= $product->country ?>" id="country" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" value="<?= $product->address ?>" id="name" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="city">City</label>
                        <input class="form-control" type="text" name="city" value="<?= $product->city ?>" id="city" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="postal_code">Postal Code</label>
                        <input class="form-control" type="text" name="postal_code" value="<?= $product->postal_code ?>" id="postal_code" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="state">State</label>
                        <input class="form-control" type="text" name="state" value="<?= $product->state ?>" id="state" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="name">Product Name</label>
                        <input class="form-control" type="text" name="name" value="<?= $product->product_name ?>" id="name" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="qty">Qty.</label>
                        <input class="form-control" type="number" Placeholder="Price" value="<?= $product->quantity ?>" name="qty" id="prcie" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="qty">Cost.</label>
                        <input class="form-control" type="text" Placeholder="Cost" value="<?= $product->cost ?>" name="cost" id="cost" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="payment_mode">Paymet Mode.</label>
                        <input class="form-control" type="text" Placeholder="Payment Mode" value="<?= $product->payment_mode ?>" name="payment_mode" id="payment_mode" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="name">Color</label>
                        <input class="form-control" type="text" name="color" value="<?= getColorNameByNumber($product->color) ?>" id="color" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="qty">Size.</label>
                        <input class="form-control" type="text" Placeholder="Size" value="<?= getSizeNameByNumber($product->size) ?>" name="size" id="size" readonly>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-2">
                        <div class="holder">
                            <img id="imgPreview" src="#" style="display:none" />
                        </div>
                        <label for="image">Image</label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <div>
                        <a href="<?= base_url('backend/Products/ordered') ?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->\
    </div>
    <script>
        $(document).ready(() => {
            $('.select2').select2();
            <?php if ($product->image) { ?>
                $("#imgPreview").attr("src", '<?= base_url('uploads/images/') . $product->image ?>');
                $("#imgPreview").show()
            <?php } ?>
        });
    </script>
    