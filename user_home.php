<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["user_loggedin"]) || $_SESSION["user_loggedin"] !== true){
    header("location: user_login.php");
    exit;
}

// Include config file
require_once "user_config.php";
  
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Prepare a select statement
    $sql = "SELECT * FROM attendees";
      
    if($stmt = mysqli_prepare($link, $sql)){
        if(mysqli_stmt_execute($stmt)){
            // Store result
            mysqli_stmt_store_result($stmt);
            
            // Check if username exists, if yes then verify password
            if(mysqli_stmt_num_rows($stmt) < 5){                    
                header("location: att_succ.php");
            } else{
                header("location: att_fail.php");
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        input[type=button], input[type=submit], input[type=reset] {
          background-color: #3b5998;
          border: none;
          color: white;
          padding: 16px 32px;
          text-decoration: none;
          margin: 4px 2px;
          cursor: pointer;
          font-weight:bold;
          font-size: 20px;
        }
    </style>
</head>
<body>
    
    <img src="images/tedx_image.png" alt="logo">
    <h3> TEDx event is a local gathering where live TED-like talks and performances are shared with the community. TEDx events <br>are fully planned and coordinated independently, on a community-by-community basis. The content and design of each TEDx
      <br> event is unique and developed independently, but all of them have features in common.<br> <br>
      This is the 3rd annual TEDx hosted at IIT Kanpur featuring an immaculate panel of speakers from eminent politician, writer and diplomat Shashi Tharoor to our very own alumni, the IT industrialist N.R Narayan Murthy.
    </h3>

    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="submit" value="Reserve seats for the event">
            </div>
        </form>
    </div>
    <div class="wrapper">
    <div class="form-group">
    <a href="https://docs.google.com/spreadsheets/d/1pMu9KQvgKw6Ya9EVJ5skg01E1zvIpKfe1X0tlSh9uf8/edit?usp=sharing" class="btn btn-primary"  target="_blank">See Schedule</a><br> <br>
    </div>
    </div>
    <!--<a href="logout.php" class="btn logoutLblPos">Logout</a>  -->
    <a href="logout.php" class="btn logoutLblPos"> <img src="images/user.png" alt="Smiley face" height="42" width="42"> <br> <?php echo htmlspecialchars($_SESSION["username"]); ?> (logged in) <br> Logout</a>  
</body>
</html>