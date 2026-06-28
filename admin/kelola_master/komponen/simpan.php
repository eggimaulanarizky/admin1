<?php
include '../../../config/koneksi.php';

$id_sub_output = $_POST['id_sub_output'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

mysqli_query($conn,"
INSERT INTO komponen (id_sub_output,kode,uraian)
VALUES ('$id_sub_output','$kode','$uraian')
");

header("Location:index.php");
?>