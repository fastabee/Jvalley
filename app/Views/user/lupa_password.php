<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVALLEY - Lupa Password</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>JVALLEY</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index#home">Beranda</a></li>
                    <li><a href="index#course">Kursus</a></li>
                    <li><a href="index#tutors">Pengajar</a></li>
                    <li><a href="index#partners">Mitra</a></li>
                    <li><a href="<?= site_url('pendaftaran') ?>" class="tbl-biru">Daftar</a></li>
                    <li><a href="<?= site_url('login') ?>" class="tbl-pink">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h3 class="headingbiru">Lupa Password</h3>

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

        <form action="<?php echo base_url('gan/password') ?>" enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td class="label">Masukkan Email :</td>
                    <td><input type="text" name="email" class="input" required /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="tbl-biru">Kirim OTP</button>

                    </td>
                </tr>
            </table>
        </form>

    </div>
</body>

</html>