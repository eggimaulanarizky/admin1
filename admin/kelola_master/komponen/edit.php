<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM komponen WHERE id='$id'
");

$row = mysqli_fetch_assoc($data);
?>

<div class="content kelola-master-page">
<div class="master-container">

<div class="master-header">
    <h2>EDIT KOMPONEN</h2>
</div>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<div class="form-group">
    <label>Kode Komponen</label>
    <input type="text" name="kode" value="<?= $row['kode']; ?>" required>
</div>

<div class="form-group">
    <label>Uraian Komponen</label>
    <input type="text" name="uraian" value="<?= $row['uraian']; ?>" required>
</div>

<button type="submit" class="btn-main">Update</button>
<a href="index.php" class="btn-main">Kembali</a>

</form>

</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>