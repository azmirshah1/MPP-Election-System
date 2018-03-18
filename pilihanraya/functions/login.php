<?php 
session_start();
	
	include 'connect.php';

	extract($_POST);

	$pKadPengenalan = mysql_real_escape_string($_POST['pKadPengenalan']);
	$pNoPendaftaran = mysql_real_escape_string($_POST['pNoPendaftaran']);
	$jabatan = mysql_real_escape_string($_POST['jabatan']);
	

    $query = "SELECT * FROM pengundi WHERE pKadPengenalan = $pKadPengenalan";
    $result = mysql_query($query) or die ('<meta http-equiv="refresh" content="0;url=../" />');
    
    $array = mysql_fetch_array($result);

    $sql = mysql_query("SELECT * FROM jadualpilihanraya");
    $date_sched = mysql_fetch_array($sql);
    $date_now = date('Y-m-d');

    if ($date_now == $date_sched['jadual']) {

    	if ($array['pKadPengenalan'] == $pKadPengenalan && $array['pNoPendaftaran'] == $pNoPendaftaran && $array['selesaiUndi'] == 0){
			$_SESSION['pKadPengenalan'] = $pKadPengenalan;
			$_SESSION['pNoPendaftaran'] = $array['pNoPendaftaran'];
			$_SESSION['pNamaPenuh'] = $array['pNamaPenuh'];
			$_SESSION['pengundiID'] = $array['pengundiID'];
			$_SESSION['jabatan'] = $array['jabatan'];
			header("Location: ../pages/main");
		}

		elseif ($array['pKadPengenalan'] == $pKadPengenalan && $array['pNoPendaftaran'] == $pNoPendaftaran && $array['selesaiUndi'] == 1){
			echo '<script language="javascript">';
			echo 'alert("Anda hanya dibenarkan mengundi sekali")';
			echo '</script>';
			echo '<meta http-equiv="refresh" content="0;url=../" />';
		}
		
		elseif ($array['pKadPengenalan'] == $pKadPengenalan && $array['selesaiUndi'] == 0){
			echo '<script language="javascript">';
			echo 'alert("Sila Masukkan Kad Pengenalan anda")';
			echo '</script>';
			echo '<meta http-equiv="refresh" content="0;url=../" />';
		}
		
		else{
			echo '<script language="javascript">';
			echo 'alert("Kata Laluan Anda Salah")';
			echo '</script>';
			echo '<meta http-equiv="refresh" content="0;url=../" />';
		}

    }
    
	else{
		echo '<script language="javascript">';
		echo 'alert("Tiada Pilihanraya untuk hari ini")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../" />';
	}
	
?>
