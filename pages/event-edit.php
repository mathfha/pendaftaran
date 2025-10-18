<?php
include '../koneksi.php';

$id_event = $_GET['id'];
$q_tampil_event = mysqli_query($db, "SELECT * FROM event WHERE id_event = '$id_event'");
$r_tampil_event = mysqli_fetch_array($q_tampil_event);
?>

<div id="label-page"><h3>Edit Event</h3></div>
<div id="content">
    <form action="proses/event-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Event</td>
                <td class="isian-formulir">
                    <input type="text" name="id_event" value="<?php echo $r_tampil_event['id_event']; ?>"
                           readonly="readonly"
                           class="isian-formulir isian-formulir-border warna-formulir-disabled">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Event</td>
                <td class="isian-formulir">
                    <input type="text" name="nama_event"
                           value="<?php echo $r_tampil_event['nama_event']; ?>"
                           class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Event</td>
                <td class="isian-formulir">
                    <input type="text" name="tanggal_event"
                           value="<?php echo $r_tampil_event['tanggal_event']; ?>"
                           class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Informasi Event</td>
                <td class="isian-formulir">
                    <textarea rows="2" cols="40" name="informasi_event" class="isian-formulir isian-formulir-border">
                    <?php echo $r_tampil_event['informasi_event']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input type="submit" name="simpan" value="Simpan" onclick="return confirm('Yakin Data Disimpan?')" id="tombol-simpan">
                </td>
            </tr>
        </table>
    </form>
</div>
