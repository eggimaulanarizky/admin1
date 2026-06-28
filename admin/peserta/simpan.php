<?php
include '../../config/koneksi.php';

$nama = $_POST['nama'];
$nip = $_POST['nip'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$jenis = $_POST['jenis'];

mysqli_query($conn, "
INSERT INTO peserta (nama,nip,kecamatan,kelurahan,jenis)
VALUES ('$nama','$nip','$kecamatan','$kelurahan','$jenis')
");

header("Location: index.php");
exit;