<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
   <title><?= $title . ' | ' . PROJECT_NAME ?></title>
   <meta content="Admin Dashboard" name="description">
   <meta content="Themesbrand" name="author">
   <link rel="shortcut icon" href="assets/images/favicon.ico">
   <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/css/print.min.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/css/select2.min.css') ?>" rel="stylesheet" type="text/css">
   <!-- DataTables -->
   <link href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css">
   <!-- Responsive datatable examples -->
   <link href="<?= base_url('assets/css/toastr.css') ?>" rel="stylesheet" type="text/css">
   <link href="<?= base_url('assets/plugins/datatables/responsive.bootstrap4.min.css')?>" rel="stylesheet" type="text/css">
   <script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
   <script src="<?= base_url('assets/js/print.min.js')?>"></script>
   <script src="<?= base_url('assets/js/toastr.min.js') ?>"></script>
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <script src="<?= base_url('js/onscan.js-master/onscan.js?ver=' . filemtime(FCPATH . 'js/onscan.js-master/onscan.js')) ?>" defer></script>

</head>
<?php
            echo form_open_multipart('backend/Board/insert', ['autocomplete' => false, 'id' => 'add_bill'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_auther')])
            ?>
<div class="modal fade" id="myModal"  data-backdrop="static"  role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <div class="row">
        <div class="mb-5 col-lg-5">
                            <label for="box0">Customer Name</label>
                            <input class="form-control" type="text" Placeholder="Customer Name" name="customer_name" id="customer_name">
                        </div>
                        <div class="mb-5 col-lg-5">
                            <label for="box0">Mobile No.</label>
                            <input class="form-control" type="text" Placeholder="Mobile No." name="mobile_no" id="mobile_no">
                        </div>
                        <div class="mb-5 col-lg-5">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" Placeholder="Address" name="address" id="address">
                        </div>
                        <div class="mb-5 col-lg-5">
                            <label for="room">Bilduing/Room</label>
                            <input class="form-control" type="text" Placeholder="Bilduing/Room" name="room" id="room">
                        </div>
</div>
        </div>
        <div class="modal-body">
         <div class="row items_row">
          <div class="mb-3 col-lg-6">
            <label for="item_desc0">Item Name *</label>
            <select class="form-control select2 select_item" name="item_desc[]" id="item_desc0" required>
            <?php
            $option='<option value="">Select Product</option>';
            $Products=getAllProduct();
            foreach ($Products as $key => $value) { 
              $option.='<option value="'.$value->id.'" data-price="'.$value->price_sale.'">'.$value->name.'</option>';
            }
            echo $option;
            ?>
          </select></div>
                        <!-- end col -->
                        <div class="mb-3 col-lg-2">
                            <label for="qty">Qty. *</label>
                            <input class="form-control" type="number" Placeholder="Qty." value="0" onchange="setPrice(this,'0')" name="qty[]" id="qty0" required>
                        </div>
                        <!-- end col -->
                        <div class="mb-3 col-lg-2">
                            <label for="price0">Price</label>
                            <input class="form-control" type="number" Placeholder="Price" value="0" name="price[]" id="price0" readonly required>

                        </div>
                        <div class="input-field col s1 pdr_0 white_space">
                           <!-- <button class="btn btn-danger remove_item" id="remove-oc-1">Remove</button> -->
                           <button class="btn btn-primary add_more_button" id='add_oc' style="margin: 19px !important;">Add+</button>
                           <input type="hidden" value="0" id='count_item'>
                        </div>
         </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="generateBill()">Submit</button>
          <a href="<?= base_url('backend/Dashboard')?>" class="btn btn-danger" >Close</a>
        </div>
      </div>
    </div>
  </div>
</div>
          </form>
<script>
   const BASE_URL = '<?= base_url()?>';
</script>
<body>