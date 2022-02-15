<?php if ($this->session->flashdata('danger')) : ?>
<div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<?php endif; ?>
<?php 
// Error warning
echo form_open_multipart(base_url('admin/download/edit/' . $download->id_download));
?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="judul_download">Nama file/download</label>
            <input type="text" name="judul_download" class="form-control" value="<?= $download->judul_download; ?>"
                placeholder="Judul download..">
            <?php echo form_error('judul_download', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Jenis/Posisi Download</label>
            <select name="jenis_download" class="form-control">
                <option value="Download Biasa">Download Biasa</option>
                <option value="Panduan" <?php if($download->jenis_download == "Panduan") {echo "selected";} ?>>
                    Panduan/Pengumuman</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Kategori Download</label>
            <select name="id_kategori_download" class="form-control">

                <?php foreach($kategori_download as $kategori_download) : ?>
                <option value="<?php echo $kategori_download->id_kategori_download ?>"
                    <?php if ($download->id_kategori_download == $kategori_download->id_kategori_download) {echo "selected";}?>>
                    <?php echo $kategori_download->nama_kategori_download ?></option>
                <?php endforeach; ?>

            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Upload file</label>
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
            <small class="text-muted">*Kosongkan jika tidak ingin ganti file</small>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Isi/keterangan</label>
            <textarea name="isi" id="isi" class="form-control tiny"
                placeholder="Isi download"><?= $download->isi ?></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Link / website yang terkait dengan Download</label>
            <input type="url" name="website" class="form-control" value="<?= $download->website ?>"
                placeholder="http://website.com" value="<?php echo set_value('website') ?>">
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                <button class="btn btn-default" type="reset" name="reset">Reset</button>
            </div>
        </div>

    </div>



    <?php echo form_close(); ?>
