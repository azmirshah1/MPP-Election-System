<?php

	include 'connect.php';

	$new_date = $_POST['new_date'];

	$query = mysql_query("UPDATE `jadualpilihanraya` SET `jadual` = '$new_date' WHERE jadualID = 1");

	if ($query) {
		echo "<script>alert('Kemaskini Berjaya');</script>";
		echo "<meta http-equiv=refresh content='0;URL=../admin/main/?action=4' />";
	}

	else{
		echo mysql_error();
	}

?>