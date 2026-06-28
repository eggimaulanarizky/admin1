<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$data = mysqli_query($conn,"
SELECT
    users.*,
    team.nama_team
FROM users
LEFT JOIN team
ON users.id_team = team.id
ORDER BY users.nama ASC
");
?>

<div class="content">

    <div class="card">

        <div class="card-header">

            <h2>PENGGUNA</h2>

            <div>
                <span class="badge">Admin</span>
                <button class="btn btn-gray" onclick="history.back()">
                    Kembali
                </button>
            </div>

        </div>

        <br>

        <a href="tambah.php" class="btn btn-primary">
            + Tambah Pengguna
        </a>

        <br><br>

        <table class="table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>Team</th>
                    <th>Kode</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th width="120">Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                while($d = mysqli_fetch_assoc($data)){
                ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $d['nama']; ?></td>

                    <td><?= $d['nama_team'] ?? '-'; ?></td>

                    <td><?= $d['kode'] ?? '-'; ?></td>

                    <td><?= $d['username']; ?></td>

                    <td><?= ucfirst($d['role']); ?></td>

                    <td>

                        <div class="aksi">

                            <a
                                href="edit.php?id=<?= $d['id']; ?>"
                                class="btn-edit"
                                title="Edit">

                                ✏️

                            </a>

                            <a
                                href="hapus.php?id=<?= $d['id']; ?>"
                                class="btn-hapus"
                                onclick="return confirm('Yakin ingin menghapus pengguna ini?')"
                                title="Hapus">

                                🗑️

                            </a>

                        </div>

                    </td>

                </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<?php include '../../components/admin/footer.php'; ?>