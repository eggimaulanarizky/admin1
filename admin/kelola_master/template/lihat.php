
<?php
include '../../../config/auth_admin.php';
include '../../../config/koneksi.php';

if (!isset($_GET['id'])) {

    die("ID template tidak ditemukan.");

}

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM template
     WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {

    die("Data template tidak ditemukan.");

}

/*
|--------------------------------------------------------------------------
| PATH FILE TEMPLATE
|--------------------------------------------------------------------------
*/

$file = __DIR__ . '/uploads/' . $data['file_template'];

if (!file_exists($file)) {

    die(
        "File template tidak ditemukan.<br><br>" .
        "Path yang dicari:<br>" .
        $file
    );

}

$ekstensi = strtolower(
    pathinfo($file, PATHINFO_EXTENSION)
);

switch ($ekstensi) {

    case 'html':

        header("Content-Type: text/html");
        readfile($file);
        break;

    case 'pdf':

        header("Content-Type: application/pdf");

        header(
            'Content-Disposition: inline; filename="' .
            basename($file) .
            '"'
        );

        readfile($file);
        break;

    default:

        header(
            'Content-Disposition: attachment; filename="' .
            basename($file) .
            '"'
        );

        readfile($file);

}

exit;
?>
