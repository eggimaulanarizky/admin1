<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$program = mysqli_query($conn,"SELECT * FROM program LIMIT 1");
$row = mysqli_fetch_assoc($program);
?>

<div class="content kelola-master-page">
    <div class="master-container">

        <!-- HEADER -->
        <div class="master-header">
            <h2>KELOLA MASTER</h2>

            <div class="user-box">
                👤 <?= $_SESSION['nama']; ?>
            </div>
        </div>

        <!-- MENU -->
        <div class="master-top">

            <div class="left-btn">
                <a href="../kelola_master.php" class="btn-main">
                    MASTER ANGGARAN
                </a>

                <a href="index.php" class="btn-main active">
                    KEGIATAN
                </a>
            </div>

            <a href="index.php" class="btn-kembali">
                Kembali
            </a>

        </div>

        <form action="simpan.php" method="POST">

            <!-- PILIH -->
            <div class="pilih-box">

                <h3>Pilih</h3>

                <div class="form-row">

                    <label>Program</label>

                    <input
                        type="hidden"
                        name="id_program"
                        value="<?= $row['id']; ?>"
                    >

                    <input
                        type="text"
                        class="kode-box"
                        value="<?= $row['kode']; ?>"
                        readonly
                    >

                    <input
                        type="text"
                        class="uraian-box"
                        value="<?= $row['uraian']; ?>"
                        readonly
                    >

                </div>

            </div>

            <!-- TAMBAH -->
            <div class="tambah-box">

                <h3>Tambah Kegiatan</h3>

                <div class="form-row">

                    <label>Kode Kegiatan</label>

                    <input
                        type="text"
                        name="kode_kegiatan"
                        class="kode-box"
                        required
                    >

                </div>

                <div class="form-row">

                    <label>Uraian Kegiatan</label>

                    <input
                        type="text"
                        name="uraian_kegiatan"
                        class="uraian-box"
                        required
                    >

                </div>

                <button type="submit" class="btn-simpan">
                    SIMPAN
                </button>

            </div>

        </form>

    </div>
</div>

<?php include '../../../components/admin/footer.php'; ?>