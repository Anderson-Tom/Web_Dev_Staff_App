   <form name="add_emp" id="add_emp" method="post"  action="add_staff.php" onsubmit="return confirm('Are you sure you want to add these datails (Y/N)')" >             
<h4>
<?php 
echo "Loged in as $_SESSION[fname]   $_SESSION[sname] "; 


?>

</h4>	          

			  <h2>Add Staff </h2>       
	           
							<label for="fname">First Name :</label> 
							<input type="text" name="fname" id="fname" required pattern="[a-zA-Z-]+"  title="Please use letters of the alphabet and hyphens only" />  <br />
							<label for="sname">Surname :</label>
							<input type="text" name="sname" id="sname" required pattern="[a-zA-Z -]+"  title="Please use letters of the alphabet, spaces and hyphens only" />  <br />	  
	                        <label for="dob">Date of Birth :</label>
	                        <input type="date" id="dob" name="dob"  required  onblur="checkDatePast(this.value)"/><br />
							<label for="phone">Telephone :</label>
	                        <input type="text"id="phone" name="phone"  required pattern="[0-9 -]+" title="Please use numbers, spaces, or hyphens only"/><br />
							<label for="jobtitle">Jobtitle :</label>
	                        <input type="text"id="jobtitle" name="jobtitle"  required pattern="[a-zA-Z -]+" title="Please use letters of the alphabet, spaces or hyphens only"  /><br />
							<label for="username">Loginname :</label>
							 <input type="text"id="username" name="username"  required pattern="[a-zA-Z -]+" title="Please use letters of the alphabet, spaces or hyphens only"  /><br />
							<label for="password">Password :</label>
							 <input type="password"id="password" name="password" autocomplete=false required pattern="[a-zA-Z -]+" title="Please use letters of the alphabet, spaces or hyphens only"  /><br />
	                
	                <input id="leftbtn"type="reset" name="clear" value="Clear"></input>
	                <input type="submit" name="submit" value="Save"></input>

	            </form>