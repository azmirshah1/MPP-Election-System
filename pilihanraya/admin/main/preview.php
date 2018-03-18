<!-- Javascript goes in the document HEAD -->
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>
<link href="../../css/table.css" rel="stylesheet" type="text/css" />

<div class='container_allen voters'>

    <div class="panel panel-primary" style="width:1024px; margin:0 auto;">

      <div class="panel-heading">
        <h5>Statistik Pengundian</h5>
        
      </div>
    
      <div class="panel-body">
      
      <div class="panel-heading">
        <p><b>JUMLAH PENGUNDI MENGIKUT JABATAN</b></p>
        
        <div class="datagrid"><table>
<thead><tr>
  <th colspan="3">JTMK</th>
  </tr></thead>

<tbody><tr>
  <td width="22%">Turun Mengundi: </td>
  <td width="14%"><?php 
	$result = mysql_query('SELECT SUM(selesaiUndi) AS value_sum FROM pengundi WHERE jabatan="JTMK"'); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "$sum";
?>
    Orang</td>
  <td width="14%"><?php 
	$mengundiJTMK = mysql_query('SELECT SUM(selesaiUndi) AS turunMengundi FROM pengundi WHERE jabatan="JTMK"'); 
$row = mysql_fetch_assoc($mengundiJTMK); 
$turun = $row['turunMengundi'];

	$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JTMK";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $turun/$jumlah*100 ."%";
?>
</td>
  </tr>
