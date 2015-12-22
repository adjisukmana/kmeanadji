<?php
class ClusteringKMean {
      private $objek = array();
      private $centroidCluster = null;
      private $cekObjCluster = null;
      
      public function __construct($obj,$cnt) {
            $this->centroidCluster = $cnt;
            for ($i=0;$i<count($obj);$i++){
                  $this->objek[$i] = new objek($obj[$i]);
				  $this->cekObjCluster[$i] = 0;
            }
      }
      
      public function setClusterObjek($itr){
			mysql_query("TRUNCATE centroid2");
			$ce = mysql_query("SELECT * FROM centroid ORDER BY id_centroid LIMIT 1");
			$cd = mysql_fetch_array($ce);
			$ex = explode(',',$cd["data_centroid"]);
			$dataaaa = $ex[0];
			if ($dataaaa >= 200){
			$c1a = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/4 as jumlah FROM `centroid_data` where status='R-1'"));
			$c1b = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/4 as jumlah FROM `centroid_data` where status='B-1'"));
			
            $c2a = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/8 as jumlah FROM `centroid_data` where status='R-0'"));
			$c2b = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/8 as jumlah FROM `centroid_data` where status='B-0'"));
			}else{
			$c1a = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/8 as jumlah FROM `centroid_data` where status='R-1'"));
			$c1b = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/8 as jumlah FROM `centroid_data` where status='B-1'"));
			
            $c2a = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/4 as jumlah FROM `centroid_data` where status='R-0'"));
			$c2b = mysql_fetch_array(mysql_query("SELECT sum(nilai_data_centroid)/4 as jumlah FROM `centroid_data` where status='B-0'"));
			}
			mysql_query("INSERT INTO centroid2 (data_centroid) VALUES ('$c1a[jumlah],$c1b[jumlah]')");
			mysql_query("INSERT INTO centroid2 (data_centroid) VALUES ('$c2b[jumlah],$c2a[jumlah]')");
			
            echo "<table width='100%;' cellpadding=0 cellspacing=0>
                        <tr><th colspan='100'>ITERASI ".$itr."</th></tr>
						<tr><th width=200px>Objek</th>";            
            for ($i=0;$i<count($this->objek[0]->data);$i++){
                  echo "<th width=70px>Data ".($i+1)."</th>";
            }            
            for ($j=0;$j<count($this->centroidCluster);$j++){
                  echo "<th>Cluster ".($j+1)."</th>";
            }            
            echo "</tr>";        

			$hitung = mysql_query("SELECT * FROM objek ORDER BY id_objek DESC");
			$jml = mysql_num_rows($hitung);
			$i=0;
			$no = 1;
			while ($r = mysql_fetch_array($hitung)){
				
                  $this->objek[$i]->setCluster($this->centroidCluster);
				  echo "<tr><td><span style='float:left; margin-left:10px;'>$no. $r[nama_objek]</span></td>";                  
                  for ($j=0;$j<count($this->objek[$i]->data);$j++)
						
						if ($j == $this->objek[$i]->getCluster()){	
							mysql_query("INSERT INTO centroid_data (nilai_data_centroid, status) 
												VALUES ('".$this->objek[$i]->data[$j]."','B-".$this->objek[$i]->getCluster()."')");
							echo "<td>".$this->objek[$i]->data[$j]."</td>";
						}else{
							mysql_query("INSERT INTO centroid_data (nilai_data_centroid, status) 
												VALUES ('".$this->objek[$i]->data[$j]."','R-".$this->objek[$i]->getCluster()."')");
							echo "<td>".$this->objek[$i]->data[$j]."</td>";
						}
					
					
					
					$data = explode(',',$r["data"]);
					$mx = $data[0];
					$my = $data[1];
					
				if ($itr == 2){
                  $hitungcluster = mysql_query("SELECT * FROM centroid2");
				  $jmlcluster = mysql_num_rows($hitungcluster);
				  $j=0;
				  while ($c = mysql_fetch_array($hitungcluster)){
				  $datac = explode(',',$c["data_centroid"]);
						$cx = $datac[0];
						$cy = $datac[1];
						
						$hasil1 = ($mx - $cx) * ($mx - $cx);
						$hasil2 = ($my - $cy) * ($my - $cy);
					$hasil3 = $hasil1 + $hasil2;
					$hasil_akhir = sqrt($hasil3);
					
                        if ($j == $this->objek[$i]->getCluster()){
                            echo "<td>Centroid ($cx, $cy) - $hasil_akhir </td>";
                        }else{  
							echo "<td style='background:lightgreen'>Centroid ($cx, $cy) - $hasil_akhir</td>";
						}
					$j++;	
                  }  
				}else{
				  $hitungcluster = mysql_query("SELECT * FROM centroid");
				  $jmlcluster = mysql_num_rows($hitungcluster);
				  $j=0;
				  while ($c = mysql_fetch_array($hitungcluster)){
				  $datac = explode(',',$c["data_centroid"]);
						$cx = $datac[0];
						$cy = $datac[1];
						
						$hasil1 = ($mx - $cx) * ($mx - $cx);
						$hasil2 = ($my - $cy) * ($my - $cy);
					$hasil3 = $hasil1 + $hasil2;
					$hasil_akhir = (sqrt($hasil3));
					
                        if ($j != $this->objek[$i]->getCluster()){
                            echo "<td style='background:yellow'>Centroid ($cx, $cy) - $hasil_akhir </td>";
                        }else{  
							echo "<td>Centroid ($cx, $cy) - $hasil_akhir</td>";
						}
					$j++;	
                  } 
				}
                  echo "</tr>";
				$i++;
				$no++;
            }
			
            echo "</table><br><br>";            
            $cek = TRUE;
            for ($i=0;$i<count($this->cekObjCluster);$i++){
                  if ($this->cekObjCluster[$i]!=$this->objek[$i]->getCluster()){
                        $cek = FALSE;
                        break;
                  }
            }            
           if ((!($cek))&&($itr<20)){
                  for ($i=0;$i<count($this->cekObjCluster);$i++){
                        $this->cekObjCluster[$i] = $this->objek[$i]->getCluster();
                  }
                  $this->setCentroidCluster();
                  $this->setClusterObjek($itr+1);
            }else{
			
			}         
      }
      
      private function setCentroidCluster(){
           for ($i=0;$i<count($this->centroidCluster);$i++){
                 $countObj = 0;
                 $x = array();            
                 for ($j=0;$j<count($this->objek);$j++){
                       if ($this->objek[$j]->getCluster()==$i){
                             for ($k=0;$k<count($this->objek[$j]->data);$k++){
                                    $x[$k] += $this->objek[$j]->data[$k];
							 }
                             $countObj++;
                       }
                 }
                 for ($k=0;$k<count($this->centroidCluster[$i]);$k++){
					   if ($countObj>0)
							$this->centroidCluster[$i][$k] = $x[$k]/$countObj;
					   else{
							echo "<font color='red'>Terdapat ketidak sesuai Nilai Awal Cluster</font><br>";
							break;
					   }						
                 }
           } 
      }      
}

?>