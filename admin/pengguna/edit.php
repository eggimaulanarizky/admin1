<?php
include '../../config/koneksi.php';
include '../../components/admin/header.php';
include '../../components/admin/sidebar.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"
SELECT *
FROM users
WHERE id='$id'
");

$d = mysqli_fetch_assoc($data);
?>

<div class="content">

    <div class="card">

        <div class="card-header">
            <h2>EDIT PENGGUNA</h2>
        </div>

        <br>

        <form action="update.php" method="POST" class="user-form">

            <input type="hidden" name="id" value="<?= $d['id']; ?>">

            <!-- Nama -->
            <div class="form-group">
                <label>Nama</label>
                <input
                    type="text"
                    name="nama"
                    value="<?= $d['nama']; ?>"
                    required>
            </div>

            <!-- Team & Kode -->
            <div class="row">

                <div class="form-group flex2">

                    <label>Team</label>

                    <select name="id_team" required>

                        <?php
                        $team = mysqli_query($conn,"
                        SELECT * FROM team
                        ORDER BY nama_team ASC
                        ");

                        while($t=mysqli_fetch_assoc($team)){

                            $selected = ($t['id']==$d['id_team']) ? "selected" : "";
                        ?>

                        <option
                            value="<?= $t['id']; ?>"
                            <?= $selected; ?>>

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
                        value="<?= $d['kode']; ?>"
                        maxlength="2"
                        required>

                </div>

            </div>

            <!-- Username -->
            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    value="<?= $d['username']; ?>"
                    required>

            </div>

            <!-- Password -->
            <div class="form-group">

                <label>Password</label>

                <input
                    type="text"
                    name="password"
                    value="<?= $d['password']; ?>"
                    required>

            </div>

            <!-- Role -->
            <div class="form-group">

                <label>Role</label>

                <select name="role">

                    <option
                        value="admin"
                        <?= ($d['role']=="admin") ? "selected" : ""; ?>>
                        Admin
                    </option>

                    <option
                        value="user"
                        <?= ($d['role']=="user") ? "selected" : ""; ?>>
                        User
                    </option>

                </select>

            </div>

            <div class="btn-right">

                <button type="submit" class="btn btn-primary">
                    UPDATE
                </button>

            </div>

        </form>

    </div>

</div>

<?php include '../../components/admin/footer.php'; ?>