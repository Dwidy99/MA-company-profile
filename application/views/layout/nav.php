<?php 
// Site dari Konfigurasi
$site_info = $this->Konfigurasi_model->listing(); 
// Menu Berita
$menu_berita = $this->Konfigurasi_model->menu_berita();
$menu_profil = $this->Konfigurasi_model->menu_profil();
$menu_layanan = $this->Konfigurasi_model->menu_layanan();
?>

<header>
   <!-- Header Start -->
   <div class="header-area">
      <div class="main-header ">
         <div class="header-top black-bg d-none d-md-block">
            <div class="container">
               <div class="col-xl-12">
                  <div class="row d-flex justify-content-between align-items-center">
                     <div class="header-info-left">
                        <ul>
                           <li><img src="assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                           <li><img src="assets/img/icon/header_icon1.png" alt="">Tuesday, 18th June, 2019</li>
                        </ul>
                     </div>
                     <div class="header-info-right">
                        <ul class="header-social">
                           <li><a href="<?= $site_info->facebook; ?>"><i class="fab fa-facebook"></i></a></li>
                           <li><a href="<?= $site_info->instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                           <li> <a href="<?= $site_info->website; ?>"><i class="fas fa-laptop-code"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-mid d-none d-md-block">
            <div class="container">
               <div class="row d-flex align-items-center">
                  <!-- Logo -->
                  <div class="col-xl-3 col-lg-3 col-md-3">
                     <div class="logo">
                        <a href="<?= base_url(); ?>">
                           <img src="<?= base_url('assets/uploads/icon/thumbs/'.$site_info->icon); ?>"
                              class="rounded-circle" width="95" alt="<?= $site_info->namaweb; ?>">
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9">
                     <div class="header-banner f-right ">
                        <img src="<?= base_url('assets/templates/'); ?>assets/img/hero/header_card.jpg" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom header-sticky">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                     <!-- sticky -->
                     <div class="sticky-logo">
                        <a href="<?= base_url(); ?>">
                           <img src="<?= base_url('assets/uploads/icon/thumbs/'.$site_info->logo); ?>"
                              alt="<?= $site_info->namaweb; ?>" class="w-25">
                        </a>
                     </div>
                     <!-- Main-menu -->
                     <div class="main-menu d-none d-md-block">
                        <nav>
                           <ul id="navigation">
                              <li><a href="<?= base_url(); ?>">Home</a></li>
                              <li><a href="#">Berita <i class="fas fa-sort-down"></i></a>
                                 <ul class="submenu">
                                    <?php foreach ($menu_berita as $mb) : ?>
                                    <li>
                                       <a href="<?= base_url('berita/kategori/'.$mb->slug_kategori); ?>">
                                          <?= $mb->nama_kategori; ?>
                                       </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <li><a href="<?= base_url('berita'); ?>">Semua berita</a></li>
                                 </ul>
                              </li>
                              <li><a href="#">Layanan <i class="fas fa-sort-down"></i></a>
                                 <ul class="submenu">
                                    <?php foreach ($menu_layanan as $ml) : ?>
                                    <li>
                                       <a href="<?= base_url('layanan/read/'.$ml->slug_layanan); ?>">
                                          <?= $ml->judul_layanan; ?>
                                       </a>
                                    </li>
                                    <?php endforeach; ?>
                                    <li><a href="<?= base_url('layanan'); ?>">Semua Layanan</a></li>
                                 </ul>
                              </li>
                              <li><a href="#">Profil <i class="fas fa-sort-down"></i></a>
                                 <ul class="submenu">
                                    <?php foreach ($menu_profil as $mp) : ?>
                                    <li>
                                       <a href="<?= base_url('berita/read/'.$mp->slug_berita); ?>">
                                          <?= $mp->judul_berita; ?>
                                       </a>
                                    </li>
                                    <?php endforeach; ?>
                                 </ul>
                              </li>
                              <li><a href="<?= base_url('kontak'); ?>">Kontak</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <!-- Mobile Menu -->
                  <div class="col-12">
                     <div class="mobile_menu d-block d-md-none"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Header End -->
</header>