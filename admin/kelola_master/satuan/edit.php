
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM satuan WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location='index.php';
    </script>";
    exit;
}

if (isset($_POST['update'])) {

    $nama_satuan = mysqli_real_escape_string(
        $conn,
        trim($_POST['nama_satuan'])
    );

    mysqli_query(
        $conn,
        "UPDATE satuan
         SET nama_satuan='$nama_satuan'
         WHERE id='$id'"
    );

    echo "
    <script>
        alert('Data berhasil diperbarui');
        window.location='index.php';
    </script>";
}
?>

<?php include '../../../components/admin/header.php'; ?>
<?php include '../../../components/admin/sidebar.php'; ?>

<div class="content kelola-master-page">

    <div class="master-container">

        <div class="master-header">

            <h2>MASTER SATUAN</h2>

            <div class="user-box">
                <i class="fas fa-user"></i>
                <?= $_SESSION['nama']; ?>
            </div>

        </div>

        <a href="index.php" class="btn-kembali">
            Kembali
        </a>

        <form method="POST">

            <div style="
                margin-top:120px;
                display:flex;
                justify-content:center;
                align-items:center;
                gap:20px;
            ">

                <label style="
                    font-weight:bold;
                    color:#444;
                ">
                    Satuan
                </label>

                <input
                    type="text"
                    name="nama_satuan"
                    value="<?= htmlspecialchars($data['nama_satuan']); ?>"
                    required
                    style="
                        width:350px;
                        padding:10px;
                        border:none;
                        border-radius:5px;
                        background:#5b8fa8;
                        color:white;
                    "
                >

            </div>

            <div style="
                margin-top:40px;
                display:flex;
                justify-content:center;
                margin-left:250px;
            ">

                <button
                    type="submit"
                    name="update"
                    style="
                        background:#4a4a4a;
                        color:white;
                        border:none;
                        padding:10px 20px;
                        border-radius:5px;
                        cursor:pointer;
                    "
                >
                    UPDATE
                </button>

            </div>

        </form>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
```
