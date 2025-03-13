<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>


<div class="table-responsive">
    <div class="text-right mb-3">
        <div style="display: flex; gap: 500px;">
            <form action="/data_materi" method="post" class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Cari materi..." aria-label="Cari materi..." aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </form>
            <a href="/tambah_materi">
                <button style="background-color: green; color: white; border: #364F6B; padding: 4px 12px; width: 100px; margin-bottom: 10px;">
                    Tambah
                </button>
            </a>
        </div>

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
                    <th>Nama Materi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($materi as $index => $m) : ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= esc($m->nama_modul); ?></td>
                        <td><?= esc($m->judul_materi); ?></td>
                        <td>
                            <a href="/edit_materi/<?= $m->id_materi ?>">
                                <button style="background-color: gold; color: Black; border: none;">
                                    Edit
                                </button>
                            </a>
                            <a href="/delete_materi/<?= $m->id_materi ?>">
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