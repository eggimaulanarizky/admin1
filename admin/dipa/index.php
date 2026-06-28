<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$data = mysqli_query($conn, "SELECT * FROM dipa");
?>

<div class="content">
<div class="card">

<div class="card-header">
    <h2>DIPA DAN PENGELOLA KEUANGAN</h2>
</div>

<br>

<a href="tambah.php" class="btn btn-primary">+ Tambah DIPA</a>

<br><br>

<table class="table">
<tr>
    <th>No</th>
    <th>No DIPA</th>
    <th>Tanggal</th>
    <th>KPA</th>
    <th>PPK</th>
    <th>Bendahara</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($d = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['no_dipa'] ?></td>
    <td><?= $d['tanggal'] ?></td>
    <td><?= $d['nama_kpa'] ?></td>
    <td><?= $d['nama_ppk'] ?></td>
    <td><?= $d['nama_bendahara'] ?></td>
    <td>

    <div class="aksi">

        <a href="edit.php?id=<?= $d['id'] ?>" class="btn-edit" title="Edit">
            <i class="fas fa-pen-to-square"></i>
        </a>

        <a href="hapus.php?id=<?= $d['id'] ?>"
           class="btn-hapus"
           title="Hapus"
           onclick="return confirm('Hapus data?')">
            <i class="fas fa-trash"></i>
        </a>

    </div>

</td>
    </td>
</tr>
<?php } ?>

</table>

</div>
</div>

<?php include '../../components/admin/footer.php'; ?>