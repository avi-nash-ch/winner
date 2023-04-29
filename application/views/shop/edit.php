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
            echo form_open_multipart('backend/Shops/update', ['autocomplete' => false, 'id' => 'edit_worker'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_workers'),
                'id'=> $Product[0]->id])
                ?>
              <div class="form-group row">
                    <div class="col-md-3">
                    <label for="name">Shop Name *</label>
                        <input class="form-control" type="text" Placeholder="Shop Name" value=" <?= $Product[0]->first_name ?>"  name="shop_name" required
                            id="name">
                    </div>
                    <div class="col-md-3">
                    <label for="whatsapp_no">Mobile No.</label>
                        <input class="form-control" type="text" value=" <?= $Product[0]->mobile ?>" Placeholder="Mobile No." name="whatsapp_no"
                            id="whatsapp_no">
                    </div>
                    <div class="col-md-3">
                    <label for="email">Email Id</label>
                        <input class="form-control" type="text" Placeholder="Email Id" value=" <?= $Product[0]->email_id ?>" name="email"
                            id="email">
                    </div>
                    <div class="col-md-3">
                    <label for="password">Password</label>
                        <input class="form-control" type="text" Placeholder="Password" value=" <?= $Product[0]->password ?>" name="password"
                            id="password">
                    </div>
                </div>
               
                <div class="form-group row">
                <div class="col-md-6">
                    <label for="address">Address</label>
                        <input class="form-control" type="text" Placeholder="Address"  value=" <?= $Product[0]->contact_us ?>" name="address"
                            id="address">
                    </div>
                   
                </div>
              
                <div class="form-group row">
                   
                <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview" src="#" style="display:none"  />
            </div>
                    <label for="image">Shop Image *</label>
                        <input class="form-control" type="file" name="product_image" id="image">
                    </div>
                
                   
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Shops')?>" class="btn btn-secondary waves-effect">Cancel</a>
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
                <?php if($Product[0]->logo){ ?>
                    $("#imgPreview").attr("src",'<?= base_url('uploads/images/').$Product[0]->logo ?>');
                    $("#imgPreview").show()
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
             
            });
        </script>