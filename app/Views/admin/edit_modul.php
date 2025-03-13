<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="table-responsive">
    <form action="/save_edit_modul" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_modul" id="id_modul" class="" value="<?= $modul['id_modul']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $modul['foto']; ?>">
        <div class="form-group">
            <label for="nama_modul">Nama Modul:</label>
            <input type="text" class="form-control" id="nama_modul" value="<?= $modul['nama_modul']; ?>" name="nama_modul" required />
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" value="<?= $modul['foto']; ?>" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)" />
            <img id="preview" src="/img/<?= $modul['foto']; ?>" alt="Preview Gambar" style="max-width: 200px; display: none;">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>