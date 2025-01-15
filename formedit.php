<?php
include 'koneksi.php';

// Ambil id_mhs dari URL
$id_mhs = $_GET['id_mhs'] ?? null; // Pastikan parameter ada

// if (!$id_mhs) {
//     die("Error: ID mahasiswa tidak ditemukan di URL. <a href='index.php'>Kembali</a>");
// }

// Query untuk mencari data mahasiswa berdasarkan id_mhs
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'");

// Cek apakah data ditemukan
if (mysqli_num_rows($mahasiswa) == 0) {
    die("Error: Data mahasiswa dengan ID $id_mhs tidak ditemukan. <a href='index.php'>Kembali</a>");
}

// Ambil data mahasiswa
$row = mysqli_fetch_array($mahasiswa);

// Membuat data jurusan menjadi dinamis dalam bentuk array
$jurusan = array('TEKNIK INFORMATIKA', 'TEKNIK ELEKTRO', 'REKAMEDIS');

// Membuat function untuk set aktif radio button
function active_radio_button($value, $input) {
    return $value == $input ? 'checked' : '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="post" action="edit.php">
        <input type="hidden" value="<?php echo htmlspecialchars($row['id_mhs']); ?>" name="id_mhs">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" value="<?php echo htmlspecialchars($row['nim']); ?>" name="nim"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" value="<?php echo htmlspecialchars($row['nama']); ?>" name="nama"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']); ?>>Laki Laki
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']); ?>>Perempuan
                </td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td>
                    <select name="jurusan">
                        <?php
                        foreach ($jurusan as $j) {
                            echo "<option value='$j' ";
                            echo $row['jurusan'] == $j ? "selected='selected'" : '';
                            echo ">$j</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" value="<?php echo htmlspecialchars($row['alamat']); ?>" name="alamat"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" value="simpan">SIMPAN PERUBAHAN</button>
                    <a href="index.php">Kembali</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
