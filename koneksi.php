<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "pw2";

$conn = mysql_connect ($host, $user, $pass);
if ($conn) {
 $buka = mysql_select_db ($dbnm);
 if (!$buka) {
 die ("Database tidak dapat dibuka");
 }
 } else {
 die ("Server MySQL tidak terhubung");
 }
 ?>