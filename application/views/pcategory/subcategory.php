<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <?php
            echo form_open_multipart('backend/ProductCategory/insert_subcategory', ['autocomplete' => false, 'id' => 'add_category'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_category')])
            ?>
                <div class="form-group row">
              
                <div class="col-md-4">
                    <label for="class">Name</label>
                        <input class="form-control" type="text" Placeholder="Name" name="name"
                            id="class">
                            <input type="hidden"  name="category_id" value="<?= $category_id ?>">
                            <!-- <input type="hidden"  name="sub_cat_id" value="<?= $sub_cat_id ?>"> -->
                    </div> 

                    <div class="col-md-4" style="margin-top: 3%;">
                    <div>
                        <?php
                        echo form_submit('submit', 'Save', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/ProductCategory')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                    </div> 
                </div>
               
                    <br>
                <div class="form-group mb-0">
                   
                </div>
                <?php
            echo form_close();
            ?>
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($All as $key => $row) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row->name ?></td>
                            <td><?= date("d-m-Y h:i A", strtotime($row->added_date)) ?></td>
                            <td>
                                <!-- <a href="<?= base_url('backend/ProductCategory/editSubCategory/' . $row->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a> -->

                                 <a href="<?= base_url('backend/ProductCategory/deleteSubCategory/'. $row->category_id.'/'.$row->id) ?>"
                                    onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><span class="fa fa-times"></span></a>
                            </td>
                        </tr>
                        <?php }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>