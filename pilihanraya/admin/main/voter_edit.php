<?php include '../../functions/connect.php'; ?>
<!DOCTYPE html>
<html>

	<head>

		<title></title>

	</head>

	<body>

		<?php
			$sql = mysql_query("SELECT * FROM pengundi WHERE pengundiID = " . $_GET['undiID']);
			$row = mysql_fetch_array($sql);
		?> 

		<form method="POST">
			<table width=50%>
				<tr>
					<td><input style="width:100%;" type="text" name="edit_pNamaPenuh" value="<?php echo $row['pNamaPenuh']; ?>"></td>
				</tr>
				<tr>
					<td><input style="width:100%;" type="text" name="edit_pNoPendaftaran" value="<?php echo $row['pNoPendaftaran']; ?>"></td>
				</tr>
                <tr>
					<td><input style="width:100%;" type="text" name="edit_program" value="<?php echo $row['program']; ?>"></td>
				</tr>
                  <tr>
                    <td><input style="width:100%;" type="text" name="edit_pKadPengenalan" value="<?php echo $row['pKadPengenalan']; ?>"></td>
                    </tr>
				<tr>
					<td><textarea style="width:100%; height:100px;" name="edit_jabatan"><?php echo $row['jabatan']; ?></textarea></td>
				</tr>
				<tr>
					<td><input name="Submit" type="submit" value="KemasKini"></td>
				</tr>
			</table>
		</form>

	</body>

</html>

<?php

	if (isset($_POST['edit_pNamaPenuh'])) {

		extract($_POST);
		
		$sql = "UPDATE pengundi SET pNamaPenuh = '$edit_pNamaPenuh', pNoPendaftaran = '$edit_pNoPendaftaran', program = '$edit_program',pKadPengenalan = '$edit_pKadPengenalan', jabatan = '$edit_jabatan' WHERE pengundiID = " . $_GET['undiID'];
		$run = mysql_query($sql);

		if ($run) {
			echo "<script>

					alert('Maklumat anda sudah dikemaskini');

					javascript:window.close();

				</script>";
		}

	}

?>