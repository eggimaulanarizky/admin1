
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

if (isset($_POST['simpan'])) {

    $judul = mysqli_real_escape_string(
        $conn,
        trim($_POST['judul'])
    );

    $kelompok = mysqli_real_escape_string(
        $conn,
        trim($_POST['kelompok'])
    );

    $nama_file = '';

    if (
        isset($_FILES['file_template']) &&
        $_FILES['file_template']['error'] == 0
    ) {

        // Folder upload
        $folder = __DIR__ . '/uploads/';

        // Buat folder jika belum ada
        if (!is_dir($folder)) {

            mkdir($folder, 0777, true);

        }

        // Nama file baru
        $nama_file = time() . '_' .
                      basename(
                          $_FILES['file_template']['name']
                      );

        // Upload file
        if (
            !move_uploaded_file(
                $_FILES['file_template']['tmp_name'],
                $folder . $nama_file
            )
        ) {

            die('Gagal upload file.');

        }

    }

    // Simpan ke database
    mysqli_query(
        $conn,
        "INSERT INTO template(
            judul,
            kelompok,
            file_template
        )
        VALUES(
            '$judul',
            '$kelompok',
            '$nama_file'
        )"
    );

    echo "
    <script>
        alert('Template berhasil ditambahkan');
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

                        <option value="">
                            Pilih Kelompok
                        </option>

                        <option value="Kontrak">
                            Kontrak
                        </option>

                        <option value="BAST">
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

                        Upload Template

                    </label>

                    <input type="file"
                           name="file_template"
                           accept=".html,.pdf,.doc,.docx"
                           required>

                </div>

                <div style="
                    width:700px;
                    display:flex;
                    justify-content:flex-end;
                ">

                    <button type="submit"
                            name="simpan"
                            class="btn-main">

                        SIMPAN

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
```
