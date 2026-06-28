<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

$id_sub_komponen = $_POST['id_sub_komponen'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

mysqli_query($conn,"
INSERT INTO akun
(
id_sub_komponen,
kode,
uraian
)
VALUES
(
'$id_sub_komponen',
'$kode',
'$uraian'
)
");

header("Location:index.php");
exit;
?>