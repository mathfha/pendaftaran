<div id="label-page">
  <h3>Input Event Baru</h3>
</div>

<div id="content">
  <form action="proses/event-input-proses.php" method="post" enctype="multipart/form-data">
    <table id="tabel-input">
      <tr>
        <td class="label-formulir">ID Event</td>
        <td class="isian-formulir">
          <input type="text" name="id_event" class="isian-formulir isian-formulir-border">
        </td>
      </tr>

      <tr>
        <td class="label-formulir">Nama Event</td>
        <td class="isian-formulir">
          <input type="text" name="nama_event" class="isian-formulir isian-formulir-border">
        </td>
      </tr>

      <tr>
        <td class="label-formulir">Tanggal Event</td>
        <td class="isian-formulir">
          <input type="text" name="tanggal_event" class="isian-formulir isian-formulir-border">
          <br>
          <small>Format tanggal: <code>yyyy-mm-dd</code></small>
        </td>
      </tr>

      <tr>
        <td class="label-formulir">Informasi Event</td>
        <td class="isian-formulir">
          <textarea rows="2" cols="40" name="informasi_event" class="isian-formulir isian-formulir-border"></textarea>
        </td>
      </tr>

      <tr>
        <td class="label-formulir"></td>
        <td class="isian-formulir">
          <input type="submit" name="simpan" value="Simpan" onclick="return confirm('Yakin Data Disimpan?')" class="tombol">
        </td>
      </tr>
    </table>
  </form>
</div>
