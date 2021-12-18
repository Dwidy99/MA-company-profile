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
   <a href="<?= base_url('admin/user/tambah') ?>" title="Tambah User Baru" class="btn btn-info">
      <i class="fas fa-user-plus"></i> Tambah User Baru
   </a>
</p>

<table id="example2" class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>No.</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Username - Level</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1; 
    foreach($users as $user) : ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td><?php echo $user->nama; ?></td>
         <td><?php echo $user->email; ?></td>
         <td><?php echo $user->username; ?> - <?php echo $user->akses_level; ?></td>
         <td>
            <a href="<?php echo base_url('admin/user/edit/'.$user->id_user); ?>" class="btn btn-warning btn-sm">
               <i class="fas fa-user-edit"></i> Ubah
            </a> ||
            <a href="<?php echo base_url('admin/user/hapus/'.$user->id_user); ?>"
               class="btn btn-danger btn-sm tbl-delete">
               <i class="far fa-trash-alt"></i> Hapus
            </a>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>