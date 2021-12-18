<main role="main">
   <!-- Three columns of text below the carousel -->
   <div class="container marketing my-5">
      <hr>
      <div class="row">
         <div class="col-lg-4">
            <h3><?= $service->judul_layanan; ?></h3>
            <img src="<?= base_url('assets/uploads/layanan/'.$service->gambar); ?>"
               alt="<?= $service->judul_layanan; ?>" class="img img-thumbnail img-responsive" />
         </div>
         <!-- /.col-lg-4 -->
         <div class="col-lg-8">
            <p>
               <?= strip_tags($service->isi_layanan); ?>
            </p>
         </div>
         <!-- /.col-lg-4 -->
      </div>
   </div>
   <!-- /.row -->
</main>