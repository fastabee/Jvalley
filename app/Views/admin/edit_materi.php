<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="table-responsive">
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="card-body">
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
            <div style="color: white; background: red; text-align: center;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    <form action="/save_edit_materi" method="POST">
        <div class="form-group">
            <input type="hidden" name="id_materi" value="<?= $materi['id_materi']; ?>" id="">
            <label for="modul">Modul:</label>
            <select class="form-control" id="nama_modul" name="nama_modul">
                <?php foreach ($modul as $index => $m) : ?>
                    <option value="<?= $m['id_modul']; ?>" <?= $materi['id_modul'] === $m['id_modul'] ? 'selected' : '' ?>><?= $m['nama_modul']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="judul_materi">Judul Materi:</label>
            <input type="text" class="form-control" value="<?= $materi['judul_materi'] ?>" id="judul_materi" placeholder="Masukkan nama modul" name="judul_materi" />
        </div>
        <div class="form-group">
            <label for="link_youtube">Link Youtube:</label>
            <input type="text" class="form-control" value="<?= $materi['link_youtube'] ?>" id="link_youtube" placeholder="Masukkan Link Youtube" name="link_youtube" />
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>