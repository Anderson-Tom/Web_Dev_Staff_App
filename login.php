<?php
session_start();
date_default_timezone_set ('Europe/Dublin');
 
 if (ISSET( $_POST['loginname']) && ISSET($_POST['password'])) 
{	
		if (! ISSET($_SESSION['loginAttempts']))
		{
			$_SESSION['loginAttempts'] = 4;	
		} 	
		
		
		include "db.inc.php";
		$sql = "SELECT StaffId, FirstName, Surname, DateOfBirth, LoginName, password
				FROM Staff
				WHERE LoginName = '$_POST[loginname]'";	
							
		if ( !$result = mysql_query($sql, $con) )
		{
			die ("connection error!". mysql_error());			
		}
		if (mysql_affected_rows() == 1) 
		{			
			$row = mysql_fetch_array($result);
			
				//---------- PASSWORD CORRECT? --------------------//
			if ($row['password'] == $_POST['password'])
			{
				
				$_SESSION['correctpass'] = true;
				$_SESSION['fname'] = $row['FirstName'];
				$_SESSION['sname'] = $row['Surname'];
				$_SESSION['staffid'] = $row['StaffId'];
				$_SESSION['newlogin'] = 'true';
				$_SESSION['currentpage'] = 'welcome.html.php';
				$_SESSION['loggedin'] = true;
	
				UNSET ($_SESSION['loginAttempts']);
				
				
				//-------------------------AGE BIRTHDAY CHECK ----------------------------///
				
				$today = DateTime::createFromFormat('Y-m-d',(date('Y-m-d', $_SERVER['REQUEST_TIME'])));
				$dob = DateTime::createFromFormat('Y-m-d',$row['DateOfBirth']);
				$birthday = $dob -> format('%m %d');
				$todaydate = $today -> format ('%m %d');
				if ($birthday == $todaydate)
				{
					$_SESSION['BIRTHDAY'] = true;
				}
				$age = $today -> diff($dob);
				$_SESSION['age'] = $age -> format('%y');
				
				//------------- CREATE LOGIN RECORD -------------------/
				
				$sql = "insert into LoginLog (StaffId, LoginDateTime)
						VALUES ( $_SESSION[staffid], now())";
				
				if ( !$result = mysql_query($sql, $con) )
				{
					die ("connection error!". mysql_error());			
				}
				//------- get ID of current session for later ------------------------------//
				
				
				
				$sql = "SELECT max(LoginLogID) as MAXID FROM LoginLog ";
				
				if ( !$result = mysql_query($sql, $con) )
				{
					die ("connection error!". mysql_error());			
				}
				
				$row = mysql_fetch_array($result);
				
				$_SESSION ['loginsessionid'] = $row['MAXID'];
				
				
				
				
			
			} //------------- END OF PASSWORD CORRECT --------------//
		}
			//------------- PASSWORD CHECK FAILED ------------------//
		if ( !ISSET($_SESSION['correctpass']) ) 
		{	
			
			$_SESSION['loginAttempts'] --;	
			if ($_SESSION['loginAttempts'] > 0)
			{
				$_SESSION['message'] = "Login failed $_SESSION[loginAttempts] attempts remaining !";	
			} 
			else 
			{
				$_SESSION['message'] = "Login failed,GO AWAY!!";
				UNSET ($_SESSION['loginAttempts']);				
			}
		}
mysql_close($con);	
}
header('Location: index.php');

?>