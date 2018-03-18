<?php 
	include '../../functions/connect.php';
	include '../../functions/session.php';
?>
<!DOCTYPE html>
<html>
	<head>
		
		<?php include '../../functions/head.php'; ?>

		<style>

			body{
	background: #ccc;
	color: #000;
	background-image: url(../../images/background.png);
	background-size: 100% 100%;
	background-repeat: no-repeat;
			}


			/* ----------------------------------------------------- */

			input[type="checkbox"]{
			    display: none;
			}
			input[type="checkbox"]+label{
				padding: 10px 0px;
				text-align: center;
			    width: 240px;
			    display: inline-block;
			    margin: 2px;
			    cursor: pointer;
			    -webkit-filter: grayscale(100%);
				-moz-filter: grayscale(100%);
				-ms-filter: grayscale(100%);
				-o-filter: grayscale(100%);
				filter: grayscale(100%);

			}
			input[type="checkbox"]:checked+label{
			   	color: blue;
			   	font-weight: bold;
			   	border-radius: 5px;
				-webkit-filter: grayscale(0%);
				-moz-filter: grayscale(0%);
				-ms-filter: grayscale(0%);
				-o-filter: grayscale(0%);
				background: yellow;
			}


			.c_img{
				border: 1px solid black;
				width: 200px;
				height: 250px;
				display: block;
				margin: 0 auto;
			}

			.sub{
				margin: 0 auto;
				display: block;
				width: 1024px !important;
				height: 50px !important;
				text-align: center !important;
			}

		.center.vertical .panel.panel-primary .panel-body p b {
	color: #06F;
}
        .center.vertical .panel.panel-primary .panel-body p b {
	color: #0066FF;
}
        </style>

    <meta charset="utf-8">
	</head>
	<body>
	
		<div style='margin: 0 auto; width:auto;' class="center vertical">

			<div class="panel panel-primary" style="width:1024px; margin: 20px auto;">

				<div class="panel-heading">
                <center><img src="../../images/Untitled-2.png" width="521" height="227"></center>
				 </div>

				<div class="panel-body">
                  <p> Selamat datang <b><?php echo " " . $pNamaPenuh . " " . $pNoPendaftaran . " " . $jabatan ; ?> </b></p>
                    
                    <p><b>Assalamualaikum dan Salam Sejahtera.</b></p>
					<p><b>Mohon Perhatian!!</b></p>
					<p><b>Cara Mengundi:</b>Pilihanraya ini dibuat bagi memilih calon yang dipertandingkan bagi mewakili Majlis Perwakilan Pelajar (MPP). Ada 7 kerusi dipertandingan untuk kerusi umum dan 16 kerusi biro. </p>
					<p><b>Semasa Mengundi: </b>Bagi memilih calon-calon pilihanraya yang anda kehendaki, sila klik pada gambar calon mengikut kerusi yang dipertandingkan. Bagi melakukan &quot;Undo&quot;, sila klik kembali gambar calon terbabit bagi membatalkan undian terbabit.<br>
					  <b>Selepas Mengundi: </b>Selepas selesai memilih calon-calon pilihan anda, sila klik butang  
					  <button class="btn btn-primary">Buang Undi</button> 
					  yang terletak dibahagian bawah ruangan mengundi. Sila mengundi secara bijak. Suara anda bakal disuarakan oleh mereka.</p>
					<p>&nbsp;</p>
				</div>
			</div>
            

			<form method="POST">
			
				<?php 

					$all_pos = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'Umum'");

					while($all_pos_row = mysql_fetch_array($all_pos)){

						echo "
						<div class='panel panel-primary' style='width:1024px; margin-left: auto; margin-right: auto;'>
							<div class='panel-heading'><h5>" . $all_pos_row['namaKerusi'] . "</h5></div>
							<div class='panel-body'>";


									$cong = mysql_query("SELECT * FROM calon WHERE kerusiApa = 'Umum'");

									while ($row = mysql_fetch_array($cong)) {

										$slot = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'Umum'");
										$slot_r = mysql_fetch_array($slot);

										echo "
											<script type='text/javascript'>

												var " . $row['kerusiApa'] . "_count = 0

												function set_check_" . $slot_r['kerusiID'] . "(obj, slot, pos){

													var maxChecks = slot

													if(obj.checked){
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count + 1
													}
													else{
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
													}
												
													if (" . $row['kerusiApa'] . "_count > maxChecks){
														obj.checked = false
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
														alert('Anda hanya dibenarkan mengundi sebanyak ' + maxChecks + ' orang calon ' + pos + ' sahaja.')
													}
												}

											</script>
										";

										echo "<input id='c" . $row['calonID'] . "' type='checkbox' onclick=\"set_check_" . $slot_r['kerusiID'] . "(this, " . $slot_r['jumlahCalon'] . ", '" . $row['kerusiApa'] . "')\" name='" . $row['kerusiApa'] . "[]' value='" . $row['calonID'] . "'>" . 

											"<label for='c" . $row['calonID'] . "'><img class='c_img' src='" . $row['cGambar'] . "'><br>"   

											. $row['cNamaPenuh'] . " " . $row['jabatan'] . "</label>";

									}

							echo "
							</div>
						</div>";

					}

				?>
                
                <?php 

	if ($jabatan == 'JTMK')
	{

					$biroJTMK_pos = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JTMK'");

					while($biroJTMK_pos_row = mysql_fetch_array($biroJTMK_pos)){

						echo "
						<div class='panel panel-primary' style='width:1024px; margin-left: auto; margin-right: auto;'>
							<div class='panel-heading'><h5>
							Calon Biro " . $biroJTMK_pos_row['namaKerusi'] . "</h5></div>
							<div class='panel-body'>";


									$cong = mysql_query("SELECT * FROM calon WHERE kerusiApa = 'JTMK'");

									while ($row = mysql_fetch_array($cong)) {

										$slot = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JTMK'");
										$slot_r = mysql_fetch_array($slot);

										echo "
											<script type='text/javascript'>

												var " . $row['kerusiApa'] . "_count = 0

												function set_check_" . $slot_r['kerusiID'] . "(obj, slot, pos){

													var maxChecks = slot

													if(obj.checked){
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count + 1
													}
													else{
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
													}
												
													if (" . $row['kerusiApa'] . "_count > maxChecks){
														obj.checked = false
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
														alert('Anda hanya dibenarkan mengundi sebanyak ' + maxChecks + ' orang calon ' + pos + ' sahaja.')
													}
												}

											</script>
										";

										echo "<input id='c" . $row['calonID'] . "' type='checkbox' onclick=\"set_check_" . $slot_r['kerusiID'] . "(this, " . $slot_r['jumlahCalon'] . ", '" . $row['kerusiApa'] . "')\" name='" . $row['kerusiApa'] . "[]' value='" . $row['calonID'] . "'>" . 

											"<label for='c" . $row['calonID'] . "'><img class='c_img' src='" . $row['cGambar'] . "'><br>"   

											. $row['cNamaPenuh'] . " " . $row['jabatan'] . "</label>";

									}

							echo "
							</div>
						</div>";

					}
	}
	
	elseif($jabatan =='JKM')
	
	{

					$biroJKM_pos = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JKM'");

					while($biroJKM_pos_row = mysql_fetch_array($biroJKM_pos)){

						echo "
						<div class='panel panel-primary' style='width:1024px; margin-left: auto; margin-right: auto;'>
							<div class='panel-heading'><h5>
							Calon Biro " . $biroJKM_pos_row['namaKerusi'] . "</h5></div>
							<div class='panel-body'>";


									$cong = mysql_query("SELECT * FROM calon WHERE kerusiApa = 'JKM'");

									while ($row = mysql_fetch_array($cong)) {

										$slot = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JKM'");
										$slot_r = mysql_fetch_array($slot);

										echo "
											<script type='text/javascript'>

												var " . $row['kerusiApa'] . "_count = 0

												function set_check_" . $slot_r['kerusiID'] . "(obj, slot, pos){

													var maxChecks = slot

													if(obj.checked){
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count + 1
													}
													else{
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
													}
												
													if (" . $row['kerusiApa'] . "_count > maxChecks){
														obj.checked = false
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
														alert('Anda hanya dibenarkan mengundi sebanyak ' + maxChecks + ' orang calon ' + pos + ' sahaja.')
													}
												}

											</script>
										";

										echo "<input id='c" . $row['calonID'] . "' type='checkbox' onclick=\"set_check_" . $slot_r['kerusiID'] . "(this, " . $slot_r['jumlahCalon'] . ", '" . $row['kerusiApa'] . "')\" name='" . $row['kerusiApa'] . "[]' value='" . $row['calonID'] . "'>" . 

											"<label for='c" . $row['calonID'] . "'><img class='c_img' src='" . $row['cGambar'] . "'><br>"   

											. $row['cNamaPenuh'] . " " . $row['jabatan'] . "</label>";

									}

							echo "
							</div>
						</div>";

					}
	}
	
	
	elseif($jabatan =='JP')
	
	{

					$biroJP_pos = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JP'");

					while($biroJP_pos_row = mysql_fetch_array($biroJP_pos)){

						echo "
						<div class='panel panel-primary' style='width:1024px; margin-left: auto; margin-right: auto;'>
							<div class='panel-heading'><h5>Calon Biro " . $biroJP_pos_row['namaKerusi'] . "</h5></div>
							<div class='panel-body'>";


									$cong = mysql_query("SELECT * FROM calon WHERE kerusiApa = 'JP'");

									while ($row = mysql_fetch_array($cong)) {

										$slot = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JP'");
										$slot_r = mysql_fetch_array($slot);

										echo "
											<script type='text/javascript'>

												var " . $row['kerusiApa'] . "_count = 0

												function set_check_" . $slot_r['kerusiID'] . "(obj, slot, pos){

													var maxChecks = slot

													if(obj.checked){
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count + 1
													}
													else{
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
													}
												
													if (" . $row['kerusiApa'] . "_count > maxChecks){
														obj.checked = false
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
														alert('Anda hanya dibenarkan mengundi sebanyak ' + maxChecks + ' orang calon ' + pos + ' sahaja.')
													}
												}

											</script>
										";

										echo "<input id='c" . $row['calonID'] . "' type='checkbox' onclick=\"set_check_" . $slot_r['kerusiID'] . "(this, " . $slot_r['jumlahCalon'] . ", '" . $row['kerusiApa'] . "')\" name='" . $row['kerusiApa'] . "[]' value='" . $row['calonID'] . "'>" . 

											"<label for='c" . $row['calonID'] . "'><img class='c_img' src='" . $row['cGambar'] . "'><br>"   

											. $row['cNamaPenuh'] . " " . $row['jabatan'] . "</label>";

									}

							echo "
							</div>
						</div>";

					}
	}
	
	
	elseif($jabatan =='JPH')
	{

					$biroJPH_pos = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JPH'");

					while($biroJPH_pos_row = mysql_fetch_array($biroJPH_pos)){

						echo "
						<div class='panel panel-primary' style='width:1024px; margin-left: auto; margin-right: auto;'>
							<div class='panel-heading'><h5>Calon Biro " . $biroJPH_pos_row['namaKerusi'] . "</h5></div>
							<div class='panel-body'>";


									$cong = mysql_query("SELECT * FROM calon WHERE kerusiApa = 'JPH'");

									while ($row = mysql_fetch_array($cong)) {

										$slot = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JPH'");
										$slot_r = mysql_fetch_array($slot);

										echo "
											<script type='text/javascript'>

												var " . $row['kerusiApa'] . "_count = 0

												function set_check_" . $slot_r['kerusiID'] . "(obj, slot, pos){

													var maxChecks = slot

													if(obj.checked){
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count + 1
													}
													else{
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
													}
												
													if (" . $row['kerusiApa'] . "_count > maxChecks){
														obj.checked = false
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
														alert('Anda hanya dibenarkan mengundi sebanyak ' + maxChecks + ' orang calon ' + pos + ' sahaja.')
													}
												}

											</script>
										";

										echo "<input id='c" . $row['calonID'] . "' type='checkbox' onclick=\"set_check_" . $slot_r['kerusiID'] . "(this, " . $slot_r['jumlahCalon'] . ", '" . $row['kerusiApa'] . "')\" name='" . $row['kerusiApa'] . "[]' value='" . $row['calonID'] . "'>" . 

											"<label for='c" . $row['calonID'] . "'><img class='c_img' src='" . $row['cGambar'] . "'><br>"   

											. $row['cNamaPenuh'] . " " . $row['jabatan'] . "</label>";

									}

							echo "
							</div>
						</div>";

					}
	}
	
	elseif($jabatan =='JRKV')
	{

					$biroJRKV_pos = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JRKV'");

					while($biroJRKV_pos_row = mysql_fetch_array($biroJRKV_pos)){

						echo "
						<div class='panel panel-primary' style='width:1024px; margin-left: auto; margin-right: auto;'>
							<div class='panel-heading'><h5>
							Calon Biro " . $biroJRKV_pos_row['namaKerusi'] . "</h5></div>
							<div class='panel-body'>";


									$cong = mysql_query("SELECT * FROM calon WHERE kerusiApa = 'JRKV'");

									while ($row = mysql_fetch_array($cong)) {

										$slot = mysql_query("SELECT * FROM kerusi WHERE namaKerusi = 'JRKV'");
										$slot_r = mysql_fetch_array($slot);

										echo "
											<script type='text/javascript'>

												var " . $row['kerusiApa'] . "_count = 0

												function set_check_" . $slot_r['kerusiID'] . "(obj, slot, pos){

													var maxChecks = slot

													if(obj.checked){
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count + 1
													}
													else{
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
													}
												
													if (" . $row['kerusiApa'] . "_count > maxChecks){
														obj.checked = false
														" . $row['kerusiApa'] . "_count = " . $row['kerusiApa'] . "_count - 1
														alert('Anda hanya dibenarkan mengundi sebanyak ' + maxChecks + ' orang calon ' + pos + ' sahaja.')
													}
												}

											</script>
										";

										echo "<input id='c" . $row['calonID'] . "' type='checkbox' onclick=\"set_check_" . $slot_r['kerusiID'] . "(this, " . $slot_r['jumlahCalon'] . ", '" . $row['kerusiApa'] . "')\" name='" . $row['kerusiApa'] . "[]' value='" . $row['calonID'] . "'>" . 

											"<label for='c" . $row['calonID'] . "'><img class='c_img' src='" . $row['cGambar'] . "'><br>"   

											. $row['cNamaPenuh'] . " " . $row['jabatan'] . "</label>";

									}

							echo "
							</div>
						</div>";

					}
	}
	
	
	else
	
	{
		echo " Ada masalah mengeluarkan data calon biro, sila hubungi bahagian teknikal";
	}
				?>

				
				<input type="submit" class="btn btn-primary sub" name="submit_vote_btn" value='Buang Undi'>

			</form>

			<?php

				if (isset($_POST['submit_vote_btn'])) {

					extract($_POST);

					function submit_vote($pengundiID, $calonID){

						$sql = "INSERT INTO undi(pengundiID,undiCalon) VALUES($pengundiID, '" . md5($calonID) . "')";
						$run = mysql_query($sql);

						if ($run) {
							$done = mysql_query("UPDATE pengundi SET selesaiUndi = 1, tarikhUndi = NOW() WHERE pengundiID = $pengundiID");
						}

					}

					$result = mysql_query("SELECT * FROM kerusi");

					while ($retval = mysql_fetch_array($result)) {
						
						if (isset($_POST[$retval['namaKerusi']])) {

							foreach($_POST[$retval['namaKerusi']] as $submit_retval['kerusiID']){

								submit_vote($pengundiID, $submit_retval['kerusiID']);

							}

						}

					}

					if(isset($_SESSION['pengundiID'])){
						session_destroy();
						echo '<script language="javascript">';
						echo 'alert("Terima kasih kerana mengundi. Undian anda telah dikira")';
						echo '</script>';
						echo "<meta http-equiv=refresh content=0 />";
					}

				}

			?>

		</div>
		
	</body>

	<footer>
	<a href="../../functions/logout.php">Log Keluar</a>
	</footer>

</html>