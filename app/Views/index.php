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
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#course">Kursus</a></li>
                    <li><a href="#tutors">Pengajar</a></li>
                    <li><a href="#partners">Mitra</a></li>
                    <li><a href="pendaftaran" class="tbl-biru">Daftar</a></li>
                    <li><a href="login" class="tbl-pink">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="kolom1">
        <div class="wrapper">
            <!-- untuk home -->
            <section id="home">
                <img src="<?= base_url('assets/img/gambar1.png') ?>" />
                <div class="kolom1">
                    <p class="deskripsi1">Belajar Programming dirumahaja !</p>
                    <h2 class="judul1">Ayo belajar coding di JVALLEY</h2>
                    <p>Belajar coding di rumah menjadi lebih menyenangkan dan efektif dengan menggunakan pelatihan
                        praktis berbasis video course serta berfokus pada proyek-proyek dalam pengembangan web. Dengan
                        kami, Anda dapat memperoleh pemahaman yang mendalam tentang konsep-konsep pemrograman dan
                        praktik langsung dalam membangun situs web.</p>
                </div>
        </div>
    </div>
    </section>

    <div class="wrapper">
        <section id="home">
            <div class="kolom">
                <p class="deskripsi"></p>
                <p class="deskripsi">Mengapa JVALLEY ?</p>
                <h2>Training Berbasis Proyek</h2>
                <p>Dengan pendekatan pelatihan berbasis proyek, kami menawarkan lebih dari sekadar pembelajaran
                    konsep-konsep teknis. Setiap modul pelatihan dirancang dengan cermat untuk memastikan bahwa peserta
                    tidak hanya memahami konsep-konsep dasar, tetapi juga memiliki pemahaman yang mendalam tentang
                    aplikasi praktisnya dalam berbagai konteks.</p>

            </div>
            <img src="<?= base_url('assets/img/gambar22.png') ?>" />
        </section>

        <section id="home">
            <img src="<?= base_url('assets/img/gambar4.png') ?>" />
            <div class="kolom">
                <p class="deskripsi">Kamu pasti butuh ini !</p>
                <h2>Belajar Coding Online</h2>
                <p>Ingin menguasai keterampilan koding tanpa harus meninggalkan kenyamanan rumah? Sekarang Anda bisa
                    melakukannya dengan mudah melalui platform belajar koding online kami. Apakah Anda tertarik
                    mempelajari bahasa pemrograman seperti Python, JavaScript, atau Framwork seperti laravel, kami
                    memiliki kelas yang sesuai untuk Anda.</p>
                <p><a href="pendaftaran" class="tbl-pink">Daftar Sekarang</a></p>
            </div>
        </section>

        <section id="course">
            <div class="tengah">
                <h2>Kurikulum Program Edukasi</h2>
            </div>
        </section>

        <section class="section-home">
            <img src="<?= base_url('assets/img/html.png') ?>" class="gambar-kurikulum" />
            <div class="kolom">
                <h2>1. Html</h2>
                <p>Dalam modul ini, Anda akan diperkenalkan dengan konsep dasar HTML. Anda akan mempelajari struktur
                    dasar sebuah halaman web,
                    termasuk elemen-elemen utama seperti judul, paragraf, dan hyperlink.</p>
            </div>
        </section>

        <section class="section-home">
            <img src="<?= base_url('assets/img/css.png') ?>" class="gambar-kurikulum" />
            <div class="kolom">
                <h2>2. CSS</h2>
                <p>Dalam modul ini, Anda akan diperkenalkan dengan konsep dasar CSS. Anda akan mempelajari cara mengatur
                    tampilan dan layout dari sebuah halaman web menggunakan CSS.</p>
            </div>
        </section>

        <section class="section-home">
            <img src="<?= base_url('assets/img/js2.png') ?>" class="gambar-kurikulum" />
            <div class="kolom">
                <h2>3. JavaScript</h2>
                <p>Modul ini akan membantu Anda mempelajari Javascript mulai
                    dari menyempurnakan fungsionalitas dan interaktive website dan juga menguasai website dengan lebih
                    lanjut.</p>
            </div>
        </section>

        <section class="section-home">
            <img src="<?= base_url('assets/img/bootsrap.png') ?>" class="gambar-kurikulum" />
            <div class="kolom">
                <h2>4. Bootstrap</h2>Modul ini dimulai dengan pengenalan tentang apa itu Bootstrap dan mengapa ia begitu
                penting dalam pengembangan web modern.Anda akan mempelajari keunggulan-keunggulannya, serta bagaimana
                Bootstrap membantu meningkatkan efisiensi dalam merancang antarmuka pengguna (UI) yang responsif dan
                menarik.</p>
            </div>
        </section>

        <section class="section-home">
            <img src="<?= base_url('assets/img/laravel.png') ?>" class="gambar-kurikulum" />
            <div class="kolom">
                <h2>5. Laravel</h2>
                <p>Modul ini akan membantu Anda mempelajari Laravel mulai dari tingkat dasar hingga tingkat lanjutan.
                    Anda akan diajari konsep dasar
                    MVC (Model-View-Controller) dalam pengembangan web menggunakan Laravel.</p>
            </div>
        </section>

        <section class="section-home">
            <img src="<?= base_url('assets/img/python2.png') ?>" class="gambar-kurikulum" />
            <div class="kolom">
                <h2>6. Python</h2>
                <p>Modul ini akan membantu Anda mempelajari Python dari dasar hingga tingkat lanjutan.Dengan modul ini,
                    Anda akan belajar sintaks dasar Python dan konsep pemrograman seperti variabel,
                    tipe data, dan struktur kontrol.</p>
            </div>
        </section>

        <div class="tengah">
            <p><a href="pendaftaran" class="tbl-pink">Gabung Sekarang</a></p>
        </div>



        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <h2>Pengajar</h2>
                    <p>Di JVALLEY, semua pengajar adalah praktisi berpengalaman yang telah terlibat dalam berbagai
                        proyek di industri.</p>
                </div>

                <div class="tutor-list">
                    <?php foreach ($pengajar as $index => $p) : ?>
                        <div class="kartu-tutor">
                            <img src="/img/<?= $p['foto']; ?>" />
                            <p><?= $p['nama_pengajar']; ?></p>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>

        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">

                    <h2>Mitra</h2>
                    <p>JVALLEY telah dipercaya oleh banyak mitra besar dibawah ini</p>
                </div>

                <div class="partner-list">
                    <?php foreach ($mitra as $index => $m) : ?>
                        <div class="kartu-partner">
                            <img src="/img/<?= $m['foto']; ?>" />
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
    </div>
    </section>
    
    </div>

    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>Tentang Kami</h3>
                    <p>JVALLEY adalah website belajar coding berbasis modul video dan berbasis proyek</p>
                </div>
                <div class="footer-section">
                    <h3>Alamat</h3>
                    <p> Blok A3, Puri, Jl. Cibodas I No.7, Pangkalan Jati, Depok, Jawa Barat </p>
                </div>
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p><b>Telp: </b>+62 822 5146 2999</p>

                </div>
                <div class="footer-section">
                    <h3>Sosial</h3>
                    <p><b>IG: </b>@jvalley.id</p>
                </div>
            </div>
        </div>
    </div>



</body>

</html>