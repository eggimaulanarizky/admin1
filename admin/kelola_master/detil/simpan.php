<?php
include '../../../config/koneksi.php';

$id_akun = $_POST['id_akun'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

mysqli_query($conn,"
INSERT INTO detil
(
id_akun,
kode,
uraian
)
VALUES
(
'$id_akun',
'$kode',
'$uraian'
)
");

header("Location:index.php");
?>