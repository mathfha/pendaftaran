<?php
include '../koneksi.php';

$id_pendaftar   = $_POST['id_pendaftar'];
$nama           = $_POST['nama'];
$email          = $_POST['email'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$alamat         = $_POST['alamat'];
$id_event       = $_POST['id_event'];

if (isset($_POST['simpan'])) {
    $query = "
        UPDATE pendaftar SET
            nama            = '$nama',
            email           = '$email',
            tanggal_lahir   = '$tanggal_lahir',
            alamat          = '$alamat',
            id_event        = '$id_event'
        WHERE id_pendaftar = '$id_pendaftar'
    ";
    mysqli_query($db, $query);
    header("Location: ../index.php?p=pendaftar");
    exit();
}
?>
