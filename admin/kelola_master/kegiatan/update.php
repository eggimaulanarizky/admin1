<?php
include '../../../config/koneksi.php';

$id         = $_POST['id'];
$id_program = $_POST['id_program'];
$kode       = $_POST['kode'];
$uraian     = $_POST['uraian'];

mysqli_query($conn,"
UPDATE kegiatan
SET id_program='$id_program',
    kode='$kode',
    uraian='$uraian'
WHERE id='$id'
");

header("Location:index.php");
exit;
?>