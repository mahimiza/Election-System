<script type="text/javascript">import 'bootstrap/dist/js/bootstrap.bundle';</script>
<?php
   include('config.php');
   session_start();
   
   
   
   if(($_SESSION['usertype'] != "admin")){
       echo "Please Sign In. <a href = 'signin.php'>SignIn</a>"; }
   
   else {
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap.min.css">
   </head>
   <body style="margin-bottom: 100px;">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <a class="navbar-brand" href="index.html">
        <img src="ev.png" alt="Logo" style="width:50px; height: 50px;">
        </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!--  <li class="nav-item">
               <a class="nav-link" href="">Link</a>
               </li>-->
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Election
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="create_election.php">Add Election</a>
               <a class="dropdown-item" href="freeze.php">Freeze Election </a>
               <a class="dropdown-item" href="view_elections">Election Results</a>
               <!--<div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                  </div>-->
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Candidate
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="create_election.php">Add Candidate</a>
                  <a class="dropdown-item" href="freeze.php">View Candidate </a>
                  <a class="dropdown-item" href="registerv2.php">Add Admin</a>
                  <!--<div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">Something else here</a>
                     </div>-->
            </li>
         </ul>
         </div>
         <a class="btn btn-outline-danger my-2 my-lg-0 " href = "signout.php">Signout</a>
      </nav>


      <h3 style="margin: 30px">Admin Panel</h3>

      <div class="container" style="margin-top: 60px">
         <div class="row">
            <div class="col-md-4">
               <div class="card" style="width: 18rem;">
                  <div class="card-header"></div>
                  <div class="card-body">
                     <h5 class="card-title"">New Election</h5>
                     <!-- <p class="card-text">Export Premium Quality with reasonable price</p>-->
                     <a href="create_election.php" class="btn btn-primary">Create</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card" style="width: 18rem;">
                  <div class="card-header"></div>
                  <div class="card-body">
                     <h5 class="card-title">Freeze Election</h5>
                     <a href="freeze.php" class="btn btn-primary">Freeze</a>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card" style="width: 18rem;">
                  <div class="card-header"></div>
                  <div class="card-body">
                     <h5 class="card-title">Resume Halted Election</h5>
                     <a href="resume.php" class="btn btn-primary">Resume</a>
                  </div>
               </div>
            </div>
            <div class="container" style = "margin-top: 50px">
               <div class="col-md-4">
                  <div class="row">
                     <div class="card" style="width: 18rem;">
                        <div class="card-header"></div>
                        <div class="card-body">
                           <h5 class="card-title">View Elections</h5>
                           <a href="view_elections.php" class="btn btn-primary">Create</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="container" style = "margin-top: 50px">
               <div class="col-md-4">
                  <div class="row">
                     <div class="card" style="width: 18rem;">
                        <div class="card-header"></div>
                        <div class="card-body">
                           <h5 class="card-title">Add admin</h5>
                           <a href="registerv2.php" class="btn btn-primary">Create</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="jquery-3.5.1.slim.min.js"></script>
      <script src="popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
   </body>
</html>
<?php }?>