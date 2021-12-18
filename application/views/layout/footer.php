<?php $site_info = $this->Konfigurasi_model->listing(); ?>
<footer>
   <!-- footer-bottom aera -->
   <div class="footer-bottom-area">
      <div class="container">
         <div class="footer-border">
            <div class="row d-flex align-items-center justify-content-between">
               <div class="col-lg-6">
                  <div class="footer-copy-right">
                     <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | by <a href="<?= $site_info->namaweb; ?>"
                           target="_blank"><?= $site_info->namaweb; ?></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </p>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="footer-menu f-right">
                     <ul>
                        <li><a href="<?= base_url('berita') ?>">Berita |</a></li>
                        <li><a href="<?= base_url('layanan') ?>">Layanan |</a></li>
                        <li><a href="<?= base_url('kontak') ?>">Kontak</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="footer-social">
                     <a href="<?= $site_info->instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a> |
                     <a href="<?= $site_info->facebook ?>" target="_blank"><i class=" fab fa-facebook"></i></a> |
                     <a href="<?= $site_info->website ?>" target="_blank"><i class="fas fa-laptop-code"></i></a> |
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Footer End-->
</footer>

<?php if ($this->session->flashdata('success')) : ?>
<div class="data-flashdata" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<?php elseif($this->session->flashdata('danger')) : ?>
<div class="data-flashdata" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<?php endif; ?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?= base_url('assets/template/'); ?>jqueryUI/jquery-3.6.0.min.js"></script>
<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/vendor/modernizr-3.5.0.min.js">
</script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/popper.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/wow.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/animated.headline.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.magnific-popup.js"></script>
<script>
$('.img-lightbox').magnificPopup({
   type: 'image'
   // other options
});
</script>

<!-- Breaking New Pluging -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.ticker.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/site.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.nice-select.min.js">
</script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/contact.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.form.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/mail-script.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url('assets/templates/'); ?>/assets/js/plugins.js"></script>
<script src="<?= base_url('assets/templates/'); ?>/assets/js/main.js"></script>
<script src="<?= base_url('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/dist/js/script.js') ?>"></script>
</body>

</html>