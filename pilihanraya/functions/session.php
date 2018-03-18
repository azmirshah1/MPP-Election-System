<?php
	session_start();
	if (isset($_SESSION['pengundiID'])){
		$pKadPengenalan = $_SESSION['pKadPengenalan'];
		$pNamaPenuh = $_SESSION['pNamaPenuh'];
		$pNoPendaftaran = $_SESSION['pNoPendaftaran'];
		$pengundiID = $_SESSION['pengundiID'];
		$jabatan = $_SESSION['jabatan'];
		
		
	}
	else{
		header("Location:../../");
	}
?>