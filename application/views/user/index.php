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
                            <th>Email</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $statusMapping = [
                            '0' => 'Free user',
                            '1' => 'Active Paid',
                            '2' => 'Social user',
                            '3' => 'Demo user'
                        ];

                        foreach ($AllUsers as $key => $user) {
                            // Check if the user is not deleted (isDeleted is FALSE or not set)
                            if (!isset($user->isDeleted) || !$user->isDeleted) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $user->first_name . ' ' . $user->last_name ?></td>
                                    <td><?= $user->mobile ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->password ?></td>
                                    <td><?= isset($statusMapping[$user->status]) ? $statusMapping[$user->status] : 'Unknown' ?></td>
                                    <td><?= $user->expiry_date ?></td>
                                    <td>
                                        <a href="<?= base_url('backend/Users/edit/' . $user->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-edit"></span></a>|

                                        <a href="<?= base_url('backend/Users/delete/' . $user->id) ?>" onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-times"></span></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
