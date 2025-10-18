<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
session_start();
if (isset($_SESSION['sesi'])) {
?>
<!doctype html>
<html>
<head>
    <title>Sistem Event Generasi Z</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="container">
    <div id="header">
        <div id="logo-perpustakaan-container">
            <img id="logo-perpustakaan" src="images/perpus-poliban-scaled.jpg" border="0" alt="Logo">
        </div>
        <div id="nama-alamat-perpustakaan-container">
            <div class="nama-alamat-perpustakaan">
                <h1>Sistem Event Generasi Z</h1>
            </div>
            <div class="nama-alamat-perpustakaan">
                <h4>Banjarmasin</h4>
            </div>
        </div>
    </div>
    <div id="header2">
        <div id="nama-user">Hai <?php echo $_SESSION['sesi']; ?>!</div>
    </div>
    <div id="sidebar">
        <a href="index.php?p=beranda">Beranda</a>
        <p class="label-navigasi">Data Master</p>
        <ul>
            <li><a href="index.php?p=pendaftar">Data Pendaftar</a></li>
            <li><a href="index.php?p=event">Data Event</a></li>
        </ul>
        <a href="logout.php">Logout</a>
    </div>
    <div id="content-container">
        <div class="container">
            <div class="row"><br/><br/><br/>
                <div class="col-md-10 col-md-offset-1" style="background-image:url('images/perpus-poliban-scaled.jpg')">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-warning login-panel"
                             style="background-color:rgba(255, 255, 255, 0.6);position:relative;">
                            <div class="panel-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    $pages_dir = 'pages';
    if (!empty($_GET['p'])) {
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]);

        $p = $_GET['p'];
        if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
        } else {
            echo '<p>Halaman Tidak Ditemukan</p>';
        }
    } else {
        include($pages_dir . '/beranda.php');
    }
?>
    </div>
    <div id="footer">
        <h3>Sistem Informasi Event</h3>
    </div>
</div>
</body>
</html>

<?php
} else {
    header('Location: login.php');
    exit;
}
?>
