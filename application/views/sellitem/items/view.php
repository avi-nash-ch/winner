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
                echo form_open_multipart('backend/AttributeOptions/insert', [
                    'autocomplete' => false, 'id' => 'add_category', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_attributes_options')])
                ?>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="class">Category</label>
                        <input class="form-control" type="text" value="<?= $data['cat_name'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Sub Category</label>
                        <input class="form-control" type="text" value="<?= $data['sub_cat_name'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Title</label>
                        <input class="form-control" type="text" value="<?= $data['title'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="class">Description</label>
                        <textarea rows="4" class="form-control" readonly><?= $data['description'] ?></textarea>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Price</label>
                        <input class="form-control" type="text" value="<?= $data['price'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Seller Name</label>
                        <input class="form-control" type="text" value="<?= $data['seller_name'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="class">Seller Phone</label>
                        <input class="form-control" type="text" value="<?= $data['seller_phone'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Seller State</label>
                        <input class="form-control" type="text" value="<?= $data['state_name'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Village</label>
                        <input class="form-control" type="text" value="<?= $data['seller_village'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="class">Taluka</label>
                        <input class="form-control" type="text" value="<?= $data['seller_taluka'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">District</label>
                        <input class="form-control" type="text" value="<?= $data['seller_district'] ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="class">Pincode</label>
                        <input class="form-control" type="text" value="<?= $data['seller_pincode'] ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2">
                        <div class="holder">
                            <img id="imgPreview" src="<?= base_url('uploads/sellitems/' . $data['image1']) ?>" />
                        </div>
                        <label for="image">Image1</label>
                    </div>
                    <div class="col-md-2">
                        <div class="holder">
                            <img id="imgPreview2" src="<?= base_url('uploads/sellitems/' . $data['image2']) ?>" />
                        </div>
                        <label for="image2">Image2</label>
                    </div>
                    <div class="col-md-2">
                        <div class="holder">
                            <img id="imgPreview3" src="<?= base_url('uploads/sellitems/' . $data['image3']) ?>" />
                        </div>
                        <label for="imag3">Image3</label>
                    </div>
                </div>
                <br>
                <hr>
                <h4>Additional Details</h4>
                <div class="form-group row">
                    <?php
                    foreach ($data['fields'] as $field) { ?>
                        <div class="col-md-4">
                            <label for="class"><?= $field['field_name']?></label>
                            <input class="form-control" type="text" value="<?= $field['field_value']?>" readonly>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="form-group mb-0">
                    <div>
                        <a href="<?= base_url('backend/SellItem') ?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>