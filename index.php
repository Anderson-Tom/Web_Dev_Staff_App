<?php
	session_start();	
	date_default_timezone_set ('Europe/Dublin');

?>

<!DOCTYPE HTML>

<html lang="en">

<head>
<meta charset="UTF-8">
<title>A Staff Application</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="toms.js"> </script>
</head>
<body  <?php  //-------------- SHOW ERROR MESSAGE ALERT  ETC. ON LOAD IF SET ---------------------------///
			if(ISSET($_SESSION['message']))
			{
			echo "onload=\"myAlert('$_SESSION[message]')\"";  
			UNSET($_SESSION['message']) ; }?>>
			
 
<div id="container">
<div id="infopane">

</div>
<ul id="nav">

<?php 
//----------------------------------- SHOW MENU IF USER LOGGED IN  -------------------------///
if (ISSET ($_SESSION['showmenu'])) : ?>


<li><a href=''>Menu</a>
<ul>
<li onclick="setPage('add_staff.html.php')"><a href=''>Add a Staff Member</a> 
<li onclick="setPage('login_report.html.php')"><a href=''>Login Report</a>
</ul>
</li>

<li><a href=''></a>

</li>

<li><a href=''></a>

</li>
<li><a href=''  id='logout'>Logout</a>
<ul>

<li><a href='quit.php'>Logout <?php if (ISSET($_SESSION['fname'])) echo $_SESSION['fname']; //---- PRINT USERNAME IF SET -----// ?></a></li>
</ul>
</li>
<!-- --------------------------- END OF SHOW MENU ---------------------------------------------------------------------------- -->
<?php endif ?>

</ul> 

<div id="content" name="content">


<?php 
if (ISSET($_SESSION['currentpage']) && ISSET($_SESSION['loggedin']))
{ 
include $_SESSION['currentpage'];
} else
{
	 include "login.html.php";
}
?>



</div>
</div>

</body>

</html>