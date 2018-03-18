<?php require_once('../Connections/dbConn.php'); ?>
<?php

	
	extract($_POST);

	function ID_gen( $length = 4, $chars = '0123456789' ) {
		return substr( str_shuffle( $chars ), 0, $length ) . substr( str_shuffle( $chars ), 0, $length );
	}

	$pengundiID = ID_gen();
?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO pengundi (pengundiID, pNoPendaftaran, pNamaPenuh, pKadPengenalan, jabatan, program) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($pengundiID, "int"),
                       GetSQLValueString($_POST['pNoPendaftaran'], "text"),
                       GetSQLValueString($_POST['pNamaPenuh'], "text"),
                       GetSQLValueString($_POST['pKadPengenalan'], "text"),
                       GetSQLValueString($_POST['jabatan'], "text"),
                       GetSQLValueString($_POST['program'], "text"));

  mysql_select_db($database_dbConn, $dbConn);
  $Result1 = mysql_query($insertSQL, $dbConn) or die(mysql_error());

  $insertGoTo = "utama.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html>
<html>
	<head>
    
		<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		body,td,th {
	color: #FFF;
}
body {
	background-color: #FFF;
	background-image: url(../images/background.png);
}
        </style>
	<meta charset="utf-8">
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	</head>
	<body bgcolor="#FFFFFF" background="../images/Blue-Pattern-Background-640x400.jpg">
	
	<div style='margin: 0 auto; width:auto;' class="center vertical">

			<div class="panel panel-primary" style="width: 1024px; margin: 20px auto; font-size: 16px;">

				<div class="panel-heading">
				  <h5> <img src="../images/Untitled-2.png" width="387" height="147"></h5>
				</div>

			  <div class="panel-body">
			    <form method="POST" action="<?php echo $editFormAction; ?>" name="form">
                    <table width="683" border="0">
					  <tr>
					    <td width="227">Nama Penuh :</td>
					    <td width="446"><span id="sprytextfield1">
					      <label for="pNamaPenuh"></label>
					      <input type="text" name="pNamaPenuh" id="pNamaPenuh">
				        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				      </tr>
					  <tr>
					    <td>No Pendaftaran :</td>
					    <td><span id="sprytextfield2">
					      <label for="pNoPendaftaran"></label>
					      <input type="text" name="pNoPendaftaran" id="pNoPendaftaran">
				        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				      </tr>
					  <tr>
					    <td>No Kad Pengenalan :</td>
					    <td><span id="sprytextfield3">
					      <label for="pKadPengenalan"></label>
					      <input type="text" name="pKadPengenalan" id="pKadPengenalan">
				        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				      </tr>
					  <tr>
					    <td>Jabatan : </td>
					    <td><span id="sprytextfield4">
					      <label for="jabatan"></label>
					      <input type="text" name="jabatan" id="jabatan">
                          <input name="pengundiID" id="pengundiID" type="hidden" value="">
				        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				      </tr>
					  <tr>
					    <td>Program : </td>
					    <td><span id="sprytextfield5">
					      <label for="program"></label>
					      <input type="text" name="program" id="program">
				        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
				      </tr>
					 <tr>
							<td height="80"><div align="center">
							  <input type="reset" href="javascript:void(0);"  class="btn btn-primary" id="reset" style="width:50%;" value="Reset">
						    </div></td>
							<td colspan="2" align="center"><div align="left"><span style="text-align: left"></span>
							  <input type="submit" href="javascript:void(0);"  class="btn btn-primary" id="submitbutton" style="width:25%;" value="Submit">
						    </div></td>
					  </tr>
				    </table>
                    <div align="center"></div>
                    <div align="center"></div>
                    <input type="hidden" name="MM_insert" value="form">
                  </form>
					
				</div>
			</div>

	</div>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
    </script>
	</body>

	<footer>
		Dikuasakan Oleh : 
	</footer>

</html>