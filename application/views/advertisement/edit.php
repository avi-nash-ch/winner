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
                echo form_open_multipart('backend/Advertisement/update', [
                    'autocomplete' => false, 'id' => 'tbl_advertisement', 'method' => 'post'
                ], ['type' => $this->url_encrypt->encode('tbl_advertisement'),'id'=> $Company->id])
                ?>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="company_name">Company Name</label>
                        <input class="form-control" type="text" Placeholder="Company Name" name="company_name" id="company_name"  value="<?= $Company->company_name ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <div class="holder">
                            <img id="imgPreview" src="#" style="display:none" />
                        </div>
                        <label for="image1">Image1</label>
                        <input class="form-control" type="file" name="company_image" id="image1" value="<?= $Company->company_image ?>" required>
                    </div>
                    
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
        // Load existing image on page load
        const existingImage = "<?= base_url('uploads/images/' . $Company->company_image) ?>";
        if (existingImage) {
            $("#imgPreview").attr("src", existingImage);
            $('#imgPreview').show();
        }

        $("#image1").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview").attr("src", event.target.result);
                    $('#imgPreview').show();
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
