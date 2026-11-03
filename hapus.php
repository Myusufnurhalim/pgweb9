<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM cermin_tikungan WHERE id = $id";
    $conn->query($sql);
}

header("Location: index.php");
exit();
?>