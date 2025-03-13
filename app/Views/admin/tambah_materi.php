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
    <form action="/save_materi" method="POST">
        <div class="form-group">
            <label for="modul">Modul:</label>
            <select class="form-control" id="nama_modul" name="nama_modul">
                <option value="">Pilih Modul</option>
                <?php foreach ($modul as $index => $m) : ?>
                    <option value="<?= $m['id_modul']; ?>" <?= old('nama_modul') === $m['id_modul'] ? 'selected' : '' ?>><?= $m['nama_modul']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="judul_materi">Judul Materi:</label>
            <input type="text" class="form-control" value="<?= old('judul_materi'); ?>" id="judul_materi" placeholder="Masukkan Judul Materi" name="judul_materi" />
        </div>
        <div class="form-group">
            <label for="link_youtube">Link Youtube:</label>
            <input type="text" class="form-control" value="<?= old('link_youtube'); ?>" id="link_youtube" placeholder="Masukkan Link Youtube" name="link_youtube" />
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>