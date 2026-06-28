<?php
include '../../../config/koneksi.php';

$id          = $_POST['id'];
$id_kegiatan = $_POST['id_kegiatan'];
$kode        = $_POST['kode'];
$uraian      = $_POST['uraian'];

mysqli_query($conn,"
UPDATE output
SET id_kegiatan='$id_kegiatan',
    kode='$kode',
    uraian='$uraian'
WHERE id='$id'
");

header("Location:index.php");
exit;
?>