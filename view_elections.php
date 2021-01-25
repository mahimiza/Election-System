<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<?php
include 'config.php';

include ('navbar.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="margin-bottom: 100px;">

<div class="container" style="margin-top: 100px; ">
    <?php 
 
 
 $currentDate = date("Y-m-d H:i:s");

 

 if (isset($_SESSION['username'])) 
 {
    

    $sql = "SELECT * FROM ELECTIONS";
    $result = mysqli_query($conn, $sql);
   

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table border='1' class='table table-light'>";
        echo "<thead class='thead-light'><tr>";
    echo "<th>ELECTION ID</th>" . "<th>ELECTION TITLE</th>"."<th>ELECTION CITY</th>" ."<th>ELECTION INFO</th>" ."<th>ELECTION STATUS</th>" . 
    "<th>VOTING STATUS</th></tr></thead>";

        while($row = mysqli_fetch_assoc($result)) 
        {
            $start_date = $row['E_START'];
            $end_date = $row['E_END'];
            $halt = $row['HALT'];
            
            
            
            if($currentDate>=$start_date && $end_date>$start_date&& $end_date>$currentDate)

                {   echo "<tr>";
                    echo"<td>".$row["E_ID"]."</td>". 
                        "<td>".$row["E_TITLE"]."</td>".
                        "<td>".$row["E_CITY"]."</td>".
                        "<td>".$row["E_INFO"]."</td>".
                        "<td>"."OPEN"."</td>". 
                        "<td>"."<a href='vote.php'>VOTE</a>"."</td>";
                    echo "</tr>";
                }

                if($currentDate<$start_date && $end_date>$start_date && $end_date>$currentDate)

                {   echo "<tr>";
                    echo"<td>".$row["E_ID"]."</td>" .  
                        "<td>".$row["E_TITLE"]."</td>" .
                        "<td>".$row["E_CITY"]."</td>". 
                        "<td>".$row["E_INFO"]."</td>".
                        "<td>"."Upcoming"."</td>".
                        "<td>"."NOT OPEN"."</td>";
                        echo "</tr>";
                }

                if($currentDate>$start_date && $end_date<=$currentDate && $halt === '0' )

                {   echo "<tr>";
                    echo"<td>".$row["E_ID"]."</td>" .  
                        "<td>".$row["E_TITLE"]."</td>" .
                        "<td>".$row["E_CITY"] ."</td>".  
                        "<td>".$row["E_INFO"] ."</td>" .
                        "<td>"."CLOSED"."</td>". 
                        // "<td>"."<a href='result.php'>VIEW RESULTS</a>"."</td>"
                        "<td>".'<a href="result.php?id='. $row["E_ID"]. '">'.'Show Results</a>'."</td>";

                         echo "</tr>";
                        
                }

                if($halt === '1' && $currentDate>$start_date && $end_date<=$currentDate)

                {   echo "<tr>";
                    echo"<td>".$row["E_ID"]."</td>" .  
                        "<td>".$row["E_TITLE"]."</td>" .
                        "<td>".$row["E_CITY"]."</td>". 
                        "<td>".$row["E_INFO"] ."</td>" .
                        "<td>". "HALTED". "</td>";
                
                    

                    if($_SESSION['usertype'] === "admin")
                    {
                        echo "<td>"."<a href='resume.php'>RESUME ELECTION?</a>"."</td>";
                    }
                    echo "</tr>";
                }
            

            

        }
        echo "</table>";    
     
     }
    

 else   {
            echo "0 results";
        }
 } 
mysqli_close($conn);
?>

</div>


    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>