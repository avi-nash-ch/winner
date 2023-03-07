
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
            echo form_open_multipart('backend/Workers/insert', ['autocomplete' => false, 'id' => 'tbl_workers'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_workers')])
            ?>
                <div class="form-group row">
                <div class="col-md-3">
                    <label for="category">Category *</label>
                       <select class="form-control" name="category" required>
                        <option value="">Select Category</option>
                        <?php foreach ($Category as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                    <div class="col-md-3">
                    <label for="name">Name *</label>
                        <input class="form-control" type="text" Placeholder="Name"  name="name" required
                            id="name">
                    </div>
                    <div class="col-md-3">
                    <label for="whatsapp_no">Whatsapp No.</label>
                        <input class="form-control" type="text" Placeholder="Whatsapp No." name="whatsapp_no"
                            id="whatsapp_no">
                    </div>
                    <div class="col-md-3">
                    <label for="service_provider">Service Provider</label>
                        <input class="form-control" type="text" Placeholder="Service Provider" name="service_provider"
                            id="service_provider">
                    </div>
                </div>
               
                <div class="form-group row">
                <div class="col-md-6">
                    <label for="address">Address</label>
                        <input class="form-control" type="text" Placeholder="Address"  name="address"
                            id="address">
                    </div>
                   
                    <div class="col-md-4">
                    <label for="location">Location</label>
                    <select class="form-control" name="location" required>
                        <option value="">Select Location</option>
                        <?php foreach ($Location as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->name ?></option>
                   <?php } ?>
                       </select>
                    </div>
                   
                </div>
                <div class="form-group row">
                <div class="col-md-6">
                    <label for="shop_name">Shop Name</label>
                        <input class="form-control" type="text" Placeholder="Shop Name"  name="shop_name"
                            id="shop_name">
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
                         <a href="<?= base_url('backend/Workers')?>" class="btn btn-secondary waves-effect">Cancel</a>
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