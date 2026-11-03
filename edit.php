<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$sql    = "SELECT * FROM cermin_tikungan WHERE id = $id";
$result = $conn->query($sql);
$data   = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kode  = $_POST['nama_kode'];
    $nama_jalan = $_POST['nama_jalan'];
    $rt         = !empty($_POST['rt']) ? $_POST['rt'] : "NULL";
    $rw         = !empty($_POST['rw']) ? $_POST['rw'] : "NULL";
    $kampung    = $_POST['kampung'];
    $kelurahan  = $_POST['kelurahan'];
    $kondisi    = $_POST['kondisi'];
    $tinggi     = !empty($_POST['tinggi']) ? $_POST['tinggi'] : "NULL";
    $diameter   = $_POST['diameter'];
    $latitude   = $_POST['latitude'];
    $longitude  = $_POST['longitude'];

    $update_sql = "UPDATE cermin_tikungan SET 
                    nama_kode = '$nama_kode',
                    nama_jalan = '$nama_jalan',
                    rt = $rt,
                    rw = $rw,
                    kampung = '$kampung',
                    kelurahan = '$kelurahan',
                    kondisi = '$kondisi',
                    tinggi = $tinggi,
                    diameter = '$diameter',
                    latitude = $latitude,
                    longitude = $longitude
                   WHERE id = $id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Cermin Tikungan</title>
</head>
<body>

<h2>Edit Data Cermin Tikungan</h2>
<form action="" method="post">
    <label>Nama / Kode Cermin:</label><br>
    <input type="text" name="nama_kode" value="<?php echo htmlspecialchars($data['nama_kode']); ?>" required><br><br>

    <label>Nama Jalan:</label><br>
    <input type="text" name="nama_jalan" value="<?php echo htmlspecialchars($data['nama_jalan']); ?>"><br><br>

    <label>RT / RW:</label><br>
    <input type="number" name="rt" value="<?php echo htmlspecialchars($data['rt']); ?>" style="width: 60px;"> / 
    <input type="number" name="rw" value="<?php echo htmlspecialchars($data['rw']); ?>" style="width: 60px;"><br><br>

    <label>Kampung:</label><br>
    <input type="text" name="kampung" value="<?php echo htmlspecialchars($data['kampung']); ?>"><br><br>

    <label>Kelurahan:</label><br>
    <input type="text" name="kelurahan" value="<?php echo htmlspecialchars($data['kelurahan']); ?>" required><br><br>

    <label>Kondisi:</label><br>
    <select name="kondisi">
        <option value="Baik, Bersih" <?php if($data['kondisi']=='Baik, Bersih') echo 'selected'; ?>>Baik, Bersih</option>
        <option value="Kotor" <?php if($data['kondisi']=='Kotor') echo 'selected'; ?>>Kotor</option>
        <option value="Rusak" <?php if($data['kondisi']=='Rusak') echo 'selected'; ?>>Rusak</option>
    </select><br><br>

    <label>Tinggi (meter):</label><br>
    <input type="text" name="tinggi" value="<?php echo htmlspecialchars($data['tinggi']); ?>"><br><br>

    <label>Diameter:</label><br>
    <input type="text" name="diameter" value="<?php echo htmlspecialchars($data['diameter']); ?>"><br><br>

    <label>Latitude (Y):</label><br>
    <input type="text" name="latitude" value="<?php echo htmlspecialchars($data['latitude']); ?>" required><br><br>

    <label>Longitude (X):</label><br>
    <input type="text" name="longitude" value="<?php echo htmlspecialchars($data['longitude']); ?>" required><br><br>

    <input type="submit" value="Update Data">
    <a href="index.php">Batal</a>
</form>

</body>
</html>