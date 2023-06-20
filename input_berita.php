<?php
include "koneksi.php";

//proses input berita
if (isset($_POST['input'])) {
    $judul = addslashes (strip_tags ($_POST['judul']));
    $kategori = $_POST['kategori'];
    $headline = addcslashes (strip_tags ($_POST['headline']));
    $isi_berita = addcslashes (strip_tags ($_POST['isi']));
    $pengirim = addcslashes (strip_tags ($_POST['pengirim']));
    //insert ke tabel
    $query = "INSERT INTO berita
VALUES('','$kategori','$judul','$headline','$isi_berita','$pengirim', now())";
    $sql = mysql_query ($query);
    if ($sql) {
        echo "<h2><font color=blue>Berita telah berhasil ditambahkan</font></h2>";
    }
    else {
        echo "<h2><font color=blue>Berita gagal ditambahkan</font></h2>";
    }
}
?>
<html>
  <head>
    <title>Input Berita</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_berita.php">Arsip Berita</a> |
    <a href="arsip_berita.php">Input Berita</a>
    <br /><br />

    <form action="" method="post" name="Input">
      <table cellpadding="0" cellspacing="0" border="0" width="700"></table>
      <tr>
        <td colspan="2"><h2>Input Berita</h2></td>
      </tr>
      <tr>
        <td width="200">Judul Berita</td>
        <td>: <input type="text" name="Judul" size="30"></td>
      </tr>
      <tr>
        <td>Kategori</td>
        <td>:
            <select name="Kategori">
                <?
                $query = mysql_query ($query);
                while ($hasil = mysql_fetch_array ($sql)) {
                    echo "<option value='$hasil[id_kategori]</option>";
                }
                ?>
            </select>
        </td>
      </tr>
      tr>
        <td>Kategori</td>
        <td>
          :
          <select name="Kategori"></select>
        </td>
      </tr>
      <tr>
        <td>Headline Berita</td>
        <td>: <textarea name="Headline" cols="50" rows="4"></textarea></td>
      </tr>
      <tr>
        <td>Isi Berita</td>
        <td>: <textarea name="isi" cols="50" rows="10"></textarea></td>
      </tr>
      <tr>
        <td>pengirim</td>
        <td>: <textarea name="pengirim" cols="50" rows="20"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          &nbsp;&nbsp;<input
            type="submit"
            name="Input"
            value="Input Berita"
          />&nbsp;<input type="reset" name="reset" value="cancel" />
        </td>
      </tr>
    </form>
  </body>
</html>