<!-- <style>
    .holder {
        height: 120px;
        width: 120px;
        border: 2px solid black;
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
</style> -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                echo form_open_multipart('app/MasterSubCategory/insert', [
                    'autocomplete' => false, 'id' => 'add_subcategory', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('app_tbl_subcategory')])
                ?>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="class">Name</label>
                        <input class="form-control" type="text" Placeholder="Name" name="name" id="class">
                    </div>
                </div>
                <br>
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

                        ?>
                        <a href="<?= base_url('app/MasterSubCategory') ?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>