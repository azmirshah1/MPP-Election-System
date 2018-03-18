<script>

  function delete_voter(id){
  var x = confirm("Are you sure you want to delete?");

    if(x == true){
      $.post('../../functions/delete_voter.php',
        {

          pengundiID:id

        },function(e){

          var result  = eval('('+e+')');
          window.location.href = window.location.href;

        });
      }
    }

</script>

<div class='container_allen voters'>

    <div class="panel panel-primary" style="width:1024px; margin:0 auto;">

      <div class="panel-heading">
        <h5>Senarai Pengundi</h5></div>
    
        <div class="panel-body">

            <table id="voters_tbl" class="table data-table dataTable">

              <thead>
                <tr role="row">
                  <th style="cursor:pointer;"><a>Nama Penuh</a></th>
                  <th style="cursor:pointer;"><a>No Pendaftaran</a></th>
                  <th style="cursor:pointer;"><a>Jabatan</a></th>
                  <th style="cursor:pointer;"><a>Program</a></th>
                  <th style="cursor:pointer;"><a>ID Pengundi</a></th>
                  <th style="cursor:pointer;"><a> Kad Pengenalan </a></th>
                  <th style="cursor:pointer;"><a> Undi? </a></th>
                  <th style="cursor:pointer; width:100px"><a>Tindakan</a></th>
                </tr>
              </thead>      

              <tbody role="alert" aria-live="polite" aria-relevant="all">

                <?php

                  $sql = mysql_query("SELECT * FROM pengundi ORDER BY selesaiUndi");

                  while ($row = mysql_fetch_array($sql)) {

                    $edit = "<a href='voter_edit.php?undiID=" . $row['pengundiID'] . "' target='_blank' class='btn btn-xs btn-default'>Edit</a>";
                    $delete = "<button type='button' class='btn btn-xs btn-danger' onclick=\"delete_voter('" . $row['pengundiID'] ."');\">Buang</button>";

                    if ($row['selesaiUndi'] == 1) {
                      $done = "<img style='width:20px; display:block; margin:0 auto;' src='../../images/done.png'>";
                    }

                    else{
                      $done = "<img style='width:20px; display:block; margin:0 auto;' src='../../images/not_done.png'>";
                    }

                    echo " <tr>
                            <td class=' sorting_1'>" . $row['pNamaPenuh'] . "</td>
                            <td class=' sorting_1'>" . $row['pNoPendaftaran'] . "</td>
                            <td class=' sorting_1'>" . $row['jabatan'] . "</td>
							<td class=' sorting_1'>" . $row['program'] . "</td>
                            <td class=' sorting_1'>" . $row['pengundiID'] . "</td>
							<td class=' sorting_1'>" . $row['pKadPengenalan'] . "</td>
							
                            <td class=' sorting_1'>" . $done . "</td>
                            <td style='text-align:center; width:100px;'><div class='btn-group'>" . $edit . $delete . "</div></td>
                          </tr>";
                  }

                ?>

              </tbody>

            </table>  

          </div>

          <div class="panel-footer">

            <form method="POST" action="voter_add.php">
              <div class="input-group">
                <table>
                  <tr>
                    <td width="20%"><input type="text" class="form-control" name="pNamaPenuh" placeholder="Nama Penuh" required></td>
                    <td width="20%"><input type="text" class="form-control" name="pNoPendaftaran" placeholder="No Pendaftaran" required></td>                                       
                    <td width="20%"><input type="text" class="form-control" name="pKadPengenalan" placeholder="Kad Pengenalan" required></td>
                    <td width="20%"><input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required></td>
                     <td width="20%"><input type="text" class="form-control" name="program" placeholder="Program" required></td>

                    <td><button style="background: #357ebd; color: #fff;" id="add_voter_btn" name="add" type="submit" class="btn btn-default">TAMBAH</button></td>
                  </tr>
                </table>
              </div>
            </form>
          </div>
          <div class="btn btn-default">
            <div align="center">
<a href="uploadTableVoters.php" target="_blank">              <table width="996">                <thead><tr>                  <th width="599"><div align="center">Masukkan data pelajar secara pukal (csv sahaja) :</div></th>                <th width="374"><div align="center">Klik pada pautan ini</div></th></tr></thead>                <tbody>                </tbody>              </table></a>            </div>
      </div>

  </div>

</div>
