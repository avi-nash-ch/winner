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
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=<?= MapKey ?>&libraries=places&callback=initMap" async defer></script> -->
</head>

<script>
   const BASE_URL = '<?= base_url()?>';
</script>
<body>

