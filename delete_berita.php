<?php
include "koneksi.php";
if (isset($_GET['id'])){
    $id_berita = $_GET['id'];
} else {
    die ("Error. No id Selected! ");
}
?>
<html>
  <head>
    <title>Delete Berita</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_berita.php">Arsip Berita</a> |
    <a href="input_berita.php">Input Berita</a>
    <br /><br />
  <?
    //proses delete berita 
    if (!empty($id_berita) && $id_berita != "") { 
        $query = "DELETE FROM berita WHERE id_berita='$id_berita'"; 
        $sql = mysql_query($query); 
        if ($sql) { echo "
     <h2><font color=blue> Berita telah berhasil dihapus </font></h2>"; 
    } 
    else { echo "
    <h2><font color=red> Berita gagal dihapus </font></h2>"; } 
    echo "Klik <a href='arsip_berita.php'>di sini</a>
    untuk kembali ke halaman arsip berita"; } 
    else { 
        die ("Access Denied"); 
    }
 ?>
  </body>
</html>
