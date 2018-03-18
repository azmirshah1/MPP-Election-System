<style type="text/css">
.kaki {
	text-align: center;
}
.kaki {
	color: #FFF;
	font-family: "MS Serif", "New York", serif;
	font-weight: bold;
}
</style>
<div class='container_allen result'>
		
    <div class="panel panel-primary" style="width:1024px; margin:0 auto;">

      <div class="panel-heading">
        <h5>Set Waktu Pilihanraya</h5></div>
    
        <div class="panel-body">
        
        <p><b>Cara Setkan waktu Pilihanraya</b></p>
        
        <form method="POST" action="../../functions/update_sched.php">
		<div class="input-group" style="width:300px;">
			<input class="form-control" name="new_date" type="date">
			<span class="input-group-btn">
			<input type="submit" class="btn btn-primary">
			</span>
		</div>
        <p><br /> Cara set : dd -- mm --yyyy<br></p>
	</form>

	<?php
		$sql = mysql_query("SELECT * FROM jadualpilihanraya WHERE jadualID = 1");
		$res = mysql_fetch_array($sql);

		$d = explode("-", $res['jadual'] );

		switch ($d['1']) {
			case 1: $month = "Januari"; break;
			case 2: $month = "Februari"; break;
			case 3: $month = "Mac"; break;
			case 4: $month = "April"; break;
			case 5: $month = "Mei"; break;
			case 6: $month = "Jun"; break;
			case 7: $month = "Julai"; break;
			case 8: $month = "Ogos"; break;
			case 9: $month = "September"; break;
			case 10: $month = "Oktober"; break;
			case 11: $month = "November"; break;
			case 12: $month = "Disember"; break;
		}

	$new_format = $d[2] . " " . $month . " " . $d[0];

		echo "<br>Pilihanraya terkini: " . "<b> $new_format <b>";
	?>
   
        </div>

    </div>

</div>
