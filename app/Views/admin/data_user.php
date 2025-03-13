<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="table-responsive">
    <div class="text-right mb-3">
        <?php if (session()->getFlashdata('message')) : ?>
            <div style="color: white; background: green; text-align: center;">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <table class="table table-hover table-striped">
            <thead class="text-center" style="background-color: #3F72AF; color: #fff">
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($user as $index => $u) : ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= esc($u['nama_lengkap']); ?></td>
                        <td><?= esc($u['username']); ?></td>
                        <td><?= esc($u['email']); ?></td>
                        <td>
                            <a href="/edit_user/<?= $u['id_user']; ?>">
                                <button style="background-color: gold; color: Black; border: none;">
                                    Edit
                                </button>
                            </a>
                            <a href="/delete_user/<?= $u['id_user']; ?>">
                                <button style="background-color: crimson; color: white; border: none;">Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>
<?php $this->endSection(); ?>