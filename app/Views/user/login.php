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
            <div class="logo"><a href=''>JVALLEY</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index#home">Beranda</a></li>
                    <li><a href="index#course">Kursus</a></li>
                    <li><a href="index#tutors">Pengajar</a></li>
                    <li><a href="index#partners">Mitra</a></li>
                    <li><a href="<?= site_url('pendaftaran') ?>" class="tbl-biru">Daftar</a></li>
                    <li><a href="login" class="tbl-pink">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h3 class="headingbiru">Login</h3>
        <?php if (session()->getFlashdata('message')): ?>
            <div style="color: green;">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('salah')): ?>
            <div style="color: red;">
                <?= session()->getFlashdata('salah') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')): ?>
            <div style="color: red;">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php
        echo form_open('auth/cek_login');
        ?>

        <table>
            <tr>
                <td class="label">Username</td>
                <td><input type="text" name="username" class="input" /></td>
            </tr>
            <tr>
    <td class="label">Password</td>
    <td>
        <input type="password" name="password" class="input" />
    </td>
</tr>
<tr>
    <td></td> <!-- Ini untuk memastikan posisi tetap sejajar -->
    <td>
        <div class="login-links">
            <p class="forgot-password">
            Lupa atau tidak tahu password? <a href="<?= site_url('lupa_password') ?>"> Atur Password Disini</a>
            </p>
            <p class="register-text">
            Belum punya akun?<a href="<?= site_url('/pendaftaran') ?>"> Daftar Sekarang</a>
            </p>
        </div>
    </td>
</tr>
            <tr>
                <td></td>
                <td><button type="submit" class="tbl-biru">Masuk</button></td>
            </tr>
        </table>
        <?php echo form_close() ?>
    </div>