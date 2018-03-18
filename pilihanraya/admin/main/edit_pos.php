<script>
  $(document).ready(function(){

    $('.edit_button_position').each(function(index, element) {
      $(this).click(function(){

        $('.show_this_form_position').hide();
        $('.show_this_form_position').eq(index).show();
        $('.hide_this_form_position').show();
        $('.hide_this_form_position').eq(index).hide();

      });
    });

  });
</script>

<div class='container_allen edit'>

	<div class="panel panel-primary" style="width:1024px; margin:0 auto;">

      <div class="panel-heading"><h5>Kerusi Dipertandingkan</h5></div>
    
        <div class="panel-body">
	
			<?php

				$sql = "SELECT * FROM kerusi";
				$run = mysql_query($sql);

				echo "<table class='table data-table dataTable'>";

				echo "<tr>
						
						<th width=50%>Nama Kerusi</th>
						<th style='text-align:center !important;' width=25%>Slot</th>
						<th style='text-align:center !important;' width=25%>Tindakan</th>

					</tr>";

				while ($row = mysql_fetch_array($run)) {
					
					extract($row);

					echo "<tr class='hide_this_form_position'>
							<td>" . $namaKerusi . "</td>
							<td style='text-align:center !important;'>" . $jumlahCalon . "</td>
							<td style='text-align:center !important;'>
								<div class='btn-group'>
									<button class='btn btn-danger btn-xs edit_button_position'>Sunting</button>
								
								</div>
							</td>
						</tr>";

					echo "<tr style='display:none;' class='show_this_form_position'>
							<form method='POST'>
								<input type='hidden' value='" . $kerusiID . "' name='edit_pos_id'>
								<input type='hidden' value='" . $namaKerusi . "' name='edit_pos_name'>
								<td><input type='text' class='form-control' value='" . $namaKerusi . "' name='new_pos_name'></td>
								<td style='text-align:center !important;'><input class='form-control' style='width:20%;margin:0 auto; text-align:center' type='text' value='" . $jumlahCalon . "' name='new_pos_slot'></td>
								<td style='text-align:center !important;'>
									<button type='submit' class='btn btn-default btn-block btn-xs' style='width:30%; margin:0 auto;'>Save</button>								
								</td>
							</form>
						</tr>";

				}

				echo "</table>";

			?>

		</div>

		<div class="panel-footer">
           <u><b><p>Cara mengubahsuai kerusi yang dipertandingkan</p></b></u>
           <p>Kerusi yang disediakan secara lalai adalah seperti berikut:</p>
           <b><p>Kerusi Umum</p></b>
          <p>(Yang ditulis Umum seperti yang diatas) </p>
           <b><p>Kerusi Biro</p></b>
           <p>(Yang ditulis mengikut jabatan seperti yang diatas)</p>
           <p>JTMK</p>
           <p>JRKV</p>
           <p>JP</p>
           <p>JPH</p>
           <p>JKM</p>
           <p>Anda dibenarkan untuk melakukan suntingan dan mengubah jumlah kerusi yang dipertandingkan mengikut keadaan semasa. Walau bagaimanapun anda tidak dibenarkan untuk <b>menyunting nama</b> bagi setiap kerusi tersebut bagi mengelakkan kegagalan sistem.</p>
           <p>&nbsp;</p>
		</div>

		<?php

			if (isset($_POST['pos_name'])) {
				$sql = mysql_query("INSERT INTO kerusi(namaKerusi, jumlahCalon) VALUES('" . $_POST['pos_name'] . "', " . $_POST['pos_slot'] . ")");
				if ($sql) {
					echo "<meta http-equiv=refresh content=0 />";
				}

			}

			if (isset($_POST['new_pos_name'])) {
				extract($_POST);
				$sql = mysql_query("UPDATE kerusi SET namaKerusi = '$new_pos_name', jumlahCalon = $new_pos_slot WHERE kerusiID = $edit_pos_id");
				if ($sql) {
					mysql_query("UPDATE calon SET kerusi = '$new_pos_name' WHERE kerusi = '$edit_pos_name'");
					echo "<meta http-equiv=refresh content=0 />";
				}
			}

		?>


    </div>

</div>