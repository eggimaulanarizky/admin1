<?php
include '../../../config/koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

mysqli_query($conn,"
UPDATE komponen
SET kode='$kode',
    uraian='$uraian'
WHERE id='$id'
");

header("Location:index.php");
?>