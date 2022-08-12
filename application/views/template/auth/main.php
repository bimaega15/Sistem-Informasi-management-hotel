<?php
$konfigurasi = getKonfigurasi();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Management Hotel">
    <meta name="keywords" content="Aplikasi management hotel">
    <meta name="author" content="<?= $konfigurasi->nama_sistem; ?>">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Login App Management Hotel</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="<?= base_url('asset/backend/theme/') ?>assets/css/connect.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/css/dark_theme.css" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>" type="image/x-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="auth-page sign-in">

    <?= $content; ?>

    <!-- Javascripts -->
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/bootstrap/popper.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/js/connect.min.js"></script>
</body>

</html>