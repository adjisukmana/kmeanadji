<html>
<head>
	<style>
		table{
			border : 1px solid #000;
			text-align : center;
			font-family:tahoma;
			font-size:12px;
		}
		table tr th{
			border : 1px solid #000;
			background : #cecece;
			color : #000;
			padding:3px;
		}
		table tr td{
			border : 1px solid #000;
		}
	</style>
</head>
<body>

<?php
      include "objek.php";
	  include "ClusteringKMean.php";
	  
      for ($i=0;$i<count($_POST["objek"]);$i++){
			$obj = $_POST["objek"];
			$data = explode(",",$obj[$i]);
			for ($j=0;$j<count($data);$j++){
				$objek[$i][$j] = $data[$j];
			}
	  }
	  for ($i=0;$i<count($_POST["cluster"]);$i++){
			$cls = $_POST["cluster"];
			$data = explode(",",$cls[$i]);
			for ($j=0;$j<count($data);$j++){
				$centroid[$i][$j] = $data[$j];
			}
	  }	  

	   //K-MEAN	   
	   echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;'>Hasil Proses Clustering Algoritma K-Means Terhadap Data - PT Cipta Niaga Semesta</div>";
	   if (isset($_POST["tekan"])){
			 echo "<div style='width:100%; float:left;'>";
		  $clustering = new ClusteringKMean($objek, $centroid);
		  $clustering->setClusterObjek(1);
		  echo "</div>";
	  }else{
		 echo "<center style='padding:50px; padding-bottom:20px;'>Maaf, Anda Belum Melakukan Proses Clustering Data.<br> Lakukan Proses Clustering (K-Means) Data melalui Tombol Dibawah ini.</center>";
?>	 
		 <form action="hasil.html" target="_BLANK" method="POST">
<?php
mysql_query("TRUNCATE centroid_data");
$querye = mysql_query("SELECT * FROM objek ORDER BY id_objek DESC");
	while ($r = mysql_fetch_array($querye)){
		echo "<INPUT type='hidden' size='40' name='objek[]' value='$r[data]'/>";
	}
?>

<?php
$queryye = mysql_query("SELECT * FROM centroid ORDER BY id_centroid DESC");
	while ($r = mysql_fetch_array($queryye)){
		echo "<INPUT type='hidden' size='38' name='cluster[]' value='$r[data_centroid]'/>";
	}
?>
<div style="float:left;width:950px;margin-top:0px;text-align:center; margin-bottom:20px;"><button style='padding:10px 130px 10px 130px; margin-bottom:60px;' name='tekan' type="submit">Lakukan Proses Clustering Terhadap Data Sekarang !!!</button></div>
</form>
<?php
	  }
?>	

</body>
</html>