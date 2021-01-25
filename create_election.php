<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<?php

include('config.php');

include ('navbar.php');

if($_SESSION['usertype'] === "admin")
{
    //$s_date = 
	
    if (isset($_POST['submit'])) 
    {
    	
    	$start_date= date('Y-m-d H:i:s', strtotime($_POST['start_date'].' '.$_POST['start_time'] ));
    	$end_date = date('Y-m-d H:i:s', strtotime($_POST['end_date'].' '.$_POST['end_time']));
		//$query = 'INSERT INTO user_post (date) VALUES ("' . $date '")';
		$currentDate = date("Y-m-d");
		$errMsg = "Please fill out all fields ";  
             $flag=1;
		//echo $currentDate;
		//echo $start_date;
	  if (empty ($_POST["title"]) || empty ($_POST["city"]) || empty ($_POST["info"]) || empty ($_POST["start_date"])  || empty ($_POST["end_date"])){  
    	     
    	      echo $errMsg; }
      else{
              	
      if($currentDate<=$start_date && $end_date>$start_date && $end_date>$currentDate)

    	{
    		$sql = "INSERT INTO ELECTIONS (E_TITLE, E_CITY, E_INFO, ADMIN,E_START, E_END) VALUES ('$_POST[title]','$_POST[city]','$_POST[info]', '$_SESSION[username]', '$start_date', '$end_date')";

 		    if(mysqli_query($conn, $sql))
 	 			{echo "<div class='alert alert-success'> New Election Created Successfully. <a href='addcandidate.php'> Add Candidate</a></div>";
                   $last_id = mysqli_insert_id($conn);
                   $_SESSION['election'] = $last_id;
                }
  			else {
   	 			echo "Error in Creating Election.<a href='create_election.php'> Try again?</a>";
    	
    	}		}
    	else 
    	 echo '<script type="text/javascript">alert("Invalid Dates!");</script>';;

    }

}

//  <form method="post" action="addcandidate.php">
//     <input type="hidden" name="varname" value="var_value">
//     <input type="submit">
// </form>






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
        <?php
        if (count($_SESSION) > 0) : {  ?>
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form action= "<?php echo $_SERVER['PHP_SELF'] ?> " method ="POST">
        <div class="card" style="width: 18rem; margin: 30px">
            <div class="card-header">NEW ELECTION</div>
            <!--<img src="../../parrot.jpg" class="card-img-top" alt="image" />-->
            <div class="card-body">
                <div style="margin: 10px" >
                   ELECTION TITLE:
                <input type="text" name="title" id="title" required><br></div>
           
                 <div style="margin: 10px" >
                ELECTION CITY:<input type="text" name="city" required><br></div>
                 <div style="margin: 10px" >
                INFO:<input type="text"  name="info" required></div>
                <div style="margin: 10px" >
                ELECTION START DATE: <input type="date"  name="start_date" id="start_date" style="width: 195px"><br></div>
                <div style="margin: 10px" >
                ELECTION START TIME: <input type="time"  name="start_time" id="start_time" style="width: 195px"><br></div>

                 <div style="margin: 10px" >
                ELECTION END DATE: <input type="date"  name="end_date" id="end_date" style="width: 195px"><br></div> 
                <div style="margin: 10px" >
                ELECTION END TIME: <input type="time"  name="end_time" id="end_time" style="width: 195px"><br></div> 
                <!--<h5 class="card-title"></h5>-->
                <p class="card-text"></p>
                 <div style="margin: 10px" >
                <input class="btn btn-primary" type="submit" name="submit" value="CREATE" style="padding: 10px;" ></div>
        </form></div>
            <?php } elseif (count($_SESSION) === 0): {
                echo "Please Sign In. <a href = 'signin.php'>SignIn</a>";
            }
             endif; ?>
                <!--<button class="btn btn-primary">buy</button>-->
            </div>
        </div>
        

        <!--<div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Card-1
                    </div>
                    <div class="card-body">
                        Loreum Ipsum Loreum Ipsum Loreum Ipsum
                        <a href="#" class="btn btn-primary">click to view</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Card-1
                    </div>
                    <div class="card-body">
                        Loreum Ipsum Loreum Ipsum Loreum Ipsum
                        <a class="btn btn-primary" href="#">click to view</a>
                    </div>
                </div>
            </div>
        </div>
        collapse 
        <a class="btn btn-primary" data-toggle="collapse" href="#myContent">click me</a>
        <div class="collapse" id="myContent">
            <div class="card card-body text-white bg-info">
                Lorum Ipsum Lorum Ipsum Lorum Ipsum Lorum Ipsum
            </div>
        </div>
    </div>-->

    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html

<?php }
else
	header("location: signin.php");
 ?>
