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

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <div class="mb-3 col-lg-3">
                            <label for="box0">Customer Name</label>
                            <input class="form-control" type="text" Placeholder="Customer Name" name="customer_name" id="customer_name">
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="box0">Mobile No.</label>
                            <input class="form-control" type="text" Placeholder="Mobile No." name="mobile_no" id="mobile_no">
                        </div>
        </div>
        <div class="modal-body">
         <div class="row">
         <div class="mb-3 col-lg-8">
                            <label for="product">Product Name *</label>
                            <input class="form-control" type="text" Placeholder="Product Name" name="product[]" id="product" required>
                        </div>
                        <!-- end col -->
                        <div class="mb-3 col-lg-2">
                            <label for="qty">Qty. *</label>
                            <input class="form-control" type="number" Placeholder="Qty." name="qty[]" id="qty" required>
                        </div>
                        <!-- end col -->
                        <div class="mb-3 col-lg-2">
                            <label for="uom0">Price</label>
                            <input class="form-control" type="number" Placeholder="Price" name="price[]" id="price" required>

                        </div>
         </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary">Print</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
   const BASE_URL = '<?= base_url()?>';
</script>
<body>