<?php $this->extend('layout/templateUser'); ?>

<?php $this->section('content'); ?>

<div class="wrapper">
    <h3 class="headingbiru">Profil Anda</h3>
    <?php if (session()->getFlashdata('message')) : ?>
        <div style="color: white; background: green; text-align: center;">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

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
    <form action="/save_profile" method="post">
        <table style="border-collapse: collapse; width: 100%; max-width: 400px; margin: 0;">
            <tr style="padding-bottom: 10px;">
                <td class="label" style="padding: 10px 10px 10px 0; text-align: left;">Nama Lengkap</td>
                <td style="padding: 10px 0;"><input type="text" value="<?= $nama_lengkap; ?>" name="nama_lengkap" class="input" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" /></td>
            </tr>
            <tr style="padding-bottom: 10px;">
                <td class="label" style="padding: 10px 10px 10px 0; text-align: left;">Username</td>
                <td style="padding: 10px 0;"><input type="text" value="<?= $user['username']; ?>" name="username" class="input" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" /></td>
            </tr>
            <tr style="padding-bottom: 10px;">
                <td class="label" style="padding: 10px 10px 10px 0; text-align: left;">Password</td>
                <td style="padding: 10px 0;"><input type="password" value="<?= $user['password']; ?>" name="password" class="input" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" /></td>
            </tr>
            <tr style="padding-bottom: 10px;">
                <td class="label" style="padding: 10px 10px 10px 0; text-align: left;">Email</td>
                <td style="padding: 10px 0;"><input type="text" value="<?= $user['email']; ?>" name="email" class="input" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" /></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding: 10px 0;"><button type="submit" class="tbl-biru" style="border: 0px; margin-top: 10px; display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;" onmouseover="this.style.background='#364F6B'" onmouseout="this.style.background='#3F72AF'">Simpan</button></td>
            </tr>
        </table>
    </form>




</div>
<?php $this->endSection(); ?>