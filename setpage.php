<?php  
session_start();
if (ISSET($_GET['page']))
{
	$_SESSION['currentpage'] = $_GET['page'];
	if ($_SESSION['currentpage'] == "begin.html.php")
	{
		$_SESSION['showmenu'] = true;
	}
}
 header('location: ./index.php');
?>