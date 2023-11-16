<?php
include '../db/connection.php';

$berita = mysqli_query($koneksi, 'SELECT * FROM tbl_berita');
$pengumuman = mysqli_query($koneksi, 'SELECT * FROM tbl_pengumuman');
$agenda = mysqli_query($koneksi, 'SELECT * FROM tbl_agenda');

$dosen = mysqli_query($koneksi, 'SELECT * from tbl_dosen');
?>
<style>
.usu_logo {
    width: 90px;
}

.ttu_logo {
    width: 270px;
}

.km_logo {
    width: 120px;
}

@media only screen and (max-width: 768px) {
    .usu_logo {
        width: 45px;
    }

    .ttu_logo {
        width: 150;
    }

    .km_logo {
        width: 60px;
    }

}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>D3-TI USU</title>

    <!-- MY CSS -->
    <link rel="stylesheet" href="../assets/styles.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- TOP NAVIGATION BAR -->
    <div class="container-fluid bg-light">
        <div class="d-flex container align-items-center">
            <div class="py-2">
                <img src="../imageUpload/top-nav/USU_logo.png" class="usu_logo">
            </div>
            <div class="py-2 fs-6 ms-auto me-auto">
                <img src="../imageUpload/top-nav/TTU_logo.png" class="ttu_logo">
            </div>
            <div class="py-2 fs-6">
                <img src="../imageUpload/top-nav/kampus_merdeka_logo.png" class="km_logo">
            </div>
        </div>
    </div>

    <!-- NAVIGATION BAR -->
    <div class="container sticky-top bg-white">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder text-success fs-2" href="../index.php">D3-TI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nvmenu" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-lg-auto me-lg-4 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link navitem" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navitem" aria-current="page" href="./profil.php">Profil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Informasi </a>
                            <ul class="dropdown-menu dropdown-menu ddi" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="./berita/index.php">Berita</a>
                                </li>
                                <li><a class="dropdown-item" href="./pengumuman/index.php">Pengumuman</a></li>
                                <li><a class="dropdown-item" href="./agenda/index.php">Agenda</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navitem" href="./dosen.php">Dosen</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"> Akademik </a>
                            <ul class="dropdown-menu dropdown-menu ddi" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="https://penerimaan.usu.ac.id/">Pendaftaran</a>
                                </li>
                                <li><a class="dropdown-item" href="./matakuliah.php">Mata Kuliah</a></li>
                                <li><a class="dropdown-item" href="./peraturanAkademik.php">Peraturan Akademik</a>
                                </li>
                                <li><a class="dropdown-item" href="./prosedurTA.php">Prosedur Tugas Akhir</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navitem" href="./penelitian.php">Penelitian</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <hr width="100%" class="mt-0">
    </div>


    <!-- PROFIL -->
    <div class="container">
        <div class="row">
            <div class="container mt-3 px-4">
                <h3 class="fw-bold mb-1">TENTANG PROGRAM STUDI</h3>
                <hr width="100%">
                <h6 class="fw-light my-4">Program Studi Diploma 3 Teknik Informatika adalahsalah satu program Diploma 3
                    yang
                    berada di lingkungan Universitas Sumatera Utara, dibawah Departemen Matematika. Program Diploma 3
                    Teknik
                    Informatika beroperasi sejak tahun akademik 1993/1994 dan telah terakreditasi oleh Badan Akreditasi
                    Nasional (BAN) dengan 00271/Ak-V/Dpl-III-010/USUIIK/VIII/2011 sekarang berdasarkan surat izin
                    operasional dari Dirjen Dikti No 1558/D2/2001 tanggal 31 Agustus 2001, bahwa Program D3 Teknik
                    Informatika FMIPA USU memfokuskan pada bidang aplikasi Teknik Informatika dan teknologi informasi
                    yang
                    dibutuhkan oleh pasar.<br><br>

                    Seleksi calon mahasiswa dilakukan sekali dalam setahun dan dilakukan di setiap awal tahun akademik.
                    Sistem seleksi dilakukan dengan dua cara, yakni melalui penelusuran siswa berbakat (PMP) dan melalui
                    ujian tertulis yaitu SPMBPD.

                    Saat ini Prodi D3 Teknik Informatika diasuh oleh 30 dosen tetap, 10 dosen tidak tetap dan dibantu
                    oleh 4
                    orang tenaga administrasi dengan mahasiswa aktif sebanyak 290 orang. Kelulusan mahasiswa setiap
                    tahun
                    rata-rata 94 orang dengan rata-rata IP 3,08 dan masa studi rata-rata 3,1 tahun.</h6>
            </div>

            <div class="container mt-5 px-4">
                <h3 class="fw-bold mb-1">STURUKTUR ORGANISASI</h3>
                <hr width="100%">
                <h6 class="fw-light">Berikut adalah diagram Sturuktur Organisasi dari Program Studi D3 Teknik
                    Informatika :
                </h6>
                <img src="../imageUpload/struktur_organisasi.png" class="w-75 mx-auto d-block mt-4">
            </div>

            <div class="container px-4">
                <div class="mt-5">
                    <h3 class="fw-bold mb-1">MISI</h3>
                    <hr width="100%">
                    <h6 class="fw-light">Program Studi D3 Teknik Informatika menjadi Program Studi yang unggul dan
                        profesional (Ahli Madya),
                        memiliki keahlian kerja dan perilaku berkarya serta mampu berperan aktif dalam pembangunan
                        bangsa
                        dalam bidang penerapan dan pengembangan Teknik Informatika dalam menyelenggarakan pengajaran,
                        penelitian, dan pengabdian kepada masyarakat pada tahun 2020.</h6>
                </div>
            </div>

            <div class="container px-4">
                <div class="mt-5">
                    <h3 class="fw-bold mb-1">VISI</h3>
                    <hr width="100%">
                    <h6 class="fw-light">
                        Untuk mencapai visi tersebut, maka dirumuskanlah misi Program Studi D3 Teknik Informatika FMIPA
                        USU
                        sebagai berikut:</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. Menyelenggarakan pendidikan berkualitas melalui manajemen mutu
                            terpadu
                            ISO 9001:2008 untuk menghasilkan lulusan Ahli Madya Teknik Informatika yang unggul dan
                            profesional.</li>
                        <li class="list-group-item">2. Menyelenggarakan perkuliahan dengan suasana akademis yang
                            kondusif
                            dan
                            mendorong inovasi dan kreativitas mahasiswa untuk pengembangan ilmu dan teknologi inovatif.
                        </li>
                        <li class="list-group-item">3. Menyelenggarakan penelitian yang berorientasi pada pengembangan
                            Teknik
                            Informatika yang memberi kontribusi positif kepada masyarakat dan negara dalam pembangunan
                            bangsa.</li>
                        <li class="list-group-item">4. Berperan aktif dalam pengaplikasian ilmu Teknik Informatika di
                            masyarakat melalui pengabdian kepada masyarakat.
                        </li>
                        <li class="list-group-item">5. Menjalin kerja sama dengan lembaga/institusi di dalam maupun di
                            luar
                            negeri untuk kepentingan pendidikan, praktik kerja, dan adaptasi kurikulum.
                        </li>
                    </ul>

                </div>
            </div>

            <div class="container px-4">
                <div class="mt-5">
                    <h3 class="fw-bold mb-1">TUJUAN</h3>
                    <hr width="100%">
                    <h6 class="fw-light">
                        Adapun tujuan dari Program Studi D3 Teknik Informatika ini ialah :</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1. Menghasilkan lulusan yang profesional dan mampu mengaplikasikan
                            keahliannya di bidang Teknik Informatika khususnya di bidang Manajer Database (Database
                            Manager)
                            dan Pengembang Aplikasi (Application Developer).</li>
                        <li class="list-group-item">2. Menghasilkan lulusan yang mampu menciptakan lapangan pekerjaan.
                        </li>
                        <li class="list-group-item">3. Menghasilkan penelitian dan publikasi berskala Nasional dan
                            Internasional.</li>
                        <li class="list-group-item">4. Berperan aktif dalam kegiatan Teknik Informatika pada tingkat
                            Nasional dan Internasional.
                        </li>
                        <li class="list-group-item">5. Terwujudnya kerja sama yang lebih intensif dengan pihak lain
                            (lembaga
                            pendidikan, pemerintah, swasta, BUMN, industri, dan alumni) dalam rangka mengembangkan
                            kemampuan
                            Program Studi untuk menyelenggarakan Tridharma Perguruan Tinggi melalui pengabdian kepada
                            masyarakat.

                        </li>
                    </ul>

                </div>
            </div>


            <div class="mt-5 container px-4">
                <h3 class="fw-bold mb-1">STRATEGI DAN SASARAN</h3>
                <hr width="100%">
            </div>
            <div class="tb_berita px-4">
                <table class="table caption-top" style="width: 100%;">
                    <caption>Berikut adalah Strategi dan Sasaran dari Program Studi ini :</caption>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sasaran</th>
                            <th scope="col">Strategi Pencapaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Persentase Mahasiswa Lulus Tepat Waktu</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Menerapkan monitoring dan evaluasi terhadap proses
                                        pembelajaran</li>
                                    <li class="list-group-item">Menerapkan proses administrasi akademik yang
                                        komprehensif dan online</li>
                                    <li class="list-group-item">Monitoring pelaksanaan kalender akademik yang kontinu
                                    </li>
                                    <li class="list-group-item">Menerapkan peraturan akademik USU dengan ketat</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Persentase mahasiswa dengan IPK > 3,5</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Menerapkan monitoring dan evaluasi terhadap proses
                                        pembelajaran</li>
                                    <li class="list-group-item">Menerapkan proses administrasi akademik yang
                                        komprehensif dan online</li>
                                    <li class="list-group-item">Monitoring pelaksanaan kalender akademik yang kontinu
                                    </li>
                                    <li class="list-group-item">Menerapkan peraturan akademik USU dengan ketat</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Lulusan berpredikat cumlaude</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Menerapkan sistem penilaian multikomponen</li>
                                    <li class="list-group-item">Menyediakan bahan ajar baku untuk setiap mata kuliah.
                                    </li>
                                    <li class="list-group-item">Melaksanakan responsi dan tutorial
                                    </li>
                                    <li class="list-group-item">Mengoptimalkan peran aktif mahasiswa dalam proses
                                        belajar mengajar</li>
                                    <li class="list-group-item">Mengevaluasi/menuntun mahasiswa yang berprestasi sejak
                                        semester awal yang memungkinkan untuk berprestasi cumlaude</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Jumlah publikasi ilmiah Nasional</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Membentuk kelompok riset dosen dan mahasiswa</li>
                                    <li class="list-group-item">Menggalakkan program riset bersama dengan institusi lain
                                    </li>
                                    <li class="list-group-item">Memotivasi dosen dan mahasiswa untuk memublikasikan
                                        hasil penelitian dalam jurnal nasional dan internasional
                                    </li>
                                    <li class="list-group-item">Menggalakkan aktivitas dan kuantitas dosen dalam
                                        perolehan hibah penelitian</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Status akreditasi Program Studi</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Menyiapkan semua komponen yang dinilai dalam akreditasi
                                        dengan teratur dan benar
                                    </li>
                                    <li class="list-group-item">Menghasilkan lulusan yang bermutu melalui berbagai
                                        kegiatan seperti:
                                        - Peningkatan peran tatakelola yang baik mulai dari tingkat Fakultas, Program
                                        Studi, dan unsur pendukung Program Studi
                                        - Peningkatan sistem administrasi akademik yang baik</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Waktu tunggu bekerja setelah lulus (bulan)</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Menjalin kerja sama dengan alumni untuk informasi
                                        kesempatan kerja</li>
                                    <li class="list-group-item">Menyediakan papan pengumuman adanya lowongan kerja</li>
                                    <li class="list-group-item">Mengarahkan dan menghimbau mahasiswa untuk selalu aktif
                                        mendapatkan informasi pada pusat tenaga kerja universitas
                                    </li>
                                    <li class="list-group-item">Meningkatkan kerja sama dengan stakeholder pengguna
                                        tenaga kerja untuk mendapatkan informasi lowongan kerja</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Kerjasama Program Studi dalam bidang penelitian dan pengabdian dengan pihak lain</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Menjalin kerja sama dengan pusat-pusat penelitian baik
                                        swasta maupun pemerintah</li>
                                    <li class="list-group-item">Menggali dan menginformasikan kepada dosen adanya
                                        kesempatan meneliti</li>
                                    <li class="list-group-item">Menjalin kerja sama dengan pemerintah daerah atau
                                        lembaga untuk pengabdian pada masyarakat
                                    </li>
                                    <li class="list-group-item">Tanggap terhadap situasi yang sedang terjadi sehingga
                                        kebutuhan masyarakat dapat dipenuhi oleh Program Studi dengan adanya pengabdian
                                        (misal: pengabdian kepada masyarakat)</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Jumlah publikasi ilmiah Internasional</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Membentuk kelompok riset dosen dan mahasiswa</li>
                                    <li class="list-group-item">Menggalakkan program riset bersama dengan institusi lain
                                    </li>
                                    <li class="list-group-item">Memotivasi dosen dan mahasiswa untuk memublikasikan
                                        hasil penelitian dalan jurnal internasional
                                    </li>
                                    <li class="list-group-item">Menggalakkan aktivitasdan kuantitas dosen dalam
                                        perolehan hibah penelitian</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Jumlah dosen berpendidikan S3</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Rekruitmen calon dosen dengan pendidikan S2 atau S3</li>
                                    <li class="list-group-item">Mendorong dosen muda berpendidikan S2 untuk mendapatkan
                                        beasiswa pemerintah maupun swasta untuk mengikuti program pendidikan S3</li>
                                </ul>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>Jumlah dosen dengan jabatan guru besar</td>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Mendorong dosen berpendidikan S3 untuk publikasi pada
                                        jurnal terindeks</li>
                                    <li class="list-group-item">Mendorong dosen yang telah berpendidikan S3 untuk
                                        melakukan semua aktivitas untuk memperoleh jabatan guru besar</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-success">
        <div class="container lay-spacing text-light">
            <div class="row">
                <div class="col-lg-4 col-md-12 px-5 py-4 ">
                    <p class="fw-bold fs-1 mb-2">D3 TI USU</p>
                    <p class="fw-light">Program Studi Diploma 3 Teknik Informatika adalah salah satu program Diploma
                        3
                        yang berada di lingkungan Universitas Sumatera Utara, dibawah Departemen Matematika</p>
                </div>
                <div class="col-lg-4 col-md-12 px-5 py-4">
                    <p class="fw-bold mb-2">ALAMAT</p>
                    <p class="fw-light">Jl. Bioteknologi No.1, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera
                        Utara
                        20155</p>
                </div>
                <div class="col-lg-4 col-md-12 fw-bold px-5 py-4 mb-3">
                    <div class="row">
                        <p class="fw-bold mb-2">KONTAK KAMI</p>
                        <a href="" class="text-decoration-none text-white fw-light"><i
                                class="bi bi-telephone-fill me-2"></i>
                            :
                            &nbsp;+62 61
                            8211050</a>
                        <a href="" class="text-decoration-none text-white fw-light"><i
                                class="bi bi-envelope-fill me-2"></i>
                            :
                            &nbsp;dipl-ti@usu.ac.id</a>
                    </div>
                    <div class="mt-5">
                        <p class="mb-2">MEDIA SOSIAL</p>
                        <a href="" class="text-decoration-none text-white"><i class="bi bi-instagram"></i></a>
                        <a href="" class="text-decoration-none text-white"><i class="bi bi-facebook ms-2"></i></a>
                        <a href="" class="text-decoration-none text-white"><i class="bi bi-twitter ms-2"></i></a>
                        <a href="" class="text-decoration-none text-white"><i class="bi bi-youtube ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 text-center bg-dark">
        <p class="fs-6 fw-light text-light m-2">2022 Copyright : D3 Teknik Informatika USU</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script>

    </script>
</body>

</html>