<tr class="alt">
  <td>Tidak Mengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan="JTMK" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
    <?php 
	$takMengundiJTMK = mysql_query('SELECT COUNT(*) AS tidakMengundi FROM pengundi WHERE jabatan="JTMK" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($takMengundiJTMK); 
$takTurun = $row['tidakMengundi'];

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JTMK";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $takTurun/$jumlah*100 ."%";
?>
    
    
</td>
  </tr>
<tr>
  <td>Jumlah Pengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JTMK";'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
    <?php 

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JTMK";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $jumlah/$jumlah*100 ."%";
?>
    
</td>
  </tr>
</tbody>
</table></div>

<!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 -->
 <p>&nbsp;</p>
 
        <div class="datagrid"><table>
<thead><tr>
  <th colspan="3">JP</th></tr></thead>

<tbody><tr>
  <td width="22%">Turun Mengundi: </td>
  <td width="14%"><?php 
	$result = mysql_query('SELECT SUM(selesaiUndi) AS value_sum FROM pengundi WHERE jabatan="JP"'); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "$sum";
?>
    Orang</td>
  <td width="14%">
  <?php 
	$mengundiJP = mysql_query('SELECT SUM(selesaiUndi) AS turunMengundi FROM pengundi WHERE jabatan="JP"'); 
$row = mysql_fetch_assoc($mengundiJP); 
$turun = $row['turunMengundi'];

	$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JP";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $turun/$jumlah*100 ."%";
?>
</td></tr>
<tr class="alt">
  <td>Tidak Mengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan="JP" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
   <?php 
	$takMengundiJP = mysql_query('SELECT COUNT(*) AS tidakMengundi FROM pengundi WHERE jabatan="JP" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($takMengundiJP); 
$takTurun = $row['tidakMengundi'];

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JP";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $takTurun/$jumlah*100 ."%";
?>

</td></tr>
<tr>
  <td>Jumlah Pengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JP";'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td> 
  <?php 

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JTMK";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $jumlah/$jumlah*100 ."%";
?>
</td></tr>
</tbody>
</table></div>



      
      <!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 -->
 <p>&nbsp;</p>
        <div class="datagrid"><table>
<thead><tr>
  <th colspan="3">JRKV</th>
  </tr></thead>

<tbody><tr>
  <td width="22%">Turun Mengundi: </td>
  <td width="14%"><?php 
	$result = mysql_query('SELECT SUM(selesaiUndi) AS value_sum FROM pengundi WHERE jabatan="JRKV"'); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "$sum";
?>
    Orang</td>
  <td width="14%">
    <?php 
	$mengundiJRKV = mysql_query('SELECT SUM(selesaiUndi) AS turunMengundi FROM pengundi WHERE jabatan="JRKV"'); 
$row = mysql_fetch_assoc($mengundiJRKV); 
$turun = $row['turunMengundi'];

	$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JRKV";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $turun/$jumlah*100 ."%";
?>
    
</td>
  </tr>
<tr class="alt">
  <td>Tidak Mengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan="JRKV" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
    <?php 
	$takMengundiJRKV = mysql_query('SELECT COUNT(*) AS tidakMengundi FROM pengundi WHERE jabatan="JRKV" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($takMengundiJRKV); 
$takTurun = $row['tidakMengundi'];

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JRKV";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $takTurun/$jumlah*100 ."%";
?>
    
</td>
  </tr>
<tr>
  <td>Jumlah Pengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JRKV";'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
    <?php 

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JTMK";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $jumlah/$jumlah*100 ."%";
?>
</td>
  </tr>
</tbody>
</table></div>

      <!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 -->
 <p>&nbsp;</p>
        <div class="datagrid"><table>
<thead><tr>
  <th colspan="3">JKM</th></tr></thead>

<tbody><tr>
  <td width="22%">Turun Mengundi: </td>
  <td width="14%"><?php 
	$result = mysql_query('SELECT SUM(selesaiUndi) AS value_sum FROM pengundi WHERE jabatan="JKM"'); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "$sum";
?>
    Orang</td>
  <td width="14%">
   <?php 
	$mengundiJKM = mysql_query('SELECT SUM(selesaiUndi) AS turunMengundi FROM pengundi WHERE jabatan="JKM"'); 
$row = mysql_fetch_assoc($mengundiJKM); 
$turun = $row['turunMengundi'];

	$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JKM";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $turun/$jumlah*100 ."%";
?>

</td></tr>
<tr class="alt">
  <td>Tidak Mengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan="JKM" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
  <?php 
	$takMengundiJKM = mysql_query('SELECT COUNT(*) AS tidakMengundi FROM pengundi WHERE jabatan="JKM" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($takMengundiJKM); 
$takTurun = $row['tidakMengundi'];

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JKM";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $takTurun/$jumlah*100 ."%";
?>
</td></tr>
<tr>
  <td>Jumlah Pengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JKM";'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
   <?php 

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JKM";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $jumlah/$jumlah*100 ."%";
?>
</td></tr>
</tbody>
</table></div>

 <!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 -->
 <p>&nbsp;</p>
        <div class="datagrid"><table>
<thead><tr>
  <th colspan="3">JPH</th></tr></thead>

<tbody><tr>
  <td width="22%">Turun Mengundi: </td>
  <td width="14%"><?php 
	$result = mysql_query('SELECT SUM(selesaiUndi) AS value_sum FROM pengundi WHERE jabatan="JPH"'); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "$sum";
?>
    Orang</td>
  <td width="14%">
   <?php 
	$mengundiJPH = mysql_query('SELECT SUM(selesaiUndi) AS turunMengundi FROM pengundi WHERE jabatan="JPH"'); 
$row = mysql_fetch_assoc($mengundiJPH); 
$turun = $row['turunMengundi'];

	$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JPH";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $turun/$jumlah*100 ."%";
?>

</td></tr>
<tr class="alt">
  <td>Tidak Mengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan="JPH" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
  <?php 
	$takMengundiJPH = mysql_query('SELECT COUNT(*) AS tidakMengundi FROM pengundi WHERE jabatan="JPH" AND selesaiUndi=0;'); 
$row = mysql_fetch_assoc($takMengundiJPH); 
$takTurun = $row['tidakMengundi'];

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JPH";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $takTurun/$jumlah*100 ."%";
?>
</td></tr>
<tr>
  <td>Jumlah Pengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JPH";'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
    <?php 

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE jabatan = "JPH";'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $jumlah/$jumlah*100 ."%";
?>
</td></tr>
</tbody>
</table></div>

 <!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 -->
 <p>&nbsp;</p>
 <p><b>JUMLAH KESELURUHAN PENGUNDIAN</b></p>
        <div class="datagrid"><table>
<thead><tr>
  <th colspan="3">TOTAL PENGUNDI</th></tr></thead>

<tbody><tr>
  <td width="22%">Turun Mengundi: </td>
  <td width="14%"><?php 
	$result = mysql_query('SELECT SUM(selesaiUndi) AS value_sum FROM pengundi'); 
$row = mysql_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "$sum";
?>
    Orang</td>
  <td width="14%">
<?php 
	$mengundiSemua = mysql_query('SELECT SUM(selesaiUndi) AS turunMengundi FROM pengundi'); 
$row = mysql_fetch_assoc($mengundiSemua); 
$turun = $row['turunMengundi'];

	$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi;'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $turun/$jumlah*100 ."%";
?>

</td></tr>
<tr class="alt">
  <td>Tidak Mengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi WHERE selesaiUndi=0;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
<?php 
	$takMengundiSemua = mysql_query('SELECT COUNT(*) AS tidakMengundi FROM pengundi WHERE selesaiUndi=0;'); 
$row = mysql_fetch_assoc($takMengundiSemua); 
$takTurun = $row['tidakMengundi'];

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi;'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $takTurun/$jumlah*100 ."%";
?>
</td></tr>
<tr>
  <td>Jumlah Pengundi:</td>
  <td><?php 
	$Test = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi;'); 
$row = mysql_fetch_assoc($Test); 
$La = $row['NumberOfpengundi'];
echo "$La";
?>
    Orang</td>
  <td>
<?php 

$jumlahPengundi = mysql_query('SELECT COUNT(*) AS NumberOfpengundi FROM pengundi;'); 
$row = mysql_fetch_assoc($jumlahPengundi); 
$jumlah = $row['NumberOfpengundi'];
echo $jumlah/$jumlah*100 ."%";
?>
</td></tr>
</tbody>
</table></div>




      
      <!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 --><!-- Table goes in the document BODY --><!--  The table code can be found here: http://www.textfixer/tutorials/css-tables.php#css-table03 -->
<p>&nbsp;</p>
<div class="datagrid"><table>
<thead><tr>
  <th width="50%">CALON BERTANDING</th>
  </tr></thead>

<tbody><tr>
  <td><?php
    		  
          function display_candidate($p){

          if (isset($_POST['tahun'])) {
            $tahun = $_POST['tahun'];
          }
          else{
            $tahun = date('Y');
          }
    			 
           $sql = mysql_query("SELECT * FROM calon WHERE kerusiApa = '$p' AND tahun = $tahun");
           $kiraPengundi = mysql_query("SELECT count(*) as jumlahPengundi FROM pengundi WHERE selesaiUndi = 1");
           $kiraJumlahPengundi = mysql_fetch_assoc($kiraPengundi);

					
					echo "  <table>
                        <tr>
                          <td><h3>" . $p . "</h3></td>
                          <td></td>
                        </tr>
						<tr>
                    ";

            while($row = mysql_fetch_array($sql)){

              $a = md5($row['calonID']);
             
              $kira = mysql_query("SELECT count(*) as total FROM undi WHERE undiCalon = '$a'");
              $kiraKeputusan = mysql_fetch_assoc($kira);

              $percentage = round($kiraKeputusan['total'] / $kiraJumlahPengundi['jumlahPengundi'] * 100, 2) . "%";

              echo "<tr>";
              echo "<td width='200px;'>" . $row['cNamaPenuh'] . " " . $row['jabatan'] . "</td>";
              echo "<td><meter style='width:500px;' min='0' max='" . $kiraJumlahPengundi['jumlahPengundi'] . "' value='" . $kiraKeputusan['total'] . "'></meter></td>";
              echo "<td style='padding-left: 20px;'>" . $kiraKeputusan['total'] . "  " . "Orang" . "</td>";
              echo "<td style='padding-left: 20px;'>" . $percentage . "</td>";
              echo "</tr>";
			  

            }
			

            echo "  </table>";

          }

          $display = mysql_query("SELECT * FROM kerusi");

          while ($display_row = mysql_fetch_array($display)) {
            
              display_candidate($display_row['namaKerusi']);

          }
    		
    		?></td>
  </tr>
</tbody>
</table></div>

      </div>

  </div>


</div>

