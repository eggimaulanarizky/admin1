
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

if(isset($_POST['simpan'])){

    $nama_team = mysqli_real_escape_string(
        $conn,
        $_POST['nama_team']
    );

    $kode_team = mysqli_real_escape_string(
        $conn,
        $_POST['kode_team']
    );

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM team
         WHERE nama_team='$nama_team'
         OR kode_team='$kode_team'"
    );

    if(mysqli_num_rows($cek) > 0){

        echo "
        <script>
            alert('Nama Team atau Kode Team sudah ada!');
        </script>";

    }else{

        mysqli_query(
            $conn,
            "INSERT INTO team(
                nama_team,
                kode_team
            )
            VALUES(
                '$nama_team',
                '$kode_team'
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

            <h2>MASTER TEAM</h2>

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
        margin-top: 120px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 25px;
    ">

        <!-- Nama Team -->
        <div style="
            display: flex;
            align-items: center;
            width: 600px;
        ">

            <label style="
                width: 150px;
                font-weight: bold;
                font-size: 16px;
                color: #333;
            ">
                Nama Team
            </label>

            <input
                type="text"
                name="nama_team"
                required
                style="
                    flex: 1;
                    padding: 12px 15px;
                    border: none;
                    border-radius: 6px;
                    background: #5b8fa8;
                    color: white;
                    box-sizing: border-box;
                "
            >

        </div>

        <!-- Kode Team -->
        <div style="
            display: flex;
            align-items: center;
            width: 600px;
        ">

            <label style="
                width: 150px;
                font-weight: bold;
                font-size: 16px;
                color: #333;
            ">
                Kode Team
            </label>

            <input
                type="text"
                name="kode_team"
                required
                style="
                    width: 120px;
                    padding: 12px 15px;
                    border: none;
                    border-radius: 6px;
                    background: #5b8fa8;
                    color: white;
                    box-sizing: border-box;
                "
            >

        </div>

        <!-- Tombol Simpan -->
        <div style="
            width: 600px;
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        ">

            <button
                type="submit"
                name="simpan"
                style="
                    background: #4a4a4a;
                    color: white;
                    border: none;
                    padding: 12px 25px;
                    border-radius: 8px;
                    cursor: pointer;
                    font-weight: bold;
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
```
