<?php 
// Error warning
echo form_open(base_url('admin/user/edit/'.$pesanPengunjung->id_kontak));
?>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="subject">Subjek Pesan</label>
            <input type="text" class="form-control" value="<?php echo $pesanPengunjung->subject ?>" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" value="<?php echo $pesanPengunjung->email ?>" readonly>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" class="form-control" value="<?php echo $pesanPengunjung->nama ?>" readonly>
        </div>
        <div class="form-group">
            <label for="pesan">Pesan</label>
            <textarea class="form-control" name="pesan" id="pesan" rows="5"
                readonly><?= $pesanPengunjung->pesan; ?></textarea>
        </div>
        <div class="form-group">
            <a href="https://mail.google.com/" target="_blank" class="btn btn-primary">
                <i class="fas fa-envelope-open-text"></i> Balas pesan
            </a>
            <a href="<?= base_url('admin/kontak/') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

</div>
<?php echo form_close(); ?>
