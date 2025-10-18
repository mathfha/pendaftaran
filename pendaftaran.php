<?php
include 'koneksi.php';
$tgl = date('Y-m-d');
?>
<!doctype html>
<html>
<head>
    <title>Sistem Event Generasi Z</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="logo-perpustakaan-container">
                <img id="logo-perpustakaan" src="images/eventlogo.jpg" border="0" style="border:0; text-decoration:none; outline:none">
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
        <div id="header2"></div>
        <div id="sidebar">
            <a href="pendaftaran.php?p=beranda">Beranda</a>
            <p class="label-navigasi">Data Master</p>
            <ul>
                <li><a href="pendaftaran.php?p=publik_pendaftar">Informasi Event</a></li>
            </ul>
        </div>
        <div id="content-container">
            <div class="container">
                <div class="row">
                    <br/><br/><br/>
                    <div class="col-md-10 col-md-offset-1" style="background-image:url('images/eventlogo.jpg')">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="panel panel-warning login-panel" style="background-color:rgba(255, 255, 255, 0.6); position:relative;">
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
                    echo 'Halaman Tidak Ditemukan';
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
