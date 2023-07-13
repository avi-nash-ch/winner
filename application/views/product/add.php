
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
            echo form_open_multipart('backend/Products/insert', ['autocomplete' => false, 'id' => 'add_product'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_product')])
            ?>
            <?php if($this->session->role==0){ ?>
              <div class="form-group row">
                <div class="col-md-6">
                    <label for="name">Shop Name *</label>
                       <select class="form-control select2" name="shop_id" required>
                        <option value="">Select Shop</option>
                        <?php foreach ($Shop as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->first_name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                        </div>
                        <?php } ?>
                <div class="form-group row">
                <div class="col-md-4">
                    <label for="name">Category *</label>
                       <select class="form-control select2" name="cat" required>
                        <option value="">Select Category</option>
                        <?php foreach ($Category as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>

                    <div class="col-md-4">
                    <label for="name">Sub Category *</label>
                       <select class="form-control select2" name="sub_cat" required>
                        <option value="">Select Category</option>
                        <?php foreach ($SubCategory as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-3">
                    <label for="name">Food Type *</label>
                       <select class="form-control select2" name="food_type" required>
                        <option value="">Select Type</option>
                        <option value="1">Veg</option>
                        <option value="2">Non-Veg</option>
                       </select>
                    </div>
                 
                </div>
                <div class="form-group row">
               
                <div class="col-md-8">
                    <label for="name">Product Name *</label>
                    <textarea class="form-control" type="text" Placeholder="Product Name *" name="name"
                            id="desc"></textarea>
                        <!-- <input class="form-control" type="text" Placeholder="Name"  name="name" required
                            id="name"> -->
                    </div>
                   
                    <div class="col-md-3">
                    <label for="price">Sale Price *</label>
                        <input class="form-control" type="text" Placeholder="Price"  name="sale_price" required
                            id="prcie">
                    </div>
                   
            </div>
                <div class="form-group row">
               
                    <div class="col-md-8">
                    <label for="desc">Description</label>
                        <textarea class="form-control" type="text" Placeholder="Description" name="desc"
                            id="desc"></textarea>
                    </div>
                    <div class="col-md-3">
                    <label for="discount">Discount in %</label>
                        <input class="form-control" type="text" Placeholder="discount" name="discount"
                            id="discount">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview" src="#" style="display:none"  />
            </div>
                    <label for="image">Image1 *</label>
                        <input class="form-control" type="file" name="product_image" id="image" required>
                    </div>
                    <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview2" src="#" style="display:none"  />
            </div>
                    <label for="image2">Image2</label>
                        <input class="form-control" type="file" name="product_image2" id="image2">
                    </div>
                    <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview3" src="#" style="display:none"  />
            </div>
                    <label for="imag3">Image3</label>
                        <input class="form-control" type="file" name="product_image3" id="image3">
                    </div>
                    <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview4" src="#" style="display:none"  />
            </div>
                    <label for="image4">Image4</label>
                        <input class="form-control" type="file" name="product_image4" id="image4">
                    </div>
                    
                </div>
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Products')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>
    <script>
            $(document).ready(() => {
                $('.select2').select2();
                $("#image").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                              $('#imgPreview').show()
                        };
                        reader.readAsDataURL(file);
                    }
                });
                $("#image2").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview2")
                              .attr("src", event.target.result);
                              $('#imgPreview2').show()
                        };
                        reader.readAsDataURL(file);
                    }
                });
                $("#image3").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview3")
                              .attr("src", event.target.result);
                              $('#imgPreview3').show()
                        };
                        reader.readAsDataURL(file);
                    }
                });
                $("#image4").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview4")
                              .attr("src", event.target.result);
                              $('#imgPreview4').show()
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>