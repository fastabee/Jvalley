<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JValley - Reset Password</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" />
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>JValley</a></div>
            <div class="menu">
                <ul>
                    <li><a href="<?= base_url('index#home'); ?>">Beranda</a></li>
                    <li><a href="<?= base_url('index#course'); ?>">Kursus</a></li>
                    <li><a href="<?= base_url('index#tutors'); ?>">Pengajar</a></li>
                    <li><a href="<?= base_url('index#partners'); ?>">Mitra</a></li>
                    <li><a href="<?= base_url('pendaftaran'); ?>" class="tbl-biru">Daftar</a></li>
                    <li><a href="<?= base_url('login'); ?>" class="tbl-pink">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h3 class="headingbiru">Reset Password</h3>

        <?php if (session()->getFlashdata('message')) : ?>
            <div style="color: green;">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('salah')) : ?>
            <div style="color: red;">
                <?= session()->getFlashdata('salah') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div style="color: red;">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('proses_reset_password'); ?>
        <input type="hidden" name="token" value="<?= esc($token) ?>">

        <table>
            <tr>
                <td class="label">Masukkan Password Baru</td>
                <td><input type="password" name="password" class="input" required minlength="6" placeholder="Masukkan password baru" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="tbl-biru">Reset Password</button>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</body>

</html>
