<?php
session_start();
$_SESSION['sesi'] = null;

include "koneksi.php";

if (isset($_POST['submit'])) {
    $user = isset($_POST['user']) ? mysqli_real_escape_string($db, $_POST['user']) : "";
    $pass = isset($_POST['pass']) ? mysqli_real_escape_string($db, $_POST['pass']) : "";
    $sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";
    $qry = mysqli_query($db, $sql);

    if (!$qry) {
        die("Query error: " . mysqli_error($db));
    }
    $sesi = mysqli_num_rows($qry);

    if ($sesi === 1) {
        $data_admin = mysqli_fetch_array($qry);
        $_SESSION['id_admin'] = $data_admin['id_admin'];
        $_SESSION['sesi'] = $data_admin['nm_admin'];

        echo "<script>alert('Anda berhasil Log In');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?user=$user'>";
    } else {
        echo "<script>alert('Username atau password salah');</script>";
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    }
} else {
    include "login.php";
}
?>
