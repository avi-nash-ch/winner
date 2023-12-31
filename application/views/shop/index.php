<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100%"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Shop Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Added Date</th>
                            <th>Top Seller Shop</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <!-- <?php
    // Debugging
    echo "<pre>";
    print_r($All); // This will display the contents of $All for debugging purposes.
    echo "</pre>";
    ?> -->
                        <?php   
                        $i = 0;
                        foreach ($All as $key => $shop) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $shop->shop_name ?></td>
                            <td><?= $shop->user_email ?></td>
                            <td><?= $shop->whatsapp_no ?></td>
                            <td><?= $shop->address ?></td>
                            <!-- <td><?= $shop->service_provider ?></td> -->
                            <td><?= $shop->added_date ?></td>
                            <td>
                                <input type="checkbox" name="most_viewed" onclick="most_viewed(this,'<?= $shop->id ?>')" <?= !empty($shop->top_shop)?'checked':'' ?>>
                            </td>
                            <td>
                                <a href="<?= base_url('backend/Shops/edit/' . $shop->id) ?>" class="btn btn-info"
                                    data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>
                                | <a href="<?= base_url('backend/Shops/delete/' . $shop->id) ?>"
                                    onclick="return confirm('Are you sure you want to delete')" class="btn btn-danger"
                                    data-toggle="tooltip" data-placement="top" title="Delete"><span
                                        class="fa fa-times"></span></a>
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

<script>
function most_viewed(checkbox, id) {
    if ($(checkbox).is(':checked')) {
        var a = 1;
    } else {
        var a = 0;
    }

    jQuery.ajax({
        type: 'POST',
        data: {
            status: a,
            id: id
        },
        url: '<?= base_url('backend/Products/most_viewed') ?>',
        dataType: 'json',
        beforeSend: function() {},
        success: function(data) {
            // if(data.response==true){
            //     // printJS('<?= base_url()?>' + data.file_name, 'pdf');
            // }else{
            //     toastr.error('Something went wrong.')
            // }
        },
        error: function(e) {},
    });
}
</script>