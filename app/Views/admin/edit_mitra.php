<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="table-responsive">
    <form action="/save_edit_mitra" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_mitra" id="id_mitra" class="" value="<?= $mitra['id_mitra']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mitra['foto']; ?>">
        <div class="form-group">
            <label for="nama_mitra">Nama Mitra:</label>
            <input type="text" class="form-control" id="nama_mitra" value="<?= $mitra['nama_mitra']; ?>" name="nama_mitra" required />
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" value="<?= $mitra['foto']; ?>" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)" />
            <img id="preview" src="/img/<?= $mitra['foto']; ?>" alt="Preview Gambar" style="max-width: 200px; display: none;">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>