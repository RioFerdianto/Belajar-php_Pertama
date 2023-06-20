<?php
include "koneksi.php";
?>
<html>
    <head>
        <title>
            Arsip Berita
        </title>
        <link rel="stylesheet" href="style.css">
        <script language="javascript">
            function tanya() {
                if (confirm("Apakah Anda yakin akan menghapus berita ini?")) {
                    return true;
                } 
                else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_berita.php">Arsip Berita</a> |
        <a href="input_berita.php">Input Berita</a> 
        <br><br>
        <h2>Arsip Berita</h2>
        <ol>
            <?
            $query = "SELECT A.id_berita, B.nm_kategori,
            A.judul, A.pengirim, A.tanggal
            FROM berita A, kategori B WHERE
            A.id_kategori = B.id_kategori
            ORDER BY A.id_berita DESC";
                $sql = mysql_query ($query);
                while ($hasil = mysql_fetch_array ($sql)) {
                    $id_berita = $hasil ['id_berita'];
                    $kategori = stripslashes ($hasil['nm_kategori']);
                    $judul = stripslashes ($hasil['judul']);
                    $pengirim = stripslashes ($hasil['pengirim']);
                    $tanggal = stripslashes ($hasil['tanggal']);
                    //
                    //tampilkan arsip berita
                    echo "<li><a href = 'berita_lengkap.php?id= $id_berita'>$judul</a><br>";
                    echo "<small>Berita dikirimkan oleh <b>$pengirim</b>
                        pada tanggal <b>$tanggal</b> dalam kategori<b>$kategori</b><br>";
                    echo "<b>Action : </b><a
                        href='edit_berita.php?id=$id_berita'>Edit</a> | ";
                    echo "<a href='dalete_berita.php?id=$id_brtita'
                        onClik='return tanya()'>Delete</a>";
                    echo "</small></li><br><br>"; 
                       
                }
            ?>
        </ol>
    </body>
</html>