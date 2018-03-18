<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "Anda tidak memasukkan sebarang data. Sila tekan butang BACK dan pilih fail yang anda inginkan " . "<button type = back > Back </button>";
}
else
{
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
    $a=$_FILES["file"]["tmp_name"];
    //echo $a;

    $connect = mysql_connect('localhost','root','root');
if (!$connect) {
die('Could not connect to MySQL: ' . mysql_error());
}   
//your database name
$cid =mysql_select_db('pilihanraya',$connect);

// path where your CSV file is located
//define('CSV_PATH','C:/xampp/htdocs/');
//<!-- C:\xampp\htdocs -->
// Name of your CSV file
$csv_file = $a; 

if (($getfile = fopen($csv_file, "r")) !== FALSE) {
         $data = fgetcsv($getfile, 1000, ",");
   while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
     //$num = count($data);
       //echo $num;
        //for ($c=0; $c < $num; $c++) {
            $result = $data;
            $str = implode(",", $result);
            $slice = explode(",", $str);

            $col1 = $slice[0];
            $col2 = $slice[1];
            $col3 = $slice[2];
            $col4 = $slice[3];
			$col5 = $slice[4];

$query = "INSERT INTO pengundi(pNamaPenuh, pNoPendaftaran ,pKadPengenalan, jabatan, program) VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."')";
$s=mysql_query($query, $connect );
}
}
echo "<script>alert('Record successfully uploaded.');javascript:window.close();</script>";
}
?>