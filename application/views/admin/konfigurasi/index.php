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
         <?php echo $this->session->flashdata('success'); ?>
      </div>
      <div class="data-flashdata-danger" data-flashdata="<?= $this->session->flashdata('danger'); ?>"></div>
   </div>
</div>
<?php endif; ?>

<?php 
// Error warning

echo form_open_multipart(base_url('admin/konfigurasi'));
?>

<div class="row">
   <div class="col-md-6">
      <input type="hidden" name="id_konfigurasi" value="<?= $configure->id_konfigurasi; ?>">
      <input type="hidden" name="id_user" value="<?= $configure->id_user; ?>">
      <div class="form-group">
         <label for="namaweb">Nama Perusahaan/Organisasi/Website</label>
         <input type="text" name="namaweb" class="form-control" value="<?php echo $configure->namaweb; ?>"
            placeholder="Nama..">
         <?php echo form_error('namaweb', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="tagline">Tagline Perusahaan/Organisasi/Website</label>
         <input type="text" name="tagline" class="form-control" value="<?php echo $configure->tagline; ?>"
            placeholder="Tagline..">
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="text" name="email" class="form-control" value="<?php echo $configure->email; ?>"
            placeholder="Email..">
         <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="telepon">Telepon Perusahaan/Organisasi/Website</label>
         <input type="text" name="telepon" class="form-control" value="<?php echo $configure->telepon; ?>"
            placeholder="Telepon..">
         <?php echo form_error('telepon', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="facebook">Facebook URL</label>
         <input type="text" name="facebook" class="form-control" value="<?php echo $configure->facebook; ?>"
            placeholder="Contoh: https://www.facebook.com">
         <?php echo form_error('facebook', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="website">Website Perusahaan/Organisasi/Website</label>
         <input type="text" name="website" class="form-control" value="<?php echo $configure->website; ?>"
            placeholder="Contoh: https://www.companyname.com">
         <?php echo form_error('website', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="instagram">Instagram Perusahaan/Organisasi/Website</label>
         <input type="text" name="instagram" class="form-control" value="<?php echo $configure->instagram; ?>"
            placeholder="Contoh: https://www.instagram.com">
         <?php echo form_error('instagram', '<small class="text-danger">', '</small>'); ?>
      </div>
   </div>

   <div class="col-md-6">
      <div class="form-group">
         <label for="alamat">Alamat Perusahaan/Organisasi/Website/Organisasi/Website</label>
         <textarea name="alamat" class="form-control"
            placeholder="Alamat.."><?php echo $configure->alamat; ?></textarea>
      </div>
      <div class="form-group">
         <label for="deskripsi">Deskripsi Perusahaan/Organisasi/Website/Organisasi/Website</label>
         <textarea name="deskripsi" class="form-control"
            placeholder="Deskripsi"><?php echo $configure->deskripsi; ?></textarea>
         <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="keywords">Keyword Perusahaan/Organisasi/Website/Organisasi/Website</label>
         <textarea name="keywords" class="form-control"
            placeholder="Keyword.."><?php echo $configure->keywords; ?></textarea>
      </div>
      <div class="form-group">
         <label for="Metatext">Metatext (Dari Google Analytics)</label>
         <textarea name="metatext" class="form-control"
            placeholder="Metatext.."><?php echo $configure->metatext; ?></textarea>
      </div>
      <div class="form-group">
         <label for="map">Google Map</label>
         <textarea name="map" class="form-control" rows="4"
            placeholder="Link Google Maps.."><?php echo $configure->map; ?></textarea>
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
<?php echo form_close(); ?>