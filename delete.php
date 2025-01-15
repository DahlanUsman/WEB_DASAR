<?php
include 'koneksi.php';
// menyimpan data id ke dalam variabel
$id_mhs = $_GET['id_mhs'];
// query SQL untuk menghapus data
$query = "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("Location: index.php");
?>