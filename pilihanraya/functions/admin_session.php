<?php
	session_start();
	if (isset($_SESSION['kataNama'])){
		$kataNama = $_SESSION['kataNama'];
	}
	else{
		header("Location:../");
	}
?>