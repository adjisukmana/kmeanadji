<?php
  session_start();	
  include "../config/koneksi.php";
  include "../config/session_manager.php";
  error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PT. CIPTA NIAGA SEMESTA</title>
<link href="../layout/style.css" rel="stylesheet" type="text/css" />
<script src="tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tiny_mce/tiny_gugun.js" type="text/javascript"></script>
</head>
<body>

<div id="container_wrapper">
	<div id="container">
  <div id="header">
      <div id="inner_header">
      </div>
  </div>
  
  	<div id="top"> 
		<span class="cpojer-links"> <center>
					<a href='home'>Home Page</a> 
					<a href='profile.html'>Profile Perusahaan</a>
					<a href='semua-data.html'>Semua Data</a>
					<a href='hasil.html'>Hasil Clustering</a>
					<a href='diagram.html'>Hasil Diagram Clustering</a>
					<a href='../logout.php'>Logout</a> 					</center>
		</span>
	</div>
  
		<div id="left_column">
			<div class="text_area" align="justify">	
				<?php include "content.php"; ?>
					<br/>
			</div>
			<div style='clear:both;'></div>
		</div>
		<div id="footer">
		</div>

        
</div>
</div>
</body>
</html>