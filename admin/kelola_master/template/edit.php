
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM template WHERE id='$id'"
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

    $judul = mysqli_real_escape_string(
        $conn,
        trim($_POST['judul'])
    );

    $kelompok = mysqli_real_escape_string(
        $conn,
        trim($_POST['kelompok'])
    );

    // Jika upload file baru
    if (
        isset($_FILES['file_template']) &&
        $_FILES['file_template']['error'] == 0
    ) {

        // Hapus file lama
        if (
            !empty($data['file_template']) &&
            file_exists(
                "uploads/" . $data['file_template']
            )
        ) {
            unlink(
                "uploads/" . $data['file_template']
            );
        }

        // Upload file baru
        $nama_file = time() . "_" .
                      $_FILES['file_template']['name'];

        move_uploaded_file(
            $_FILES['file_template']['tmp_name'],
            "uploads/" . $nama_file
        );

        mysqli_query(
            $conn,
            "UPDATE template
             SET judul='$judul',
                 kelompok='$kelompok',
                 file_template='$nama_file'
             WHERE id='$id'"
        );

    } else {

        mysqli_query(
            $conn,
            "UPDATE template
             SET judul='$judul',
                 kelompok='$kelompok'
             WHERE id='$id'"
        );

    }

    echo "
    <script>
        alert('Template berhasil diperbarui');
        window.location='index.php';
    </script>";
}
?>

<?php include '../../../components/admin/header.php'; ?>
<?php include '../../../components/admin/sidebar.php'; ?>

<div class="content kelola-master-page">

    <div class="master-container">

        <div class="master-header">

            <h2>MASTER TEMPLATE</h2>

            <div class="user-box">
                <i class="fas fa-user"></i>
                <?= $_SESSION['nama']; ?>
            </div>

        </div>

        <a href="index.php"
           class="btn-kembali">

            Kembali

        </a>

        <form method="POST"
              enctype="multipart/form-data">

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
                    width:700px;
                ">

                    <label style="
                        width:200px;
                        font-weight:bold;
                    ">
                        Judul Template
                    </label>

                    <input type="text"
                           name="judul"
                           value="<?= htmlspecialchars($data['judul']); ?>"
                           required
                           style="
                               flex:1;
                               padding:12px;
                               border:none;
                               border-radius:8px;
                               background:#5b8fa8;
                               color:white;
                           ">

                </div>

                <div style="
                    display:flex;
                    align-items:center;
                    width:700px;
                ">

                    <label style="
                        width:200px;
                        font-weight:bold;
                    ">
                        Kelompok Template
                    </label>

                    <select name="kelompok"
                            required
                            style="
                                width:200px;
                                padding:12px;
                                border:none;
                                border-radius:8px;
                                background:#5b8fa8;
                                color:white;
                            ">

                        <option value="Kontrak"
                            <?= ($data['kelompok'] == 'Kontrak') ? 'selected' : ''; ?>>

                            Kontrak

                        </option>

                        <option value="BAST"
                            <?= ($data['kelompok'] == 'BAST') ? 'selected' : ''; ?>>

                            BAST

                        </option>

                    </select>

                </div>

                <div style="
                    display:flex;
                    align-items:center;
                    width:700px;
                ">

                    <label style="
                        width:200px;
                        font-weight:bold;
                    ">
                        Ganti Template
                    </label>

                    <input type="file"
                           name="file_template"
                           accept=".html">

                </div>

                <div style="
                    width:700px;
                    display:flex;
                    justify-content:flex-end;
                ">

                    <button type="submit"
                            name="update"
                            class="btn-main">

                        UPDATE

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
