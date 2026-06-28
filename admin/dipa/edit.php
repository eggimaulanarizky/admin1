<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM dipa WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<div class="content">
<div class="card">

<h2>EDIT DIPA</h2>

<form action="update.php" method="POST" class="form">

<input type="hidden" name="id" value="<?= $d['id'] ?>">

<input type="text" name="no_dipa" value="<?= $d['no_dipa'] ?>">
<input type="date" name="tanggal" value="<?= $d['tanggal'] ?>">

<input type="text" name="nama_kpa" value="<?= $d['nama_kpa'] ?>">
<input type="text" name="nip_kpa" value="<?= $d['nip_kpa'] ?>">

<input type="text" name="nama_ppk" value="<?= $d['nama_ppk'] ?>">
<input type="text" name="nip_ppk" value="<?= $d['nip_ppk'] ?>">

<input type="text" name="nama_bendahara" value="<?= $d['nama_bendahara'] ?>">
<input type="text" name="nip_bendahara" value="<?= $d['nip_bendahara'] ?>">

<br><br>
<button class="btn btn-primary">Update</button>

</form>

</div>
</div>

<?php include '../../components/admin/footer.php'; ?>