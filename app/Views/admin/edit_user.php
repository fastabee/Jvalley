<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>
<div class="table-responsive">
    <form action="save_edit_user" method="POST">
        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" name="nama_lengkap" required />
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" value="<?= $user['username']; ?>" id="username" name="username" required />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" value="<?= $user['email']; ?>" id="email" name="email" required />
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>