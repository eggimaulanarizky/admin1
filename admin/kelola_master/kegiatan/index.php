<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
include '../../../components/admin/header.php';
include '../../../components/admin/sidebar.php';

$data = mysqli_query($conn,"
SELECT kegiatan.*, program.kode AS kode_program
FROM kegiatan
JOIN program ON kegiatan.id_program = program.id
");
?>

<div class="content kelola-master-page">
    <div class="master-container">

        <div class="master-header">
            <h2>KEGIATAN</h2>

            <div class="user-box">
                <?= $_SESSION['nama']; ?>
            </div>
        </div>

        <div class="master-top">
            <a href="../kelola_master.php" class="btn-main">MASTER ANGGARAN</a>
            <a href="tambah.php" class="btn-main">+ Tambah Kegiatan</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kegiatan</th>
                    <th>Uraian Kegiatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                   <td><?= $row['kode_program']; ?>.<?= $row['kode']; ?></td>
                    <td><?= $row['uraian']; ?></td>

                    <td class="aksi">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit">
                            <i class="fa-solid fa-pen-to-square"></i>
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