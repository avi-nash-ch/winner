<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>File Name</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllFiles as $key => $row) {
                            $i++;
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row->file_name ?></td>
                                <td><?= date("d-m-Y h:i A", strtotime($row->added_date)) ?></td>
                                <td>
                                    <a href="#>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Open"><span class="fa fa-eye"></span></a>

                                    | <a href="<?= base_url('app/Files/edit/' . $row->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Rename"><span class="fa fa-edit"></span></a>

                                    | <a href="<?= base_url('app/Files/delete/' . $row->id) ?>" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-times"></span></a>
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