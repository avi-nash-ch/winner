<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Order Id</th>
                            <th>Shop Name</th>
                            <th>Delivery Boy</th>
                            <th>Delivery Boy Mo.</th>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Customer Mo.</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Screenshot</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($products as $key => $product) {
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $product->id ?></td>
                            <td><?= $product->shop_name ?></td>
                            <td><?= $product->delivery_boy ?></td>
                            <td><?= $product->d_contact ?></td>
                            <td><?= $product->first_name ?></td>
                            <td><?= $product->address ?></td>
                            <td><?= $product->phone ?></td>
                            <td><?php if($product->status==0){
                                echo "Pending";
                            }else if($product->status==1){
                                echo "Accept By Delivery Boy";
                            }else if($product->status==2){
                                echo "Out For Delivery";
                            }else if($product->status==3){
                                echo "Delivered";
                            }else if($product->status==4){
                                echo "Customer Not Accept";
                            } ?>
                            </td>
                            <td><?= $product->collect_price ?></td>
                            <td><img src="<?= base_url('uploads/transaction/'.$product->transaction_image); ?>" height="200px" width="200px"></td>
                            <td><?= $product->reason ?></td>
                            <td>
                                <a href="<?= base_url('backend/Products/OrderedView/' . $product->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><span
                                        class="fa fa-eye"></span></a>
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
    function printQrCode(qr_code) {
  jQuery.ajax({
    type: 'POST',
    data: {
        qr_code,
    },
    url: '<?= base_url('backend/Products/PrintQrCode') ?>',
    dataType: 'json',
    beforeSend: function () {
    },
    success: function (data) {
        if(data.response==true){
            printJS('<?= base_url()?>' + data.file_name, 'pdf');
        }else{
            toastr.error('Something went wrong.')
        }
       
    },
    error: function (e) {
    },
  });
}

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