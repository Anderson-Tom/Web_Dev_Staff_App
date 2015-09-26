<?php
session_start();

//update logout time in database 
if (ISSET($_SESSION['loggedin']))
{
	include 'db.inc.php';
	$sql = "UPDATE LoginLog
			SET LogOutdateTime=NOW()
			WHERE LoginLogId =$_SESSION[loginsessionid];";
	
	$result =  mysql_query ($sql,$con);
	
	if (mysql_affected_rows() != 1)
{
		die("Error posting logout end of session time : " . mysql_error());
}

	
}  

session_destroy();
header('location: index.php');

?>