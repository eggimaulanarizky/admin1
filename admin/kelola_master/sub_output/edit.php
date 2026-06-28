<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM sub_output WHERE id='$id'
");

$row = mysqli_fetch_assoc($data);

$output = mysqli_query($conn,"SELECT * FROM output");
?>

<div class="content kelola-master-page">
<div class="master-container">

<h2>EDIT SUB OUTPUT</h2>

<form action="update.php" method="POST" class="form">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<select name="id_output">
<?php while($o=mysqli_fetch_assoc($output)) { ?>
<option value="<?= $o['id']; ?>"
<?= ($o['id']==$row['id_output']) ? 'selected' : ''; ?>>
<?= $o['kode']; ?>
</option>
<?php } ?>
</select>

<input type="text" name="kode" value="<?= $row['kode']; ?>">
<input type="text" name="uraian" value="<?= $row['uraian']; ?>">

<button type="submit" class="btn-main">
UPDATE
</button>

</form>

</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>