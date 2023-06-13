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
                echo form_open_multipart('backend/SellSubCategory/update', [
                    'autocomplete' => false, 'id' => 'edit_category', 'method' => 'post'
                ], [
                    'type' => $this->url_encrypt->encode('tbl_sell_subcategories'),
                    'id' => $data->id
                ])
                ?>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="name">Name *</label>
                        <input class="form-control" type="text" value="<?= $data->name ?>" Placeholder="Name" name="name" id="name" required>
                    </div>

                    <div class="col-md-4">
                        <label for="type">Color *</label>
                        <select class="form-control select2" name="category_id" data-placeholder="Select Type" required>
                            <option value="">Select Type</option>
                            <?php foreach($categories as $cat){?>
                                <option <?= $data->category_id == $cat->id ? 'selected' : '' ?> value="<?= $cat->id?>"><?= $cat->name ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

                        ?>
                        <a href="<?= base_url('backend/SellSubCategory') ?>" class="btn btn-secondary waves-effect">Cancel</a>
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
            <?php if ($data->icon) { ?>
                $("#imgPreview").attr("src", '<?= base_url('uploads/images/') . $data->icon ?>');
                $("#imgPreview").show()
            <?php } ?>
            $("#image").change(function() {
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

        });
    </script>