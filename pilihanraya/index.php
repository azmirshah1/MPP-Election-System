<?php
// Session untuk login masuk
session_start();
  if (isset($_SESSION['pengundiID'])) {
    header('Location:pages/main');
  }
?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css.map">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css.map">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<!-- Setkan Background Image mula -->
		<style type="text/css">
		body {
	background-image: url(images/Stunning-retro-graphic-powerpoint-design-background-1000x750.jpg);
	background-size: 100%;
}
        </style>
<!-- Set Background Image tamat -->
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
        
		
    <meta charset="utf-8">
	<title>Sistem Pilihanraya Politeknik</title>
	</head>
	<body>

		<div class="">
		
		<div class="panel panel-primary center" style="width:500px;margin:150px auto 0 auto;">
			<div class="panel-heading">
			  <center> <h4><img src="images/Untitled-2.png" width="367" height="122"></h4> </center>
			</div>
			<div class="panel-body">

				<form style="width:65%; margin:0 auto; text-align:center;" method="post" class="center" action="functions/login.php">
					<table width="299">
						<tr>
							<td colspan="2" align="center" id="result"><input type="hidden" name="hiddenField" id="jabatan"></td>
						</tr>
                        <tr>
							<td width="119">Kad Pengenalan: </td>
							<td width="168"><input class="form-control" type="password" name="pKadPengenalan" id="pKadPengenalan" data-options="required:true"></input></td>
						</tr>
						<tr>                      
							<td>No Pendaftaran: </td>
							<td><input class="form-control" type="password" name="pNoPendaftaran" id="pNoPendaftaran" data-options="required:true"></input></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td><div align="center">
							  <input type="reset" href="javascript:void(0);"  class="btn btn-primary" id="reset" style="width:100%;" value="Reset">
						    </div></td>
							<td colspan="2" align="center"><div align="right">
							  <input type="submit" href="javascript:void(0);"  class="btn btn-primary" id="submitbutton" style="width:80%;" value="Masuk">
						    </div></td>
						</tr>
					</table>
			  </form>
			</div>
		</div>

	</div>

</body>

</html>
