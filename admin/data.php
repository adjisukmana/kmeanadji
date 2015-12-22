	<SCRIPT language="javascript">
		function addRow(tableID) {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);
			var cell1 = row.insertCell(1);
			var element1 = document.createElement("input");
			element1.type = "text";
			cell1.appendChild(element1);
		}

		function Add(id){
			var table=document.getElementById(id);
			var clone=table.getElementsByTagName('Tbody')[1].cloneNode(true);
				table.appendChild(clone);

			var rowCount = table.rows.length;
			var row = table.rows[rowCount];
			table.rows[rowCount-1].cells[0].innerHTML = rowCount-1;
		}


		function deleteRow(tableID) {
			try {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				if (rowCount>2){
					table.deleteRow(rowCount-1);
					rowCount--;
				}
			}catch(e) {
				alert(e);
			}
		}
	</SCRIPT>
<div style="float:left;width:480px;">
	<div style="width:500px;text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;">DATA OBJEK</div>
<?php
include "../config/koneksi.php";
	if (isset($_POST["submit"])){
		$objek = $_POST["objek"]. ',' .$_POST["objekk"];
		mysql_query("insert into objek (id_objek, nama_objek, data) VALUES ('$_POST[id]','$_POST[namaobjek]','$objek')");
		echo "<script>window.alert('Sukses Memasukkan Data Baru. . .');
        window.location=('semua-data.html')</script>";
	}
	
	if ($_GET["idd"] != ''){
		mysql_query("DELETE FROM objek where id_objek=$_GET[idd]");
		echo "<script>window.alert('Sukses Menghapus Data Objek. . .');
        window.location=('semua-data.html')</script>";
	}
?>
<form method='post' enctype='multipart/form-data' action='proses-excel.html'>
			Data Excel: <input style='border:1px solid #000;'name='userfile' type='file'>
			<input name='upload' type='submit' value='Import'>
			<?php echo "<input type=button value='Delete All' onclick=\"window.location.href='hapus-data.html';\">"; ?>
</form>	
	<TABLE width="450px" border="1" cellpadding="0" cellspacing="0" id="data">
		<tbody>
			<TR bgcolor="#cecece">
				<Th>&nbsp &nbsp ID</Th>
				<Th style='width:70px;' >&nbsp &nbsp Nama Objek</Th>
				<Th>&nbsp &nbsp Stok</Th>
				<Th>&nbsp &nbsp Terjual</Th>
			</TR>
		</tbody>
		<tbody>
				
				<?php
				$query = mysql_query("SELECT * FROM objek ORDER BY id_objek DESC");
				$no = $no + 1;
				while ($r = mysql_fetch_array($query)){
					$data = explode(',',$r["data"]);
					echo "<TR>
							<TD><input style='background:#e3e3e3; border:1px solid #cecece' size='5' type='text' value='$r[id_objek]' name='id'></TD>
							<TD><input size='23' type='text' value='$r[nama_objek]' name='namaobjek'></TD>
							<TD><INPUT style='background:#e3e3e3; border:1px solid #cecece' type='text' size='11' name='objek' value='$data[0]' readonly='on'/></TD>
							<TD><INPUT style='background:#e3e3e3; border:1px solid #cecece' type='text' size='11' name='objek' value='$data[1]' readonly='on'/></TD>
						  </TR>";
					$no++;
				}
				?>
				
			
		</tbody>
	</TABLE>
</div>

<div style="float:left;width:480px;">
	<div style="width:500px; text-align:center;font-weight:bold;padding:7px; background:#e3e3e3; margin-bottom:20px;">DATA CLUSTER</div>
<?php
	if (isset($_POST["submit1"])){
		$centroid = $_POST["centroid"]. ',' .$_POST["centroidd"];
		mysql_query("insert into centroid (data_centroid) VALUES ('$centroid')");
		echo "<script>window.alert('Sukses Memasukkan Centroid Baru. . .');
        window.location=('semua-data.html')</script>";
	}
	
	if ($_GET["id"] != ''){
		mysql_query("DELETE FROM centroid where id_centroid=$_GET[id]");
		echo "<script>window.alert('Sukses Menghapus Data Centroid. . .');
        window.location=('semua-data.html')</script>";
	}
?>
	<TABLE width="450px" border="1" cellpadding="0" cellspacing="0" id="cluster">
		<tbody>
			<TR bgcolor="#cecece">
				<Th style='width:72px;'>&nbsp &nbsp Cluster</Th>
				<Th>&nbsp &nbsp Centroid Awal</Th>
			</TR>
		</tbody>
		<tbody>
			<TR>
				<TD>&nbsp Input </TD>
				<TD>
					<form action="semua-data.html" method="POST">
					<INPUT style='background:lightblue' type="text" size="14" name="centroid"/>
					<INPUT style='background:lightblue' type="text" size="14" name="centroidd"/>
					<input type='submit' name='submit1' value='Tambahkan'>
				</form>
				</TD>
			</TR>
			<?php
				$queryy = mysql_query("SELECT * FROM centroid ORDER BY id_centroid DESC");
				$noo = 2;
				while ($r = mysql_fetch_array($queryy)){
				$centroid = explode(',',$r["data_centroid"]);
					echo "<TR>
							<TD> &nbsp Cluster $noo</TD>
							<TD><INPUT type='text' size='14' name='objek' value='$centroid[0]' readonly='on'/>
								<INPUT type='text' size='14' name='objek' value='$centroid[1]' readonly='on'/>
							<input style='color:red' type=button value='Hapus Data' onclick=\"window.location.href='data.php?id=$r[id_centroid]';\"></TD>
						  </TR>";
					$noo--;
				}
				?>
		</tbody>
	</TABLE>
</div>
<form action="hasil.html" target="_BLANK" method="POST">
<?php
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
<div style="float:left;width:950px;margin-top:30px;text-align:center; margin-bottom:20px;"></div>
</form>