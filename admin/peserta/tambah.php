<?php
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$jenis = $_GET['jenis'];
?>

<div class="content">
<div class="card">
   

<h2>TAMBAH PESERTA</h2>

<form action="simpan.php" method="POST" class="form">

<input type="hidden" name="jenis" value="<?= $jenis ?>">

<input type="text" name="nama" placeholder="Nama">
<input type="text" name="nip" placeholder="NIP">
<input type="text" name="kecamatan" placeholder="Kecamatan">
<input type="text" name="kelurahan" placeholder="Kelurahan">

<br><br>

<button class="btn btn-primary">Simpan</button>

</form>

</div>
</div>
