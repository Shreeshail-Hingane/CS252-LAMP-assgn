<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $type = $email = $amount = "";
$name_err = $type_err = $email_err = $amount_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Check if sponsor name is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter name of sponsor..";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Check if email is empty or invalid
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter valid email-address";
    } else{
        $email = trim($_POST["email"]);
    }

    //Check if amount entered is empty or invalid
    if(empty(trim($_POST["amount"]))){
        $amount_err = "Please enter the sponsored amount.";
    } elseif (!is_numeric($_POST["amount"])) {
        $amount_err = "Please enter valid number as the amount";
    } else{
        $amount = trim($_POST["amount"]);
    }
    
    $type = $_POST["type"];

    // Validate credentials
    if(empty($name_err) && empty($type_err) && empty($email_err) && empty($amount_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO sponsors (name, type, email, amount)
        VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($link, $sql);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $type, $email, $amount);
        mysqli_stmt_execute($stmt);
        // Close statement
        mysqli_stmt_close($stmt);
        // Redirect user to welcome page
        header("location: admin_home.php");     
        echo "New sponsor added successfully";
    }
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
        .select-css {
            display: block;
            font-size: 16px;
            font-family: sans-serif;
            font-weight: 700;
            color: #444;
            line-height: 1.3;
            padding: .6em 1.4em .5em .8em;
            width: 100%;
            max-width: 100%; 
            box-sizing: border-box;
            margin: 0;
            border: 1px solid #aaa;
            box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
            border-radius: .5em;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            background-color: #fff;
            linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
            background-repeat: no-repeat, repeat;
            background-position: right .7em top 50%, 0 0;
            background-size: .65em auto, 100%;
        }
        .select-css::-ms-expand {
            display: none;
        }
        .select-css:hover {
            border-color: #888;
        }
        .select-css:focus {
            border-color: #aaa;
            box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
            box-shadow: 0 0 0 3px -moz-mac-focusring;
            color: #222; 
            outline: none;
        }
        .select-css option {
            font-weight:normal;
        }



        body {
          padding: 3rem;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add Sponsor</h2>
        <p></p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Sponsor Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group">
                <label>Sponsorship Category</label>
                
                <select class="select-css" name="type" style="width:200px;">
                  <option value="Financial Sponsor">Financial Sponsor</option>
                  <option value="Media Sponsor">Media Sponsor</option>
                  <option value="Individual Promotional Partnerships">Individual Promotional Partnerships</option>
                  <option value="In-Kind Sponsor">In-Kind Sponsor</option>
                </select>
                <span class="help-block"><?php echo $type_err; ?></span>
            </div>    
            
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                <label>Donated Amount(INR)</label>
                <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
                <span class="help-block"><?php echo $amount_err; ?></span>
            </div>


            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>