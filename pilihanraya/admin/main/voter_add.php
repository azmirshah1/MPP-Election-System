<?php

	include '../../functions/connect.php';
	
	extract($_POST);

	function ID_gen( $length = 4, $chars = '0123456789' ) {
		return substr( str_shuffle( $chars ), 0, $length ) . substr( str_shuffle( $chars ), 0, $length );
	}

	$pengundiID = ID_gen();

	$sql = "INSERT INTO `pengundi`(`pengundiID`, `pNamaPenuh`, `pNoPendaftaran`, `pKadPengenalan`, `jabatan` , `program`) VALUES ($pengundiID, '$pNamaPenuh', '$pNoPendaftaran','$pKadPengenalan', '$jabatan' ,'$program')";
	$run = mysql_query($sql);

	if ($run) {
		echo '<meta http-equiv="refresh" content="0;url=../main" />';
	}

	else{
		echo mysql_error();
	}

?>

