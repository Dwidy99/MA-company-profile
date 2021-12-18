<main>
   <!-- About US Start -->
   <div class="about-area mt-5">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <!-- Trending Tittle -->
               <div class="about-right mb-90">
                  <div class="about-img">
                     <img src="<?= base_url('assets/uploads/berita/'.$new->gambar); ?>"
                        alt="<?= $new->judul_berita; ?>">
                  </div>
                  <div class="section-tittle mb-30 pt-30">
                     <h3><?= $new->judul_berita; ?></h3>
                  </div>
                  <div class="about-prea">
                     <p class="about-pera1 mb-25">
                        <?= $new->isi; ?></p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <!-- Section Tittle -->
               <div class="section-tittle mb-40">
                  <h3>Media Social</h3>
               </div>
               <!-- Flow Socail -->
               <div class="single-follow mb-45">
                  <div class="single-box">
                     <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                           <a href="<?= $configure->facebook; ?>">
                              <img src="<?= base_url('assets/templates/assets/img/news/icon-fb.png'); ?>"
                                 alt="<?= $configure->facebook; ?>">
                           </a>
                        </div>
                        <div class="follow-count">
                           <span>Facebook</span>
                        </div>
                     </div>
                     <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                           <a href="<?= $configure->instagram; ?>">
                              <img src="<?= base_url('assets/templates/assets/img/news/icon-ins.png') ?>"
                                 alt="<?= $configure->instagram; ?>">
                           </a>
                        </div>
                        <div class="follow-count">
                           <span>Instagram</span>
                        </div>
                     </div>
                     <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                           <a href="<?= $configure->website; ?>">
                              <img src="<?= base_url('assets/templates/assets/img/news/website.png') ?>"
                                 alt="<?= $configure->website; ?>">
                           </a>
                        </div>
                        <div class="follow-count">
                           <span>Website</span>
                        </div>
                     </div>
                     <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                           <span>
                              <img src="<?= base_url('assets/templates/assets/img/news/phone.png') ?>"
                                 alt="<?= $configure->telepon; ?>">
                           </span>
                        </div>
                        <div class="follow-count">
                           <span><?= $configure->telepon; ?></span>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- New Poster -->
               <div class="news-poster d-none d-lg-block">
                  <img src="assets/img/news/news_card.jpg" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
</main>