<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alvarado<?= @$id ?> - <?= @$title ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" href="<?= base_url() ?>Components/img/plantilla/icono-negro.png">

    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/plugins/iCheck/all.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>Components/bower_components/morris.js/morris.css">
    
    <script src="<?= base_url() ?>Components/bower_components/jquery/dist/jquery.min.js"></script>  
    <script src="<?= base_url() ?>Components/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url() ?>Components/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>Components/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="<?= base_url() ?>Components/plugins/iCheck/icheck.min.js"></script>
    <script src="<?= base_url() ?>Components/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?= base_url() ?>Components/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?= base_url() ?>Components/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="<?= base_url() ?>Components/plugins/jqueryNumber/jquerynumber.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/morris.js/morris.min.js"></script>
    <script src="<?= base_url() ?>Components/bower_components/Chart.js/Chart.js"></script>
    <style>
        .less-padding > thead > tr > th,
        .less-padding > tbody > tr > th,
        .less-padding > tfoot > tr > th,
        .less-padding > thead > tr > td,
        .less-padding > tbody > tr > td,
        .less-padding > tfoot > tr > td {
          padding: 4px;
          line-height: 1.42857143;
          vertical-align: middle;
          border-top: 1px solid #ddd;
        }
    </style>
  </head>

  <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
    <div class="wrapper">