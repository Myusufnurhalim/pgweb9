<?php
include 'koneksi.php';

$sql    = "SELECT * FROM cermin_tikungan ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>Titik Sebaran Lokasi Cermin Tikungan - Kemantren Umbulharjo</h2>
<a href="tambah.php">Tambah Data</a><br><br>

<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama / Kode</th>
            <th>Nama Jalan</th>
            <th>RT/RW</th>
            <th>Kampung</th>
            <th>Kelurahan</th>
            <th>Kondisi</th>
            <th>Tinggi (m)</th>
            <th>Diameter</th>
            <th>Latitude (Y)</th>
            <th>Longitude (X)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                $rt_rw = (!empty($row['rt']) ? $row['rt'] : '-') . '/' . (!empty($row['rw']) ? $row['rw'] : '-');
                echo "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . htmlspecialchars($row['nama_kode']) . "</td>
                        <td>" . (!empty($row['nama_jalan']) ? htmlspecialchars($row['nama_jalan']) : '-') . "</td>
                        <td>" . $rt_rw . "</td>
                        <td>" . (!empty($row['kampung']) ? htmlspecialchars($row['kampung']) : '-') . "</td>
                        <td>" . htmlspecialchars($row['kelurahan']) . "</td>
                        <td>" . htmlspecialchars($row['kondisi']) . "</td>
                        <td>" . (!empty($row['tinggi']) ? htmlspecialchars($row['tinggi']) : '-') . "</td>
                        <td>" . (!empty($row['diameter']) ? htmlspecialchars($row['diameter']) : '-') . "</td>
                        <td>" . htmlspecialchars($row['latitude']) . "</td>
                        <td>" . htmlspecialchars($row['longitude']) . "</td>
                        <td>
                            <a href='edit.php?id=" . $row['id'] . "'>Edit</a> | 
                            <a href='hapus.php?id=" . $row['id'] . "' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='12'>Belum ada data cermin tikungan.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>