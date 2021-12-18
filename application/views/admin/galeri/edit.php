<?php if ($this->session->flashdata('danger')) : ?>
<div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<?php endif; ?>
<?php 
// Error warning

echo form_open_multipart(base_url('admin/galeri/edit/'.$galleries->id_galeri));
?>

<div class="row">

   <div class="col-md-8">
      <div class="form-group">
         <label for="judul_galeri">Judul Galeri</label>
         <input type="text" name="judul_galeri" class="form-control" value="<?php echo $galleries->judul_galeri; ?>"
            placeholder="Judul galeri..">
         <?php echo form_error('judul_galeri', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="posisi_galeri">Posisi Galeri</label>
         <select name="posisi_galeri" id="posisi_galeri" class="form-control">
            <option value="galeri">Galeri</option>
            <option value="homepage" <?php if ($galleries->posisi_galeri == 'homepage') {echo 'selected';} ?>>Homepage
               Slider
            </option>
         </select>
         <?php echo form_error('posisi_galeri', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="website">Link/URL Galeri</label>
         <input type="text" class="form-control" name="website" id="website" value="<?= $galleries->website ?>"
            placeholder="contoh: https://www.google.com">
         <?php echo form_error('website', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="gambar">Gambar</label>
         <input type="file" name="gambar" class="form-control" id="gambar" onchange="tampilkanPreview(this,'preview')">
         <small class="text-danger">**Ekstensi gambar yang diizinkan: .jpg|.png|.jpeg|.gif <br></small>
         <small>*Abaikan jika tidak ingin mengganti gambar</small>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label>Preview Gambar</label><br>
         <img id="preview" src="" alt="" width="20%" />
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
         <label for="isi_galeri">Isi Galeri</label>
         <textarea name="isi_galeri" id="isi_galeri" class="form-control tiny"
            placeholder="Isi Galeri.."><?php echo $galleries->isi_galeri; ?></textarea>
         <?php echo form_error('isi_galeri', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
         <button class="btn btn-default" type="reset" name="reset">Reset</button>
      </div>
   </div>

</div>
<?php echo form_close(); ?>