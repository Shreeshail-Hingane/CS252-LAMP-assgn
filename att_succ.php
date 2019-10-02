<?php

session_start();
// Check if the user is logged in, if not then redirect
if(!isset($_SESSION["user_loggedin"]) || $_SESSION["user_loggedin"] !== true){
    header("location: google.com");
    exit;
}

// Include config file
require_once "user_config.php";

$sql = "INSERT INTO attendees (username) VALUES (?)";
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    
    // Set parameters
    $param_username = $_SESSION["username"];
    
    // Attempt to execute the prepared statement
    if(!mysqli_stmt_execute($stmt)){
        echo "Oops! Something went wrong. Please try again later.";
    } 
}
    // Close statement
    mysqli_stmt_close($stmt);
    // Close connection
    mysqli_close($link);


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
    <img src="images/green.png" height="42" width="42">
    <h3> Success. Your seat has been reserved. Take note of the event details below <br> <br>
    Time: Sunday, 6th October. 9:00 am<br>
    Venue: Outreach Center, IIT Kanpur. 
    </h3>
    <!--<a href="logout.php" class="btn logoutLblPos">Logout</a> -->
    <a href="logout.php" class="btn logoutLblPos"> <img src="images/user.png" alt="Smiley face" height="42" width="42"> <br> <?php echo htmlspecialchars($_SESSION["username"]); ?> (logged in) <br> Logout</a>    
</body>
</html>