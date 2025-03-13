<?php $this->extend('layout/templateAdmin'); ?>

<?php $this->section('content'); ?>

<div class="table-responsive">
    <form action="/save_edit_pengajar" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_pengajar" id="id_pengajar" class="" value="<?= $pengajar['id_pengajar']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $pengajar['foto']; ?>">
        <div class="form-group">
            <label for="nama_pengajar">Nama Pengajar:</label>
            <input type="text" class="form-control" id="nama_pengajar" value="<?= $pengajar['nama_pengajar']; ?>" name="nama_pengajar" required />
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" value="<?= $pengajar['foto']; ?>" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)" />
            <img id="preview" src="/img/<?= $pengajar['foto']; ?>" alt="Preview Gambar" style="max-width: 200px; display: none;">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
<?php $this->endSection(); ?>