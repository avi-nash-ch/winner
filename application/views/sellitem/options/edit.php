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
                echo form_open_multipart('backend/AttributeOptions/update', [
                    'autocomplete' => false, 'id' => 'edit_category', 'method' => 'post'
                ], [
                    'type' => $this->url_encrypt->encode('tbl_attributes_options'),
                    'id' => $data->id
                ])
                ?>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" value="<?= $data->name ?>" Placeholder="Name" name="name" id="name">

                        <input type="hidden" name="field_id" value="<?= $data->field_id?>" >
                    </div>
                </div>
                <br>
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

                        ?>
                        <a href="<?= base_url('backend/AttributeOptions/index/'.$data->field_id) ?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div><!-- end col -->
    </div>