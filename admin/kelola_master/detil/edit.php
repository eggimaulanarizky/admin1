<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id=$_GET['id'];

$data=mysqli_query($conn,"
SELECT * FROM detil
WHERE id='$id'
");

$row=mysqli_fetch_assoc($data);
?>

<div class="content kelola-master-page">
<div class="master-container">

<div class="master-header">
<h2>KELOLA MASTER</h2>
</div>

<form action="update.php"
method="POST">

<input type="hidden"
name="id"
value="<?= $row['id']; ?>">

<div class="tambah-box">

<h3>Edit Detil</h3>

<div class="form-row">
<label>Kode Detil</label>

<input type="text"
class="kode-box"
name="kode"
value="<?= $row['kode']; ?>"
required>
</div>

<div class="form-row">
<label>Uraian Detil</label>

<input type="text"
class="uraian-box"
name="uraian"
value="<?= $row['uraian']; ?>"
required>
</div>

<button type="submit"
class="btn-simpan">
UPDATE
</button>

</div>

</form>
</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>