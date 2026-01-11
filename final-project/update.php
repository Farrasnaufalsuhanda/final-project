<?php
include 'koneksi.php';

$id    = $_POST['id'];
$nama  = $_POST['nama'];
$nilai = $_POST['nilai'];

if ($nilai > 100) {
    die("Nilai tidak boleh lebih dari 100");
}

mysqli_query($conn, "UPDATE siswa SET nama='$nama', nilai='$nilai' WHERE id='$id'");
header("Location: index.php");
