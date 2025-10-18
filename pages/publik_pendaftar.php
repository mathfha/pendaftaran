<div id="label-page">
    <h3>Informasi Event</h3>
</div>

<div id="content">
    <p id="tombol-tambah-container">
        <a href="pendaftaran.php?p=publik_daftar-input" class="tombol">
            Daftar Event yang anda minati
        </a>
    </p>

    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Event</th>
            <th>Nama Event</th>
            <th>Tanggal Event</th>
            <th>Informasi Event</th>
        </tr>

        <?php
        $batas = 5;
        extract($_GET);

        if (empty($hal)) {
            $posisi = 0;
            $hal = 1;
            $nomor = 1;
        } else {
            $posisi = ($hal - 1) * $batas;
            $nomor = $posisi + 1;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
            if ($pencarian != "") {
                $sql = "SELECT * FROM event 
                        WHERE nama_event LIKE '%$pencarian%' 
                        OR id_event LIKE '%$pencarian%'
                        OR tanggal_event LIKE '%$pencarian%' 
                        OR informasi_event LIKE '%$pencarian%'";
                $query = $sql;
                $queryJml = $sql;
            } else {
                $query = "SELECT * FROM event LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM event";
            }
        } else {
            $query = "SELECT * FROM event LIMIT $posisi, $batas";
            $queryJml = "SELECT * FROM event";
        }

        $q_tampil_event = mysqli_query($db, $query);

        if (mysqli_num_rows($q_tampil_event) > 0) {
            while ($r_tampil_event = mysqli_fetch_array($q_tampil_event)) {
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $r_tampil_event['id_event']; ?></td>
                    <td><?php echo $r_tampil_event['nama_event']; ?></td>
                    <td><?php echo $r_tampil_event['tanggal_event']; ?></td>
                    <td><?php echo $r_tampil_event['informasi_event']; ?></td>
                </tr>
                <?php
                $nomor++;
            }
        } else {
            echo "<tr><td colspan='5'>Data Tidak Ditemukan</td></tr>";
        }
        ?>
    </table>

    <?php
    $jml = mysqli_num_rows(mysqli_query($db, $queryJml));

    if (isset($_POST['pencarian']) && $_POST['pencarian'] != '') {
        echo "<div style=\"float:left;\">Data Hasil Pencarian: <b>$jml</b></div>";
    } else {
        ?>
        <div style="float:left;">Jumlah Data : <b><?php echo $jml; ?></b></div>
        <div class="pagination">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i = 1; $i <= $jml_hal; $i++) {
                if ($i != $hal) {
                    echo "<a href=\"?p=publik_pendaftar&hal=$i\">$i</a>";
                } else {
                    echo "<a class=\"active\">$i</a>";
                }
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
