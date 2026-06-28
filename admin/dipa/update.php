<?php
include '../../config/koneksi.php';

$id = $_POST['id'];
$no = $_POST['no_dipa'];
$tanggal = $_POST['tanggal'];

$kpa = $_POST['nama_kpa'];
$nip_kpa = $_POST['nip_kpa'];

$ppk = $_POST['nama_ppk'];
$nip_ppk = $_POST['nip_ppk'];

$bendahara = $_POST['nama_bendahara'];
$nip_bendahara = $_POST['nip_bendahara'];

mysqli_query($conn, "
UPDATE dipa SET
    no_dipa='$no',
    tanggal='$tanggal',
    nama_kpa='$kpa',
    nip_kpa='$nip_kpa',
    nama_ppk='$ppk',
    nip_ppk='$nip_ppk',
    nama_bendahara='$bendahara',
    nip_bendahara='$nip_bendahara'
WHERE id='$id'
");

header("Location: index.php");