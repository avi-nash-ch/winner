<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/Classes/update', ['autocomplete' => false, 'id' => 'edit_class'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_class'),
                'id'=> $data->id])
                ?>
             
             <div class="form-group row">
             <div class="col-md-4">
                    <label for="class">Class</label>
                        <input class="form-control" type="text" value="<?= $data->name ?>" Placeholder="Class" name="class"
                            id="class">
                    </div> 
                </div>
               
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Classes')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>
    <script>
    function updateValue(x) {
        $('#point_value').val(x * 80);
    }
    </script>