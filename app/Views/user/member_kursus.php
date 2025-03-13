<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>
<div style="padding: 15px 2px 120px 220px; background: #EAF0FF; width: 100%; box-sizing: border-box; display: flex; justify-content: center;">
    <div style="flex-wrap: wrap; position: relative; box-sizing: border-box;">
        <div style=" overflow-wrap: break-word; font-family: 'Alumni Sans'; font-weight: 700; font-size: 45px; color: #364F6B;">
            Modul Kursus
        </div>
        <div style=" display: flex; flex-wrap: wrap; box-sizing: border-box;">
            <?php foreach ($modul as $index => $m) : ?>
                <div style="border-radius: 20px; padding-bottom: 30px; background: #FFFFFF; position: relative; margin-right: 120px; margin-bottom: 88px; width: 281px; box-sizing: border-box;">
                    <div style="border-radius: 20px 20px 0 0; margin-bottom: 20px; width: 281px; height: 221px; background: url('/img/<?= esc($m['foto']); ?>') 50% / cover no-repeat;">
                    </div>
                    <div style="margin: 0 147.9px 17px 0; overflow-wrap: break-word; font-family: 'Alumni Sans'; font-weight: 700; font-size: 30px; color: #364F6B; padding-left: 30px; width: 100%;">
                        <?= $index + 1; ?>. <?= esc($m['nama_modul']); ?>
                    </div>
                    <div style="background: #B1B1B1; margin: 0 auto 9px auto; width: 212px; height: 1px;">
                    </div>
                    <div style="margin: 0 auto 17px auto; padding-left: 30px; overflow-wrap: break-word; font-family: 'Amaranth'; font-weight: 400; font-size: 20px; height: auto; color: #848484; background-color: transparent; text-align: left;">
                        Progress : <?= intval($progress[$m['id_modul']]) ?>%
                    </div>
                    <?php if (isset($materi[$m['id_modul']]) && !empty($materi[$m['id_modul']])) : ?>
                        <?php if (intval($progress[$m['id_modul']]) === 0) : ?>
                            <a href="/video_kursus/<?= $m['id_modul']; ?>/<?= $materi[$m['id_modul']][0]['id_materi']; ?>"  style="padding-bottom: 30px; border-radius: 10px; background: #3F72AF; display: block; margin: 0 auto; padding: 7px 4px 12px 0; width: 208px; box-sizing: border-box; text-align: center; color: #FFFFFF; font-weight: bold; text-decoration: none;" onmouseover="this.style.background='#364F6B'" onmouseout="this.style.background='#3F72AF'">
                                <span style="display: block;">
                                    Belajar Disini
                                </span>
                            </a>
                        <?php elseif (intval($progress[$m['id_modul']]) === 100) : ?>
                            <a href="/video_kursus/<?= $m['id_modul']; ?>/<?= $materi[$m['id_modul']][0]['id_materi']; ?>" style="padding-bottom: 30px; border-radius: 10px; background: #3F72AF; display: block; margin: 0 auto; padding: 7px 4px 12px 0; width: 208px; box-sizing: border-box; text-align: center; color: #FFFFFF; font-weight: bold; text-decoration: none;" onmouseover="this.style.background='#364F6B'" onmouseout="this.style.background='#3F72AF'">
                                <span style="display: block;">
                                    Menyelesaikan
                                </span>
                            </a>
                        <?php else : ?>
                            <a href="/video_kursus/<?= $m['id_modul']; ?>/<?= $materi[$m['id_modul']][0]['id_materi']; ?>" style="padding-bottom: 30px; border-radius: 10px; background: #3F72AF; display: block; margin: 0 auto; padding: 7px 4px 12px 0; width: 208px; box-sizing: border-box; text-align: center; color: #FFFFFF; font-weight: bold; text-decoration: none;" onmouseover="this.style.background='#364F6B'" onmouseout="this.style.background='#3F72AF'">
                                <span style="display: block;">
                                    Lanjutkan Belajar
                                </span>
                            </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a href="/video_kursus/<?= $m['id_modul']; ?>" style="padding-bottom: 30px; border-radius: 10px; background: #3F72AF; display: block; margin: 0 auto; padding: 7px 4px 12px 0; width: 208px; box-sizing: border-box; text-align: center; color: #FFFFFF; font-weight: bold; text-decoration: none;">
                            <span style="display: block;">
                                Belajar Disini
                            </span>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->endSection(); ?>