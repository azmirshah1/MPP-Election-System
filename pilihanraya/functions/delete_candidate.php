<?php


	require 'connect.php';
	$result = array();

		$sql = "DELETE FROM `calon` WHERE calonID = " . $_POST['calonID'];
		mysql_query("DELETE FROM undi WHERE undiCalon = '" . md5($_POST['calonID']) . "'");
		$run = mysql_query($sql);

		if ($run) {
			$result['error'] = false;
			$result['message'] = "Data berjaya dibuang";
		}else{
			$result['error'] = true;
			$result['message'] = "Data tidak boleh dibuang";
			//$result['message'] = mysql_error();
		}

		echo json_encode($result);
	

?>