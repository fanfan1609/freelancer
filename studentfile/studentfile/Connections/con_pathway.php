<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_pathway = "localhost";
$database_con_pathway = "pathway";
$username_con_pathway = "tosin";
$password_con_pathway = "sebony2k3";
$con_pathway = mysql_pconnect($hostname_con_pathway, $username_con_pathway, $password_con_pathway) or trigger_error(mysql_error(),E_USER_ERROR); 
?>