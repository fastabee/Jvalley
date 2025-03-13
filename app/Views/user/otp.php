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

        <?php if (session()->getFlashdata('error')) : ?>
            <script>
                alert("<?= session()->getFlashdata('error') ?>");
            </script>
        <?php endif; ?>



        <form action="<?php echo base_url('gan/otp') ?>" enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <input type="text" name="id_user" value="<?php echo $id ?>" hidden id="">
                    <td class="label">Masukan OTP :</td>
                    <td><input type="text" name="otp" class="input" required /></td>
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