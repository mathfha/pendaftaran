<?php
include '../koneksi.php';

$id_pendaftar = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM pendaftar WHERE id_pendaftar = '$id_pendaftar'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
?>

<div id="label-page"><h3>Edit Data Pendaftar</h3></div>
<div id="content">
    <form action="proses/pendaftar-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Pendaftar</td>
                <td class="isian-formulir">
                    <input 
                        type="text" 
                        name="id_pendaftar" 
                        value="<?php echo $r_tampil_anggota['id_pendaftar']; ?>" 
                        readonly="readonly"
                        class="isian-formulir isian-formulir-border warna-formulir-disabled">
                </td>
            </tr>

            <tr>
                <td class="label-formulir">Nama</td>
                <td class="isian-formulir">
                    <input 
                        type="text" 
                        name="nama" 
                        value="<?php echo $r_tampil_anggota['nama']; ?>" 
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>

            <tr>
                <td class="label-formulir">Email</td>
                <td class="isian-formulir">
                    <input 
                        type="text" 
                        name="email" 
                        value="<?php echo $r_tampil_anggota['email']; ?>" 
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>

            <tr>
                <td class="label-formulir">Tanggal Lahir</td>
                <td class="isian-formulir">
                    <input 
                        type="text" 
                        name="tanggal_lahir" 
                        value="<?php echo $r_tampil_anggota['tanggal_lahir']; ?>" 
                        class="isian-formulir isian-formulir-border">
                    <br><small>Format: yyyy-mm-dd</small>
                </td>
            </tr>

            <tr>
                <td class="label-formulir">Alamat</td>
                <td class="isian-formulir">
                    <textarea 
                        rows="2" 
                        cols="40" 
                        name="alamat" 
                        class="isian-formulir isian-formulir-border"><?php echo $r_tampil_anggota['alamat']; ?></textarea>
                </td>
            </tr>

            <tr>
                <td class="label-formulir">ID Event</td>
                <td class="isian-formulir">
                    <input 
                        type="text" 
                        name="id_event" 
                        value="<?php echo $r_tampil_anggota['id_event']; ?>" 
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>

            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input 
                        type="submit" 
                        name="simpan" 
                        value="Simpan" 
                        onclick="return confirm('Yakin Data Disimpan?')" 
                        id="tombol-simpan">
                </td>
            </tr>
        </table>
    </form>
</div>
