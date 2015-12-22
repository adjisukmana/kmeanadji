<?php
include "config/koneksi.php";
$pass=md5($_POST["password"]);
$level=$_POST["level"];
if ($level=='admin')
{
$login=mysql_query("SELECT * FROM admin
			WHERE username='$_POST[id_user]' AND password='$pass' AND level='$level'");
$cocok=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($cocok > 0){
	session_start();
	$_SESSION["namauser"]     = $r["username"];
  	$_SESSION["namalengkap"]  = $r["nama_lengkap"];
  	$_SESSION["passuser"]     = $r["password"];
  	$_SESSION["leveluser"]    = $r["level"];

	header('location:admin/home');
	}
else {
echo "<script>window.alert('Username atau Password anda salah.');
        window.location=('index.php')</script>";
}
}
?>