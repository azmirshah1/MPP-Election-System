<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbConn = "localhost";
$database_dbConn = "pilihanraya";
$username_dbConn = "root";
$password_dbConn = "root";
$dbConn = mysql_pconnect($hostname_dbConn, $username_dbConn, $password_dbConn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>