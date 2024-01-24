<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>User Name</th>
                            <th>Mobile</th>
                            <th>Email Address</th>
                            <th>Password</th>
                            <th>User Type</th>
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
                                <td><?= $row->user_name ?></td>
                                <td><?= $row->mobile ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->password ?></td>
                                <td><?= ($row->user_type == 1) ? 'Super User' : 'User' ?></td>
                                <td><?= date("d-m-Y h:i A", strtotime($row->added_date)) ?></td>
                                <td>
                                    <a href="<?= base_url('app/User/edit/' . $row->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Update"><span class="fa fa-edit"></span></a>

                                    | <a href="<?= base_url('app/User/delete/' . $row->id) ?>" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-times"></span></a>
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