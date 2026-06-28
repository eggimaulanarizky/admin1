<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM sub_komponen
WHERE id='$id'
");

$row = mysqli_fetch_assoc($data);

$komponen = mysqli_query($conn,"
SELECT * FROM komponen
");
?>

<div class="content kelola-master-page">
<div class="master-container">

<div class="master-header">
    <h2>EDIT SUB KOMPONEN</h2>
</div>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<div class="form-row">
    <label>Komponen</label>
    <select name="id_komponen" required>
        <?php while($k=mysqli_fetch_assoc($komponen)){ ?>
        <option value="<?= $k['id']; ?>"
            <?= ($k['id']==$row['id_komponen']) ? 'selected' : ''; ?>>
            <?= $k['kode']; ?> - <?= $k['uraian']; ?>
        </option>
        <?php } ?>
    </select>
</div>

<div class="form-row">
    <label>Kode</label>
    <input type="text"
           name="kode"
           value="<?= $row['kode']; ?>"
           required>
</div>

<div class="form-row">
    <label>Uraian</label>
    <input type="text"
           name="uraian"
           value="<?= $row['uraian']; ?>"
           required>
</div>

<button type="submit" class="btn-main">Update</button>
<a href="index.php" class="btn-main">Kembali</a>

</form>

</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>