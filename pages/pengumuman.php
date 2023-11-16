<?php
include '../db/connection.php';


if(!isset($_GET['id'])){
    header('Location: ../index.php');
 
 }
 
 $id = $_GET['id'];
 $query = mysqli_query($koneksi, "SELECT * FROM tbl_pengumuman WHERE id = $id");
 $pengumuman = mysqli_fetch_array($query);
 
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

    <!-- PENGUMUMAN -->
    <div class="container mt-4">
        <div class="container px-3">
            <div class="col-lg-12">
                <div class="row">
                    <h3 class="fw-bold mb-2 text-danger"><?= $pengumuman['judul'] ?></h3>
                    <hr width="100%">
                    <img src="../admin/image/pengumuman/<?= $pengumuman['gambar'] ?>">
                    <h6 class="text-secondary mt-3 ms-2"><i class="bi bi-calendar3 me-1"></i> Diposting pada :
                        <?= $pengumuman['tanggal'] ?>
                    </h6>
                    <h6 class="fw-light mt-4"><?= $pengumuman['isi'] ?></h6>
                </div>
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