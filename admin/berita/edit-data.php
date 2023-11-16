<?php
include_once('../../db/connection.php');
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: ../index.php");
}

$admin = mysqli_query($koneksi, 'SELECT * from tbl_admin');

if (!isset($_GET['id'])) {
    header("Location: ./index.php");
}
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_berita WHERE id = $id");
$berita = mysqli_fetch_array($query);

if (isset($_POST['edit'])){
    $gambar = $_FILES['gambar']['name'];
	$judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $sorotan = $_POST['sorotan'];
	$tanggal = $_POST['tanggal'];
	

	if($gambar != ""){
		$extension_accepted = ['png','jpg','svg'];
		$x = explode('.', $gambar);
		$extension = strtolower(end($x));
		$file_tmp = $_FILES['gambar']['tmp_name'];
		$rand = rand(1, 999);
		$new_name = $rand . '-' .$gambar; 

		if(in_array($extension, $extension_accepted)){
			move_uploaded_file($file_tmp, '../image/berita/' . $new_name);

			$query = "UPDATE tbl_berita SET gambar='$new_name', judul='$judul', isi='$isi', sorotan='$sorotan' tanggal='$tanggal' WHERE id = '$id'";

			$result = mysqli_query($koneksi, $query);

			if(!$result) {
				die("Query Gagal Dijalankan: " . mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
			}
			else {
				echo "<script>alert('Data berhasil diubah.');window.location='./index.php.';</script>";
			}
		}
		else {
			echo "<script>alert('Ekstensi tidak diperbolehkan');window.location='./edit-data.php';</script>";
		}

	}
    else{
		$query = "UPDATE tbl_berita SET judul='$judul', isi='$isi', sorotan='$sorotan' tanggal='$tanggal' WHERE id = '$id'";

		$result = mysqli_query($koneksi, $query);

		if(!$result) {
			die("Query Gagal Dijalankan: " . mysqli_errno($koneksi). " - " . mysqli_error($koneksi));
		}
		else {
			echo "<script>alert('Data berhasil diubah.');window.location='./index.php';</script>";
		}
	}
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    <!-- MY CSS -->
    <link rel="stylesheet" href="../../assets/styles.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- DATA TABLES CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />

    <!-- SUMMERNOTE CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- TOP BAR -->
    <?php ($admin = mysqli_fetch_assoc($admin)) ?>
    <nav class="navbar navbar-expand-lg" style="background-color: #ebecf1">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder text-success fs-2 ms-1" href="../../index.php">D3-TI</a>
            <form class="d-flex">
                <span class="dropdown-toggle text-danger" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <a href="#" class="text-danger text-decoration-none me-2"><?= $admin['nama'] ?></a>
                    <img src="../image/FransDeleandro.jpg" alt=""
                        style="width: 40px; height: 42px; border-radius: 30px !important" />
                </span>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="../auth/logout.php">Log Out<i
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
                    <a href="../dashboard.php" class="sidebar-link nav-link text-white fw-light"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </div>
                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="./index.php">
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
                                    <a href="./add-data.php" class="nav-link px-2">
                                        <span>Tambah Berita</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./edit-data.php" class="nav-link px-2">
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
                        <a class="sidebar-link nav-link text-white fw-light" href="../pengumuman/index.php">
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
                                    <a href="../pengumuman/add-data.php" class="nav-link px-2">
                                        <span>Tambah <br />
                                            Pengumuman</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../pengumuman/edit-data.php" class="nav-link px-2">
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
                        <a class="sidebar-link nav-link text-white fw-light" href="../agenda/index.php">
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
                                    <a href="../agenda/add-data.php" class="nav-link px-2">
                                        <span>Tambah Agenda</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../agenda/edit-data.php" class="nav-link px-2">
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
                        <a class="sidebar-link nav-link text-white fw-light" href="../dosen/index.php">
                            <span class="me-2"><i class="bi bi-person-fill"></i></span>
                            <span>Dosen</span>
                        </a>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="../matakuliah/index.php">
                            <span class="me-2"><i class="bi bi-clipboard2-fill"></i></span>
                            <span>Mata Kuliah</span>
                        </a>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action bg-transparent">
                    <div class="d-flex">
                        <a class="sidebar-link nav-link text-white fw-light" href="../penelitian/index.php">
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
                                    <a href="../penelitian/add-data.php" class="nav-link px-2">
                                        <span>Tambah <br>Penelitian</span>
                                        <span class="ms-2">
                                            <i class="bi bi-plus-lg"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../penelitian/edit-data.php" class="nav-link px-2">
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
                    <h2 class="fs-2 m-0 fw-bolder text-success">EDIT BERITA</h2>
                </div>
            </nav>

            <div class="container-fluid p-lg-3">
                <div class="col-lg-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Gambar Berita</label>
                            <input class="form-control" type="file" id="formFile" name="gambar"
                                value="<?= $berita['gambar'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="judul"
                                value="<?= $berita['judul'] ?>" placeholder="Judul Berita" required />
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Sorotan</label>
                            <textarea class="form-control summernote" id="exampleFormControlTextarea1"
                                name="sorotan"><?= $berita['sorotan'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Isi Berita</label>
                            <textarea class="form-control summernote1" id="exampleFormControlTextarea1"
                                name="isi"><?= $berita['isi'] ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal Upload</label>
                            <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal"
                                value="<?= $berita['tanggal'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success float-end px-3 py-2" type="submit" name="edit"><i
                                    class="bi bi-plus-square me-2"></i>
                                Edit</button>
                        </div>
                    </form>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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

    // SUMMERNOTE
    $(".summernote").summernote({
        placeholder: "Isi Sorotan",
        tabsize: 2,
        height: 100,
    });

    $(".summernote1").summernote({
        placeholder: "Isi Berita",
        tabsize: 2,
        height: 150,
    });
    </script>
</body>

</html>