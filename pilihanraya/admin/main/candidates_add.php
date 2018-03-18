<?php

  include '../../functions/connect.php';

  if(isset($_POST['add_c_btn'])){

    extract($_POST);
            
    $image =  base64_encode(file_get_contents($_FILES['cGambar']['tmp_name']));
    $image_data = base64_decode($image);
    $image_string = "data:image/jpeg;base64,".base64_encode($image_data);

    $tahun = date('Y');

    if ($_POST['kerusiApa'] != '-kerusi-') {
      
      $sql = "INSERT INTO calon SET 

      cNamaPenuh = '$cNamaPenuh',
      NoPendaftaran = '$NoPendaftaran',
      kerusiApa = '$kerusiApa',
      jabatan = '$jabatan',
	  program = '$program',
      tahun = $tahun,
      cGambar = '$image_string'";
                
      $run = mysql_query($sql);
              
      if($run){
        echo '<meta http-equiv="refresh" content="0;url=../main/?action=1" />';
      }else{
        echo mysql_error();
      }

    }

    else{
      echo "<script>alert('Sila pilih kerusi');</script>";
      echo '<meta http-equiv="refresh" content="0;url=../main/?action=1" />';
    }
    
  }

?>