<?php if ($this->session->flashdata('danger')) : ?>
<div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
<?php endif; ?>
<?php 
// Error warning
echo form_open_multipart(base_url('admin/berita/edit/'.$news->id_berita));
?>

<div class="row">

   <div class="col-md-8">
      <div class="form-group">
         <label for="judul_berita">Judul Berita</label>
         <input type="text" name="judul_berita" class="form-control" value="<?php echo $news->judul_berita; ?>"
            placeholder="Judul berita..">
         <?php echo form_error('judul_berita', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-4">
      <div class="form-group">
         <label for="status_berita">Status Berita</label>
         <select name="status_berita" id="status_berita" class="form-control">
            <option value="publish">Publish</option>
            <option value="draft" <?php if ($news->status_berita == 'draft') {echo 'selected';} ?>>Draft</option>
         </select>
         <?php echo form_error('status_berita', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-2">
      <div class="form-group">
         <label for="jenis_berita">Jenis Berita</label>
         <select name="jenis_berita" class="form-control" id="jenis_berita">
            <option value="berita">Berita</option>
            <option value="profil" <?php if ($news->jenis_berita == 'profil') {echo 'selected';} ?>>Profil</option>
         </select>
         <?php echo form_error('jenis_berita', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-2">
      <div class="form-group">
         <label for="id_kategori_berita">Kategori Berita</label>
         <select name="id_kategori_berita" class="form-control" id="id_kategori_berita">
            <?php foreach ($categories as $category) : ?>
            <?php if ($news->id_kategori_berita == $category->id_kategori_berita) : ?>
            <option value="<?= $category->id_kategori_berita; ?>" selected><?= $category->nama_kategori; ?></option>
            <?php else : ?>
            <option value="<?= $category->id_kategori_berita; ?>"><?= $category->nama_kategori; ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
         </select>
         <?php echo form_error('id_kategori_berita', '<small class="text-danger">', '</small>'); ?>
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
         <label for="keywords">Keyword Berita (Untuk SEO google)</label>
         <textarea name="keywords" id="keywords" class="form-control"
            placeholder="Keword Berita.."><?php echo $news->keywords; ?></textarea>
         <?php echo form_error('keywords', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>
   <div class="col-md-12">
      <div class="form-group">
         <label for="isi_berita">Isi Berita</label>
         <textarea name="isi_berita" id="isi_berita" class="form-control tiny"
            placeholder="Isi Berita.."><?php echo $news->isi; ?></textarea>
         <?php echo form_error('isi_berita', '<small class="text-danger">', '</small>'); ?>
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