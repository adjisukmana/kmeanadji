<?php
if(! (($_SESSION["namauser"])))
{
		echo "<script>window.alert('Untuk mengakses, Anda harus Login Sebagai Admin');
        window.location=('../home')</script>";
}
?>