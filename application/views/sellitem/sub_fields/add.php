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
                echo form_open_multipart('backend/SubCategoryFields/insert', [
                    'autocomplete' => false, 'id' => 'add_sub_cat_mapping', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('sub_category_field_mapping')])
                ?>
                <div class="form-group row">
                    <input type="hidden" value="<?= $sub_cat_id?>" name="sub_cat_id">
                    <div class="col-md-6">
                        <label for="name">Fields *</label>
                        <select class="form-control select2" name="attributes[]" data-placeholder="Select Attributes" multiple required>
                            <option value="">Select Fields</option>
                            <?php foreach ($attributes as $attribute) { ?>
                                <option value="<?= $attribute->id ?>"><?= $attribute->name ?> (<?= $attribute->type ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <br>
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

                        ?>
                        <a href="<?= base_url('backend/AttributeOptions/index/' . $sub_cat_id) ?>" class="btn btn-secondary waves-effect">Cancel</a>
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
        });
    </script>