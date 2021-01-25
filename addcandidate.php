<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<?php
 include 'config.php';

 include ('navbar.php');

if($_SESSION['usertype'] === "admin")
{
	 if (isset($_POST['submit'])) 
    {

    	$username = strlen ($_POST ["userName"]);  
		$length = strlen ($username); 
		$password = $_POST ["password"]; 
		$email = $_POST ["email"];  
		$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    	$date=date('Y-m-d', strtotime($_POST['DOB']));
    	 $flag = 0;




    	 if (empty ($_POST["userName"])) {  
    	$errMsg = "Error! You didn't enter  userame.";  
             $flag=1;
             echo $errMsg; 
              }
		if  (empty ($_POST["password"])) {  

   			 $errMsg = "Error! You didn't enter the password." ;
             $flag=1;
             echo $errMsg;  
         }


  		if (empty ($_POST["email"])){  
    			
    		$errMsg = "Error! You didn't enter the email.";  
			$flag=1;
			echo $errMsg;}


  		if (empty ($_POST["address"])){  
    		$errMsg = "Error! You didn't enter the adress."; 
			$flag=1;
			echo $errMsg;}



  		if (empty ($_POST["course"])){  
    			$errMsg = "Error! You didn't enter the number of course.";  
   				$flag=1;
				echo $errMsg;}

  		if ( $length < 4 && $length > 21) {  
   			 $errMsg = "Username must be between 5 to 20 characters.";  
            $flag=1;
            echo $errMsg;}

  
		if (!preg_match ($pattern, $email) ){  
    		$errMsg = "Email is not valid.";  
            $flag=1;
            echo $errMsg;  
           } 


         if ((floor((time() - strtotime($date))/31556926))<18)
    
    		{ echo "Invalid age";
				$flag=1;}
			
			echo '<script type="text/javascript">


			</script>';


          if($flag === 0)
         {
		 $sql = "INSERT INTO CANDIDATE (E_ID,NAME, DOB, PHONE, INFO, NID, EMAIL, OCCUPATION, ADDRESS) VALUES ('$_SESSION[election]','$_POST[name]','$_POST[date]','$_POST[phone]', '$_POST[info]','$_POST[nid]','$_POST[email]', '$_POST[occupation]', '$_POST[address]')";
		 

 		if(mysqli_query($conn, $sql))
 	 		{
 	 			echo "<a href='signin.php'>Candidate Added Successfully. Sign in</a>";
 	 			echo "<a href='addcandidate.php'>Add Candidate again?</a>";}
  		else {
   			 	echo "<a href='addcandidate.php'>Error in adding Candidate. Try again?</a>"; } 

   		}
   		mysqli_close($conn);

	}
}

 ?>


 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="margin-bottom: 100px;">
	<form action="" method="post" >
		

     <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form action= "<?php echo $_SERVER['PHP_SELF'] ?> " method ="POST">
        <div class="card" style="width: 18rem; margin: 30px">
            <div class="card-header">NEW CANDIDATE</div>
            <!--<img src="../../parrot.jpg" class="card-img-top" alt="image" />-->
            <div class="card-body">
                <div style="margin: 10px" >
                Name:
                <input type="text" name="name" id="name" required><br></div>
           
                 <div style="margin: 10px" >
                Date of Birth:<input type="date" name="date" required><br></div>
                 <div style="margin: 10px" >
                Phone:<input type="number"  name="phone" required><br></div>
                <div style="margin: 10px" >
                Info: <input type="text" name="info"><br></div>
                <div style="margin: 10px" >
                 National ID: <input type="text"  name="nid" id="nid" required><br></div>
                <div style="margin: 10px" >
                Email: <input type="email"  name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br></div>

                <div style="margin: 10px" >
                Occupation: <input type="text" name="occupation" id="occupation" required><br></div>
                <div style="margin: 10px" >
                Address: <input type="text" name="address"><br></div>
               
                <p class="card-text"></p>
                <div style="margin: 10px" >
                <input class="btn btn-primary" type="submit" name="submit" value="Register" style="padding: 10px" ></div>
        </form></div>
            
              
            </div>
        </div>
        

    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>












		<!-- Name: <input type="text" name="name"><br><br>
		Date of Birth: <input type="date" name="date"><br><br>
		Phone Number: <input type="number" name="phone"><br><br>
		Info: <input type="text" name="info"><br><br>
		NID: <input type="text" name="nid"><br><br>
		Email: <input type="email" name="email" id="email"
		  required><br><br>
		Occupation: <input type="text" name="occupation"><br><br>
		Address: <input type="text" name="address"><br><br>
		
		 -->
		<!--Confirm password:  <input type="password" name="password" id="txtConfirmPassword"><br><br>

		Address: <textarea name="address" form="candidateform" id="address">Enter address here...</textarea><br><br>
     
		INFO: <textarea name="info" form="candidateform" id="info">Enter candidate information here...</textarea><br><br>




		-->
		<!--<form action="" method="post" id="candidateform">-->
		<!-- <input type="submit" name="submit" value="Register"> -->

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

  <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

