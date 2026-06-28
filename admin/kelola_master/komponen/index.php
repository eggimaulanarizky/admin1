<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

/* ambil data sub output untuk pilihan */
$sub_output = mysqli_query($conn,"
SELECT sub_output.*, 
       output.kode AS kode_output,
       kegiatan.kode AS kode_kegiatan,
       program.kode AS kode_program
FROM sub_output
JOIN output ON sub_output.id_output = output.id
JOIN kegiatan ON output.id_kegiatan = kegiatan.id
JOIN program ON kegiatan.id_program = program.id
");

/* ambil data komponen */
$data = mysqli_query($conn,"
SELECT komponen.*, 
       sub_output.kode AS kode_sub_output,
       output.kode AS kode_output,
       kegiatan.kode AS kode_kegiatan,
       program.kode AS kode_program
FROM komponen
JOIN sub_output ON komponen.id_sub_output = sub_output.id
JOIN output ON sub_output.id_output = output.id
JOIN kegiatan ON output.id_kegiatan = kegiatan.id
JOIN program ON kegiatan.id_program = program.id
");
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
    <a href="../kelola_master.php" class="btn-main">MASTER ANGGARAN</a>
    <a href="tambah.php" class="btn-main">+ Tambah Komponen</a>
</div>

<table class="table">
<thead>
<tr>
    <th>No</th>
    <th>Kode Komponen</th>
    <th>Uraian Komponen</th>
    <th>Aksi</th>
</tr>
</thead>

        <tbody>
        <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?= $no++; ?></td>

                <td>
                    <?= $row['kode_program']; ?>.
                    <?= $row['kode_kegiatan']; ?>.
                    <?= $row['kode_output']; ?>.
                    <?= $row['kode_sub_output']; ?>.
                    <?= $row['kode']; ?>
                </td>

                <td><?= $row['uraian']; ?></td>

                <td class="aksi">
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <a href="hapus.php?id=<?= $row['id']; ?>" 
                       class="btn-hapus"
                       onclick="return confirm('Yakin hapus data?')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
</div>

<?php include '../../../components/admin/footer.php'; ?>