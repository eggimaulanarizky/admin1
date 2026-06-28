<?php
include '../../config/koneksi.php';

$nama      = mysqli_real_escape_string($conn, $_POST['nama']);
$id_team   = $_POST['id_team'];
$username  = mysqli_real_escape_string($conn, $_POST['username']);
$password  = mysqli_real_escape_string($conn, $_POST['password']);
$role      = $_POST['role'];
$kode = $_POST['kode'];

$query = mysqli_query($conn,"
INSERT INTO users
(
nama,
id_team,
kode,
username,
password,
role
)

VALUES
(
'$nama',
'$id_team',
'$kode',
'$username',
'$password',
'$role'
)
");

if($query){
    header("Location: index.php");
    exit;
}else{
    echo "Error : ".mysqli_error($conn);
}
?>