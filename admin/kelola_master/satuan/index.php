<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
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

        <div class="master-top">
            <a href="tambah.php" class="btn-main">
                <i class="fas fa-plus-circle"></i>
                Tambah Satuan
            </a>

            <a href="../kelola_master.php" class="btn-kembali">
                Kembali
            </a>
        </div>

        <div style="margin-top: 40px;">

            <table class="table">

                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th>Nama Satuan</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    $query = mysqli_query(
                        $conn,
                        "SELECT * FROM satuan ORDER BY id DESC"
                    );

                    if (!$query) {
                        die("Error Query: " . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($query) > 0) :

                        while ($data = mysqli_fetch_assoc($query)) :
                    ?>

                            <tr>

                                <td><?= $no++; ?></td>

                                <td>
                                    <?= htmlspecialchars($data['nama_satuan']); ?>
                                </td>

                                <td>

                                    <div class="aksi">

                                        <a href="edit.php?id=<?= $data['id']; ?>"
                                           class="btn-edit"
                                           title="Edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <a href="hapus.php?id=<?= $data['id']; ?>"
                                           class="btn-hapus"
                                           title="Hapus"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">

                                            <i class="fas fa-trash"></i>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                    <?php
                        endwhile;

                    else :
                    ?>

                        <tr>

                            <td colspan="3"
                                style="text-align:center; padding:20px;">

                                Belum ada data satuan.

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
```
