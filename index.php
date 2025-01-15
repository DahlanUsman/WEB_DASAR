<!DOCTYPE html>
<html>
<head>
    <title>Digital Talent</title>
</head>
<body>
    <h2>List Mahasiswa</h2>
    <table border="1">
        <tr>
            
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>GENDER</th>
            <th>JURUSAN</th>
            <th>ACTION</th>
        </tr>
        <?php
        include 'koneksi.php'; // File koneksi ke database
        $query = "SELECT * FROM mahasiswa";
        $result = mysqli_query($koneksi, $query);
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Laki-laki';
            echo "<tr>
                    
                    <td>{$no}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$jenis_kelamin}</td>
                    <td>{$row['jurusan']}</td>
                    <td><a href='formedit.php?id_mhs= $row[id_mhs]'>Edit</a> | <a href='delete.php?id_mhs=$row[id_mhs]'>Hapus</a></td>
                </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>
