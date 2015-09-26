<?php

	$host = 'localhost';
	$dbUser = 'User';
	$dbPass = 'Password';
	$database = 'Dbasename';
	
	$con = mysql_connect($host, $dbUser, $dbPass);
	
if (!$con)
{
	die ("Could not connect : ".mysql_error());
}

if (!mysql_select_db($database, $con))
{
	die("Error in selecting the database");
}
?>