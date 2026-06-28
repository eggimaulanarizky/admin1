<?php
include '../../../config/koneksi.php';

$id_program = $_POST['id_program'];
$kode       = $_POST['kode_kegiatan'];
$uraian     = $_POST['uraian_kegiatan'];

mysqli_query($conn,"
INSERT INTO kegiatan(id_program,kode,uraian)
VALUES('$id_program','$kode','$uraian')
");

header("Location:index.php");
exit;
?>