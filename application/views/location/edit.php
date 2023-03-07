
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/Location/update', ['autocomplete' => false, 'id' => 'edit_category'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_category'),
                'id'=> $data->id])
                ?>
             
             <div class="form-group row">
             <div class="col-md-4">
                    <label for="name">Name</label>
                        <input class="form-control" type="text" value="<?= $data->name ?>" Placeholder="Name" name="name"
                            id="name">
                    </div> 
                </div>
              
                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Location')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>
  