<?php
include '../koneksi.php';

$id_event = $_POST['id_event'];
$nama_event = $_POST['nama_event'];
$tanggal_event = $_POST['tanggal_event'];
$informasi_event = $_POST['informasi_event'];

if (isset($_POST['simpan'])) {
    $sql = "UPDATE event 
            SET nama_event = '$nama_event',
                tanggal_event = '$tanggal_event',
                informasi_event = '$informasi_event'
            WHERE id_event = '$id_event'";

    mysqli_query($db, $sql);
    header("location:../index.php?p=event");
}
?>
