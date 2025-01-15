<?php
include 'koneksi.php';
// menyimpan data ke dalam variabel
$id_mhs = $_POST['id_mhs'];
$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jurusan        = $_POST['jurusan'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];

// query SQL untuk update data
$query = "UPDATE mahasiswa SET 
            nim='$nim', 
            nama='$nama', 
            jurusan='$jurusan', 
            jenis_kelamin='$jenis_kelamin', 
            alamat='$alamat' 
          WHERE id_mhs='$id_mhs'";

mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>
