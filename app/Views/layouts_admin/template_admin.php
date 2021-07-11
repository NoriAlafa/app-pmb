<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="icon" href="/assets/favicon.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/daterangepicker/daterangepicker.css">
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/toastr/toastr.min.css">
    <!-- Data Table -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap-4.min.css"> 
    <link rel="stylesheet" href="/assets/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap-4.min.css"> 
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/tempusdominus-bootsrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- overlay scrollbars -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminlte3/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
            <?=$this->include('layouts_admin/navbar')?>
        <!-- Akhir Navbar -->

        <!-- Main Sidebar Container -->
            <?=$this->include('layouts_admin/sidebar')?>
        <!-- Akhir sidebar -->

        <!-- content wapper. containt page content -->
            <?=$this->renderSection('content')?>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b>1.0
            </div>
            <strong>
                Copyright 
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="#">Alfa University</a>
            </strong>All rights reserved
        </footer>
    </div>
    <!-- Akhir site wrapper -->

    <!-- JQuery -->
    <script src="/assets/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/adminlte3/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- input mask -->
    <script src="/assets/adminlte3/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date range picker -->
    <script src="/assets/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- sweet alert 2 -->
    <script src="/assets/adminlte3/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- toastr -->
    <script src="/assets/adminlte3/plugins/toastr/toastr.min.js"></script>
    <!-- data tables -->
    <script src="/assets/adminlte3/plugins/datatables/jquery.dataTables.min.js"></script> 
    <script src="/assets/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
    <script src="/assets/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap.min.js"></script> 
    <!-- overlayScrollbars -->
    <script src="/assets/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- tempusdominus -->
    <script src="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus.bootstrap-4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/adminlte3/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/adminlte3/dist/js/demo.js"></script>

    <!-- page script -->
    <?= $this->renderSection('script')?>
</body>
</html>