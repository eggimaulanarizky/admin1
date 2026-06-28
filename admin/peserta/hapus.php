<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM peserta WHERE id='$id'");

header("Location: ".$_SERVER['HTTP_REFERER']);