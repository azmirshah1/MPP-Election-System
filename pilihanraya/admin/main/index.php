<?php include '../../functions/admin_session.php'; include '../../functions/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  
  <head>

    <title>Pilihanraya Politeknik</title>

    <link rel="shortcut icon" href="../../images/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css.map">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type=t"text/css" href="../../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.css.map">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css">

    <link rel="stylesheet" href="../../css/main.css">
    <style type="text/css">
    body {
	background-image: url(../../images/black-and-grey-lines-powerpoint-template.jpg);
}
    </style>
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready( function(){

        $("#voters_tbl").dataTable();        
        $("#candidates_tbl").dataTable();      

      });
    </script>

  <?php include '../../functions/showhide.php'; ?>
  
  <meta charset="utf-8">
  </head>

  <body>

    <div class="container" style='margin-bottom:50px'>
	
		<!-- ========================================================================================= -->

      <h3 class="text-muted">&nbsp;</h3>
      <h3 class="text-muted"><img src="../../images/logo politeknik.png" width="187" height="79">Sistem Pilihanraya Politeknik - 
          <?php
            if (isset($_POST['tahun'])) {
              $tahun = $_POST['tahun'];
            }else{
              $tahun = date('Y');
            } 
            echo $tahun; ?>
      </h3>     
		
<form method="POST">
        <div align="right">
          <select class="form-control" style="width:150px; margin-top: 0px;" name="tahun" id="" onchange="this.form.submit()">
            <option value="<?php echo date('Y') ?>">Tahun</option>
            
            <?php

            $run = mysql_query("SELECT tahun FROM calon GROUP BY tahun");

            while ($row = mysql_fetch_array($run)) {
              echo "<option value='" . $row['tahun'] . "'>" . $row['tahun'] . "</option>";
            }

          ?>
            
          </select>
    </div>
      </form>
    <?php


      if (isset($_GET['action'])) {

        $action = $_GET['action'];

        switch ($action) {

          case 1: 
            include 'navs/candidates-nav.php';
            include 'candidates.php'; 
            break;

          case 2: 
            include 'navs/result-nav.php';
            include 'result.php';
            break;

          case 3: 
            include 'navs/edit-pos-nav.php';
            include 'edit_pos.php'; 
            break;

          case 4:
            include 'navs/elec-sched-nav.php';
            include 'elec_sched.php';
            break;

          case 5:
            include 'navs/preview-nav.php';
            include 'preview.php';
            break;
			
		 case 6:
            include 'navs/bantuan-nav.php';
            include 'bantuan.php';
            break;

        }

      }else{

        include 'navs/nav.php';
        include 'voters.php';

      }

    ?>
		
		<!-- ========================================================================================= -->
		
    </div>
  
  </body>

</html>
