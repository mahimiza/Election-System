<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<?php
   include 'config.php';
   session_start();
    
    
   //Report all errors except warnings.
   error_reporting(E_ERROR | E_PARSE);
   
   if($_SESSION['usertype'] === "admin"){ 
                  $type = "admin";
                  include ("navbar.php");

   
           }  else 
   
   $type = "voter";




   
   if(isset($_POST['submit'])){
   $username = strlen ($_POST ["userName"]);  
   $length = strlen ($username); 
   $password = $_POST ["password"]; 
   $email = $_POST ["email"];  
   $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
   
   $dob=date('Y-m-d', strtotime($_POST['date']));
   
   
   $flag = 0;
   
   if (empty ($_POST["username"])) {  
          
               $flag=1;
             
                }
   if  (empty ($_POST["password"])) {  
   
            
               $flag=1;
           
           }
   
   
    if (empty ($_POST["email"])){  
      $flag=1;}
   
   
   
   
   
    
   
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
   $flag=1;
   }
   
   $password = $_POST["password"];
      
      
    /*  if(!preg_match("#[0-9]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Number!";
          echo $passwordErr;
          $flag=1;
      }
      elseif(!preg_match("#[A-Z]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
          $flag=1;
          echo $passwordErr;
      }
      elseif(!preg_match("#[a-z]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
          echo $passwordErr;
          $flag=1;
      }
      elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
$passwordEr .= "Your Password Must Contain At Least 1 Special Character !"."<br>";
echo $passwordErr;
$flag=1;
}*/
if($flag === 0)   
{
$check = "SELECT * FROM USERS WHERE USERNAME = '$_POST[username]'";
if(mysqli_num_rows(mysqli_query($conn, $check))>0)
{
echo "Username exists. Please choose a different one";
}
else
{  
$sql = "INSERT INTO USERS (NAME, DOB, PHONE, NID, EMAIL, USERNAME, PASSWORD, USERTYPE) VALUES ('$_POST[name]','$_POST[date]','$_POST[phone]','$_POST[nid]','$_POST[email]','$_POST[username]', '$_POST[password]', '$type')";
if(mysqli_query($conn, $sql))
echo "<a href='signin.php'>Account Created Successfully. Sign in</a>";
else {
echo "<div class='alert alert-success'>
            Success Alert !!!!
        
<a href='register.php'>Error in Creating Account. Try again?</a></div>";
} 
}
}
else
echo '<script type="text/javascript">alert("Error!. Check empty fields and match patterns")</script>';
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap.min.css">
   </head>
   <body style="margin-bottom: 100px;">
      <!-- navbar 
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">
         <img src="ev.png" alt="Logo" style="width: 70px;
    left: 15px; background-size: contain;">
         </a>-->
         <!-- <a class="navbar-brand" href="#">Evote</a> 
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
               </li>-->
               <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                  </a> -->
               <!--  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                  </li> -->
               <!-- <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li> -->
            </ul>
         </div>
      </nav>
      <!-- <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <h1>1st Part</h1>
             </div>
             <div class="col-md-4">
                     <h1>2nd Part</h1>
             </div>
             <div class="col-md-4">
                     <h1>3rd Part</h1>
             </div>
         
         </div>
         
         carousel 
         
         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
                 <div class="carousel-item active">
                     <img src="../../parrot.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                 </div>
                 <div class="carousel-item">
                     <img src="../../parrot.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                 </div>
                 <div class="carousel-item">
                     <img src="../../parrot.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                 </div>
             </div>
             <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>
         
         <h1>Hello Bootstrap</h1>
         <div class="alert alert-danger" role="alert">
             Danger alert
         </div>
         <div class="alert alert-success">
             Success Alert !!!!
         </div>
         <form>
             <button class="btn btn-success">click me
                 <span class="badge badge-pill badge-danger">4</span>
             </button>
         </form>
          breadcrumb 
         <ol class="breadcrumb">
             <li class="breadcrumb-item">Home</li>
             <li class="breadcrumb-item active">Product</li>
             <li class="breadcrumb-item">
                 <a href="#">BD</a>
             </li>
         </ol>
         utton 
         <button class="btn btn-outline-danger">Signup</button>
         <button class="btn btn-block btn-danger">login</button>
         <div class="btn-group">
             <button class="btn btn-secondary">1</button>
             <button class="btn btn-secondary">2</button>
             <button class="btn btn-secondary">3</button>
         </div>
         <!-- card -->
      <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
         <form action= "<?php echo $_SERVER['PHP_SELF'] ?> " method ="POST">
            <div class="card" style="width: 18rem; margin: 30px">
               <div class="card-header" >
                  <img src="ev.png" class="card-img-top" alt="image" style="width:80px" />
               </div>
               <!--<img src="../../parrot.jpg" class="card-img-top" alt="image" />-->
               <div class="card-body">
                  <?php if( $type === "admin"){?>
                  <h5 class="card-title">New Admin</h5>
                  <?php } 
                     else { ?>
                  <h5 class="card-title">SignUp</h5>
                  <?php }?>
                  <div style="margin: 10px" >
                     Name:
                     <input type="text" name="name" id="name" required><br>
                  </div>
                  <div style="margin: 10px" >
                     Date of Birth:<input type="date" name="date" required><br>
                  </div>
                  <div style="margin: 10px" >
                     Phone:<input type="number"  name="phone" required>
                  </div>
                  <div style="margin: 10px" >
                     National ID: <input type="text"  name="nid" id="nid" required=><br>
                  </div>
                  <div style="margin: 10px" >
                     Email: <input type="email"  name="email" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
                  </div>
                  <div style="margin: 10px" >
                     Username: <input type="text"  name="username" id="username" required><br>
                  </div>
                  <div style="margin: 10px" >
                     Password: <input type="password"  name="password" id="password" required 
                        pattern=".{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
                  </div>
                  <div style="margin: 10px" >
                     Confirm password:  <input type="password" name="password" id="txtConfirmPassword"      required pattern=".{8,}"title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
                  </div>
                  <div style="margin: 10px" >
                     <input class="btn btn-primary" type="submit" name="submit" value="Register" style="padding: 10px" >
                  </div>
                  <div style="margin: 10px" >
               <div class="row"> </div>
               
         </form>
         <?php if( $type != "admin"){?> 
         <p class="card-text">Already have an account?
         <a href="signin.php"> SignIn?</a>
         </p><?php } ?>
         </div>
         </div>
      </div>
      <script src="jquery-3.5.1.slim.min.js"></script>
      <script src="popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
   </body>
</html>