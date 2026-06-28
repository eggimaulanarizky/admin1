<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM program WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<div class="content kelola-master-page">
    <div class="master-container">

        <div class="master-header">
            <h2>EDIT PROGRAM</h2>
        </div>

        <div class="master-top">
            <a href="index.php" class="btn-main">Kembali</a>
        </div>

        <form action="update.php" method="POST">

            <input type="hidden" name="id" value="<?= $row['id']; ?>">

            <label>Kode Program</label>
            <input type="text" name="kode" value="<?= $row['kode']; ?>" required>

            <label>Uraian Program</label>
            <input type="text" name="uraian" value="<?= $row['uraian']; ?>" required>

            <br><br>

            <button type="submit" class="btn-main">
                UPDATE
            </button>

        </form>

    </div>
</div>

<?php include '../../../components/admin/footer.php'; ?>