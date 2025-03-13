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
    <form action="/save_pengajar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_pengajar">Nama Pengajar:</label>
            <input type="text" class="form-control" value="<?= old('nama_pengajar'); ?>" id="nama_pengajar" placeholder="Masukkan Nama Pengajar" name="nama_pengajar" />
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)" />
            <img id="preview" src="#" alt="Preview Gambar" style="max-width: 200px; display: none;">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>