<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/asset/clients/css/style.css">

    <link href="<?php echo _WEB_ROOT?>/public/asset/clients/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo _WEB_ROOT?>/public/asset/clients/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo _WEB_ROOT?>/public/asset/clients/css/theme.css" rel="stylesheet" media="all">
</head>
<body>
    <?php
    $this->render('blocks/header');
    $this->render($content, $sub_content);
    $this->render('blocks/footer');
    echo '<pre>';
    print_r($data);
    echo '<pre>';
    ?>
    <scripts type="text/javascript" src="<?php echo _WEB_ROOT?>/public/asset/clients/js/scripts.js"></scripts>
<!-- Jquery JS-->
<script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- <?php echo _WEB_ROOT?>/public/asset/clients/Vendor JS       -->
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/wow/wow.min.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo _WEB_ROOT?>/public/asset/clients/vendor/select2/select2.min.js">
    </script>

</body>

</html>