<?php
include '../koneksi.php';

$id_event         = $_POST['id_event'];
$nama_event       = $_POST['nama_event'];
$tanggal_event    = $_POST['tanggal_event'];
$informasi_event  = $_POST['informasi_event'];

if (isset($_POST['simpan'])) {
    $sql = "INSERT INTO event (id_event, nama_event, tanggal_event, informasi_event)
            VALUES ('$id_event', '$nama_event', '$tanggal_event', '$informasi_event')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header("Location: ../index.php?p=event");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($db);
    }
}
?>
