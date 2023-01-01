<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Product Name</th>
                            <th>Customer Name</th>
                            <th>Mobile No</th>
                            <th>Qty.</th>
                            <th>Price</th>
                            <th>Added Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllSale as $key => $row) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row->product_name ?></td>
                            <td><?= $row->customer_name ?></td>
                            <td><?= $row->mobile_no ?></td>
                            <td><?= $row->qty ?></td>
                            <td><?= $row->price ?></td>
                            <td><?= date("d-m-Y h:i A", strtotime($row->added_date)) ?></td>
                            <!-- <td>
                                <a href="<?= base_url('backend/Board/edit/' . $row->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>
                               
                                | <a href="<?= base_url('backend/Board/delete/' . $row->id) ?>"
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