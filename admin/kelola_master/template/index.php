
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';
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

        <div class="master-top">

            <a href="tambah.php" class="btn-main">
                <i class="fas fa-plus-circle"></i>
                Tambah Template
            </a>

            <a href="../kelola_master.php"
               class="btn-kembali">

                Kembali

            </a>

        </div>

        <div style="margin-top:30px;">

            <table class="table">

                <thead>

                    <tr>

                        <th style="width:8%;">
                            No
                        </th>

                        <th style="width:35%;">
                            Judul Template
                        </th>

                        <th style="width:20%;">
                            Kelompok Template
                        </th>

                        <th style="width:17%;">
                            Lihat Template
                        </th>

                        <th style="width:20%;">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    $no = 1;

                    $query = mysqli_query(
                        $conn,
                        "SELECT * FROM template
                         ORDER BY id DESC"
                    );

                    if (mysqli_num_rows($query) > 0) :

                        while ($data = mysqli_fetch_assoc($query)) :
                    ?>

                    <tr>

                        <td style="text-align:center;">
                            <?= $no++; ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($data['judul']); ?>
                        </td>

                        <td style="text-align:center;">
                            <?= htmlspecialchars($data['kelompok']); ?>
                        </td>

                        <td style="text-align:center;">

                            <?php if (!empty($data['file_template'])) : ?>

                                <a href="lihat.php?id=<?= $data['id']; ?>"
                                   target="_blank"
                                   class="btn-edit"
                                   title="Lihat Template">

                                    <i class="fas fa-eye"></i>

                                </a>

                            <?php endif; ?>

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
                                   onclick="return confirm('Yakin ingin menghapus template ini?')">

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

                        <td colspan="5"
                            style="
                                text-align:center;
                                padding:25px;
                            ">

                            Belum ada data template.

                        </td>

                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php include '../../../components/admin/footer.php'; ?>
