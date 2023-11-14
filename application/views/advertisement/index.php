<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Company Name</th>
                            <th>Image</th>
                            <th>Added Date</th>
                            <!-- <th>Most Viewed</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            foreach ($AllCompanies as $key => $Company){
                                if (!isset($Company->isDeleted) || !$Company->isDeleted){
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $Company->company_name ?></td>
                            <td><img src="<?= base_url('uploads/images/'.$Company->company_image); ?>" height="80px" width="80px"></td>
                            <td><?= date("d-m-Y h:i A", strtotime($Company->added_date)) ?></td>
                            <!-- <td><input type="checkbox"  name="most_viewed" onclick="most_viewed(this,'<?= $Company->id ?>')" <?= !empty($Company->most_viewd)?'checked':'' ?>></td> -->
                            <td>
                                <a href="<?= base_url('backend/Advertisement/edit/' . $Company->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span>
                                </a>|
                                <a href="<?= base_url('backend/Advertisement/delete/' . $Company->id) ?>"
                                    onclick="return confirm('Are you sure you want to delete')" 
                                    class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-times"></span>
                                </a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>