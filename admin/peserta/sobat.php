<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$data = mysqli_query($conn, "SELECT * FROM peserta WHERE jenis='sobat'");
?>

<div class="content">
<div class="card">

<h2>PETUGAS - MITRA SOBAT</h2>

<a href="tambah.php?jenis=sobat" class="btn btn-primary">+ Tambah</a>

<br><br>

<table class="table">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIP</th>
    <th>Kecamatan</th>
    <th>Kelurahan</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($d=mysqli_fetch_assoc($data)) { ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $d['nama'] ?></td>
<td><?= $d['nip'] ?></td>
<td><?= $d['kecamatan'] ?></td>
<td><?= $d['kelurahan'] ?></td>
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
</tr>
<?php } ?>

</table>

</div>
</div>