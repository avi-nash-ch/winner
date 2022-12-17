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
                            <th>Qty</th>
                            <th>Available Qty</th>
                            <th>QR Code</th>
                            <th>Sale Price</th>
                            <th>Image</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($AllProducts as $key => $AllProduct) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $AllProduct->name ?></td>
                            <td><?= $AllProduct->qty ?></td>
                            <td><?= $AllProduct->qty ?></td>
                            <td><?= $AllProduct->qr_code ?></td>
                            <td><?= $AllProduct->price_sale ?></td>
                            <td><img src="<?= base_url('uploads/images/'.$AllProduct->image); ?>" height="80px" width="80px"></td>
                            <td><?= date("d-m-Y h:i A", strtotime($AllProduct->added_date)) ?></td>
                            <td>
                                <a href="<?= base_url('backend/Products/edit/' . $AllProduct->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>
                                <!-- | <a href="<?= base_url('backend/Products/addprice/' . $AllProduct->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Add Price"><span
                                        class="fa fa-eye"></span></a> -->
                                | <a href="<?= base_url('backend/Products/delete/' . $AllProduct->id) ?>"
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