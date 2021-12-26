<?php 
// Site dari Konfigurasi
$site_info = $this->Konfigurasi_model->listing(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Icon -->
   <link rel="shortcut icon" href="<?= base_url('assets/uploads/logo/thumbs/'.$site_info->icon); ?>"
      type="image/x-icon" />
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/fontawesome-all.min.css">
   <!-- Description -->
   <meta name="description" content="<?= $title; ?>" />
   <!-- Keyword -->
   <meta name="keywords" content="<?= $keywords; ?>" />
   <!-- Author -->
   <meta name="author" content="<?= $site_info->namaweb; ?>" />

   <!-- CSS here -->
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/ticker-style.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/flaticon.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/slicknav.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/animate.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/magnific-popup.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/fontawesome-all.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/themify-icons.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/slick.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/nice-select.css">
   <link rel="stylesheet" href="<?= base_url('assets/templates/') ?>assets/css/style.css">
   <!-- My style -->
   <link rel="stylesheet" href="<?= base_url('assets/templates/'); ?>assets/css/mystyle.css">

   <title><?= $title; ?></title>
</head>

<body>