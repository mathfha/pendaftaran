<?php

$server = "localhost";
$user = "";
$password = "";
$nama_database = "pendaftaran";
$db = mysqli_connect($server, $user, $password, $nama_database);
if (!$db) {
    die("gagal terhubung dengan databse");
}
