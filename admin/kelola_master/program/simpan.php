<?php
include '../../../config/koneksi.php';

$kode_program   = $_POST['kode_program'];
$uraian_program = $_POST['uraian_program'];

mysqli_query($conn,"
INSERT INTO program(kode, uraian)
VALUES('$kode_program','$uraian_program')
");

header("Location:index.php");
exit;
?>