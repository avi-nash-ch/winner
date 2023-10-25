<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email id.</th>
                            <th>Mobile no.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllCustomers as $key => $customer) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $customer->name ?></td>
                            <td><?= $customer->user_email ?></td>
                            <td><?= $customer->whatsapp_no ?></td>
                            <td>
                                <a href="<?= base_url('backend/Customer/orders/' . $customer->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="View Orders"><span class="fa fa-eye"></span></a>|

                                <a href="<?= base_url('backend/Customer/delete/' . $customer->id) ?>"
                                    onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"
                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                    <span class="fa fa-times"></span></a>
                            </td>
                        </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>