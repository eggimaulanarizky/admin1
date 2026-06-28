<?php
include '../../config/auth_admin.php';
?>

<?php include '../../components/admin/header.php'; ?>
<?php include '../../components/admin/sidebar.php'; ?>

<div class="content kelola-master-page">

    <div class="master-container">

        <!-- HEADER -->
        <div class="master-header">
            <h2>KELOLA MASTER</h2>

            <div class="user-box">
                👤 <?= $_SESSION['nama']; ?>
            </div>
        </div>

        <!-- ATAS -->
        <div class="master-top">
            <button class="btn-main">MASTER ANGGARAN</button>
            <a href="../dashboard.php" class="btn-back">Kembali</a>
        </div>

        <!-- MENU -->
        <div class="master-menu">
        <a href="program/index.php" class="btn-main">PROGRAM</a>
        <a href="kegiatan/index.php" class="btn-main">KEGIATAN</a>
        <a href="output/index.php" class="btn-main">OUTPUT</a>
        <a href="sub_output/index.php" class="btn-main">SUB OUTPUT</a>
        <a href="komponen/index.php" class="btn-main">KOMPONEN</a>
        <a href="sub_komponen/index.php" class="btn-main">SUB KOMPONEN</a>
        <a href="akun/index.php" class="btn-main">AKUN</a>
        <a href="detil/index.php" class="btn-main">DETIL</a>
        </div>
        
    </div>

</div>

<?php include '../../components/admin/footer.php'; ?>