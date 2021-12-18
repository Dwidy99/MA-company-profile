<?php 
// Ambil data User berdasarkan datanya
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-blue navbar-dark">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">

      <li class="nav-item d-none d-sm-inline-block">
         <a href="<?= base_url(); ?>" target="_blank" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="dropdown user user-menu">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <img src="<?= base_url('assets/admin/'); ?>dist/img/user1-128x128.jpg" alt="User Avatar"
               class="mt-1 user-image">
            <span class="dropdown-item-title text-white">
               <?= $user_aktif->nama; ?>
            </span>
         </a>
         <ul class="dropdown-menu">
            <li class="user user-header bg-info">
               <img src="<?= base_url('assets/admin/'); ?>dist/img/user1-128x128.jpg" alt="User Image"
                  class="img-circle">
               <p>
                  <?= $user_aktif->nama; ?> - <?= $user_aktif->akses_level; ?>
                  <small>Member Update <?= date('d M Y', strtotime($user_aktif->tanggal)); ?></small>
               </p>
            </li>

            <!-- Menu Footer -->
            <li class="user-footer">
               <div class="float-left">
                  <a href="<?= base_url('admin/profile') ?>" class="btn btn-success btn-flat"><i
                        class="fas fa-user-circle"></i> Profile</a>
               </div>
               <div class="float-right">
                  <a href="<?= base_url('login/logout') ?>" class="btn btn-warning btn-flat"><i
                        class="fas fa-sign-out-alt"></i> Sign out</a>
               </div>
            </li>
         </ul>
      </li>
      <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li>
   </ul>
</nav>
<!-- /.navbar