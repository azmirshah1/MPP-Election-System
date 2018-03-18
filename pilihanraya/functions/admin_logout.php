<?php
session_start();
if(isset($_SESSION['kataNama'])){
session_destroy();
header ("Location:../admin");}
?>