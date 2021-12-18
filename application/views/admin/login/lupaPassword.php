<?php require_once "head.php"; ?>
<div class="login-box">
   <div class="login-logo">
      <a href="<?= base_url('login/lupaPassword') ?>"><b><?= $title; ?></b></a>
   </div>
   <!-- /.login-logo -->
   <div class="card">
      <div class="card-body login-card-body">
         <p class="login-box-msg">Lupa password?. Atur ulang password Anda.</p>

         <?php if ($this->session->flashdata('success')): ?>
         <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
         </div>
         <?php elseif ($this->session->flashdata('danger')) : ?>
         <div class="alert alert-danger">
            <?php echo $this->session->flashdata('danger'); ?>
         </div>
         <?php endif; ?>

         <?php echo form_open(base_url('login/lupaPassword')); ?>
         <div class="row">
            <div class="col-md-12 mb-2">
               <div class="input-group">
                  <input type="text" name="email" class="form-control" placeholder="Email..">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <button type="submit" class="btn btn-primary btn-block">Kirim permintaan password baru</button>
            </div>
            <!-- /.col -->
         </div>
         <?php echo form_close(); ?>

         <p class="mt-3 mb-1">
            <a href="<?= base_url('login') ?>">Login</a>
         </p>
      </div>
      <!-- /.login-card-body -->
   </div>
</div>
<!-- /.login-box -->
<?php require_once "footer.php"; ?>