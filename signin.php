<?php

	include 'config.php';
	if(isset($_POST['submit'])&& !empty($_POST['username'])){

		session_start();

		// if (condition) {
		// 	# code...
		// }

		

         $sql = "SELECT USERTYPE FROM USERS WHERE USERNAME = '$_POST[username]' and PASSWORD = '$_POST[password]'";
      $result = mysqli_query($conn,$sql);
      $row= mysqli_fetch_assoc($result);
     

      $account = "admin";

      if(mysqli_num_rows($result)>0)
	{
		$username = $_POST['username'];
	    $password = $_POST['password'];
	    $usertype = $_POST['$row'];
	    $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $row['USERTYPE'];

        
        
        if($row['USERTYPE']=== $account)
        header("location: admin.php");
        	
    	else
    	header("location:view_elections.php");

	}
     

	//elseif (USERTYPE  = '$_POST[account]') {
		
	//}

	else 
	// echo "<script type='text/javascript'>alert('Wrong username or password')</script>";

		echo '<div class="alert alert-danger" role="alert">Wrong username or password</div>';





		
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

   
        
        
        <!-- card -->
        <form action= "<?php echo $_SERVER['PHP_SELF'] ?> " method ="POST">
			
		<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="card" style="width: 18rem; margin: 30px;">
            <div class="card-header">
            <img src="ev.png" class="card-img-top" alt="image" style="width: 80px" pull="centre" /></div>
            <div class="card-body">
                <h5 class="card-title">SIGN IN</h5>
                <div style="margin: 10px" >
                USERNAME: <input type="text" name="username"></div>
                <div style="margin: 10px" >
                PASSWORD: <input type="password" name="password"></div>
                <div style="margin: 10px" >
                <input class="btn btn-outline-danger" type="submit" name="submit" value="Sign In">
               <div class="row"> </div>
               <br> <div class="row"> No account?<a href="registerv2.php">Register!</a> </div>


                <p class="card-text"></p> 

              </div> </div>
            </div>
        </div>
       
    </form>   

    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>












	<!-- <!DOCTYPE html>
	<html>
	<head>
		<title>Sign In</title>
	</head>
	<body>
	

			<form action= "<?php echo $_SERVER['PHP_SELF'] ?> " method ="POST">
				
				
				USERNAME: <input type="text" name="username">
				PASSWORD: <input type="password"             name="password">
				<input type="submit" name="submit" value="submit">
				
				
			</form>

			

	</body>
	</html> -->