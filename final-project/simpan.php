<?php
include 'koneksi.php';

$nama  = $_POST['nama'];
$nilai = $_POST['nilai'];

if ($nilai > 100) {
    die("Nilai tidak boleh lebih dari 100");
}

mysqli_query($conn, "INSERT INTO siswa (nama, nilai) VALUES ('$nama', '$nilai')");
header("Location: index.php");
