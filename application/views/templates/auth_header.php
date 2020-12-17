<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="<?= base_url('vendor/'); ?>pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('vendor/'); ?>pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('vendor/'); ?>pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('vendor/'); ?>pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="<?= base_url('vendor/'); ?>favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="<?= base_url('vendor/'); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('vendor/'); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('vendor/'); ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('vendor/'); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url('vendor/'); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url('vendor/'); ?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url('vendor/'); ?>pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url('vendor/'); ?>pages/css/pages.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        window.onload = function() {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?= base_url('
        vendor / '); ?>pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>

<body class="fixed-header ">