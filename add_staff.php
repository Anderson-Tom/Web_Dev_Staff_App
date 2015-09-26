<?php

session_start();

if (ISSET($_SESSION['loggedin']))
{
include 'db.inc.php';

	

	$sql = " Select * from Staff 
	where LoginName = '$_POST[username]';";
	
		if (!$result = mysql_query($sql, $con))
	{
		die ('Error in querying the database' . mysql_error());
	}		
	
	if (mysql_affected_rows() > 0) 
	{
		$_SESSION['message'] = "This User name is already in use";
	} else {
	
	/// sql insert here
	
	}
	
	mysql_close($con);
}
header ("location: index.php") ;

?>
