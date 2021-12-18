<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?= $title; ?></title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>plugins/fontawesome-free/css/all.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
   <?php if ($this->session->flashdata('success')): ?>
   <div class="data-flashdata" data-flashdata="<?= $this->session->flashdata('success'); ?>">
   </div>
   <?php elseif ($this->session->flashdata('danger')) : ?>
   <div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>">
   </div>
   <?php endif; ?>