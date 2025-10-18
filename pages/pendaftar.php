<div id="label-page">
    <h3>Tampil Data Pendaftar</h3>
</div>

<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=pendaftar-input" class="tombol">Tambah Pendaftar</a>
        <div align="right">
            <form method="post">
                <input type="text" name="pencarian" placeholder="Cari...">
                <input type="submit" name="search" value="Search" class="tombol">
            </form>
        </div>
    </p>

    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Pendaftar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Nama Event</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $batas = 5;
        $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
        $posisi = ($hal - 1) * $batas;
        $nomor = $posisi + 1;

        $pencarian = '';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
            if ($pencarian != "") {
                $sql = "SELECT * FROM v_pendaftaran_event 
                        WHERE nama LIKE '%$pencarian%' 
                        OR id_pendaftar LIKE '%$pencarian%' 
                        OR email LIKE '%$pencarian%' 
                        OR nama_event LIKE '%$pencarian%'";
                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM v_pendaftaran_event LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM v_pendaftaran_event";
            }
        } else {
            $query = "SELECT * FROM v_pendaftaran_event LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM v_pendaftaran_event";
        }

        $q_tampil_pendaftar = mysqli_query($db, $query);

        if (mysqli_num_rows($q_tampil_pendaftar) > 0) {
            while ($r_tampil_pendaftar = mysqli_fetch_array($q_tampil_pendaftar)) {
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_pendaftar['id_pendaftar']; ?></td>
                    <td><?php echo $r_tampil_pendaftar['nama']; ?></td>
                    <td><?php echo $r_tampil_pendaftar['email']; ?></td>
                    <td><?php echo $r_tampil_pendaftar['tanggal_lahir']; ?></td>
                    <td><?php echo $r_tampil_pendaftar['alamat']; ?></td>
                    <td><?php echo $r_tampil_pendaftar['nama_event']; ?></td>
                    <td>
                        <div class="tombol-opsi-container">
                            <a href="index.php?p=pendaftar-edit&id=<?php echo $r_tampil_pendaftar['id_pendaftar']; ?>" class="tombol">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="proses/pendaftar-hapus.php?id=<?php echo $r_tampil_pendaftar['id_pendaftar']; ?>"
                               onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                               class="tombol">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php
                $nomor++;
            }
        } else {
            echo "<tr><td colspan='8'>Data Tidak Ditemukan</td></tr>";
        }
        ?>
    </table>
    <?php
    $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
    if (!empty($pencarian)) {
        echo "<div style=\"float:left;\">";
        echo "Data Hasil Pencarian: <b>$jml</b>";
        echo "</div>";
    } else {
        echo "<div style=\"float:left;\">";
        echo "Jumlah Data: <b>$jml</b>";
        echo "</div>";

        $jml_hal = ceil($jml / $batas);
        echo "<div class=\"pagination\">";
        for ($i = 1; $i <= $jml_hal; $i++) {
            if ($i != $hal) {
                echo "<a href=\"?p=pendaftar&hal=$i\">$i</a>";
            } else {
                echo "<a class=\"active\">$i</a>";
            }
        }
        echo "</div>";
    }
    ?>
</div>
