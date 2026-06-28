<?php
include '../../../config/koneksi.php';

$id_output = $_POST['id_output'];
$kode      = $_POST['kode_sub_output'];
$uraian    = $_POST['uraian_sub_output'];

mysqli_query($conn,"
INSERT INTO sub_output(id_output,kode,uraian)
VALUES('$id_output','$kode','$uraian')
");

header("Location:index.php");
exit;
?>