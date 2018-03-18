<script>

  function delete_candidate(id){
  var y = confirm("Anda pasti untuk buang pelajar ini daripada senarai calon?");

    if(y == true){
      $.post('../../functions/delete_candidate.php',
        {

          calonID:id

        },function(e){

          var result  = eval('('+e+')');
          window.location.href = window.location.href;

        });
      }
    }

</script>

<script>
  $(document).ready(function(){

    $('.edit_button_candidates').each(function(index, element) {
      $(this).click(function(){

        $('.show_this_form_candidates').hide();
        $('.show_this_form_candidates').eq(index).show();
        $('.hide_this_form_candidates').show();
        $('.hide_this_form_candidates').eq(index).hide();

      });
    });

  });
</script>

            

<div class='container_allen candidates'>
		
		<div class="panel panel-primary" style="width:1024px; margin:0 auto;">

      <div class="panel-heading">

        <table width="100%;">
          <tr>

            <td width="50%;">
              <form method="POST">
                <div class="input-group" style="width: 100%">
                  <input type="text" class="form-control" name="find">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">CARI</button>
                  </span>
                </div>
              </form>
            </td>

            <td width="50%;">
              <form method="POST">
                <select name="sort" class="form-control" style="width:30%; float:right" onchange="this.form.submit()">
                  <option><?php if (isset($_POST['sort'])) { echo $_POST['sort']; }else{echo "CARI DENGAN";} ?></option>
                  <option disabled></option>
                  <option value="cNamaPenuh">Nama Penuh</option>
                  <option value="NoPendaftaran">No Pendaftaran</option>
                  <option value="kerusiApa">Kerusi</option>
                  <option value="jabatan">Jabatan</option>
                  <option value="jabatan">Program</option>
                </select>
              </form>
            </td>

          </tr>
        </table>

      </div>
    
        <div class="panel-body">

            <?php

              if (isset($_POST['find'])) {
                
                $find = mysql_query("SELECT * FROM calon WHERE cNamaPenuh like '%" . $_POST['find'] . "%' OR 
                                                                    NoPendaftaran like '%" . $_POST['find'] . "%' OR
                                                                    kerusiApa like '%" . $_POST['find'] . "%' OR
                                                                    jabatan like '%" . $_POST['find'] . "%'OR
                                                                    program like '%" . $_POST['find'] . "%'");

                if ($find) {

                  echo "<table class='table' style='text-align: center; width: 100%; box-shadow: 0 0 5px #111'>";

                  echo "<thead>
                          <tr>
                            <th colspan=6><h4>HASIL CARIAN</h4></th>
                          </tr>
                          <tr role='row'>
                            <th style='cursor:pointer; text-align: center; width: 10%;'><a>Nama Penuh</a></th>
                            <th style='cursor:pointer; text-align: center; width: 10%;'><a>No Pendaftaran</a></th>
                            <th style='cursor:pointer; text-align: center; width: 10%;'><a>Kerusi</a></th>
                            <th style='cursor:pointer; text-align: center; width: 10%;'><a>Jabatan</a></th>
							 <th style='cursor:pointer; text-align: center; width: 10%;'><a>Program</a></th>
                            <th style='cursor:pointer; text-align: center; width: 10%;'><a>Gambar Calon</a></th>
                            <th style='cursor:pointer; text-align: center; width: 10%;'><a>Action</a></th>
                          </tr>
                        </thead>  ";

                  echo "<tbody>";

                  while ($array = mysql_fetch_array($find)) {
                  
                    echo " <tr class='hide_this_form_candidates'>
                            <td class=' sorting_1'>" . $array['cNamaPenuh'] . "</td>
                            <td class=' sorting_1'>" . $array['NoPendaftaran'] . "</td>
                            <td class=' sorting_1'>" . $array['kerusiApa'] . "</td>
                            <td class=' sorting_1'>" . $array['jabatan'] . "</td>
							<td class=' sorting_1'>" . $array['program'] . "</td>
                            <td class=' sorting_1'>
                              <img style='height:50px; display:block; margin:0 auto; box-shadow: 0 0 5px #111; border-radius: 5px;' src='" . $array['cGambar'] . "'>
                            </td>
                            <td class=' sorting_1'>
                                <button style='width:48%' class='edit_button_candidates btn btn-sm btn-default'>Sunting</button>
                                <button style='width:48%' class='btn btn-sm btn-danger' onclick=\"delete_candidate('" . $array['calonID'] . "');\">Buang</button>
                            </td>
                          </tr>";

                    echo " <tr class='show_this_form_candidates' style='display:none'>
                            <form method='POST'>
                              <input type='hidden' name='edit_c_id' value='" . $array['calonID'] . "'>
                              <td class=' sorting_1'>" . "<input name='edit_c_firstname' class='form-control input-sm' type='text' value='" . $array['cNamaPenuh'] . "'>" . "</td>
                              <td class=' sorting_1'>" . "<input name='edit_c_lastname' class='form-control input-sm' type='text' value='" . $array['NoPendaftaran'] . "'>" . "</td>
                              <td class=' sorting_1'>" . "<input name='edit_c_position' class='form-control input-sm' type='text' value='" . $array['kerusiApa'] . "'>" . "</td>
                              <td class=' sorting_1'>" . "<input name='edit_c_partylist' class='form-control input-sm' type='text' value='" . $array['jabatan'] . "'>" . "</td>
							   <td class=' sorting_1'>" . "<input name='edit_c_program' class='form-control input-sm' type='text' value='" . $array['program'] . "'>" . "</td>
                              <td class=' sorting_1'>
                                <img style='height:50px; display:block; margin:0 auto; box-shadow: 0 0 5px #111; border-radius: 5px;' src='" . $array['cGambar'] . "'>
                              </td>
                              <td class=' sorting_1'>
                                  <button type='submit' class='btn btn-block btn-sm btn-primary'>Save</button>
                              </td>
                            </form>
                          </tr>";

                  }//while

                  echo "</tbody>";

                  echo "</table>";

                  echo "<hr>";

                }else{

                  echo "<hr>Hasil carian anda tidak dijumpai!<hr>";

                }//else

              }//if isset

            ?>

            <table id="" class="table" style="text-align: center; width: 100%">

              <thead>
                <tr role="row">
                  <th style="cursor:pointer; text-align: center; width: 10%;"><a>Nama Penuh</a></th>
                  <th style="cursor:pointer; text-align: center; width: 10%;"><a>No Pendaftaran</a></th>
                  <th style="cursor:pointer; text-align: center; width: 10%;"><a>kerusi</a></th>
                  <th style="cursor:pointer; text-align: center; width: 10%;"><a>Jabatan</a></th>
                   <th style="cursor:pointer; text-align: center; width: 10%;"><a>Program</a></th>
                  <th style="cursor:pointer; text-align: center; width: 10%;"><a>Gambar Calon</a></th>
                  <th style="cursor:pointer; text-align: center; width: 10%;"><a>Tindakan</a></th>
                </tr>
              </thead>      

              <tbody role="alert" aria-live="polite" aria-relevant="all">

                <?php

                if (isset($_POST['sort'])) {
                  $sort = $_POST['sort'];
                }else{
                  $sort = 'NoPendaftaran';
                }

                if (isset($_POST['tahun'])) {
                  $tahun = $_POST['tahun'];
                }else{
                  $tahun = date('Y');
                }

                  $sql = mysql_query("SELECT * FROM calon WHERE tahun = $tahun ORDER BY $sort");

                  while ($row = mysql_fetch_array($sql)) {

                    $x = mysql_query("SELECT * FROM undi WHERE undiCalon = '" . md5($row['calonID']) . "'");

                    if (mysql_num_rows($x) == 0)
                    {
                      $edit = "<button style='width:48%' class='edit_button_candidates btn btn-sm btn-default'>Edit</button>";
                      $delete = "<button style='width:48%' class='btn btn-sm btn-danger' onclick=\"delete_candidate('" . $row['calonID'] . "');\">Buang</button>";
                    }
                    else
                    {
                      $edit = "<button style='width:48%;' class='edit_button_candidates btn btn-sm btn-default' disabled>Edit</button>";
                      $delete = "<button style='width:48%' class='btn btn-sm btn-danger' onclick=\"delete_candidate('" . $row['calonID'] . "');\" disabled>Buang</button>";
                    }

                    echo " <tr class='hide_this_form_candidates'>
                            <td class=' sorting_1'>" . $row['cNamaPenuh'] . "</td>
                            <td class=' sorting_1'>" . $row['NoPendaftaran'] . "</td>
                            <td class=' sorting_1'>" . $row['kerusiApa'] . "</td>
                            <td class=' sorting_1'>" . $row['jabatan'] . "</td>
							 <td class=' sorting_1'>" . $row['program'] . "</td>
                            <td class=' sorting_1'>
                              <img style='height:50px; display:block; margin:0 auto; box-shadow: 0 0 5px #111; border-radius: 5px;' src='" . $row['cGambar'] . "'>
                            </td>
                            <td class=' sorting_1'>
                                $edit
                                $delete
                            </td>
                          </tr>";

                    echo " <tr class='show_this_form_candidates' style='display:none'>
                            <form method='POST'>
                              <input type='hidden' name='edit_c_id' value='" . $row['calonID'] . "'>
                              <td class=' sorting_1'>" . "<input name='edit_c_firstname' class='form-control input-sm' type='text' value='" . $row['cNamaPenuh'] . "'>" . "</td>
                              <td class=' sorting_1'>" . "<input name='edit_c_lastname' class='form-control input-sm' type='text' value='" . $row['NoPendaftaran'] . "'>" . "</td>
                              <td class=' sorting_1'>" . "<input name='edit_c_position' class='form-control input-sm' type='text' value='" . $row['kerusiApa'] . "'>" . "</td>
                              <td class=' sorting_1'>" . "<input name='edit_c_partylist' class='form-control input-sm' type='text' value='" . $row['jabatan'] . "'>" . "</td>
							   <td class=' sorting_1'>" . "<input name='edit_c_program' class='form-control input-sm' type='text' value='" . $row['program'] . "'>" . "</td>
                              <td class=' sorting_1'>
                                <img style='height:50px; display:block; margin:0 auto; box-shadow: 0 0 5px #111; border-radius: 5px;' src='" . $row['cGambar'] . "'>
                              </td>
                              <td class=' sorting_1'>
                                  <button type='submit' class='btn btn-block btn-sm btn-primary'>Save</button>
                              </td>
                            </form>
                          </tr>";

                  }

                //////////////////////////////////////////////////////////////////////////////////////////////////////////////
                  if (isset($_POST['edit_c_id'])) {

                    $check = mysql_query("SELECT * FROM kerusi");

                    while ($row = mysql_fetch_array($check)) {

                      if ($_POST['edit_c_position'] == $row['namaKerusi']) {

                        $execute = mysql_query("UPDATE `calon` SET `cNamaPenuh`= '" . $_POST['edit_c_firstname'] . "', 
                              `NoPendaftaran`= '" . $_POST['edit_c_lastname'] . "', 
                              `kerusiApa`= '" . $_POST['edit_c_position'] . "', 
                              `jabatan`= '" . $_POST['edit_c_partylist'] . "', 
                              `program`= '" . $_POST['edit_c_program'] . "'
                              WHERE calonID = " . $_POST['edit_c_id']);

                        if ($execute) { 
                          echo "<meta http-equiv=refresh content=0 />"; 
                        }// if query

                      }// if
 
                    }// while

                  }// if isset
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ?>

              </tbody>

            </table>  

        </div>

        <div class="panel-footer">
          <form method="POST" enctype="multipart/form-data" action="candidates_add.php">
            <table width="998">
              <tr>
                <td width="154"><input class="form-control" type="text" name="cNamaPenuh" placeholder="Nama Penuh"></td>
                <td width="138"><input class="form-control" type="text" name="NoPendaftaran" placeholder="No Pendaftaran"></td>
                <td width="121">
                  <select class="form-control" name="kerusiApa">
                    <option>--Kerusi--</option>

                    <?php

                      $sql = "SELECT * FROM kerusi";

                      $run = mysql_query($sql);

                      while ($row = mysql_fetch_array($run)) {

                        echo "<option value='" . $row['namaKerusi'] . "'>" . $row['namaKerusi'] . "</option>";

                      }

                    ?>

                  </select>
                </td>
                <td width="134"><input class="form-control" type="text" name="jabatan" placeholder="Jabatan"></td>
                <td width="134"><input class="form-control" type="text" name="program" placeholder="program"></td>
                <td width="218"><input class="form-control" type="file" name="cGambar" required></td>
                <td width="67"><input class="btn btn-primary" name="add_c_btn" type="submit" value="Tambah"></td>
              </tr>
            </table>
          </form>
        </div>

      </div>

</div>