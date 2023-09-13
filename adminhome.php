<?php
session_start();


if(!isset($_SESSION["usertype"]))
{
	header("location:login.php");
}
if($_SESSION["usertype"]=='user')
{
	header("location:userhome.php");
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
        <a class="active" href="adminhome.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
    Admin page:<?php echo $_SESSION["username"] ?>
</body>
</html>