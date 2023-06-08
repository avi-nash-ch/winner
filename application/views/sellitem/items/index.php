<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Price</th>
                            <th>Added Date</th>
                            <th>Published</th>
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
                                <td><?= $row->title ?></td>
                                <td><?= $row->cat_name ?></td>
                                <td><?= $row->sub_cat_name ?></td>
                                <td><?= $row->price ?></td>
                                <td><?= date("d-m-Y h:i A", strtotime($row->added_date)) ?></td>
                                <td>
                                    <?php if ($row->is_verified == 0) { ?>
                                        <a href="<?= base_url('backend/SellItem/publish/1/' . $row->id) ?>" onclick="return confirm('Are you sure you want to remove from publish?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Publicsh"><span class="fa fa-times"></span></a>

                                    <?php } else { ?>
                                        <a href="<?= base_url('backend/SellItem/publish/0/' . $row->id) ?>" onclick="return confirm('Are you sure you want to publish?')" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Publicsh"><span class="fa fa-check"></span></a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('backend/SellItem/view/' . $row->id) ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><span class="fa fa-eye"></span></a>

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