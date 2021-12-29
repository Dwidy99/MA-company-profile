<table id="example2" class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>No.</th>
         <th>Subjek</th>
         <th>Pesan</th>
         <th>Nama</th>
         <th>Email</th>
         <th width="20%">Tanggal</th>
         <th width="20%">Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php $i=1; foreach($pesanPengunjung as $pp) : ?>
      <tr>
         <td><?php echo $i++; ?></td>
         <td><?php echo $pp->subject; ?></td>
         <td><?php echo character_limiter($pp->pesan, 50); ?></td>
         <td><?php echo $pp->nama; ?></td>
         <td><?php echo $pp->email; ?></td>
         <td><?php echo $pp->tanggal; ?></td>
         <td>
            <a href="<?= base_url('admin/kontak/detail/'.$pp->id_kontak); ?>" class="btn btn-warning btn-sm">
               <i class="far fa-envelope-open"></i> Lihat
            </a> ||
            <a href="https://mail.google.com/" target="_blank" class="btn btn-info btn-sm">
               <i class="fas fa-envelope-open-text"></i> Balas
            </a>
         </td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>