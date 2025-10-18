<div id="label-page"><h3>Informasi Event</h3></div>
<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=event-input" class="tombol">Tambah Event Baru</a>
        <div align="right">
            <form method="post">
                <input type="text" name="pencarian" placeholder="Cari Event...">
                <input type="submit" name="search" value="Search" class="tombol">
            </form>
        </div>
    </p>

    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Event</th>
            <th>Nama Event</th>
            <th>Tanggal Event</th>
            <th>Informasi Event</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $batas = 5;
        extract($_GET);
        if (empty($hal)) {
            $hal = 1;
            $posisi = 0;
            $nomor = 1;
        } else {
            $posisi = ($hal - 1) * $batas;
            $nomor = $posisi + 1;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
            if ($pencarian != "") {
                $sql = "
                    SELECT * FROM event
                    WHERE id_event LIKE '%$pencarian%'
                    OR nama_event LIKE '%$pencarian%'
                    OR tanggal_event LIKE '%$pencarian%'
                    OR informasi_event LIKE '%$pencarian%'
                ";
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
                    <td>
                        <div class="tombol-opsi-container">
                            <a href="index.php?p=event-edit&id=<?php echo $r_tampil_event['id_event']; ?>" class="tombol">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="proses/event-hapus.php?id=<?php echo $r_tampil_event['id_event']; ?>"
                               onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"
                               class="tombol">Hapus</a>
                        </div>
                    </td>
                </tr>
        <?php
                $nomor++;
            }
        } else {
            echo "<tr><td colspan='6'>Data Tidak Ditemukan</td></tr>";
        }
        ?>
    </table>

    <?php
    $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
    if (isset($_POST['pencarian']) && $_POST['pencarian'] != '') {
        echo "<div style='float:left;'>Data Hasil Pencarian: <b>$jml</b></div>";
    } else {
        echo "<div style='float:left;'>Jumlah Data : <b>$jml</b></div>";
    }
    $jml_hal = ceil($jml / $batas);
    ?>
    <div class="pagination">
        <?php
        for ($i = 1; $i <= $jml_hal; $i++) {
            if ($i != $hal) {
                echo "<a href=\"?p=event&hal=$i\">$i</a>";
            } else {
                echo "<a class=\"active\">$i</a>";
            }
        }
        ?>
    </div>
</div>
