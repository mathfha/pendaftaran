<div id="label-page">
    <h3>Silakan isi data diri Anda</h3>
</div>
<div id="content">
    <form action="proses/publik_daftar-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Pendaftar</td>
                <td class="isian-formulir">
                    <input type="text" name="id_pendaftar" class="isian-formulir isian-formulir-border" required>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama</td>
                <td class="isian-formulir">
                    <input type="text" name="nama" class="isian-formulir isian-formulir-border" required>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Email</td>
                <td class="isian-formulir">
                    <input type="email" name="email" class="isian-formulir isian-formulir-border" required>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Lahir</td>
                <td class="isian-formulir">
                    <input type="date" name="tanggal_lahir" class="isian-formulir isian-formulir-border" required>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Alamat</td>
                <td class="isian-formulir">
                    <textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border" required></textarea>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama Event</td>
                <td class="isian-formulir">
                    <select name="id_event" class="isian-formulir isian-formulir-border" required>
                        <?php
                        include '../koneksi.php';
                        $sql = "SELECT * FROM event";
                        $hasil = mysqli_query($db, $sql);
                        while ($data = mysqli_fetch_array($hasil)) {
                            echo "<option value='" . $data['id_event'] . "'>" . $data['nama_event'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input type="submit" name="simpan" value="Simpan"
                           onclick="return confirm('Yakin Data Disimpan?')" class="tombol">
                </td>
            </tr>
        </table>
    </form>
</div>
