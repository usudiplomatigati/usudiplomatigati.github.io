<?php
include_once('../db/connection.php');
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: ./index.php");
}

// BERITA
$Berita = mysqli_query($koneksi, 'SELECT * FROM tbl_berita');
$rowBerita = mysqli_num_rows($Berita);

// PENGUMUMAN
$Pengumuman = mysqli_query($koneksi, 'SELECT * FROM tbl_pengumuman');
$rowPengumuman = mysqli_num_rows($Pengumuman);

// AGENDA
$Agenda = mysqli_query($koneksi, 'SELECT * FROM tbl_agenda');
$rowAgenda = mysqli_num_rows($Agenda);

// DOSEN
$Dosen = mysqli_query($koneksi, 'SELECT * FROM tbl_dosen');
$rowDosen = mysqli_num_rows($Dosen);

// MATA KULIAH
$MatKul = mysqli_query($koneksi, 'SELECT * FROM tbl_matkul');
$rowMatKul = mysqli_num_rows($MatKul);

// PENELITIAN
$Penelitian = mysqli_query($koneksi,'SELECT * FROM tbl_penelitian');
$rowPenelitian = mysqli_num_rows($Penelitian);


$admin = mysqli_query($koneksi, 'SELECT * from tbl_admin');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    <!-- MY CSS -->
    <link rel="stylesheet" href="../assets/styles.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- TOP BAR -->
    <?php ($Oadmin = mysqli_fetch_assoc($admin)) ?>
    <nav class="navbar navbar-expand-lg" style="background-color: #ebecf1">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder text-success fs-2 ms-1" href="../index.php">D3-TI</a>
            <form class="d-flex align-items-center">
                <span class="dropdown-toggle text-danger" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <a href="#" class="text-danger text-decoration-none me-2"><?= $Oadmin['nama'] ?></a>
                    <img src="./image/FransDeleandro.jpg" alt=""
                        style="width: 40px; height: 42px; border-radius: 30px !important">
                </span>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="./auth/logout.php">Log Out<i
                                class="bi bi-box-arrow-right ms-3 text-danger"></i></a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <!-- NAVIGATION BAR -->

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-success" id="sidebar-wrapper">
            <div class="list-group list-group-flush my-1">
                <div class="list-group-item list-group-item-action bg-transparent">
                    <a href="./dashboard.php" class="sidebar-link nav-link text-white fw-light"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </div>
                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./berita/index.php">
                            <span class="me-2"><i class="bi bi-newspaper"></i></span>
                            <span>Berita</span>
                        </a>
                        <span class="right-icon ms-auto">
                            <a data-bs-toggle="collapse" href="#berita" class="text-white">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </span>
                    </div>

                    <div class="collapse" id="berita">
                        <div class="text-white fw-light">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="./berita/add-data.php" class="nav-link px-2">
                                        <span>Tambah Berita</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./berita/edit-data.php" class="nav-link px-2">
                                        <span>Edit Berita</span>
                                        <span class="ms-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./pengumuman/index.php">
                            <span class="me-2"><i class="bi bi-megaphone-fill"></i></span>
                            <span>Pengumuman</span>
                        </a>
                        <span class="right-icon ms-auto">
                            <a data-bs-toggle="collapse" href="#pengumuman" class="text-white">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </span>
                    </div>
                    <div class="collapse" id="pengumuman">
                        <div class="text-white fw-light">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="./pengumuman/add-data.php" class="nav-link px-2">
                                        <span>Tambah <br />
                                            Pengumuman</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./pengumuman/edit-data.php" class="nav-link px-2">
                                        <span>Edit <br />Pengumuman</span>
                                        <span class="ms-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./agenda/index.php">
                            <span class="me-2"><i class="bi bi-calendar2-fill"></i></span>
                            <span>Agenda</span>
                        </a>
                        <span class="right-icon ms-auto">
                            <a data-bs-toggle="collapse" href="#agenda" class="text-white">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </span>
                    </div>
                    <div class="collapse" id="agenda">
                        <div class="text-white fw-light">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="./agenda/add-data.php" class="nav-link px-2">
                                        <span>Tambah Agenda</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./agenda/edit-data.php" class="nav-link px-2">
                                        <span>Edit Agenda</span>
                                        <span class="ms-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./dosen/index.php">
                            <span class="me-2"><i class="bi bi-person-fill"></i></span>
                            <span>Dosen</span>
                        </a>
                    </div>
                </div>

                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./matakuliah/index.php">
                            <span class="me-2"><i class="bi bi-clipboard2-fill"></i></span>
                            <span>Mata Kuliah</span>
                        </a>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./penelitian/index.php">
                            <span class="me-2"><i class="bi bi-file-text-fill"></i></span>
                            <span>Penelitian</span>
                        </a>
                        <span class="right-icon ms-auto">
                            <a data-bs-toggle="collapse" href="#penelitian" class="text-white">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </span>
                    </div>
                    <div class="collapse" id="penelitian">
                        <div class="text-white fw-light">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="./penelitian/add-data.php" class="nav-link px-2">
                                        <span>Tambah <br>Penelitian</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./penelitian/edit-data.php" class="nav-link px-2">
                                        <span>Edit Penelitian</span>
                                        <span class="ms-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action bg-transparent"></div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 fw-bolder text-black">DASHBOARD</h2>
                </div>
            </nav>
            <div class="container-fluid px-4 d-flex">
                <div class="row g-3 mt-1">
                    <div class="col-md-3">
                        <a href="./berita/index.php" class="dBerita text-decoration-none">
                            <div
                                class="p-4 shadow rounded-2 d-flex justify-content-around align-items-center text-success">
                                <div class="me-auto">
                                    <h1 class="fw-bold"><?= $rowBerita ?></h1>
                                    <h5 class="fw-light">Berita</h5>
                                </div>
                                <i class="bi bi-newspaper fs-1"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="./pengumuman/" class="dPengumuman text-decoration-none">
                            <div
                                class="p-4 shadow rounded-2 d-flex justify-content-around align-items-center text-danger">
                                <div class="me-auto">
                                    <h1 class="fw-bold"><?= $rowPengumuman ?></h1>
                                    <h5 class="fw-light">Pengumuman</h5>
                                </div>
                                <i class="bi bi-megaphone-fill fs-1"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="./agenda/" class="dAgenda text-decoration-none">
                            <div
                                class="p-4 shadow rounded-2 d-flex justify-content-around align-items-center text-warning">
                                <div class="me-auto">
                                    <h1 class="fw-bold"><?= $rowAgenda ?></h1>
                                    <h5 class="fw-light">Agenda</h5>
                                </div>
                                <i class="bi bi-calendar2-fill fs-1"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="./dosen/index.php" class="dDosen text-decoration-none">
                            <div
                                class="p-4 shadow rounded-2 d-flex justify-content-around align-items-center text-dark">
                                <div class="me-auto">
                                    <h1 class="fw-bold"><?= $rowDosen ?></h1>
                                    <h5 class="fw-light">Dosen</h5>
                                </div>
                                <i class="bi bi-person-fill fs-1"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="./matakuliah/index.php" class="dMatkul text-decoration-none">
                            <div
                                class="p-4 shadow rounded-2 d-flex justify-content-around align-items-center text-primary">
                                <div class="me-auto">
                                    <h1 class="fw-bold"><?= $rowMatKul ?></h1>
                                    <h5 class="fw-light">Mata Kuliah</h5>
                                </div>
                                <i class="bi bi-clipboard2-fill fs-1"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="./penelitian/index.php" class="dPenelitian text-decoration-none">
                            <div class="p-4 shadow rounded-2 d-flex justify-content-around align-items-center">
                                <div class="me-auto">
                                    <h1 class="fw-bold"><?= $rowPenelitian ?></h1>
                                    <h5 class="fw-light">Penelitian</h5>
                                </div>
                                <i class="bi bi-file-text-fill fs-1"></i>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid lay-spacing bg-success mt-0 border-top">
        <footer class="p-2 text-center">
            <p class="fs-6 fw-light text-white m-2"><i class="fa-solid fa-copyright me-2"></i>2022 Copyright : D3 Teknik
                Informatika USU</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
    // SIDEMENU
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };

    // DATATABLE
    $(document).ready(function() {
        $("#tb_berita").DataTable();
    });
    </script>
</body>

</html>