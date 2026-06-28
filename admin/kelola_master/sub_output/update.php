<?php
include '../../../config/koneksi.php';

$id        = $_POST['id'];
$id_output = $_POST['id_output'];
$kode      = $_POST['kode'];
$uraian    = $_POST['uraian'];

mysqli_query($conn,"
UPDATE sub_output
SET id_output='$id_output',
    kode='$kode',
    uraian='$uraian'
WHERE id='$id'
");

header("Location:index.php");
exit;
?>