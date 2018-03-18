<?php 
session_start();
	
	include 'connect.php';

	extract($_POST);

	$kataNama = mysql_real_escape_string($_POST['kataNama']);
    $kataLaluan = mysql_real_escape_string($_POST['kataLaluan']);

    $query = "SELECT * FROM admin";
    $result = mysql_query($query) or die ("Verification error");
    $array = mysql_fetch_array($result);
    
    if ($array['kataNama'] == $kataNama && $array['kataLaluan'] == $kataLaluan){
        $_SESSION['kataNama'] = $kataNama;
        $_SESSION['adminID'] = $array['adminID'];
        header("Location: ../admin/main");
    }
    
    else{
    	echo '<script language="javascript">';
        echo 'alert("Sila masukkan kata nama atau kata laluan yang betul")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../admin" />';
    }
?>