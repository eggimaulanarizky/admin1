
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Ambil data template
    $query = mysqli_query(
        $conn,
        "SELECT * FROM template WHERE id='$id'"
    );

    $data = mysqli_fetch_assoc($query);

    // Hapus file template jika ada
    if (
        !empty($data['file_template']) &&
        file_exists(
            "uploads/" . $data['file_template']
        )
    ) {

        unlink(
            "uploads/" . $data['file_template']
        );

    }

    // Hapus data dari database
    $hapus = mysqli_query(
        $conn,
        "DELETE FROM template
         WHERE id='$id'"
    );

    if ($hapus) {

        echo "
        <script>
            alert('Template berhasil dihapus');
            window.location='index.php';
        </script>";

    } else {

        echo "
        <script>
            alert('Template gagal dihapus');
            window.location='index.php';
        </script>";

    }

} else {

    header('Location: index.php');
    exit;

}
?>

