<?php
include '../koneksi.php';

$id_pendaftar    = $_POST['id_pendaftar'];
$nama            = $_POST['nama'];
$email           = $_POST['email'];
$tanggal_lahir   = $_POST['tanggal_lahir'];
$alamat          = $_POST['alamat'];
$id_event        = $_POST['id_event'];

if(isset($_POST['simpan'])){
        extract($_POST);
    $sql =
    "INSERT INTO pendaftar
        VALUES('$id_pendaftar','$nama','$email','$tanggal_lahir','$alamat', '$id_event')";
    $query = mysqli_query($db, $sql);
    header("location:../index.php?p=pendaftar");
}
?>