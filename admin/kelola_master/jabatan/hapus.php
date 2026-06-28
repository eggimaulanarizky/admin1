```php
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $hapus = mysqli_query(
        $conn,
        "DELETE FROM jabatan WHERE id='$id'"
    );

    if ($hapus) {

        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='index.php';
        </script>";

    } else {

        echo "
        <script>
            alert('Data gagal dihapus');
            window.location='index.php';
        </script>";
    }

} else {

    header('Location: index.php');
    exit;
}
?>
```
