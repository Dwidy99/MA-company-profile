<?php 
// Notifikasi
if ($this->session->flashdata('success')) : ?>
<div class="row">
   <div class="col-md-6">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('success'); ?>
      </div>
   </div>
</div>
<?php endif; ?>

<p>
   <a href="<?= base_url('admin/galeri/tambah') ?>" title="Tambah Galeri Baru" class="btn btn-info">
      <i class="fas fa-plus"></i> Tambah Galeri Baru
   </a>
</p>

<table id="example2" class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>No.</th>
         <th>Gambar</th>
         <th>Judul Galeri</th>
         <th>Posisi</th>
         <th>Website</th>
         <th>Penulis</th>
         <th>Tanggal</th>
         <th width="10%">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1; foreach($galleries as $gallery) : ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td>
            <img src="<?= base_url('assets/uploads/galeri/thumbs/'.$gallery->gambar); ?>"
               alt="<?= $gallery->judul_galeri; ?>" class="img img-thumbnail img-responsive" width="60">
         </td>
         <td><?php echo $gallery->judul_galeri; ?></td>
         <td>
            <?php if($gallery->posisi_galeri == "homepage") : ?>
            <span class="badge badge-secondary"><?= $gallery->posisi_galeri; ?></span>
            <?php elseif($gallery->posisi_galeri == "galeri") : ?>
            <span class="badge badge-info"><?= $gallery->posisi_galeri; ?></span>
            <?php endif; ?>
         </td>
         <td>
            <a href="<?php echo $gallery->website; ?>" target="_blank"><?php echo $gallery->website; ?></a>
         </td>
         <td><?php echo $gallery->nama; ?></td>
         <td><?php echo $gallery->tanggal_post; ?></td>
         <td>
            <a href="<?php echo base_url('admin/galeri/edit/'.$gallery->id_galeri); ?>" class="btn btn-warning btn-sm">
               <i class="fas fa-user-edit"></i>
            </a> ||
            <a href="<?php echo base_url('admin/galeri/hapus/'.$gallery->id_galeri); ?>"
               class="btn btn-danger btn-sm tbl-delete">
               <i class="far fa-trash-alt"></i>
            </a>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>