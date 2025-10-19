<?php
include '../koneksi.php';

$id_pendaftar = $_GET['id'];
$query = "
    DELETE FROM pendaftar
    WHERE id_pendaftar = '$id_pendaftar'
";
mysqli_query($db, $query);
header("Location: ../index.php?p=pendaftar");
exit();
?>
