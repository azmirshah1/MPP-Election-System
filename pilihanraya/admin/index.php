<?php
session_start();
  if (isset($_SESSION['kataNama'])) {
    header('Location:main');
  }
?>
<!DOCTYPE html>
<html>

	<head>

		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css.map">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css.map">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">

		<script type="text/javascript" src="../js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>

		<style>
			.panel-primary>.panel-heading,
			.btn-primary{
		        background: #272822;
		    }

		    .panel-primary,
	      	.panel-primary>.panel-heading,
	      	.btn-primary{
	        	border-color: #272822;
	      	}
		.btn-primary1 {		        background: #272822;
}
.btn-primary1 {	        	border-color: #272822;
}
.panel-primary1 {	        	border-color: #272822;
}
        body {
	background-image: url(../images/black-and-grey-lines-powerpoint-template.jpg);
}
        </style>
		
    <meta charset="utf-8">
	<title>Sistem Pilihanraya Politeknik</title>
	</head>
	<body>

		<div>
		
		<div class="panel panel-primary center" style="width:500px;margin:150px auto 0 auto;">
			<div class="panel-heading">
			  <center>
			    <h4><img src="../images/admin3.png" width="360" height="134"></h4></center>
			</div>
			<div class="panel-body">
				<form id="login-form" style="width:65%; margin:0 auto; text-align:center;" method="post" action="../functions/admin_login.php" class="center">
					<table width="299">
							<tr>
							<td colspan="2" align="center" id="result">&nbsp;</td>
						</tr>
						<tr>
							<td width="119">Kata Nama:</td>
							<td width="186"><input class="form-control" type="text" name="kataNama" id="kataNama" data-options="required:true"></input></td>
						</tr>
						<tr>
							<td>Kata Laluan:</td>
							<td><input class="form-control" type="password" name="kataLaluan" id="kataLaluan" data-options="required:true"></input></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td><input type="reset" href="javascript:void(0);"  class="btn btn-primary" id="reset" style="width:100%;" value="Reset"></td>
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