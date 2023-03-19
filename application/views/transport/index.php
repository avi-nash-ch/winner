<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Driver Name/ Owner Name</th>
                            <th>Mobile No/ WhatApp No</th>
                            <th>Vehicle No</th>
                            <th>vehicle type</th>
                            <th>Vehicle Name</th>
                            <th>From City</th>
                            <th>To city</th>
                            <th>From Where By Root To</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Comment</th>
                            <th>Vehicle Photo</th>
                            <th>Added Date</th>
                            <th>Approved</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($All as $key => $AllProduct) {
                            $i++;
                           if($AllProduct->veh_type==1){
                            $type='Two-wheelar';
                           }else if($AllProduct->veh_type==2){
                            $type='Three-wheelar';
                           }else{
                            $type='Four-wheelar';
                           }

                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $AllProduct->name ?></td>
                            <td><?= $AllProduct->whatsapp_no ?></td>
                            <td><?= $AllProduct->veh_no ?></td>
                            <td><?= $type ?></td>
                            <td><?= $AllProduct->veh_name ?></td>
                            <td><?= $AllProduct->city ?></td>
                            <td><?= $AllProduct->to_city ?></td>
                            <td><?= $AllProduct->by_root ?></td>
                            <td><?= $AllProduct->date ?></td>
                            <td><?= $AllProduct->time ?></td>
                            <td><?= $AllProduct->comment ?></td>
                            <td><img src="<?= base_url('uploads/images/'.$AllProduct->image); ?>" height="80px" width="80px"></td>
                            <td><?= date("d-m-Y h:i A", strtotime($AllProduct->added_date)) ?></td>
                            <td><input type="checkbox"  name="most_viewed" onclick="most_viewed(this,'<?= $AllProduct->id ?>')" <?= !empty($AllProduct->approved)?'checked':'' ?>></td>
                            <td>
                                <a href="<?= base_url('backend/Products/edit/' . $AllProduct->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><span
                                        class="fa fa-edit"></span></a>
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
    url: '<?= base_url('backend/Transport/Approved') ?>',
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