<?php if ($this->session->flashdata('danger')) : ?>
<div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<?php endif; ?>
<?php 
// Error warning
echo form_open_multipart(base_url('admin/layanan/tambah'));
?>

<div class="row">
   <div class="col-md-8">
      <div class="form-group">
         <label for="judul_layanan">Judul Layanan</label>
         <input type="text" name="judul_layanan" class="form-control" value="<?php echo set_value('judul_layanan'); ?>"
            placeholder="Judul layanan..">
         <?php echo form_error('judul_layanan', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="status_layanan">Status Layanan</label>
         <select name="status_layanan" id="status_layanan" class="form-control">
            <option value="">-- Pilih Status --</option>
            <option value="publish">Publish</option>
            <option value="draft">Draft</option>
         </select>
         <?php echo form_error('status_layanan', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="harga">Harga Layanan</label>
         <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga..">
         <?php echo form_error('harga', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="gambar">Gambar</label>
         <input type="file" name="gambar" class="form-control" id="gambar" onchange="tampilkanPreview(this,'preview')"
            required>
         <small class="text-danger">**Ekstensi gambar yang diizinkan: .jpg|.png|.jpeg|.gif <br></small>
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
         <label for="keywords">Keyword Layanan (Untuk SEO google)</label>
         <textarea name="keywords" id="keywords" class="form-control" placeholder="Keword Layanan.."></textarea>
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
         <label for="isi_layanan">Isi Layanan</label>
         <textarea name="isi_layanan" id="isi_layanan" class="form-control tiny" placeholder="Isi Layanan.."></textarea>
         <?php echo form_error('isi_layanan', '<small class="text-danger">', '</small>'); ?>
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