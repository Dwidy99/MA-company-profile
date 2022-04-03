<?php 
// Error warning
echo form_open(base_url('admin/user/tambah'));
?>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="nama">Nama User</label>
            <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>"
                placeholder="Nama lengkap..">
            <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"
                placeholder="Email..">
            <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="level">Level Akses</label>
            <select name="akses_level" class="form-control" id="level">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>"
                placeholder="Username..">
            <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"
                placeholder="Password..">
            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
            <button class="btn btn-default" type="reset" name="reset">Reset</button>
        </div>
    </div>

</div>
<?php echo form_close(); ?>