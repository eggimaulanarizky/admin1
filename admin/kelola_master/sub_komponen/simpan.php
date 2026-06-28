<?php
include '../../../config/koneksi.php';

$id_komponen = $_POST['id_komponen'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

mysqli_query($conn,"
INSERT INTO sub_komponen (id_komponen,kode,uraian)
VALUES ('$id_komponen','$kode','$uraian')
");

header("Location:index.php");
?>