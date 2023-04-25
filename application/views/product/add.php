
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
                <div class="form-group row">
                <div class="col-md-2">
                    <label for="name">Category *</label>
                       <select class="form-control select2" name="cat" required>
                        <option value="">Select Category</option>
                        <?php foreach ($Category as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>

                    <div class="col-md-2">
                    <label for="name">Sub Category *</label>
                       <select class="form-control select2" name="sub_cat" required>
                        <option value="">Select Category</option>
                        <?php foreach ($SubCategory as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Color *</label>
                       <select class="form-control select2" name="color[]" data-placeholder="Select Color" multiple required>
                        <option value="">Select Color</option>
                        <option value="1">White</option>
                        <option value="2">Red</option>
                        <option value="3">Blue</option>
                        <option value="4">Green</option>
                        <option value="5">Yellow</option>
                        <option value="6">Pink</option>
                        <option value="7">Black</option>
                        <option value="8">Brown</option>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Age </label>
                       <select class="form-control select2" data-placeholder="Select Age" name="age[]" multiple>
                        <option value="">Select Age</option>
                        <?php for ($i=1; $i <81 ; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">For *</label>
                       <select class="form-control select2" name="for" required>
                        <option value="">Select For </option>
                        <option value="1">Men</option>
                        <option value="2">Boys</option>
                        <option value="3">Girl</option>
                        <option value="4">Women</option>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Size *</label>
                       <select class="form-control select2" data-placeholder="Select Size" name="size[]" multiple required>
                        <option value="">Select Size </option>
                        <option value="1">L</option>
                        <option value="2">XL</option>
                        <option value="3">M</option>
                        <option value="4">S</option>
                       </select>
                    </div>
                </div>
                <div class="form-group row">
               
                <div class="col-md-3">
                    <label for="name">Product Name *</label>
                        <input class="form-control" type="text" Placeholder="Name"  name="name" required
                            id="name">
                    </div>
                    <div class="col-md-2">
                    <label for="qty">Qty. *</label>
                        <input class="form-control" type="number" Placeholder="Price"  name="qty" required
                            id="prcie">
                    </div>
                    <div class="col-md-3">
                    <label for="price">Purchase Price Per Piece *</label>
                        <input class="form-control" type="text" Placeholder="Price"  name="purchase_price" required
                            id="prcie">
                    </div>
                    <div class="col-md-3">
                    <label for="price">Sale Price Per Piece *</label>
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
                    <label for="name">Brand *</label>
                       <select class="form-control select2" name="brand" required>
                        <option value="">Select Brand</option>
                        <?php foreach ($AllBrands as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                </div>
                
                <div class="form-group row">
                <div class="col-md-3">
                    <label for="product_code">ISBN/Product Code</label>
                        <input class="form-control" type="text" Placeholder="ISBN/Product Code"  name="product_code"
                            id="product_code">
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