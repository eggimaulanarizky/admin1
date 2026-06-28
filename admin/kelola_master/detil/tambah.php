<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$akun = mysqli_query($conn,"
SELECT akun.*,
       sub_komponen.kode AS kode_sub_komponen,
       sub_komponen.uraian AS uraian_sub_komponen,
       komponen.kode AS kode_komponen,
       komponen.uraian AS uraian_komponen,
       sub_output.kode AS kode_sub_output,
       sub_output.uraian AS uraian_sub_output,
       output.kode AS kode_output,
       output.uraian AS uraian_output,
       kegiatan.kode AS kode_kegiatan,
       kegiatan.uraian AS uraian_kegiatan,
       program.kode AS kode_program,
       program.uraian AS uraian_program
FROM akun
JOIN sub_komponen ON akun.id_sub_komponen=sub_komponen.id
JOIN komponen ON sub_komponen.id_komponen=komponen.id
JOIN sub_output ON komponen.id_sub_output=sub_output.id
JOIN output ON sub_output.id_output=output.id
JOIN kegiatan ON output.id_kegiatan=kegiatan.id
JOIN program ON kegiatan.id_program=program.id
LIMIT 1
");

$row=mysqli_fetch_assoc($akun);
?>

<div class="content kelola-master-page">
<div class="master-container">

<div class="master-header">
<h2>KELOLA MASTER</h2>

<div class="user-box">
<?= $_SESSION['nama']; ?>
</div>
</div>
<div class="master-top">

    <div class="left-btn">
        <a href="../kelola_master.php" class="btn-main">
            MASTER ANGGARAN
        </a>

        <a href="index.php" class="btn-main active">
            DETIL
        </a>
    </div>

    <a href="index.php" class="btn-kembali">
        Kembali
    </a>

</div>

<form action="simpan.php"
method="POST">

<input type="hidden"
name="id_akun"
value="<?= $row['id']; ?>">

<div class="pilih-box">

<h3>Pilih</h3>

<div class="form-row">
<label>Program</label>
<input type="text" class="kode-box"
value="<?= $row['kode_program']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian_program']; ?>" readonly>
</div>

<div class="form-row">
<label>Kegiatan</label>
<input type="text" class="kode-box"
value="<?= $row['kode_kegiatan']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian_kegiatan']; ?>" readonly>
</div>

<div class="form-row">
<label>Output</label>
<input type="text" class="kode-box"
value="<?= $row['kode_output']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian_output']; ?>" readonly>
</div>

<div class="form-row">
<label>Sub Output</label>
<input type="text" class="kode-box"
value="<?= $row['kode_sub_output']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian_sub_output']; ?>" readonly>
</div>

<div class="form-row">
<label>Komponen</label>
<input type="text" class="kode-box"
value="<?= $row['kode_komponen']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian_komponen']; ?>" readonly>
</div>

<div class="form-row">
<label>Sub Komponen</label>
<input type="text" class="kode-box"
value="<?= $row['kode_sub_komponen']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian_sub_komponen']; ?>" readonly>
</div>

<div class="form-row">
<label>Akun</label>
<input type="text" class="kode-box"
value="<?= $row['kode']; ?>" readonly>

<input type="text" class="uraian-box"
value="<?= $row['uraian']; ?>" readonly>
</div>

</div>

<div class="tambah-box">

<h3>Tambah Detil</h3>

<div class="form-row">
<label>Kode Detil</label>
<input type="text"
class="kode-box"
name="kode"
required>
</div>

<div class="form-row">
<label>Uraian Detil</label>
<input type="text"
class="uraian-box"
name="uraian"
required>
</div>

<button type="submit"
class="btn-simpan">
SIMPAN
</button>

</div>

</form>
</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>