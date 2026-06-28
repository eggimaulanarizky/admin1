
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $conn,
    "DELETE FROM satuan WHERE id='$id'"
);

echo "
<script>
    alert('Data berhasil dihapus');
    window.location='index.php';
</script>";
?>
```
