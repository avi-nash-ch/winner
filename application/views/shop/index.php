<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Shop Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Added Date</th>
                            <th>Top Seller Shop</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($All as $key => $shop) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $shop->first_name ?></td>
                            <td><?= $shop->email_id ?></td>
                            <td><?= $shop->mobile ?></td>
                            <td><?= $shop->password ?></td>
                            <td><?= $shop->contact_us ?></td>
                            <!-- <td><?= $shop->service_provider ?></td> -->
                            <td><?= date("d-m-Y h:i A", strtotime($shop->created_date)) ?></td>
                            <td><input type="checkbox"  name="most_viewed" onclick="most_viewed(this,'<?= $AllProduct->id ?>')" <?= !empty($AllProduct->most_viewd)?'checked':'' ?>></td>
                            <td>
                                <a href="<?= base_url('backend/Shops/edit/' . $shop->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>
                                | <a href="<?= base_url('backend/Shops/delete/' . $shop->id) ?>"
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

<script>
   
function most_viewed($this,id) {
   if($($this).is(':checked')){
    var a=1
   }else{
    var a=0;
   }

  jQuery.ajax({
    type: 'POST',
    data: {
        status:a,
        id

    },
    url: '<?= base_url('backend/Products/most_viewed') ?>',
    dataType: 'json',
    beforeSend: function () {
    },
    success: function (data) {
        // if(data.response==true){
        //     // printJS('<?= base_url()?>' + data.file_name, 'pdf');
        // }else{
        //     toastr.error('Something went wrong.')
        // }
       
    },
    error: function (e) {
    },
  });
}
</script>