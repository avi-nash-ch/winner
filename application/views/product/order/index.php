<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>User Name</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Cost</th>
                            <th>Image</th>
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
                            <td><?= $product->first_name .' '.$product->last_name ?></td>
                            <td><?= $product->product_name ?></td>
                            <td><?= $product->quantity ?></td>
                            <td><?= $product->cost ?></td>
                            <td><img src="<?= base_url('uploads/images/'.$product->image); ?>" height="80px" width="80px"></td>
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