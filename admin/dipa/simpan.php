<?php
include '../../config/koneksi.php';

$no = $_POST['no_dipa'];
$tanggal = $_POST['tanggal'];

$kpa = $_POST['nama_kpa'];
$nip_kpa = $_POST['nip_kpa'];

$ppk = $_POST['nama_ppk'];
$nip_ppk = $_POST['nip_ppk'];

$bendahara = $_POST['nama_bendahara'];
$nip_bendahara = $_POST['nip_bendahara'];

mysqli_query($conn, "
INSERT INTO dipa 
(no_dipa, tanggal, nama_kpa, nip_kpa, nama_ppk, nip_ppk, nama_bendahara, nip_bendahara)
VALUES
('$no', '$tanggal', '$kpa', '$nip_kpa', '$ppk', '$nip_ppk', '$bendahara', '$nip_bendahara')
");

header("Location: index.php");