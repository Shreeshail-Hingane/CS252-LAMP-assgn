<?php

// Include config file
require_once "config.php";
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: err.html");
    exit;
}
 

$result = mysqli_query($link,"SELECT * FROM attendees");

echo "<table border='1'>
<tr>
<th>username</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($link);
?>
