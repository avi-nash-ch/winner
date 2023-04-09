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
            echo form_open_multipart('backend/Products/update', ['autocomplete' => false, 'id' => 'edit_product'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_product'),
                'id'=> $Product->id])
                ?>
             <div class="form-group row">
             <div class="col-md-2">
             <label for="name">Category *</label>
                       <select class="form-control" name="type">
                        <option value="">Select Category</option>
                        <?php foreach ($Category as $key => $value) { ?>
                        <option value="<?= $value->id ?>" <?= ($Product->cat==$value->id)?'selected':''?>><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-2">
             <label for="name">Sub Category *</label>
                       <select class="form-control" name="type">
                        <option value="">Select Sub Category</option>
                        <?php foreach ($SubCategory as $key => $value) { ?>
                        <option value="<?= $value->id ?>" <?= ($Product->sub_cat==$value->id)?'selected':''?>><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Color *</label>
                       <select class="form-control" name="color" required>
                        <option value="">Select Color</option>
                        <option value="1" <?= ($Product->color==1)?'selected':''?>>White</option>
                        <option value="2" <?= ($Product->color==2)?'selected':''?>>Red</option>
                        <option value="3" <?= ($Product->color==3)?'selected':''?>>Blue</option>
                        <option value="4" <?= ($Product->color==4)?'selected':''?>>Green</option>
                        <option value="5" <?= ($Product->color==5)?'selected':''?>>Yellow</option>
                        <option value="6" <?= ($Product->color==6)?'selected':''?>>Pink</option>
                        <option value="7" <?= ($Product->color==7)?'selected':''?>>Black</option>
                        <option value="8" <?= ($Product->color==8)?'selected':''?>>Brown</option>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Age </label>
                       <select class="form-control" name="age">
                        <option value="">Select Age</option>
                        <?php for ($i=1; $i <81 ; $i++) { ?>
                        <option value="<?= $i ?>" <?= ($Product->age==$i)?'selected':''?>><?= $i ?></option>
                    <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">For *</label>
                       <select class="form-control" name="for" required>
                        <option value="">Select For </option>
                        <option value="1" <?= ($Product->for==1)?'selected':''?>>Men</option>
                        <option value="2" <?= ($Product->for==2)?'selected':''?>>Boys</option>
                        <option value="3" <?= ($Product->for==3)?'selected':''?>>Girl</option>
                        <option value="4" <?= ($Product->for==4)?'selected':''?>>Women</option>
                       </select>
                    </div>
                    <div class="col-md-2">
                    <label for="name">Size *</label>
                       <select class="form-control" name="size" required>
                        <option value="">Select Size </option>
                        <option value="1" <?= ($Product->size==1)?'selected':''?>>L</option>
                        <option value="2" <?= ($Product->size==2)?'selected':''?>>XL</option>
                        <option value="3" <?= ($Product->size==3)?'selected':''?>>M</option>
                        <option value="4" <?= ($Product->size==4)?'selected':''?>>S</option>
                       </select>
                    </div>   
                </div>
             <div class="form-group row">
    
                    <div class="col-md-3">
                    <label for="name">Product Name *</label>
                        <input class="form-control" type="text"  name="name" value="<?= $Product->name ?>" required
                            id="name">
                    </div>
                    <div class="col-md-2">
                    <label for="qty">Qty. *</label>
                        <input class="form-control" type="number" Placeholder="Price" value="<?= $Product->qty ?>"  name="qty" required
                            id="prcie">
                    </div>
                    <div class="col-md-3">
                    <label for="price">Purchase Price Per Piece *</label>
                        <input class="form-control" type="text" Placeholder="Price" value="<?= $Product->purchase_price ?>"  name="purchase_price" required
                            id="prcie">
                    </div>
                    <div class="col-md-3">
                    <label for="price">Sale Price Per Piece *</label>
                        <input class="form-control" type="text" Placeholder="Price" value="<?= $Product->price_sale ?>"  name="sale_price" required
                            id="prcie">
                    </div>
                </div>
                <div class="form-group row">
               
                    <div class="col-md-6">
                    <label for="desc">Description</label>
                        <textarea class="form-control" type="text"  name="desc" id="desc"><?= $Product->description ?></textarea>
                    </div>
                   
                </div>
                <div class="form-group row">
                <div class="col-md-3">
                    <label for="product_code">ISBN/Product Code</label>
                        <input class="form-control" type="text" Placeholder="ISBN/Product Code" value="<?= $Product->product_code ?>"  name="product_code" ]
                            id="product_code">
                    </div>
                   
                    <div class="col-md-3">
                    <label for="discount">Discount in %</label>
                        <input class="form-control" type="text" Placeholder="discount" value="<?= $Product->offer ?>" name="discount"
                            id="discount">
                    </div>
                </div>

                <div class="form-group row">
                   
                <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview" src="#" style="display:none"  />
            </div>
                    <label for="image">Image1 *</label>
                        <input class="form-control" type="file" name="product_image" id="image">
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
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
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
                <?php if($Product->image){ ?>
                    $("#imgPreview").attr("src",'<?= base_url('uploads/images/').$Product->image ?>');
                    $("#imgPreview").show()
                    <?php } ?>
                    <?php if($Product->image2){ ?>
                    $("#imgPreview2").attr("src",'<?= base_url('uploads/images/').$Product->image2 ?>');
                    $("#imgPreview2").show()
                    <?php } ?>
                    <?php if($Product->image3){ ?>
                    $("#imgPreview3").attr("src",'<?= base_url('uploads/images/').$Product->image3 ?>');
                    $("#imgPreview3").show()
                    <?php } ?>
                    <?php if($Product->image4){ ?>
                    $("#imgPreview4").attr("src",'<?= base_url('uploads/images/').$Product->image4 ?>');
                    $("#imgPreview4").show()
                    <?php } ?>
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