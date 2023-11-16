<?php 
include '../../db/connection.php';
session_start();
if (!isset($_SESSION['admin'])){
    header("Location: ../index.php");
}
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM tbl_dosen WHERE id = $id");
echo "<script>alert('Data berhasil dihapus.');window.location='./index.php.';</script>";

?>