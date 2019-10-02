<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;
        /*background-image: url("images/light-bg.jpg");
        background-size: cover; */
    }
    </style>
</head>
<body>
    <div class="page-header">
        <h1><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.'s admin-homepage.</h1>
    </div>
    <p>
        <a href="https://docs.google.com/spreadsheets/d/1pMu9KQvgKw6Ya9EVJ5skg01E1zvIpKfe1X0tlSh9uf8/edit?usp=sharing" class="btn btn-primary" target="_blank">See/Modify Schedule</a><br> <br>
        <a href="attendees.php" class="btn btn-primary">Checkout Attendees List</a><br> <br>
        <a href="add_sponsor.php" class="btn btn-primary">Update Sponsors</a><br> <br>
        <a href="new_admin.php" class="btn btn-info">Create New Admin</a><br> <br>
        <a href="logout.php" class="btn logoutLblPos"> <img src="images/user.png" alt="Smiley face" height="42" width="42"> <br> <?php echo htmlspecialchars($_SESSION["username"]); ?> (logged in) <br> Logout</a>
    </p>
</body>
</html>