<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= ucfirst($title) ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url('assets/backend/') ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url('assets/backend/') ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets/backend/') ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets/backend/') ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href='<?= base_url('assets/backend/') ?>vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
    <link href='<?= base_url('assets/backend/') ?>vendor/jquery-ui/jquery-ui.css' rel='stylesheet' media="all" />

    <!-- Main CSS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="<?= base_url('assets/backend/') ?>css/theme.css" rel="stylesheet" media="all">
    <style type="text/css">
        /* force class color to override the bootstrap base rule
        NOTE: adding 'url: #' to calendar makes this unneeded
        */
        .fc-event, .fc-event:hover {
            color: #fff !important;
            text-decoration: none;
        }
        .tablePagination:before {
            content:"Pages : ";
            margin-right: 10px;
        }
        
        .tablePagination li {
            cursor: pointer;
            display: inline-block;
            list-style: none;
            padding: 4px 15px;
        }

        .tablePagination li:hover {
            background: #eee;
        }

        .tablePagination .current {
            background: #26b;
            color: #fff;
        }
        
    </style>
</head>
<body class="animsition">
<div class="page-wrapper">
    