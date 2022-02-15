<?php 
// Error warning
echo form_open(base_url('admin/kategori_download/edit/'.$DownloadKategori->id_kategori_download));
?>

<div class="row">
   <div class="col-md-6">
      <div class="form-group">
         <label for="nama_kategori">Nama Kategori</label>
         <input type="text" name="nama_kategori" class="form-control" value="<?php echo $DownloadKategori->nama_kategori_download ?>"
            placeholder="Nama kategori..">
         <?php echo form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="email">Urutan</label>
         <input type="text" name="urutan" class="form-control" value="<?php echo $DownloadKategori->urutan ?>"
            placeholder="Urutan..">
         <?php echo form_error('urutan', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-primary">Simpan</button>
         <button type="reset" class="btn btn-default">Reset</button>
      </div>
   </div>
</div>

<?php echo form_close(); ?>