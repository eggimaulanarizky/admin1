<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';
?>

<div class="content">
<div class="card">

<h2>TAMBAH DIPA</h2>

<form action="simpan.php" method="POST" class="form">

<input type="text" name="no_dipa" placeholder="Nomor DIPA">
<input type="date" name="tanggal">

<input type="text" name="nama_kpa" placeholder="Nama KPA">
<input type="text" name="nip_kpa" placeholder="NIP KPA">

<input type="text" name="nama_ppk" placeholder="Nama PPK">
<input type="text" name="nip_ppk" placeholder="NIP PPK">

<input type="text" name="nama_bendahara" placeholder="Nama Bendahara">
<input type="text" name="nip_bendahara" placeholder="NIP Bendahara">

<br><br>

<button class="btn btn-primary">Simpan</button>

</form>

</div>
</div>

<?php include '../../components/admin/footer.php'; ?>