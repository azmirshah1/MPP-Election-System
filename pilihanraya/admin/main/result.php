<div class='container_allen result'>
		
  <div class="panel panel-primary" style="width:1024px; margin:0 auto;">

      <div class="panel-heading">
        <h5>Keputusan</h5></div>
    
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
      
      
    </div>
  <p align="right">
  <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'none';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><br />
  <img src="../../images/x.png" width="103" height="67" style="border:none;-webkit-box-shadow:none;box-shadow:none;"/> <br />
  Cetak Maklumat Ini</a></p>
</div>

