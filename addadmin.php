<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<?php
 include 'config.php';
 session_start();

 $type = 'admin';

if($_SESSION['usertype'] === "admin")
{
	 if (isset($_POST['submit'])) 
    {
    	
          
		 $sql = "INSERT INTO USERS (NAME, DOB, PHONE, NID, EMAIL, USERNAME, PASSWORD, USERTYPE) VALUES ('$_POST[name]','$_POST[date]','$_POST[phone]','$_POST[nid]','$_POST[email]','$_POST[username]', '$_POST[password]', '$type')";
		 

 		if(mysqli_query($conn, $sql))
 	 		{
 	 			echo "<a href='signin.php'>New Admin Added Successfully. Sign in</a>";
 	 			echo "<a href='addcandidate.php'>Add Admin again?</a>";}
  		else {
   			 	echo "<a href='addcandidate.php'>Error in adding admin. Try again?</a>"; } 

   		mysqli_close($conn);

	}
}

 ?>


 <!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<form action="register.php" method="post" >
		
		Name: <input type="text" name="name"><br><br>
		Date of Birth: <input type="date" name="date"><br><br>
		Phone Number: <input type="number" name="phone"><br><br>
		NID: <input type="text" name="nid"><br><br>
		Email: <input type="email" name="email"><br><br>
		Username: <input type="text" name="username"><br><br>
		Password:    <input type="password" name="password" id="txtPassword"><br><br>
		
		<input type="submit" name="submit" value="New Admin Registered">
		
		
		<!--Confirm password:  <input type="password" name="password" id="txtConfirmPassword"><br><br>

		Address: <textarea name="address" form="candidateform" id="address">Enter address here...</textarea><br><br>
     
		INFO: <textarea name="info" form="candidateform" id="info">Enter candidate information here...</textarea><br><br>




		-->
		<!--<form action="" method="post" id="candidateform">-->
		<input type="submit" name="submit" value="Register">

	</form>
<!-- 
	<script type="text/javascript">

		function validateEmail(email) 
		{
    		var re =  /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    		return re.test(email);
		}

    	// function Validate() 
    	// {
     //    	var password = document.getElementById("txtPassword").value;
     //   		var confirmPassword = document.getElementById("txtConfirmPassword").value;
     //    	if (password != confirmPassword)
     //    		 {
     //        	alert("Passwords do not match.");
     //        	return false;
     //    		}
     //    return true;
    	// }/


	</script>


 -->
</body>
</html>