<?php
include '../config/auth_admin.php'; // 🔥 proteksi admin
include '../config/koneksi.php';

// HITUNG DATA
$user = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$peserta = mysqli_query($conn, "SELECT COUNT(*) as total FROM peserta");

$data_user = mysqli_fetch_assoc($user);
$data_peserta = mysqli_fetch_assoc($peserta);
?>

<?php include '../components/admin/header.php'; ?>
<?php include '../components/admin/sidebar.php'; ?>

<div class="content">

    <div class="card">

        <div class="card-header">
            <h2>DASHBOARD ADMIN</h2>

            <div style="display:flex; gap:10px; align-items:center;">
                <span class="badge">
                    <?= $_SESSION['nama']; ?> (Admin)
                </span>

                <a href="../logout.php" class="btn btn-gray">← Kembali</a>
            </div>
        </div>

        <br>

        <p>Selamat datang di <b>KONSTANTA</b> 👋</p>

        <!-- CARD STATISTIK -->
        <div class="dashboard-cards">

            <div class="card-box">
                <h3>Total User</h3>
                <p><?= $data_user['total']; ?></p>
            </div>

            <div class="card-box">
                <h3>Total Peserta</h3>
                <p><?= $data_peserta['total']; ?></p>
            </div>

            <div class="card-box">
                <h3>Total Kontrak</h3>
                <p>0</p> <!-- nanti kita sambung ke tabel kontrak -->
            </div>

        </div>

    </div>

</div>

<?php include '../components/admin/footer.php'; ?>