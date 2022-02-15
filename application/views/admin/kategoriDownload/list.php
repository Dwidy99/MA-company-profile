<?php 
// Notifikasi
if ($this->session->flashdata('success')) : ?>
<div class="alert alert-success">
   <?php echo $this->session->flashdata('success'); ?>
</div>
<div class="data-flashdata" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<?php endif; ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#downloadKategoriModal">
   <i class="fas fa-plus"></i> Tambah Kategori Download
</button>

<div class="row">
   <div class="col-md-6">
      <?php if (validation_errors()) :?>
      <div class="alert alert-danger" role="alert">
         <?php echo validation_errors(); ?>
      </div>
      <?php endif; ?>
   </div>
</div>

<table id="example2" class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>No.</th>
         <th>Nama Kategori</th>
         <th>Slug Kategori</th>
         <th>Urutan</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1; 
    foreach($newsKategories as $kategori) : ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td><?php echo $kategori->nama_kategori_download; ?></td>
         <td><?php echo $kategori->slug_kategori_download; ?></td>
         <td><?php echo $kategori->urutan; ?></td>
         <td>
            <a href="<?php echo base_url('admin/kategori_download/edit/'.$kategori->id_kategori_download); ?>"
               class="btn btn-warning btn-sm">
               <i class="fas fa-user-edit"></i> Ubah
            </a>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="downloadKategoriModal" tabindex="-1" aria-labelledby="downloadKategoriModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="downloadKategoriModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <?php echo form_open(base_url('admin/kategori_download/')); ?>
            <div class="form-group">
               <label for="nama_kategori">Nama Kategori</label>
               <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Kategori..">
            </div>
            <div class="form-group">
               <label for="urutan">Urutan</label>
               <input type="number" class="form-control" name="urutan" id="urutan" placeholder="Urutan..">
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
         <?php echo form_close(); ?>
      </div>
   </div>
</div>