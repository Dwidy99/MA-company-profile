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
    <a href="<?= base_url('admin/download/tambah') ?>" title="Tambah File Baru" class="btn btn-info">
        <i class="fas fa-plus"></i> Tambah File Baru
    </a>
</p>

<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>UNDUH</th>
            <th>Judul</th>
            <th>Kategori - Posisi</th>
            <th>Author</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tb>
        <?php $i=1; foreach($download as $d) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td>
                <a href="<?php echo base_url('admin/download/unduh/'.$d->id_download) ?>" class="btn btn-success btn-xs"
                    target="_blank"><i class="fa fa-download"></i> Download</a>
            </td>
            <td>
                <?php echo $d->judul_download ?>

                <br><small>
                    Link:<br>
                    <textarea name="aa"><?php echo base_url('download/unduh/'.$d->id_download) ?></textarea>
                </small>
            </td>
            <td><?php echo $d->nama_kategori_download ?> - <?php echo $d->jenis_download ?></td>
            <td><?php echo $d->nama ?></td>
            <td>
                <div class="btn-group">
                    <a href="<?php echo base_url('admin/download/edit/'.$d->id_download) ?>"
                        class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>

                    <a href="<?php echo base_url('admin/download/delete/'.$d->id_download) ?>"
                        class="btn btn-danger btn-sm" onclick="return confirm('Hapus permanen?');"><i
                            class="far fa-trash-alt"></i></a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tb ody>
</table>
