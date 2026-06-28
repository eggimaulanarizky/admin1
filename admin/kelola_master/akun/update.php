<?php
include '../../../config/koneksi.php';

$id = $_POST['id'];
$kode = $_POST['kode'];
$uraian = $_POST['uraian'];

$cek = mysqli_query($conn,"
SELECT *
FROM akun
WHERE kode='$kode'
AND id<>'$id'
");

if(mysqli_num_rows($cek)>0){
    echo "
    <script>
    alert('Kode akun sudah digunakan');
    window.history.back();
    </script>
    ";
    exit;
}

mysqli_query($conn,"
UPDATE akun
SET
kode='$kode',
uraian='$uraian'
WHERE id='$id'
");

header('Location:index.php');
?>