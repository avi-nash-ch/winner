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
                            <th>Driver/Owner Phone No</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle No</th>
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
                            <td><?= $worker->veh_name ?></td>
                            <td><?= $worker->veh_no ?></td>
                            <td><?= date("d-m-Y h:i A", strtotime($worker->added_date)) ?></td>
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
