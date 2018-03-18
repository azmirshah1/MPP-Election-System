<?php
session_start();
if(isset($_SESSION['pengundiID'])){
session_destroy();
header ("Location:../");}
?>