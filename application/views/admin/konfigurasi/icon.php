<?php if ($this->session->flashdata('success')) : ?>
<div class="row">
    <div class="col-md-6">
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    </div>
</div>
<div class="data-flashdata" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<?php elseif ($this->session->flashdata('danger')) : ?>
<div class="row">
    <div class="col-md-6">
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('danger'); ?>
        </div>
        <div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
    </div>
</div>
<?php endif; ?>

<?php 
// Error warning

echo form_open_multipart(base_url('admin/konfigurasi/icon'));
?>

<div class="row">
    <div class="col-md-6">

        <div class="col-md-4">
            <?php if ($configure->icon != null) : ?>
            <img src="<?= base_url('assets/uploads/icon/thumbs/'.$configure->icon); ?>"
                alt="<?= $configure->namaweb; ?>" class="img img-circle img-responsive mt-3">
            <?php else : ?>
            <p class="alert alert-info mt-4"><b>Belum ada gambar</b></p>
            <?php endif; ?>
        </div>

        <div class="row">
            <input type="hidden" name="id_konfigurasi" value="<?= $configure->id_konfigurasi; ?>">
            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_userAdmin'); ?>">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="namaweb">Logo Perusahaan/Organisasi/Website</label>
                    <input type="file" name="icon" class="form-control" onchange="tampilkanPreview(this,'preview')"
                        required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Preview Gambar</label><br>
                    <img id="preview" src="" alt="" width="25%" />
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                        <button class="btn btn-default" type="reset" name="reset">Reset</button>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<?php echo form_close(); ?>