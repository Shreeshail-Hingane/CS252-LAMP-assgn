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
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="button" value="Admin Login" onClick="document.location.href='admin_login.php'">
            </div>
        </form>
    </div>   

    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="button" value="Want to attend?" onClick="document.location.href='user_login.php'">
            </div>
        </form>
    </div>    
</body>
</html>