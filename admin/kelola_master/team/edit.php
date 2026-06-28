
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM team WHERE id='$id'"
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

    $nama_team = mysqli_real_escape_string(
        $conn,
        trim($_POST['nama_team'])
    );

    $kode_team = mysqli_real_escape_string(
        $conn,
        trim($_POST['kode_team'])
    );

    mysqli_query(
        $conn,
        "UPDATE team
         SET nama_team='$nama_team',
             kode_team='$kode_team'
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

            <h2>MASTER TEAM</h2>

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
                margin-top:100px;
                display:flex;
                flex-direction:column;
                align-items:center;
                gap:30px;
            ">

                <div style="
                    display:flex;
                    align-items:center;
                    width:650px;
                ">

                    <label style="
                        width:170px;
                        font-size:18px;
                        font-weight:bold;
                    ">
                        Nama Team
                    </label>

                    <input
                        type="text"
                        name="nama_team"
                        value="<?= htmlspecialchars($data['nama_team']); ?>"
                        required
                        style="
                            flex:1;
                            padding:12px 15px;
                            border:none;
                            border-radius:8px;
                            background:#5b8fa8;
                            color:white;
                        "
                    >

                </div>

                <div style="
                    display:flex;
                    align-items:center;
                    width:650px;
                ">

                    <label style="
                        width:170px;
                        font-size:18px;
                        font-weight:bold;
                    ">
                        Kode Team
                    </label>

                    <input
                        type="text"
                        name="kode_team"
                        value="<?= htmlspecialchars($data['kode_team']); ?>"
                        required
                        style="
                            width:120px;
                            padding:12px 15px;
                            border:none;
                            border-radius:8px;
                            background:#5b8fa8;
                            color:white;
                        "
                    >

                </div>

                <div style="
                    width:650px;
                    display:flex;
                    justify-content:flex-end;
                ">

                    <button
                        type="submit"
                        name="update"
                        style="
                            background:#4a4a4a;
                            color:white;
                            border:none;
                            padding:12px 28px;
                            border-radius:8px;
                            cursor:pointer;
                            font-weight:bold;
                        "
                    >
                        UPDATE
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
```
