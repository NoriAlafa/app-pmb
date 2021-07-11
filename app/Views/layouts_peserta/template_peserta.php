<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <meta content="" name="description"> 
    <meta content="" name="keywords">
    <!-- FAV ICON -->
    <link rel="icon" href="/assets/favicon.ico"> 
    <link rel="stylesheet" href="/assets/BizLand/img/apple-touch-icon.png">
    <!-- VENDOR CSS FILES -->
    <link rel="stylesheet" href="/assets/BizLand/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/BizLand/vendor/icofont/icofont.min.css"> 
    <link rel="stylesheet" href="/assets/BizLand/vendor/boxicons/css/boxicons.min.css">  
    <link rel="stylesheet" href="/assets/BizLand/vendor/owl.caraousel/assets/owl.caraousel.min.css">   
    <link rel="stylesheet" href="/assets/BizLand/vendor/venobox/aos/aos.css">
    <!--DETERANGE PICKER  -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/deterangepicker/deterangepicker.css">
     <!--TEMPUS DOMINUS BS 4  -->
    <link rel="stylesheet" href="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> 
    <!-- TEMPLATE MAIN CSS FILE -->
    <link rel="stylesheet" href="/assets/BizLand/css/style.css">

</head>
<body>
    <!-- TOPBAR -->
    <div id="topbar" class="d-none d-lg-flex">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i>
                <a href="mailto:alafanori@gmail.com" target="_blank" rel="noopener noreferrer">
                    Alfa university
                </a>
                <i class="icofont-phone"></i>+6285732172248
            </div>
            <div class="social-links">
                <a href="#" class="facebook" target="_blank" rel="noopener noreferrer"></a>
                <i class="icofont-facebook"></i>
                <a href="#" class="instagram" target="_blank" rel="noopener noreferrer"></a>
                <i class="icofont-instagram"></i>
                <a href="#" class="linkedin" target="_blank" rel="noopener noreferrer"></a>
                <i class="icofont-linkedin"></i>
            </div>
        </div>
    </div>
    <!-- AKHIR TOPBAR -->

    <!-- HEADER -->
        <?=$this->renderSection('header')?>
    <!-- AKHIR HEADER -->

    <!-- CONTENT -->
        <?=$this->renderSection('content')?>
    <!-- AKHIR CONTENT -->

    <!-- FOOTER -->
        <div id="footer">
            <div class="container py-4">
                <div class="copyright">
                     <strong>
                        Copyright 
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <a href="#">Alfa University</a>
                    </strong>All rights reserved
                </div>
                <div class="credits">
                    <b>Version 1.0</b>
                </div>
            </div>
        </div>
    <!-- AKHIR FOOTER -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top">
        <i class="icofont-simple-up"></i>
    </a>

    <!-- VENDOR JS FILES -->
    <script src="/assets/BizLand/vendor/jquery/jquery.min.js"></script> 
    <script src="/assets/BizLand/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>  
    <script src="/assets/BizLand/vendor/jquery.easing/jquery.easing.min.js"></script>   
    <script src="/assets/BizLand/vendor/php-email-form/validate.js"></script>    
    <script src="/assets/BizLand/vendor/waypoints/jquery.waypoints.min.js"></script>     
    <script src="/assets/BizLand/vendor/counterup/counterup.min.js"></script>      
    <script src="/assets/BizLand/vendor/owl.carousel/owl.carousel.min.js"></script>      
    <script src="/assets/BizLand/vendor/isotope-layout/isotope.pkgd.min.js"></script>       
    <script src="/assets/BizLand/vendor/venobox/venobox.min.js"></script>         
    <script src="/assets/BizLand/vendor/aos/aos.js"></script> 
    <!--SWEETALERT2  -->
    <script src="/assets/sweetalert2/dist/sweetalert2.all.min.js"></script> 
    <!--BS-CUSTOM-FILE-INPUT -->
    <script src="/assets/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!--INPUT MASK  -->
    <script src="/assets/adminlte3/plugins/moment/moment.min.js"></script>            
    <script src="/assets/adminlte3/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!--DATARANGE PICKER  -->    
    <script src="/assets/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
    <!--TEMPUS DOMINUS BS4 -->
    <script src="/assets/adminlte3/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js"></script>
    <!--TEMPLATE MAIN JS  -->
    <script src="/assets/BizLand/js/main.js"></script>
    <!-- PAGE SCRIPT -->
     <?=$this->renderSection('script')?>
</body>
</html>