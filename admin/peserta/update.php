<?php
ob_start(); // biar aman

include '../../config/koneksi.php';

if (!isset($_POST['id'])) {
    die("Akses tidak valid!");
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];

mysqli_query($conn, "
UPDATE peserta SET
    nama='$nama',
    nip='$nip',
    kecamatan='$kecamatan',
    kelurahan='$kelurahan'
WHERE id='$id'
");

// redirect pasti
header("Location: index.php");
exit;