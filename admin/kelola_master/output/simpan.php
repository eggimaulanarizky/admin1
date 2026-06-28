<?php
include '../../../config/koneksi.php';

$id_kegiatan = $_POST['id_kegiatan'];
$kode        = $_POST['kode_output'];
$uraian      = $_POST['uraian_output'];

mysqli_query($conn,"
INSERT INTO output(id_kegiatan,kode,uraian)
VALUES('$id_kegiatan','$kode','$uraian')
");

header("Location:index.php");
exit;
?>