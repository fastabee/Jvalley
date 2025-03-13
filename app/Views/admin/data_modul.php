<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>


<div class="table-responsive">
    <div class="text-right mb-3">
        <a href="tambah_modul">
            <button style="background-color: green; color: white; border: #364F6B; margin-bottom: 10px;">
                Tambah Modul
            </button>
        </a>
        <?php if (session()->getFlashdata('message')) : ?>
            <div style="color: white; background: green; text-align: center;">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <table class="table table-hover table-striped">
            <thead class="text-center" style="background-color: #3F72AF; color: #fff">
                <tr>
                    <th>#</th>
                    <th>Nama Modul</th>
                    <th style="max-width: 100px; max-height: 100px; width: auto; height: auto;">Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($modul as $index => $m) : ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= esc($m['nama_modul']); ?></td>
                        <td><img src="/img/<?= esc($m['foto']); ?>" style="max-width: 100px; max-height: 100px; width: auto; height: auto;"></td>
                        <td>
                            <a href="/edit_modul/<?= $m['id_modul']; ?>">
                                <button style="background-color: gold; color: Black; border: none;">
                                    Edit
                                </button>
                            </a>
                            <a href="/delete_modul/<?= $m['id_modul']; ?>">
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