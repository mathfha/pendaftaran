<?php

$server = "localhost";
$user = "adit";
$password = "24434";
$nama_database = "pendaftaran";
$db = mysqli_connect($server, $user, $password, $nama_database);
if (!$db) {
    die("gagal terhubung dengan databse");
}