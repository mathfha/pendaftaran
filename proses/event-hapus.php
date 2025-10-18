<?php
include '../koneksi.php';

$id_event = $_GET['id'];

$sql = "DELETE FROM event WHERE id_event = '$id_event'";
mysqli_query($db, $sql);

header("location: ../index.php?p=event");
?>
