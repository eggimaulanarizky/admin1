<?php
include '../../config/koneksi.php';

$id       = $_POST['id'];
$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$id_team  = $_POST['id_team'];
$kode     = mysqli_real_escape_string($conn, $_POST['kode']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$role     = $_POST['role'];

$query = mysqli_query($conn, "
UPDATE users SET

nama='$nama',
id_team='$id_team',
kode='$kode',
username='$username',
password='$password',
role='$role'

WHERE id='$id'
");

if($query){

    header("Location: index.php");
    exit;

}else{

    echo "Gagal mengupdate data : " . mysqli_error($conn);

}
?>