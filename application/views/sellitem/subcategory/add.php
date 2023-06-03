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
                echo form_open_multipart('backend/SellSubCategory/insert', [
                    'autocomplete' => false, 'id' => 'add_category', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_sell_subcategories')])
                ?>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="class">Name *</label>
                        <input class="form-control" type="text" Placeholder="Name" name="name" id="class" required>
                    </div>

                    <div class="col-md-4">
                        <label for="type">Category *</label>
                        <select class="form-control select2" name="category_id" data-placeholder="Select Category" required>
                            <option value="">Select Category</option>
                            <?php foreach($categories as $cat){?>
                                <option value="<?= $cat->id ?>"><?= $cat->name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);

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