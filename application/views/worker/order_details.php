<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php echo form_open_multipart('backend/Workers/orders/'.$worker_id, ['autocomplete' => false, 'id' => 'edit_worker','method'=>'get'])
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <label for="address">Date</label>
                        <input class="form-control" type="text" Placeholder="Address" name="daterange" id="reportrange">
                    </div>
                    <div class="form-group mb-0" style="margin-top: 26px;">
                        <div>
                            <?php echo form_submit('submit', 'Submit', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
            <!-- <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" /> -->
            <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Shop Name</th>
                        <th>Distance</th>
                        <th>Delivery Boy Charge</th>
                        <th>Customer Name</th>
                        <!-- <th>Customer Address</th> -->
                        <!-- <th>Customer Mo.</th> -->
                        <th>Status</th>
                        <th>Price</th>
                        <!-- <th>Screenshot</th> -->
                        <th>Reason</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 0;
                        $total=0;
                        foreach ($Orders as $key => $product) {
                            $i++;
                            $total=$total+$product->delivery_boy_charges;
                        ?>
                    <tr>    
                        <td><?= $i ?></td>
                        <td><?= $product->shop_name ?></td>
                        <td><?= $product->distance ?></td>
                        <td><?= $product->delivery_boy_charges ?></td>
                        <!-- <td><?= $product->first_name ?></td> -->
                        <td style="text-wrap: wrap;"><?= $product->address ?></td>
                        <!-- <td><?= $product->phone ?></td> -->
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
                        <!-- <td><img src="<?= base_url('uploads/transaction/'.$product->transaction_image); ?>" height="200px" width="200px"></td> -->
                        <td><?= $product->reason ?></td>
                        <!-- <td>
                                <a href="<?= base_url('backend/Products/OrderedView/' . $product->id) ?>"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><span
                                        class="fa fa-eye"></span></a>
                            </td> -->
                    </tr>
                    <?php }
                        ?>

                </tbody>
                <tfoot>
                    <tr id="tfooter">
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total: <?= $total?>/-</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            </div>
            
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
        beforeSend: function() {},
        success: function(data) {
            if (data.response == true) {
                printJS('<?= base_url()?>' + data.file_name, 'pdf');
            } else {
                toastr.error('Something went wrong.')
            }

        },
        error: function(e) {},
    });
}

function most_viewed($this, id) {
    if ($($this).is(':checked')) {
        var a = 1
    } else {
        var a = 0;
    }

    jQuery.ajax({
        type: 'POST',
        data: {
            status: a,
            id

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
$(function() {
    var start = moment().subtract('<?= $days ?>', 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            //    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                .endOf('month')
            ]
        }
    }, cb);

    cb(start, end);

});
</script>