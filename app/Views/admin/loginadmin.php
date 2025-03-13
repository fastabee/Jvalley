<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/csslogin.css" />
    <title>Login Admin</title>
</head>

<body>
    <?php
    echo form_open('auth/cek_login_admin');
    ?>
    <div class="login-box">
        <div class="login-header">
            <img src="../assets/img/logoadm.png" alt="Logo" class="logo">
            <header>Login Admin</header>
        </div>
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
        <div class="input-box">
            <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="input-submit">
            <button class="submit-btn" type="submit"></button>
            <label href="data_mitra" for="submit">Masuk</label>
        </div>
    </div>
    <?php echo form_close() ?>
</body>

</html>