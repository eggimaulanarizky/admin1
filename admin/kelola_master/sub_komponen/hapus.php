<?php
include '../../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"
DELETE FROM sub_komponen
WHERE id='$id'
");

header("Location:index.php");
?>