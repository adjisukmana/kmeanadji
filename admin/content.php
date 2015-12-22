<?php
include "../config/session_manager.php";
if ($_GET["module"]=='home'){
echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;'>Selamat datang Di aplikasi data Mining - Metode Clustering Algoritma K-Means PT Cipta Niaga Semesta</div>
	<p>Data mining adalah suatu metode pengolahan data untuk menemukan pola
yang tersembunyi dari data tersebut. Hasil dari pengolahan data dengan metode data
mining ini dapat digunakan untuk mengambil keputusan di masa depan. Data mining
ini juga dikenal dengan istilah pattern recognition (Santosa, 2007).
Data mining merupakan metode pengolahan data berskala besar oleh karena
itu data mining ini memiliki peranan penting dalam bidang industri, keuangan, cuaca,
ilmu dan teknologi. Secara umum kajian data mining membahas metode-metode
seperti, clustering, klasifikasi, regresi, seleksi variable, dan market basket analisis
(Santosa, 2007).</p>

<p>Pada dasarnya clustering merupakan suatu metode untuk mencari dan
mengelompokkan data yang memiliki kemiripan karakteriktik (similarity) antara satu
data dengan data yang lain. Clustering merupakan salah satu metode data mining
yang bersifat tanpa arahan (unsupervised), maksudnya metode ini diterapkan tanpa
adanya latihan (taining) dan tanpa ada guru (teacher) serta tidak memerlukan target
output. Dalam data mining ada dua jenis metode clustering yang digunakan dalam
pengelompokan data, yaitu hierarchical clustering dan non-hierarchical clustering
(Santosa, 2007).</p>

<p>Hierarchical clustering adalah suatu metode pengelompokan data yang
dimulai dengan mengelompokkan dua atau lebih objek yang memiliki kesamaan
paling dekat. Kemudian proses diteruskan ke objek lain yang memiliki kedekatan
kedua. Demikian seterusnya sehingga cluster akan membentuk semacam pohon
dimana ada hierarki (tingkatan) yang jelas antar objek, dari yang paling mirip sampai
yang paling tidak mirip. Secara logika semua objek pada akhirnya hanya akan
membentuk sebuah cluster. Dendogram biasanya digunakan untuk membantu
memperjelas proses hierarki tersebut (Santoso, 2010).</p>

<p>Berbeda dengan metode hierarchical clustering, metode non-hierarchical
clustering justru dimulai dengan menentukan terlebih dahulu jumlah cluster yang
diinginkan (dua cluster, tiga cluster, atau lain sebagainya). Setelah jumlah cluster
diketahui, baru proses cluster dilakukan tanpa mengikuti proses hierarki. Metode ini
biasa disebut dengan K-Means Clustering (Santoso, 2010).</p>

<p>K-means clustering merupakan salah satu metode data clustering non-hirarki
yang mengelompokan data dalam bentuk satu atau lebih cluster/kelompok. Data-data
yang memiliki karakteristik yang sama dikelompokan dalam satu cluster/kelompok
dan data yang memiliki karakteristik yang berbeda dikelompokan dengan
cluster/kelompok yang lain sehingga data yang berada dalam satu cluster/kelompok
memiliki tingkat variasi yang kecil (Agusta, 2007).</p>";
}
elseif ($_GET["module"]=='hasil'){
	include "hasil.php";
}
elseif ($_GET["module"]=='hapusdata'){
	mysql_query("TRUNCATE objek");
	echo "<script>window.alert('Sukses Menghapus Semua Data Objek');
			window.location=('semua-data.html')</script>";
}
elseif ($_GET["module"]=='diagram'){
echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;'>Lihat Hasil Proses Clustering Algoritma K-Means Dalam Bentuk Diagram</div>";
if (isset($_POST[tekan])){
	mysql_query("TRUNCATE diagram");
	mysql_query("TRUNCATE diagram_centroid");
				 for ($i=0;$i<count($_POST[cluster]);$i++){
						$cls = $_POST[cluster];
						$data = explode(",",$cls[$i]);
						for ($j=0;$j<count($data);$j++){
							$centroid[$i][$j] = $data[$j];
						}
				  }	
				  
				for ($i=0;$i<count($_POST[cluster]);$i++){
					$data = $cls[$i];
					$pecah1 = explode(",", $data);
					$date1 = $pecah1[0];
					mysql_query("INSERT INTO diagram_centroid (x) VALUES ('$date1,')");
				}
				for ($j=0;$j<count($_POST[cluster]);$j++){
					$data = $cls[$j];
					$pecah1 = explode(",", $data);
					$date1 = $pecah1[1];
					mysql_query("INSERT INTO diagram_centroid (y) VALUES ('$date1,')");
				}
				  
	// Batas Untuk ProseS Penyatuan Centroid ===================================================
	  
				for ($i=0;$i<count($_POST[objek]);$i++){
					$obj = $_POST[objek];
					$data = explode(",",$obj[$i]);
					for ($j=0;$j<count($data);$j++){
								$objek[$i][$j] = $data[$j];
					}
				}
		  
				for ($i=0;$i<count($_POST[objek]);$i++){
					$data = $obj[$i];
					$pecah1 = explode(",", $data);
					$date1 = $pecah1[0];
					mysql_query("INSERT INTO diagram (x) VALUES ('$date1,')");
				}
				for ($j=0;$j<count($_POST[objek]);$j++){
					$data = $obj[$j];
					$pecah1 = explode(",", $data);
					$date1 = $pecah1[1];
					mysql_query("INSERT INTO diagram (y) VALUES ('$date1,')");
				}
	mysql_query("TRUNCATE satukan");		  
	mysql_query("INSERT INTO satukan(data) SELECT GROUP_CONCAT(x SEPARATOR '') FROM diagram");
	mysql_query("INSERT INTO satukan(data) SELECT GROUP_CONCAT(y SEPARATOR '') FROM diagram");
	mysql_query("INSERT INTO satukan(data) SELECT GROUP_CONCAT(x SEPARATOR '') FROM diagram_centroid");
	mysql_query("INSERT INTO satukan(data) SELECT GROUP_CONCAT(y SEPARATOR '') FROM diagram_centroid");

	$titikx = mysql_query("SELECT * FROM satukan where id=1");
	$titiky = mysql_query("SELECT * FROM satukan where id=2");
	$x = mysql_fetch_array($titikx);
	$y = mysql_fetch_array($titiky);
	
	$titikxc = mysql_query("SELECT * FROM satukan where id=3");
	$titikyc = mysql_query("SELECT * FROM satukan where id=4");
	$xc = mysql_fetch_array($titikxc);
	$yc = mysql_fetch_array($titikyc);

	$data = $x[data];
	$data2 = $y[data];
	
	$datac = $xc[data];
	$data2c = $yc[data];
	
	$myFile = "titik.php";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$yourVariable = "<?php \$datax = array($data); 
	\$datay = array($data2); ?>\n";
	fwrite($fh, $yourVariable);
	fclose($fh);
	
	$myFilec = "centroid.php";
	$fhc = fopen($myFilec, 'w') or die("can't open file");
	$yourVariablec = "<?php \$datx = array($datac); 
	\$daty = array($data2c); ?>\n";
	fwrite($fhc, $yourVariablec);
	fclose($fhc);

		 echo "<script>window.alert('Sukses Proses Data Untuk Diagram');
			window.location=('diagram.php')</script>";
}		  
	echo "<center style='padding:50px; padding-bottom:20px;'>Maaf, Anda Belum Melakukan Proses Clustering Data untuk melihat diagram.<br> Lakukan Proses Clustering (K-Means) Data melalui Tombol Dibawah ini.</center>
	<form action='diagram.html' target='_BLANK' method='POST'>";
$querye = mysql_query("SELECT * FROM objek ORDER BY id_objek DESC");
	while ($r = mysql_fetch_array($querye)){
		echo "<INPUT type='hidden' size='40' name='objek[]' value='$r[data]'/>";
	}
$queryye = mysql_query("SELECT * FROM centroid ORDER BY id_centroid DESC");
	while ($r = mysql_fetch_array($queryye)){
		echo "<INPUT type='hidden' size='38' name='cluster[]' value='$r[data_centroid]'/>";
	}
	
echo "<div style='float:left;width:950px;margin-top:0px;text-align:center; margin-bottom:20px;'><button style='padding:10px 130px 10px 130px; margin-bottom:60px;' name='tekan' type='submit'>Klik Tombol Ini Untuk Melihat Diagram Hasil Clustering Data</button></div>
</form>";

}
elseif ($_GET["module"]=='semuadata'){
	include "data.php";
}
elseif ($_GET["module"]=='profile'){
	echo "<div style='width:100%; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;'>Profile Perusahaan -  PT Cipta Niaga Semesta</div>
	<p>Data mining adalah suatu metode pengolahan data untuk menemukan pola
yang tersembunyi dari data tersebut. Hasil dari pengolahan data dengan metode data
mining ini dapat digunakan untuk mengambil keputusan di masa depan. Data mining
ini juga dikenal dengan istilah pattern recognition (Santosa, 2007).
Data mining merupakan metode pengolahan data berskala besar oleh karena
itu data mining ini memiliki peranan penting dalam bidang industri, keuangan, cuaca,
ilmu dan teknologi. Secara umum kajian data mining membahas metode-metode
seperti, clustering, klasifikasi, regresi, seleksi variable, dan market basket analisis
(Santosa, 2007).</p>

<p>Pada dasarnya clustering merupakan suatu metode untuk mencari dan
mengelompokkan data yang memiliki kemiripan karakteriktik (similarity) antara satu
data dengan data yang lain. Clustering merupakan salah satu metode data mining
yang bersifat tanpa arahan (unsupervised), maksudnya metode ini diterapkan tanpa
adanya latihan (taining) dan tanpa ada guru (teacher) serta tidak memerlukan target
output. Dalam data mining ada dua jenis metode clustering yang digunakan dalam
pengelompokan data, yaitu hierarchical clustering dan non-hierarchical clustering
(Santosa, 2007).</p>

<p>Hierarchical clustering adalah suatu metode pengelompokan data yang
dimulai dengan mengelompokkan dua atau lebih objek yang memiliki kesamaan
paling dekat. Kemudian proses diteruskan ke objek lain yang memiliki kedekatan
kedua. Demikian seterusnya sehingga cluster akan membentuk semacam pohon
dimana ada hierarki (tingkatan) yang jelas antar objek, dari yang paling mirip sampai
yang paling tidak mirip. Secara logika semua objek pada akhirnya hanya akan
membentuk sebuah cluster. Dendogram biasanya digunakan untuk membantu
memperjelas proses hierarki tersebut (Santoso, 2010).</p>

<p>Berbeda dengan metode hierarchical clustering, metode non-hierarchical
clustering justru dimulai dengan menentukan terlebih dahulu jumlah cluster yang
diinginkan (dua cluster, tiga cluster, atau lain sebagainya). Setelah jumlah cluster
diketahui, baru proses cluster dilakukan tanpa mengikuti proses hierarki. Metode ini
biasa disebut dengan K-Means Clustering (Santoso, 2010).</p>

<p>K-means clustering merupakan salah satu metode data clustering non-hirarki
yang mengelompokan data dalam bentuk satu atau lebih cluster/kelompok. Data-data
yang memiliki karakteristik yang sama dikelompokan dalam satu cluster/kelompok
dan data yang memiliki karakteristik yang berbeda dikelompokan dengan
cluster/kelompok yang lain sehingga data yang berada dalam satu cluster/kelompok
memiliki tingkat variasi yang kecil (Agusta, 2007).</p>";
}
elseif ($_GET["module"]=='prosesexcel'){
	include "proses_excel.php";
}
?>