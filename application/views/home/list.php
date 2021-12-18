<main>
   <div class="trending-area fix mt-5">
      <div class="container">
         <div class="trending-main">
            <div class="row">
               <div class="col-md">
                  <div id="mySlider" class="carousel slide" data-ride="carousel">
                     <div class="carousel-inner">
                        <?php $i=1; foreach($sliders as $slider) :?>
                        <div class="carousel-item <?php if($i==1) {echo 'active';} ?>">
                           <img src="<?= base_url('assets/uploads/galeri/thumbs/'.$slider->gambar) ?>"
                              class="d-block slider-img w-100" alt="<?= $slider->judul_galeri; ?>">
                           <div class="container">
                              <div class="carousel-caption text-left">
                                 <h1 class="text-white"><?= $slider->judul_galeri; ?></h1>
                                 <p class="text-white"><?= strip_tags(character_limiter($slider->isi_galeri, 50)); ?>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <?php $i++; endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-5">
               <div class="col-md-12">
                  <!-- Trending Top -->
                  <!-- Trending Bottom -->
                  <div class="trending-bottom mt-5">
                     <div class="row">
                        <div class="col-md-12">
                           <strong class="badge badge-danger badge-sm">Layanan Utama</strong>
                        </div>
                     </div>
                     <div class="row">
                        <?php foreach($servicesNew as $sn) : ?>
                        <div class="col-lg-4">
                           <div class="single-bottom mb-35">
                              <div class="trend-bottom-img mb-30">
                                 <img src="<?= base_url('assets/uploads/layanan/'.$sn->gambar); ?>"
                                    alt="<?= $sn->judul_layanan ?>">
                              </div>
                              <div class="trend-bottom-cap">
                                 <h4>
                                    <a href="details.html"><?= $sn->judul_layanan; ?></a>
                                 </h4>
                              </div>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<!-- End main -->

<!--   Weekly-News start -->
<div class="weekly-news-area pt-50">
   <div class="container">
      <div class="weekly-wrapper">
         <!-- section Tittle -->
         <div class="row">
            <div class="col-lg-12">
               <div class="section-tittle mb-30">
                  <h3>Layanan Kami</h3>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="weekly-news-active dot-style d-flex dot-style">
                  <?php $i=1; foreach($services as $service) : ?>
                  <div class="weekly-single <?php if($i==1){ echo 'active';} ?>">
                     <div class="weekly-img">
                        <img src="<?= base_url('assets/uploads/layanan/'.$service->gambar); ?>"
                           alt="<?= $service->judul_layanan; ?>">
                     </div>
                     <div class="weekly-caption">
                        <h6><a href="#"><?= $service->judul_layanan; ?></a></h6>
                     </div>
                  </div>
                  <?php $i++; endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Weekly-News -->

<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="row d-flex justify-content-between">
               <div class="col-lg-3 col-md-3">
                  <div class="section-tittle mb-30">
                     <h3>Berita Terkini</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <!-- Nav Card -->
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class="whats-news-caption">
                        <div class="row">
                           <?php foreach($lastesNews as $lastesNew) : ?>
                           <div class="col-lg-4 col-md-4">
                              <div class="single-what-news mb-100">
                                 <div class="what-img">
                                    <img src="<?= base_url('assets/uploads/berita/'.$lastesNew->gambar); ?>"
                                       alt="<?= $lastesNew->judul_berita; ?>">
                                 </div>
                                 <div class="what-cap">
                                    <span class="color1"><?= $lastesNew->nama_kategori; ?></span>
                                    <h4><a href="#"><?= $lastesNew->judul_berita; ?></a></h4>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
                  <!-- End Nav Card -->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Whats New End -->

<!-- Whats Gallery Start -->
<section class="whats-news-area pt-50 pb-20">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="row d-flex justify-content-between">
               <div class="col-lg-3 col-md-3">
                  <div class="section-tittle mb-30">
                     <h3>Galeri</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <!-- Nav Card -->
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class="whats-news-caption">
                        <div class="row">
                           <?php foreach($galleries as $gallery) : ?>
                           <div class="col-lg-4 col-md-4">
                              <div class="single-what-news mb-100">
                                 <div class="what-img">
                                    <img src="<?= base_url('assets/uploads/galeri/'.$gallery->gambar); ?>"
                                       alt="<?= $gallery->judul_galeri; ?>">
                                 </div>
                                 <div class="what-cap">
                                    <span class="color1"><?= $gallery->judul_galeri; ?></span>
                                    <h4>
                                       <a href="#"><?= strip_tags(character_limiter($gallery->isi_galeri, 20)); ?></a>
                                    </h4>
                                 </div>
                              </div>
                           </div>
                           <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
                  <!-- End Nav Card -->
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <a href="<?= base_url('galeri'); ?>">
                     <h4>Lihat Semua Galeri..</h4>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Whats Gallery End -->