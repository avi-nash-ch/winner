<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Customer</th>
                            <th>Customer Phone No</th>
                            <th>Worker</th>
                            <th>Worker Phone No</th>
                            <th>Shop Name</th>
                            <th>Shop Address</th>
                            <th>Contacted Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllWorkers as $key => $worker) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $worker->user_name ?></td>
                            <td><?= $worker->user_phone ?></td>
                            <td><?= $worker->worker_name ?></td>
                            <td><?= $worker->worker_phone ?></td>
                            <td><?= $worker->shop_name ?></td>
                            <td><?= $worker->shop_address ?></td>
                            <td><?= date("d-m-Y h:i A", strtotime($worker->added_date)) ?></td>
                            <!-- <td>
                                <a href="<?= base_url('backend/Workers/edit/' . $worker->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>
                                | <a href="<?= base_url('backend/Workers/delete/' . $worker->id) ?>"
                                    onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><span class="fa fa-times"></span></a>
                            </td> -->
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
