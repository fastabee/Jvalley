<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/style-dashboard.css" />
</head>

<body>
    <div class="wrapper d-flex align-items-stretch text-dark">
        <nav id="sidebar" style="background-color: #74A0D5">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../assets/img/logoadmin.png)"></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active"></li>
                    <li>
                        <a href="/data_user" <?= $menu == 'data_user' ? 'style="color: #364F6B"' : '' ?>>Data User</a>
                    </li>
                    <li>
                        <a href="/data_pengajar" <?= $menu == 'data_pengajar' ? 'style="color: #364F6B"' : '' ?>>Data Pengajar</a>
                    </li>
                    <li>
                        <a href="/data_mitra" <?= $menu == 'data_mitra' ? 'style="color: #364F6B"' : '' ?>>Data Mitra</a>
                    </li>
                    <li>
                        <a href="/data_modul" <?= $menu == 'data_modul' ? 'style="color: #364F6B"' : '' ?>>Data Modul</a>
                    </li>
                    <li>
                        <a href="/data_materi" <?= $menu == 'data_materi' ? 'style="color: #364F6B"' : '' ?>>Data Materi</a>
                    </li>
                    <li>
                        <a href="/loginadmin" class="logout-link"> <i class="fa fa-sign-out fa-flip-horizontal"></i> Keluar </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn" style="background-color: #3F72AF; color: #fff">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn d-inline-block d-lg-none ml-auto" style="background-color: #3F72AF; color: #fff" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-chevron-down"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-secondary" href="">Halo ! Selamat datang
                                    admin</a>
                            </li>
                        </ul>
                    </div>

            </nav>
            <!-- konten -->
            <?php $this->renderSection('content'); ?>
        </div>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/main-dash.js"></script>

        <!-- Template Javascript -->
        <script src="../assets/js/main.js"></script>
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById('preview');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
</body>

</html>