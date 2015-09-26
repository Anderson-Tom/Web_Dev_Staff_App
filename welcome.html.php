<form> 
<?php
	echo "<h4>Welcome $_SESSION[fname] $_SESSION[sname]</h4><br />";
	$today = date('Y-m-d', $_SERVER['REQUEST_TIME']);
	echo "Date : $today <br />" ;
	$time = date('H:i:s', $_SERVER['REQUEST_TIME']);
	echo "Time : $time <br />";
	if (ISSET($_SESSION['BIRTHDAY']))
	{
		switch ($_SESSION['age'] )
		{
			case 21:
				echo "HAPPY 21<SUP>ST</SUP>, Collect your company keyring at reception!!<br />";
			break;
			
			case 30:
				echo "HAPPY 30<SUP>th</SUP>, Go easy on the booze tonight!!<br />";
			break;
			
			case 40:
				echo "HAPPY 40<SUP>th</SUP>, Still here. You must be wondering where it all went wrong?<br />";
			break;
			
			case 65:
				echo "HAPPY 65<SUP>th</SUP>, You probably qualify for the state pension.<br />";
			break;
			
			default:
			echo "Happy Birthday!<br />";
			break;
		}
	}
?>


<input type='submit' value='Submit' onclick="setPage('begin.html.php')" >
</form>
	
