<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <!-- <th>Category</th> -->
                            <th>Name</th>
                            <th>ID Type</th>
                            <th>Whatsapp No</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Added Date</th>
                            <th>Action</th>
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
                            <!-- <td><?= $worker->category ?></td> -->
                            <td><?= $worker->name ?></td>
                            <td><?= ($worker->delivery_boy_type==0)?'Bike Id':'Cycle Id' ?></td>
                            <td><?= $worker->whatsapp_no ?></td>
                            <td><?= $worker->address ?></td>
                            <td><?= ($worker->status==1)?'<span style="color:green">Online</span>':'<span style="color:red">Offline</span>' ?></td>
                            <td><?= date("d-m-Y h:i A", strtotime($worker->added_date)) ?></td>
                            <td>
                                <a href="<?= base_url('backend/Workers/edit/' . $worker->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>|
                                        <a href="<?= base_url('backend/Workers/orders/' . $worker->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Orders"><span
                                        class="fa fa-eye"></span></a>

                                | <a href="<?= base_url('backend/Workers/delete/' . $worker->id) ?>"
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