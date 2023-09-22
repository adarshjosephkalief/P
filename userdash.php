<?php
session_start();
session_regenerate_id(true); 

// var_dump($_SESSION);
// echo "Session ID: " . session_id();

if(!isset($_SESSION["usertype"]))
{
	header("location:login.php");
}
if($_SESSION["usertype"]=='admin')
{
	header("location:adminhome.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $_SESSION["username"]?>'s dashboard</title>
</head>
<body>
    <div class="topnav">
        <a href="userhome.php">Home</a>
        <a class="active" href="userdash.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
    User page:<?php echo $_SESSION["username"] ?>
    
</body>
</html>