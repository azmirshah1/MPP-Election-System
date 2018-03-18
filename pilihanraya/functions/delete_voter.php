<?php


	require 'connect.php';
	$result = array();

		$sql = "DELETE FROM pengundi WHERE pengundiID = " . $_POST['pengundiID'];
		$run = mysql_query($sql);

		if ($run) {
			$result['error'] = false;
			$result['message'] = "Pengundi berjaya dibuang";
		}else{
			$result['error'] = true;
			$result['message'] = "pengundi tidak boleh dibuang";
			//$result['message'] = mysql_error();
		}

		echo json_encode($result);
	

?>