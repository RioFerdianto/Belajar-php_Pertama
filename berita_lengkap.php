<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
?>
<html>
    <head>
        <title>
            Berita Lengkap
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip.php">Arsip Depan</a> |
        <a href="input_berita.php">Input Berita</a> 
        <br><br>
        <h2>Berita Lengkap</h2>
        <?
        $query = "SELECT A. id_berita, B. nm_kategori,
        A. judul, A.isi, A.pengirim, A.tanggal
        FROM berita A, kategori B WHERE 
        A. id_kategori = B. id_kategori && A. id_berita = '$id_berita'";
            $sql = mysql_quesy ($query) ;
            $hasil = mysql_fetch_array ($sql);
            $id_berita = $hasil ['id_berita'];
            $kategori = stripslashes ($hasil['nm_kategori']);
            $judul = stripslashes ($hasil['judul']);
            $isi = n12br (stripslashes($hasil['isi']));
            $pengirim = stripslashes ($hasil['pengirim']);
            $tanggal = stripslashes ($hasil['tanggal']);
            //
            //tampilkan berita
            echo "<font size=5 color=blue>$judul</font><br>";
            echo "<small>Berita dikirim oleh <b>$pengirim</b>
            pada tanggal <b>$tanggal</b> dalam kategori <b>$kategori</b></small>";
            echo "<p>$isi</p>";
        ?>
    </body>
</html>

