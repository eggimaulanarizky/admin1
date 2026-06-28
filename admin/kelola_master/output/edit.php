<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT * FROM output WHERE id='$id'
");

$row = mysqli_fetch_assoc($data);

$kegiatan = mysqli_query($conn,"
SELECT * FROM kegiatan
");
?>

<div class="content kelola-master-page">
<div class="master-container">

    <div class="master-header">
        <h2>EDIT OUTPUT</h2>
    </div>

    <div class="master-top">
        <a href="index.php" class="btn-back">Kembali</a>
    </div>

    <form action="update.php" method="POST" class="form">

        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <label>Pilih Kegiatan</label>
        <select name="id_kegiatan">

            <?php while($k=mysqli_fetch_assoc($kegiatan)) { ?>
            <option value="<?= $k['id']; ?>"
            <?= ($k['id']==$row['id_kegiatan']) ? 'selected' : ''; ?>>
                <?= $k['kode']; ?> - <?= $k['uraian']; ?>
            </option>
            <?php } ?>

        </select>

        <label>Kode Output</label>
        <input type="text" name="kode" value="<?= $row['kode']; ?>">

        <label>Uraian Output</label>
        <input type="text" name="uraian" value="<?= $row['uraian']; ?>">

        <button type="submit" class="btn-main">
            UPDATE
        </button>

    </form>

</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>