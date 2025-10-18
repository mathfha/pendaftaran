<div id="label-page">
    <h3>Input Pendaftar Event</h3>
</div>

<div id="content">
    <form action="proses/pendaftar-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID Pendaftar</td>
                <td class="isian-formulir">
                    <input type="text" name="id_pendaftar" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama</td>
                <td class="isian-formulir">
                    <input type="text" name="nama" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Email</td>
                <td class="isian-formulir">
                    <input type="text" name="email" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Lahir</td>
                <td class="isian-formulir">
                    <input type="text" name="tanggal_lahir" class="isian-formulir isian-formulir-border">
                    <small>Format tanggal: yyyy-mm-dd</small>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Alamat</td>
                <td class="isian-formulir">
                    <textarea rows="2" cols="40" name="alamat" class="isian-formulir isian-formulir-border"></textarea>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">ID Event</td>
                <td class="isian-formulir">
                    <input type="text" name="id_event" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input type="submit" name="simpan" value="Simpan" class="tombol" onclick="return confirm('Yakin Data Disimpan?')">
                </td>
            </tr>
        </table>
    </form>
</div>
