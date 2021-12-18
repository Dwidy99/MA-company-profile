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
   <a href="<?= base_url('admin/layanan/tambah') ?>" title="Tambah Layanan Baru" class="btn btn-info">
      <i class="fas fa-plus"></i> Tambah Layanan Baru
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
         <th>Nama Layanan</th>
         <th>Status</th>
         <th>Harga</th>
         <th>Penulis</th>
         <th>Tanggal</th>
         <th width="10%">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1; 
    foreach($services as $service) : ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td>
            <img src="<?= base_url('assets/uploads/layanan/thumbs/'.$service->gambar); ?>"
               alt="<?= $service->judul_layanan; ?>" class="img img-thumbnail img-responsive" width="60">
         </td>
         <td><?php echo $service->judul_layanan; ?></td>
         <td>
            <?php if($service->status_layanan == "publish") : ?>
            <span class="badge badge-info"><?= $service->status_layanan; ?></span>
            <?php elseif($service->status_layanan == "draft") : ?>
            <span class="badge badge-warning"><?= $service->status_layanan; ?></span>
            <?php endif; ?>
         </td>
         <td>Rp.<?php echo number_format($service->harga, '0', ',', '.'); ?></td>
         <td>
            <a href="<?php echo base_url('admin/layanan/author/'.$service->id_user) ?>">
               <?php echo $service->nama; ?><sup><i class="fa fa-link"></i></sup>
            </a>
         </td>
         <td><?php echo $service->tanggal_post; ?></td>
         <td>
            <a href="<?php echo base_url('layanan/read/'.$service->slug_layanan); ?>" target="_blank"
               class="btn btn-success btn-sm">
               <i class="fas fa-eye"></i>
            </a> ||
            <a href="<?php echo base_url('admin/layanan/edit/'.$service->id_layanan); ?>"
               class="btn btn-warning btn-sm">
               <i class="fas fa-user-edit"></i>
            </a> ||
            <a href="<?php echo base_url('admin/layanan/hapus/'.$service->id_layanan); ?>"
               class="btn btn-danger btn-sm tbl-delete">
               <i class="far fa-trash-alt"></i>
            </a>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>