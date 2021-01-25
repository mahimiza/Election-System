<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="margin-bottom: 100px;">

   

<?php

include ('config.php');
include ('navbar.php');


$currentDate = date("Y-m-d H:i:s");

if($_SESSION['usertype'] === "admin"){
	echo '<form action = "" method = "post"  style= "position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px">';

  echo "<h1>Resume Halted Election</h1>";
	
	$sql = "SELECT * FROM ELECTIONS WHERE E_START <= '$currentDate' AND HALT = '1' AND RES_END >'$currentDate'";
	$result = mysqli_query($conn,$sql);
    echo '<select name ="EID" style = "width :400px; height: 30px;">';
	
	if(mysqli_num_rows($result)>0 )

	{ 
	while($row = mysqli_fetch_assoc($result))
	{
		
		
        echo "<option value=" . $row['E_ID'] . ">". $row['E_TITLE'] ."</option>" ;
	}

}
echo "</select>";
    echo '<input type="submit" name="submit" value = "Resume" style="margin: 10px/>';
    echo "</form>";




if(isset($_POST['submit'])){

$E = $_POST["EID"];

$resume = "SELECT RES_END FROM ELECTIONS WHERE E_ID = '$E'";
$resume_date =mysqli_fetch_assoc(mysqli_query($conn,$sql));


//echo "<h3>Do you want to resume a halted poll</h3>";

$change  = "UPDATE ELECTIONS SET
 E_END = '$resume_date[RES_END]',
 HALT = 0
 WHERE E_ID IN ($E)";

if(mysqli_query($conn,$change))
{
	echo "Election has been resumed";

}
}
}

else
header("location: signin.php");




?>

<script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

