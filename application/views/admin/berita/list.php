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

<p class="btn-group">
   <a href="<?= base_url('admin/berita/tambah') ?>" class="btn btn-info">
      <i class="fas fa-plus"></i> Tambah Berita Baru
   </a>

   <?php 
   $url_navigasi = $this->uri->segment(2); 
   if($this->uri->segment(3) != "") { 
    ?>
   <a href="<?php echo base_url('admin/'.$url_navigasi) ?>" class="btn btn-primary">
      <i class="fa fa-backward"></i> Kembali</a>
   <?php } ?>
</p>


<table id="example2" class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>No.</th>
         <th>Gambar</th>
         <th>Judul</th>
         <th>Kategori</th>
         <th width="10%">Jenis - Status</th>
         <th>Penulis</th>
         <th>Tanggal</th>
         <th width="10%">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1; 
    foreach($news as $new) : ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td>
            <img src="<?= base_url('assets/uploads/berita/thumbs/'.$new->gambar); ?>" alt="<?= $new->judul_berita; ?>"
               class="img img-thumbnail img-responsive" width="60">
         </td>
         <td><?php echo substr($new->judul_berita, 0, 50); ?>..</td>
         <td>
            <a href="<?php echo base_url('admin/berita/kategori/'.$new->id_kategori_berita) ?>">
               <?php echo $new->nama_kategori; ?><sup><i class="fa fa-link"></i></sup>
            </a>
         </td>
         <td>
            <?php if($new->jenis_berita == "profil") : ?>
            <span class="badge badge-info"><?= $new->jenis_berita; ?> </span>
            <?php else : ?>
            <span class="badge badge-danger"><?= $new->jenis_berita; ?> </span>
            <?php endif; ?>
            -
            <?php if($new->status_berita == "publish") : ?>
            <span class="badge badge-success"><?= $new->status_berita; ?></span>
            <?php else : ?>
            <span class="badge badge-warning"><?= $new->jenis_berita; ?> </span>
            <?php endif; ?>
         </td>
         <td>
            <a href="<?php echo base_url('admin/berita/author/'.$new->id_user) ?>">
               <?php echo $new->nama; ?><sup><i class="fa fa-link"></i></sup>
            </a>
         </td>
         <td><?php echo $new->tanggal_post; ?></td>
         <td>
            <a href="<?php echo base_url('berita/read/'.$new->slug_berita); ?>" target="_blank"
               class="btn btn-success btn-sm">
               <i class="fas fa-eye"></i>
            </a> ||
            <a href="<?php echo base_url('admin/berita/edit/'.$new->id_berita); ?>" class="btn btn-warning btn-sm">
               <i class="fas fa-user-edit"></i>
            </a> ||
            <a href="<?php echo base_url('admin/berita/hapus/'.$new->id_berita); ?>"
               class="btn btn-danger btn-sm tbl-delete">
               <i class="far fa-trash-alt"></i>
            </a>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>