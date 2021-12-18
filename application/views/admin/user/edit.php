<?php 
// Error warning
echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="row">

   <div class="col-md-6">
      <div class="form-group">
         <label for="nama">Nama User</label>
         <input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>"
            placeholder="Nama lengkap..">
         <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
         <label for="email">Email</label>
         <input type="text" name="email" class="form-control" value="<?php echo $user->email ?>" readonly>
      </div>
      <div class="form-group">
         <label for="level">Level Akses</label>
         <select name="akses_level" class="form-control" id="level">
            <option value="User">User</option>
            <option value="Admin" <?php if ($user->akses_level == "Admin") {echo "selected";} ?>>Admin</option>
         </select>
      </div>
   </div>

   <div class="col-md-6">
      <div class="form-group">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" readonly>
      </div>
      <div class="form-group">
         <label for="password">Password</label>
         <input type="password" name="password" class="form-control" placeholder="Password..">
         <small class="text-danger">Catatan: Kosongkan jika tidak ingin diganti</small>
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-primary">Simpan</button>
         <button class="btn btn-default" type="reset" name="reset">Reset</button>
      </div>
   </div>

</div>
<?php echo form_close(); ?>