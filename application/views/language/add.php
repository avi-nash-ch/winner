<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/Language/insert', ['autocomplete' => false, 'id' => 'add_language'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_language')])
            ?>
                <div class="form-group row">
              
                <div class="col-md-4">
                    <label for="class">Language</label>
                        <input class="form-control" type="text" Placeholder="Language" name="name"
                            id="class">
                    </div> 
                </div>
               
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Language')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>
    <script>
    // function updateValue(x) {
    //     $('#boot_value').val(x * 80);
    // }
    </script>