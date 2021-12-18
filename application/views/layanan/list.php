<!-- Whats Gallery Start -->
<section class="whats-news-area pt-50 pb-20">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="row d-flex justify-content-between">
               <div class="col-lg-3 col-md-3">
                  <div class="section-tittle mb-30">
                     <h3>Layanan Kami</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                  <!-- Nav Card -->
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <div class="whats-news-caption">
                        <div class="row">
                           <?php foreach($services as $service) : ?>
                           <div class="col-lg-4 col-md-4">
                              <div class="single-what-news mb-100">
                                 <div class="what-img">
                                    <img src="<?= base_url('assets/uploads/layanan/'.$service->gambar); ?>"
                                       alt="<?= $service->judul_layanan ?>">
                                 </div>
                                 <div class="what-cap">
                                    <span class="color1"><?= $service->judul_layanan ?></span>
                                    <h4>
                                       <a href="<?= base_url('layanan/read/'.$service->slug_layanan) ?>">
                                          Lihat detail &raquo;
                                       </a>
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
            <?php if ($paginasi) : ?>
            <div class="row justify-content-center text-center">
               <div class="col-md-6 paginasi">
                  <?= $paginasi; ?>
               </div>
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>