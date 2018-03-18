<!DOCTYPE html>
<html>

  <head>

    <title></title>

    <link rel="stylesheet" type="text/css" href="../css/bootsrap.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <style type="text/css">
    body {
	background-image: url(../images/Blue-Pattern-Background-640x400.jpg);
}
    </style>
  <meta charset="utf-8">
  </head>

  <body>

    <?php include '../functions/connect.php'; ?>

    <div class='result' style="background:#FFF; width: 80%; margin:0 auto;">
        
        <div class="panel panel-primary" style="width:1024px; margin:0 auto;">

          <div class="panel-heading" style="background:#fff"><h1>Result</h1></div>
        
            <div class="panel-body">

            <?php
    		  
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
                    ";

            while($row = mysql_fetch_array($sql)){

              $a = md5($row['calonID']);
             
              $kira = mysql_query("SELECT count(*) as total FROM undi WHERE undiCalon = '$a'");
              $kiraKeputusan = mysql_fetch_assoc($kira);

              $percentage = round($kiraKeputusan['total'] / $kiraJumlahPengundi['jumlahPengundi'] * 100, 2) . "%";

              echo "<tr>";
              echo "<td width='200px;'>" . $row['cNamaPenuh'] . " " . $row['jabatan'] . "</td>";
              echo "<td><meter style='width:500px;' min='0' max='" . $kiraJumlahPengundi['jumlahPengundi'] . "' value='" . $kiraKeputusan['total'] . "'></meter></td>";
              echo "<td style='padding-left: 20px;'>" . $kiraKeputusan['total'] . "</td>";
              echo "<td style='padding-left: 20px;'>" . $percentage . "</td>";
              echo "</tr>";

            }

            echo "  </table>";

          }

          $display = mysql_query("SELECT * FROM kerusi");

          while ($display_row = mysql_fetch_array($display)) {
            
              display_candidate($display_row['namaKerusi']);

          }
    		
    		?>

          </div>
          
          <div>
          <p>
          <p>
          <p>
          <center> Terima Kasih kerana mengundi </center>
          <center>Ikhlas daripada :</center>
          <center>Ahli Jawatankuasa Pilihanraya Politeknik Muadzam Shah</center>
          </div>
          

      </div>

    </div>

  </body>
  

</html>