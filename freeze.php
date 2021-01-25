<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="margin-bottom: 100px;">

   
    <script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>        
           

<?php


include ('config.php');
include ('navbar.php');


$currentDate = date("Y-m-d H:i:s");


//$_GET['usertype'];

if(($_SESSION['usertype'] === "admin"))
{
	echo '<form  action = "" method = "post" style= "position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;">';
	$sql = "SELECT * FROM ELECTIONS WHERE E_START <= '$currentDate' AND  E_END >'$currentDate'";
	$result = mysqli_query($conn,$sql);
    
	if(mysqli_num_rows($result)>0 )

	{  
		echo "<h1>Freeze Election</h1>";
		echo '<select name ="EID" style = "width :400px; height: 30px">';
	while($row = mysqli_fetch_assoc($result))
	{
		
		
        echo "<option value=" . $row['E_ID'] . ">". $row['E_TITLE'] ."</option>" ;
	}

echo "</select>";
    echo '<input  style="margin: 10px" type="submit" name="submit"/>';
    echo "</form>";











if(isset($_POST['submit'])){

$E = $_POST["EID"];

$date_query = "SELECT E_END FROM ELECTIONS WHERE E_ID = '$E'";
	$result1 = mysqli_query($conn,$date_query);
	$end_date = mysqli_fetch_assoc($result1);
	$halt_flag = 1;

	$change  = "UPDATE ELECTIONS SET 
	RES_END = '$end_date[E_END]'

     WHERE E_ID IN ($E)";

     
if (mysqli_query($conn,$change)){
	



//echo "<h3>Do you want to resume a halted poll</h3>";

$freeze  = "UPDATE ELECTIONS SET 
	
	E_END = '$currentDate',

	
	HALT = '$halt_flag'

     WHERE E_ID IN ($E)";

if(mysqli_query($conn,$freeze))
{
	echo "Voting has been halted";

}
}
}
}
else

echo "No Ongoing Election";

}




?>
</div>

<script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>



