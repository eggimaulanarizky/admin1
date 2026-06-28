<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';
?>

<div class="content">

    <div class="card">

        <div class="card-header">
            <h2>TAMBAH PENGGUNA</h2>
        </div>

        <br>

        <form action="simpan.php" method="POST" class="user-form">

            <!-- Nama -->
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <!-- Team & Kode -->
            <div class="row">

                <div class="form-group flex2">

                    <label>Team</label>

                    <select name="id_team" required>

                        <option value="">Pilih Team</option>

                        <?php
                        $team = mysqli_query($conn,"SELECT * FROM team ORDER BY nama_team ASC");

                        while($t=mysqli_fetch_assoc($team)){
                        ?>

                        <option value="<?= $t['id']; ?>">

                            <?= $t['nama_team']; ?>

                        </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="form-group flex1">

                    <label>Kode</label>

                    <input
                        type="text"
                        name="kode"
                        maxlength="2"
                        placeholder="Kode"
                        required>

                </div>

            </div>

            <!-- Username -->
            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    required>

            </div>

            <!-- Password -->
            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required>

            </div>

            <!-- Role -->
            <div class="form-group">

                <label>Role</label>

                <select name="role">

                    <option value="admin">Admin</option>

                    <option value="user">User</option>

                </select>

            </div>

            <div class="btn-right">

                <button type="submit" class="btn btn-primary">
                    SIMPAN
                </button>

            </div>

        </form>

    </div>

</div>

<?php include '../../components/admin/footer.php'; ?>