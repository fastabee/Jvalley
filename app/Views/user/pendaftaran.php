<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JVALLEY</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="#">JVALLEY</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index#home">Beranda</a></li>
                    <li><a href="index#course">Kursus</a></li>
                    <li><a href="index#tutors">Pengajar</a></li>
                    <li><a href="#index#partners">Mitra</a></li>
                    <li><a href="pendaftaran" class="tbl-biru">Daftar</a></li>
                    <li><a href="login" class="tbl-pink">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h3 class="headingbiru">Pendaftaran</h3>

        <?php if (session()->getFlashdata('errors')): ?>
            <div style="color: red;">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <?php
        echo form_open('auth/save_register');
        ?>
        <table>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap" value="<?= old('nama_lengkap'); ?>" class="input" /></td>
            </tr>
            <tr>
                <td class="label">Username</td>
                <td><input type="text" name="username" value="<?= old('username'); ?>" class="input" /></td>
            </tr>
            <tr>
                <td class="label">Password</td>
                <td><input type="password" name="password" class="input" /></td>
            </tr>
            <tr>
                <td class="label">Email</td>
                <td><input type="email" name="email" value="<?= old('email'); ?>" class="input" /></td>
            </tr>
            <tr>
                <td></td>
                <td class="login-link">
                    Sudah punya akun? Silahkan <a href="<?= site_url('login') ?>">Login disini</a>
                </td>
            </tr>

            <tr>
                <td></td>
                <td><button type="submit" class="tbl-biru">Daftar <button></td>
            </tr>
        </table>
        <?php echo form_close() ?>
    </div>