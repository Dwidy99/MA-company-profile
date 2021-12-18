<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?= base_url('assets/admin/'); ?>" class="brand-link">
      <img src="<?= base_url('assets/admin/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $site->namaweb; ?></span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="info">
            <a href="<?= base_url('admin') ?>" class="d-block"><?= $site->namaweb; ?></a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
            <li class="nav-item">
               <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <!-- Menu Berita -->
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon far fa-newspaper"></i>
                  <p>
                     Berita/Profil
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/berita'); ?>" class="nav-link">
                        <i class="far fa-newspaper nav-icon"></i>
                        <p>List Berita/Profil</p>
                     </a>
                  </li>
                  <!-- Menu Kategori -->
                  <li class="nav-item">
                     <a href="<?= base_url('admin/kategori_berita'); ?>" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p><small>Tambah Kategori Berita/Profil</small></p>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- Menu Layanan -->
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon far fa-question-circle"></i>
                  <p>
                     Layanan
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/layanan'); ?>" class="nav-link">
                        <i class="fas fa-hands-helping nav-icon"></i>
                        <p>List Layanan</p>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- Menu Gallery -->
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon far fa-images"></i>
                  <p>
                     Galeri
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/galeri'); ?>" class="nav-link">
                        <i class="far fa-image nav-icon"></i>
                        <p>List Galeri</p>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- Menu Administrator/User -->
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>
                     User Administrator
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/user'); ?>" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Data User Administrator</p>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- Menu Administrator/User -->
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                     Kontak
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/kontak'); ?>" class="nav-link">
                        <i class="fas fa-envelope-open-text nav-icon"></i>
                        <p>Pesan Masuk</p>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- Menu Administrator/User -->
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>
                     Konfigurasi Website
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('admin/konfigurasi'); ?>" class="nav-link">
                        <i class="fas fa-icons nav-icon"></i>
                        <p>Konfigurasi Umum</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('admin/konfigurasi/logo'); ?>" class="nav-link">
                        <i class="fab fa-google nav-icon"></i>
                        <p>Konfigurasi Logo</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('admin/konfigurasi/icon'); ?>" class="nav-link">
                        <i class="fas fa-atom nav-icon"></i>
                        <p>Konfigurasi Icon</p>
                     </a>
                  </li>
               </ul>
            </li>

            <!-- Logout -->
            <li class="nav-item mt-3">
               <a href="<?= base_url('login/logout'); ?>" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
               </a>
            </li>

         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1><?php echo $title; ?></h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                     <a href="<?= base_url('admin/dashboard'); ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                     </a>
                  </li>
                  <li class="breadcrumb-item">
                     <a href="<?= base_url('admin/' . $this->uri->segment(2)) ?>">
                        <?= ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?>
                     </a>
                  </li>
                  <li class="breadcrumb-item">
                     <?= $title; ?>
                  </li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title"><?php echo $title; ?></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">