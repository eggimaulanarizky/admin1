<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM peserta WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<div class="content">
<div class="card">

<div class="card-header">
    <h2>EDIT PESERTA</h2>
</div>

<br>

<form action="update.php" method="POST" class="form">

<input type="hidden" name="id" value="<?= $d['id'] ?>">

<input type="text" name="nama" value="<?= $d['nama'] ?>" placeholder="Nama">
<input type="text" name="nip" value="<?= $d['nip'] ?>" placeholder="NIP">
<input type="text" name="kecamatan" value="<?= $d['kecamatan'] ?>" placeholder="Kecamatan">
<input type="text" name="kelurahan" value="<?= $d['kelurahan'] ?>" placeholder="Kelurahan">

<br><br>

<button class="btn btn-primary">Update</button>

</form>

</div>
</div>

<?php include '../../components/admin/footer.php'; ?>