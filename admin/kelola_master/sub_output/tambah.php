<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$output = mysqli_query($conn,"
SELECT output.*,
       output.kode AS kode_output,
       output.uraian AS uraian_output,
       kegiatan.kode AS kode_kegiatan,
       kegiatan.uraian AS uraian_kegiatan,
       program.kode AS kode_program,
       program.uraian AS uraian_program
FROM output
JOIN kegiatan ON output.id_kegiatan = kegiatan.id
JOIN program ON kegiatan.id_program = program.id
LIMIT 1
");

$row = mysqli_fetch_assoc($output);
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
                    SUB OUTPUT
                </a>

            </div>

            <a href="index.php" class="btn-kembali">
                Kembali
            </a>

        </div>

        <form action="simpan.php" method="POST">

            <input
                type="hidden"
                name="id_output"
                value="<?= $row['id']; ?>"
            >

            <!-- PILIH -->
            <div class="pilih-box">

                <h3>Pilih</h3>

                <div class="form-row">

                    <label>Program</label>

                    <input
                        type="text"
                        class="kode-box"
                        value="<?= $row['kode_program']; ?>"
                        readonly
                    >

                    <input
                        type="text"
                        class="uraian-box"
                        value="<?= $row['uraian_program']; ?>"
                        readonly
                    >

                </div>

                <div class="form-row">

                    <label>Kegiatan</label>

                    <input
                        type="text"
                        class="kode-box"
                        value="<?= $row['kode_kegiatan']; ?>"
                        readonly
                    >

                    <input
                        type="text"
                        class="uraian-box"
                        value="<?= $row['uraian_kegiatan']; ?>"
                        readonly
                    >

                </div>

                <div class="form-row">

                    <label>Output</label>

                    <input
                        type="text"
                        class="kode-box"
                        value="<?= $row['kode_output']; ?>"
                        readonly
                    >

                    <input
                        type="text"
                        class="uraian-box"
                        value="<?= $row['uraian_output']; ?>"
                        readonly
                    >

                </div>

            </div>

            <!-- TAMBAH -->
            <div class="tambah-box">

                <h3>Tambah Sub Output</h3>

                <div class="form-row">

                    <label>Kode Sub Output</label>

                    <input
                        type="text"
                        name="kode_sub_output"
                        class="kode-box"
                        required
                    >

                </div>

                <div class="form-row">

                    <label>Uraian Sub Output</label>

                    <input
                        type="text"
                        name="uraian_sub_output"
                        class="uraian-box"
                        required
                    >

                </div>

                <button
                    type="submit"
                    class="btn-simpan">
                    SIMPAN
                </button>

            </div>

        </form>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>