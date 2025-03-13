<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<?php
$uri = service('uri');
$current_modul = $uri->getSegment(2);
$current_materi = $uri->getSegment(3);
?>
<div class="member-video-kursus">
    <div class="container-2">
        <div class="container-5">
            <div class="judulvideo">
                <?= $video['judul_materi']; ?>
            </div>
            <div class="srcvideo">
                <iframe width="711" height="372" src="<?= $video['link_youtube']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <form action="/save_progress" method="post">
                <input type="hidden" name="id_materi" value="<?= $video['id_materi']; ?>">
                <input type="hidden" name="id_modul" value="<?= $video['id_modul']; ?>">
                <button class="buttonselesai" style="border: 0px;" type="submit">Selesai</button>
            </form>
        </div>
        <div class="container-6">
            <div class="materi">
                Materi
            </div>
            <?php foreach ($materi as $index => $m) : ?>
                <?php
                // Cek apakah modul dan materi saat ini sama dengan yang di URL
                $isActive = ($current_modul == $m['id_modul']) && ($current_materi !== null && $current_materi == $m['id_materi']);
                ?>
                <div class="<?= ($index === 0 && $current_materi === null) ? 'diklik' : ($isActive ? 'diklik' : 'container'); ?>">
                    <a href="/video_kursus/<?= $m['id_modul']; ?>/<?= $m['id_materi']; ?>">
                        <span class="onview">
                            <?= $index + 1; ?>. <?= esc($m['judul_materi']); ?>
                            <?php if ($m['is_completed']) : ?>
                                <span class="checklist">✔</span>
                            <?php endif; ?>
                        </span>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="flashModal" tabindex="-1" aria-labelledby="flashModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="flashModalLabel">Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= session()->getFlashdata('pesan') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if (session()->getFlashdata('pesan')) : ?>
            var flashModal = new bootstrap.Modal(document.getElementById('flashModal'));
            flashModal.show();
        <?php endif; ?>
    });
</script>
<?php $this->endSection(); ?>

