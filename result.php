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
//session_start();


$id = (isset($_GET['id']) ? $_GET['id'] : '');




if (isset($_SESSION['username'])) 
 {
    

    $sql = "SELECT E_ID,C_ID, count(V_ID) as maxcount
            FROM VOTES
            WHERE E_ID = '$id'
            GROUP BY C_ID
            HAVING maxcount = (SELECT max(maxcount)
            FROM (SELECT count(V_ID) as maxcount
                      FROM VOTES
                      WHERE E_ID = '$id'
                      GROUP BY C_ID
                     ) as t) ";
    $result = mysqli_query($conn, $sql);

    
        if (mysqli_num_rows($result)>0) 
            {
               
                echo"<div class ='container' style= 'position: fixed;
                 top: 50%;
                left: 50%;
                margin-top: -50px;
                margin-left: -600px'>";
                
                echo "<h1 class='display-4 '>Results</h1>";
                 if (mysqli_num_rows($result)>1) 
             echo "<h1>It's a Draw</h1>";
                else 
                    echo "<h1>Winner</h1>";
                echo "<table  class='table'>";
                echo "<thead class='thead-light'><tr>";
                echo "<th>ELECTION ID</th>" . "<th>ELECTION TITLE</th>" ."<th>ELECTION CITY</th>" ."<th>CANDIDATE ID</th>"."<th>NAME</th>"  ."<th>OCCUPATION</th>" . "<th>Vote Count</th>". 
                 "<tr></thead>";
        
                while($row = mysqli_fetch_assoc($result))
                {
                // $fetch = "SELECT E_ID, C_ID, NAME, INFO, OCCUPATION FROM CANDIDATE WHERE E_ID = '$id' AND C_ID = '$row[C_ID]'";
                   $votecount = $row["maxcount"];

                    $fetch = "SELECT C.* , E.* FROM CANDIDATE AS C INNER JOIN ELECTIONS as E  ON E.E_ID = ($id) AND C.C_ID = '$row[C_ID]'";
                        $result1 = mysqli_query($conn, $fetch);

                


    
                if(mysqli_num_rows($result1)>0)

                    {   
  
    
                        while($row1 = mysqli_fetch_assoc($result1))
                         {   
                            
                             echo "<tr>";
                             echo "<td>" . $row1['E_ID'] . "</td>";

                              echo "<td>" . $row1['E_TITLE'] . "</td>";

                              echo "<td>" . $row1['E_CITY'] . "</td>";

                             echo "<td>" . $row1['C_ID'] . "</td>";
            
                             echo "<td>" . $row1['NAME'] . "</td>";


            
                             
            
                             echo "<td>" . $row1['OCCUPATION'] . "</td>";
                              echo "<td>" . $votecount . "</td>";
                             echo "</tr>";
                         }               

                    }

                }

                 echo "</table>";



            }

    

    elseif(mysqli_num_rows($result)== 0) 
        echo'<div class="row justify-content-md-center"><div class="alert alert-danger" role="alert">
            Vote Count = 0. No Winner.
        </div>';


  


}



?>

<script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
