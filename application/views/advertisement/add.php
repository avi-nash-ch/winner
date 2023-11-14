<style>
    .holder {
        height: 120px;
        width: 120px;
        border: 2px solid black;
    }

    .holder img {
        max-width: 120px;
        max-height: 120px;
        min-width: 120px;
        min-height: 120px;
    }
    img {
        max-width: 36px;
        max-height: 36px;
        min-width: 36px;
        min-height: 36px;
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
                echo form_open_multipart('backend/Advertisement/insert', [
                    'autocomplete' => false, 'id' => 'tbl_advertisement', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_advertisement')])
                ?>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="company_name">Company Name</label>
                        <input class="form-control" type="text" Placeholder="Company Name" name="company_name" id="company_name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <div class="holder">
                            <img id="imgPreview" src="#" style="display:none" />
                        </div>
                        <label for="image1">Image1</label>
                        <input class="form-control" type="file" name="company_image" id="image1" required>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="holder">
                            <img id="imgPreview2" src="#" style="display:none" />
                        </div>
                        <label for="image2">Image2</label>
                        <input class="form-control" type="file" name="product_image2" id="image2">
                    </div> -->
                    <!-- <div class="col-md-2">
                            <div class="holder">
                                <img id="imgPreview3" src="#" style="display:none"  />
                            </div>
                            <label for="imag3">Image3</label>
                            <input class="form-control" type="file" name="product_image3" id="image3">
                        </div> -->
                    <!-- <div class="col-md-2">
                            <div class="holder">
                                <img id="imgPreview4" src="#" style="display:none"  />
                            </div>
                            <label for="image4">Image4</label>
                            <input class="form-control" type="file" name="product_image4" id="image4">
                        </div> -->
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="col-md-6">
                    <?php
                    echo form_submit('submit', 'Save', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

                    ?>
                    <a href="<?= base_url('backend/Advertisement') ?>" class="btn btn-secondary waves-effect">Cancel</a>
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
        $("#image1").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#imgPreview")
                        .attr("src", event.target.result);
                    $('#imgPreview').show()
                };
                reader.readAsDataURL(file);
            }
        });
        // $("#image2").change(function() {
        //     const file = this.files[0];
        //     if (file) {
        //         let reader = new FileReader();
        //         reader.onload = function(event) {
        //             $("#imgPreview2")
        //                 .attr("src", event.target.result);
        //             $('#imgPreview2').show()
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // });
        // $("#image3").change(function() {
        //     const file = this.files[0];
        //     if (file) {
        //         let reader = new FileReader();
        //         reader.onload = function(event) {
        //             $("#imgPreview3")
        //                 .attr("src", event.target.result);
        //             $('#imgPreview3').show()
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // });
        // $("#image4").change(function() {
        //     const file = this.files[0];
        //     if (file) {
        //         let reader = new FileReader();
        //         reader.onload = function(event) {
        //             $("#imgPreview4")
        //                 .attr("src", event.target.result);
        //             $('#imgPreview4').show()
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // });
    });
    </script>