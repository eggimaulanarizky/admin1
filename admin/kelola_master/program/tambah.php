<?php
include '../../../config/auth_admin.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';
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
                    PROGRAM
                </a>
            </div>

            <a href="index.php" class="btn-kembali">
                Kembali
            </a>

        </div>

        <!-- FORM -->
        <form action="simpan.php" method="POST">

            <div class="tambah-box">

                <div class="form-row">
                    <label>Kode Program</label>

                    <input
                        type="text"
                        name="kode_program"
                        class="kode-box"
                        required
                    >
                </div>

                <div class="form-row">
                    <label>Uraian Program</label>

                    <input
                        type="text"
                        name="uraian_program"
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