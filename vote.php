<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
 <?php
   include('navbar.php');
include ('config.php');?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="margin-bottom: 100px;">
<div class="container" style="margin-top: 80px">


  

<?php

if (isset($_SESSION['username'])) {

$currentDate = date("Y-m-d H:i:s");

if(isset($_SESSION['username'])){
    echo '<form action = "" method = "post" style = "margin-bottom :30px";>';
    $sql = "SELECT * FROM ELECTIONS WHERE E_START <= '$currentDate' AND  E_END > '$currentDate'";
    $result = mysqli_query($conn,$sql);
    echo '<div class="btn-group"  >';
    echo '<select class ="btn btn-light dropdown-toggle" name ="EID" >';
    if(mysqli_num_rows($result)>0 )

    { 
    	echo "<option disabled selected value = 'NULL'> -- Choose an Election -- </option>";
    while($row = mysqli_fetch_assoc($result))
    {
        
        
        echo "<option value=" . $row['E_ID'] . ">". $row['E_TITLE'] ."</option>" ;
    }

}
echo "</select>";
echo '</div>';
    echo '<input type="submit" name="submit" class = "btn btn-warning" style= "margin-left: 30px"/>';
    echo "</form>";




if(isset($_POST['submit'])){

    $E = $_POST["EID"];

    

$check = "SELECT * FROM VOTES WHERE V_ID = '$_SESSION[username]' AND E_ID ='$_POST[EID]'";
$found = mysqli_query($conn,$check);
if(mysqli_num_rows($found)>0 )
{
   echo '<script type="text/javascript">alert("You have already voted")</script>';
   echo("<script>window.location.href</script>");
  
   // {header('Location:admin.php');}


}
else {




$sql1 ="SELECT C.* , E.* FROM CANDIDATE AS C INNER JOIN ELECTIONS as E ON C.E_ID = '$_POST[EID]' AND  E.E_ID = '$_POST[EID]'";





mysqli_query($conn, $sql1);

$result1 = mysqli_query($conn,$sql1);

echo '<form action = "" method = "post">';



if(mysqli_num_rows($result1)>0 )

{  
 //$ename = mysqli_fetch_assoc($result1) ;
   
    
    echo "<table border='1' class='table'>";
     
    echo "<thead class='thead-light'><tr>";
    echo "<th>ELECTION ID</th>" . "<th>CANDIDATE ID</th>"."<th>NAME</th>" ."<th>INFO</th>" ."<th>OCCUPATION</th>" . 
    "<th>VOTE</th></tr></thead>";
    
    while($row = mysqli_fetch_assoc($result1))
    {

        echo "<tr>";

            $ename = $row['E_TITLE'] ;

            echo "<td>" . $row['E_ID'] . "</td>";

            echo "<td>" . $row['C_ID'] . "</td>";
            
            echo "<td>" . $row['NAME'] . "</td>";
            
            echo "<td>" . $row['INFO'] . "</td>";
            
            echo "<td>" . $row['OCCUPATION'] . "</td>";


            echo "<td>".'<input type="radio" name="radio1" value ='. $row["C_ID"]. '>';
        
            echo "</tr>";

            
    }



echo "</table>";

// echo "<h4 class = 'display-3' style ='margin-bottom: 300px'>" . $row['E_TITLE'] ." Election</h4>";
echo '<input type="submit" name="submit" value="Vote" class =" border btn-outline-warning my-2 my-lg-0" style="width: 150px"/>';
echo '<input type="hidden" name= "EID" value=' .$E. '>';





echo "</form>";
}

else
echo "No candidates to show";




//echo $_POST["EID"];


    if(isset($_POST["submit"])){

    
        if (!empty($_POST['radio1'])) {
            echo $_POST["radio1"];

            echo '<script type="text/javascript">alert("Thank you for voting ")</script>';
            echo '<div class="alert alert-light">
            Go to Home Page. <a href = "view_elections.php">Home</a>
        </div>';
            echo("<script>window.location.href</script>");



        
        $sql2= "INSERT INTO VOTES ( V_ID, E_ID, C_ID ) VALUES ( '$_SESSION[username]','$E', '$_POST[radio1]')";

            mysqli_query($conn, $sql2);

        }
        // else 
        //     echo '<script type="text/javascript">alert("No Candidate Selected ")</script>';
        //     echo("<script>window.location.href</script>");


    
 }       
}

}// showcandidate if isset

} // session if

}


?>
</div>



    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>