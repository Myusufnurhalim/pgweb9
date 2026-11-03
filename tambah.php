<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kode  = $_POST['nama_kode'];
    $nama_jalan = $_POST['nama_jalan'];
    $rt         = !empty($_POST['rt']) ? $_POST['rt'] : "NULL";
    $rw         = !empty($_POST['rw']) ? $_POST['rw'] : "NULL";
    $kampung    = $_POST['kampung'];
    $kelurahan  = $_POST['kelurahan'];
    $kecamatan  = "Umbulharjo";
    $kondisi    = $_POST['kondisi'];
    $tinggi     = !empty($_POST['tinggi']) ? $_POST['tinggi'] : "NULL";
    $diameter   = $_POST['diameter'];
    $latitude   = $_POST['latitude'];
    $longitude  = $_POST['longitude'];

    $sql = "INSERT INTO cermin_tikungan (nama_kode, nama_jalan, rt, rw, kampung, kelurahan, kecamatan, kondisi, tinggi, diameter, latitude, longitude) 
            VALUES ('$nama_kode', '$nama_jalan', $rt, $rw, '$kampung', '$kelurahan', '$kecamatan', '$kondisi', $tinggi, '$diameter', $latitude, $longitude)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Cermin Tikungan</title>
</head>
<body>

<h2>Tambah Data Cermin Tikungan</h2>
<form action="" method="post">
    <label>Nama / Kode Cermin:</label><br>
    <input type="text" name="nama_kode" placeholder="Contoh: Cermin Tikungan CT 97" required><br><br>

    <label>Nama Jalan:</label><br>
    <input type="text" name="nama_jalan"><br><br>

    <label>RT / RW:</label><br>
    <input type="number" name="rt" placeholder="RT" style="width: 60px;"> / 
    <input type="number" name="rw" placeholder="RW" style="width: 60px;"><br><br>

    <label>Kampung:</label><br>
    <input type="text" name="kampung"><br><br>

    <label>Kelurahan:</label><br>
    <input type="text" name="kelurahan" value="Sorosutan" required><br><br>

    <label>Kondisi:</label><br>
    <select name="kondisi">
        <option value="Baik, Bersih">Baik, Bersih</option>
        <option value="Kotor">Kotor</option>
        <option value="Rusak">Rusak</option>
    </select><br><br>

    <label>Tinggi (meter):</label><br>
    <input type="text" name="tinggi" placeholder="3"><br><br>

    <label>Diameter:</label><br>
    <input type="text" name="diameter" placeholder="80 cm"><br><br>

    <label>Latitude (Y):</label><br>
    <input type="text" name="latitude" placeholder="-7.822623" required><br><br>

    <label>Longitude (X):</label><br>
    <input type="text" name="longitude" placeholder="110.383791" required><br><br>

    <input type="submit" value="Simpan Data">
    <a href="index.php">Batal</a>
</form>

</body>
</html>