<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM kegiatan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

$program = mysqli_query($conn,"SELECT * FROM program");
?>

<div class="content kelola-master-page">
    <div class="master-container">

        <h2>EDIT KEGIATAN</h2>

        <form action="update.php" method="POST" class="form">

            <input type="hidden" name="id" value="<?= $row['id']; ?>">

            <select name="id_program">
                <?php while($p=mysqli_fetch_assoc($program)) { ?>
                <option value="<?= $p['id']; ?>"
                <?= ($p['id']==$row['id_program']) ? 'selected' : ''; ?>>
                    <?= $p['kode']; ?> - <?= $p['uraian']; ?>
                </option>
                <?php } ?>
            </select>

            <input type="text" name="kode" value="<?= $row['kode']; ?>">
            <input type="text" name="uraian" value="<?= $row['uraian']; ?>">

            <button type="submit" class="btn-main">UPDATE</button>

        </form>

    </div>
</div>

<?php include '../../../components/admin/footer.php'; ?>