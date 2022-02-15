<?php require_once "head.php"; ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('login'); ?>"><i class="fas fa-key"></i> <b><?= $title; ?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masukan username dan password Anda</p>

            <div class="row">
                <div class="col-md">
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php elseif ($this->session->flashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php echo form_open(base_url('login')); ?>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="input-group">
                        <input type="text" name="username" class="form-control" placeholder="Username..">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" placeholder="Password..">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-block btn-primary my-3">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
            <?php echo form_close(); ?>

            <p class="mb-1">
                <a href="<?= base_url('login/lupaPassword') ?>">Lupa password ?</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<?php require_once "footer.php"; ?>