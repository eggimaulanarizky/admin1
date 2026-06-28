<?php
include '../../../config/koneksi.php';

$id = $_POST['id'];
$id_komponen = $_POST['id_komponen'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

mysqli_query($conn,"
UPDATE sub_komponen
SET id_komponen='$id_komponen',
    kode='$kode',
    uraian='$uraian'
WHERE id='$id'
");

header("Location:index.php");
?>