<!-- ================ contact section start ================= -->
<section class="contact-section">
   <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
         <div id="map" style="height: 480px; position: relative; overflow: hidden;">
            <?= $configure->map; ?>
         </div>

      </div>


      <div class="row">
         <div class="col-12">
            <h2 class="contact-title">Hubungi Kami</h2>
         </div>
         <div class="col-lg-8">
            <?php echo form_open('kontak'); ?>
            <div class="row">
               <div class="col-12">
                  <div class="form-group">
                     <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                        placeholder=" Enter Message"></textarea>
                     <?= form_error('message', '<small class="text-danger">', '</small>') ?>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <input class="form-control valid" name="name" id="name" type="text" placeholder="Enter your name">
                     <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <input class="form-control valid" name="email" id="email" type="email" placeholder="Email">
                     <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                  </div>
               </div>
               <div class="col-12">
                  <div class="form-group">
                     <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                     <?= form_error('subject', '<small class="text-danger">', '</small>') ?>
                  </div>
               </div>
            </div>
            <div class="form-group mt-3">
               <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
            </div>
            <?php echo form_close(); ?>
         </div>
         <div class="col-lg-3 offset-lg-1">
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-home"></i></span>
               <div class="media-body">
                  <h3>Alamat</h3>
                  <p><?= nl2br($configure->alamat); ?></p>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-tablet"></i></span>
               <div class="media-body">
                  <h3>No. Telepon</h3>
                  <p><?= $configure->telepon; ?></p>
               </div>
            </div>
            <div class="media contact-info">
               <span class="contact-info__icon"><i class="ti-email"></i></span>
               <div class="media-body">
                  <h3>Email</h3>
                  <p><?= $configure->email; ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ================ contact section end ================= -->