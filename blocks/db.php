<?php
$server = "srv-db-plesk07.ps.kz";
$username = "aibol_dbuser";
$password = "yMs}Yrq/d6+Q+KUA";
$db = "aibolkz_db";
$conn = mysql_connect($server, $username, $password);
mysql_select_db($db);
if (!$conn){
	die("Connection failed: " . $conn->connect_error);
}
?>