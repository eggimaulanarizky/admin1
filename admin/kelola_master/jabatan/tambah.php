
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

if(isset($_POST['simpan'])){

    $nama_jabatan = mysqli_real_escape_string(
        $conn,
        trim($_POST['nama_jabatan'])
    );

    $singkatan = mysqli_real_escape_string(
        $conn,
        trim($_POST['singkatan'])
    );

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM jabatan
         WHERE nama_jabatan='$nama_jabatan'
         OR singkatan='$singkatan'"
    );

    if(mysqli_num_rows($cek) > 0){

        echo "
        <script>
            alert('Data jabatan sudah ada!');
        </script>";

    }else{

        mysqli_query(
            $conn,
            "INSERT INTO jabatan(
                nama_jabatan,
                singkatan
            )
            VALUES(
                '$nama_jabatan',
                '$singkatan'
            )"
        );

        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location='index.php';
        </script>";
    }
}
?>

<?php include '../../../components/admin/header.php'; ?>
<?php include '../../../components/admin/sidebar.php'; ?>

<div class="content kelola-master-page">

    <div class="master-container">

        <div class="master-header">

            <h2>MASTER JABATAN PADA KEGIATAN</h2>

            <div class="user-box">
                <i class="fas fa-user"></i>
                <?= $_SESSION['nama']; ?>
            </div>

        </div>

        <a href="index.php"
           class="btn-kembali">

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
                    width:700px;
                ">

                    <label style="
                        width:250px;
                        font-weight:bold;
                    ">

                        Nama Jabatan Pada Kegiatan

                    </label>

                    <input
                        type="text"
                        name="nama_jabatan"
                        required
                        style="
                            flex:1;
                            padding:12px;
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
                    width:700px;
                ">

                    <label style="
                        width:250px;
                        font-weight:bold;
                    ">

                        Singkatan Jabatan Pada Kegiatan

                    </label>

                    <input
                        type="text"
                        name="singkatan"
                        required
                        style="
                            width:120px;
                            padding:12px;
                            border:none;
                            border-radius:8px;
                            background:#5b8fa8;
                            color:white;
                        "
                    >

                </div>

                <div style="
                    width:700px;
                    display:flex;
                    justify-content:flex-end;
                ">

                    <button
                        type="submit"
                        name="simpan"
                        style="
                            background:#4a4a4a;
                            color:white;
                            border:none;
                            padding:12px 25px;
                            border-radius:8px;
                            cursor:pointer;
                            font-weight:bold;
                        "
                    >

                        SIMPAN

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
